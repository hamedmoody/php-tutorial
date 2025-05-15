<?php

function db(){
    global $db;
    return $db;
}

function db_log( $db_error ){
    file_put_contents(
        ABSPATH . 'db-error.txt',
        date('Y-m-d H:i:s ') . ' => ' . $db_error . PHP_EOL,
        FILE_APPEND
    );
}

function db_affected_row(){
    return mysqli_affected_rows( db() );
}

function db_escape( $string ){
    return mysqli_real_escape_string( db(), $string );
}

function db_query( $sql ){
    $result = @mysqli_query( db(), $sql );
    if( $result ){
        return $result;
    }

    db_log( mysqli_error( db() ) );
    
    return false;
}

function db_get_results( $sql ){

    $query = db_query( $sql );
    if( $query && $query->num_rows ){
        return mysqli_fetch_all( $query, MYSQLI_ASSOC );
    }

    return false;

}

function db_get_var( $sql ){
    $query = db_query( $sql );
    if( $query && $query->num_rows ){
        $result = mysqli_fetch_array( $query );
        return $result[0];
    }
    return false;
}

function db_get_row( $sql ){

    $query = db_query( $sql );

    if( $query && $query->num_rows ){
        return mysqli_fetch_assoc( $query );
    }

    return false;

}

function db_insert( $table, $data ){

    $cols       = array_keys( $data );
    $cols_sql   = '`' . implode( '`, `', $cols ) . '`';

    $vals       = array_values( $data );
    $new_data   = [];
    foreach( $vals as $val ){
        if( $val === NULL ){
            $new_data[] = 'NULL';
        }else{
            $new_data[] = "'$val'";
        }
    }
    $vals_sql   = implode( ', ', $new_data );
    
    $sql        = "INSERT INTO $table ( $cols_sql ) VALUES ( $vals_sql )";
   
    $result     = @mysqli_query( db(), $sql );

    if( ! $result ){
        db_log( mysqli_error( db() ) );
        return false;
    }

    return mysqli_insert_id( db() );
    
}

function db_update( $table, $update_data, $where_data ){

    $set_sql = '';
    foreach( $update_data as $key => $val ){
        if( $val === null ){
            $set_sql.= "$key = NULL, ";
        }else{
            $val = db_escape( $val );
            $set_sql.= "$key = '$val', ";
        }
    }
    $set_sql = trim( $set_sql, ', ' );

    if( is_array( $where_data ) ){

        $where   = ' 1 = 1 ';
        foreach( $where_data as $key => $val ){
            if( $val === null ){
                $where.= " AND `$key` IS NULL";
            }else{
                $val = db_escape( $val );
                $where.= " AND `$key` = '$val'";
            }
        }

    }elseif( is_string( $where_data ) ){
        $where = $where_data;
    }

    $update_sql = "UPDATE $table SET $set_sql WHERE $where";

    $result     = @mysqli_query( db(), $update_sql );

    if( ! $result ){
        db_log( mysqli_error( db() ) );
        return false;
    }

    return mysqli_affected_rows( db() );

}


function db_delete( $table, $where_data ){
    
    if( is_array( $where_data ) ){

        $where   = ' 1 = 1 ';
        foreach( $where_data as $key => $val ){
            if( $val === null ){
                $where.= " AND `$key` IS NULL";
            }else{
                $val = db_escape( $val );
                $where.= " AND `$key` = '$val'";
            }
        }

    }elseif( is_string( $where_data ) ){
        $where = $where_data;
    }

    $update_sql = "DELETE FROM $table WHERE $where";
    
    $result     = @mysqli_query( db(), $update_sql );

    if( ! $result ){
        db_log( mysqli_error( db() ) );
        return false;
    }

    return mysqli_affected_rows( db() );

}


function get_record_by( $table, $field, $field_val ){

    $query  = "SELECT * FROM $table WHERE `$field` = '$field_val' LIMIT 1";
    $result = db_query( $query );
    if( $result && $result->num_rows ){
        return mysqli_fetch_assoc( $result );
    }

    return false;

}