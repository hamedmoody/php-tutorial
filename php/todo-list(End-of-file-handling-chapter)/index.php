<?php
$page_name = 'dashboard';
?>
<?php include( 'partial/header.php' );?>
    <?php include( 'partial/sidebar.php' );?>
    <main>
        <h1>پیشخوان</h1>

        <?php $stats = get_task_stats();?>
        <div class="task-stats">
            <a href="#" class="task-stat doing">
                <span><?php echo $stats['doing'];?></span>
                <p>در حال انجام</p>
            </a>
            <a href="#" class="task-stat done">
                <span><?php echo $stats['done'];?></span>
                <p>انجام شده</p>
            </a>
            <a href="#" class="task-stat queue">
                <span><?php echo $stats['queue'];?></span>
                <p>در صف انجام</p>
            </a>
            <a href="#" class="task-stat expire">
                <span><?php echo $stats['expire'];?></span>
                <p>از دست رفته</p>
            </a>
        </div><!--.task-stats-->

        <?php $latest_tasks = get_user_tasks( 3 );?>
        <section class="widget">
            <header>
                <h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="18.5" viewBox="0 0 19.5 18.5">
                        <g id="task" transform="translate(-2.25 -2.75)">
                            <path id="Path_67" data-name="Path 67" d="M21,20.25H11a.75.75,0,0,1,0-1.5H21a.75.75,0,0,1,0,1.5Z" fill="#292d32"/>
                            <path id="Path_68" data-name="Path 68" d="M21,13.25H20a.75.75,0,0,1,0-1.5h1a.75.75,0,0,1,0,1.5Z" fill="#292d32"/>
                            <path id="Path_69" data-name="Path 69" d="M16.49,13.25H11a.75.75,0,0,1,0-1.5h5.49a.75.75,0,0,1,0,1.5Z" fill="#292d32"/>
                            <path id="Path_70" data-name="Path 70" d="M21,6.25H11a.75.75,0,0,1,0-1.5H21a.75.75,0,0,1,0,1.5Z" fill="#292d32"/>
                            <path id="Path_71" data-name="Path 71" d="M4,7.25a.748.748,0,0,1-.53-.22l-1-1A.75.75,0,0,1,3.53,4.97l.47.47L6.47,2.97A.75.75,0,0,1,7.53,4.03l-3,3A.748.748,0,0,1,4,7.25Z" fill="#292d32"/>
                            <path id="Path_72" data-name="Path 72" d="M4,14.25a.748.748,0,0,1-.53-.22l-1-1A.75.75,0,0,1,3.53,11.97l.47.47L6.47,9.97A.75.75,0,1,1,7.53,11.03l-3,3A.748.748,0,0,1,4,14.25Z" fill="#292d32"/>
                            <path id="Path_73" data-name="Path 73" d="M4,21.25a.748.748,0,0,1-.53-.22l-1-1A.75.75,0,1,1,3.53,18.97l.47.47,2.47-2.47A.75.75,0,0,1,7.53,18.03l-3,3A.748.748,0,0,1,4,21.25Z" fill="#292d32"/>
                        </g>
                    </svg>
                    لیست کارهای اخیر شما
                </h2>
                <a href="tasklist.php">
                    مشاهده همه وظایف
                </a>
            </header>
            <div class="widget-body">
                <?php foreach( $latest_tasks as $task ):?>
                    <?php include('partial/task-card.php');?>
                <?php endforeach;?>
            </div><!--.widget-body-->
        </section>

    </main>
<?php include( 'partial/footer.php' );?>