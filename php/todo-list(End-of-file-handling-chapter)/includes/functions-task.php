<?php
function insert_task( $title, $status, $progress, $date ){

    $tasks      = get_user_tasks();

    /**
     * Add new task to user tasks
     */
    $uid        = generate_random_string( 10 );
    $tasks[]    = [
        'uid'           => $uid,
        'create_time'   => time(),
        'title'         => $title,
        'status'        => $status,
        'progress'      => $progress,
        'date'          => $date,
    ];
    
    save_user_tasks( $tasks );

    return $uid;

}

function delete_task( $uid ){
    $tasks = get_user_tasks();

    $tasks = array_filter( $tasks, function( $task ) use ( $uid )  {
        if( $task['uid'] == $uid ){
            return false;
        }
        return true;
    } );

    save_user_tasks( $tasks );
}

function get_task( $uid ){
    $tasks = get_user_tasks();
    foreach( $tasks as $task ){
        if( $task['uid'] == $uid ){
            return $task;
        }
    }
    return false;
}

function edit_task( $uid, $title, $status, $progress, $date ){

    $tasks = get_user_tasks();

    foreach( $tasks as $task_index => $task ){
        if( $task['uid'] == $uid ){
            $tasks[$task_index]['title']    = $title;
            $tasks[$task_index]['status']   = $status;
            $tasks[$task_index]['progress'] = $progress;
            $tasks[$task_index]['date']     = $date;
        }
    }

    save_user_tasks( $tasks );

}

function save_user_tasks( $tasks ){

    /**
     * Save tasks
     */
    file_put_contents( get_user_file(), serialize( $tasks ) );

}

function get_user_tasks( $limit = false ){

    /**
     * Get User tasks
     */
    $tasks      = [];
    if( file_exists( get_user_file() ) ){
        $data   = file_get_contents( get_user_file() );
        $tasks  = unserialize( $data );
    }

    $tasks      = sort_tasks( $tasks );

    if( $limit ){
        return array_slice( $tasks, 0, 3 );
    }

    return $tasks;

}

function get_user_file(){

    /**
     * Get user tasks file
     */
    $user       = get_user();
    return 'tasks/task-' . $user['username'] . '.txt';

}

function get_task_label( $status ){

    $statuses = [
        'queue'     => 'درصف',
        'doing'     => 'درحال انجام',
        'done'      => 'انجام شده',
        'expire'    => 'منقضی شده'
    ];

    return $statuses[$status];

}

function get_remain_days( $date ){
    $target = strtotime( $date );
    $remain = $target - time();
    $days   = round( $remain / 86400 );
    if( $days > 0 && $days < 5 ){
        return "$days باقیمانده";
    }
    return '';
}

function sort_tasks( $tasks ){
    usort( $tasks, function( $a, $b ){
        return $b['create_time'] <=> $a['create_time'];
    } );
    return $tasks;
}

function get_task_stats(){

    $tasks = get_user_tasks();

    $stats = [
        'queue'     => 0,
        'doing'     => 0,
        'done'      => 0,
        'expire'    => 0,
    ];

    foreach( $tasks as $task ){
        $status = $task['status'];
        $stats[$status]++;
    }

    return $stats;

}