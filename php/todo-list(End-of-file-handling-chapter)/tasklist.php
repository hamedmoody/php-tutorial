<?php
$page_name = 'tasklist';
?>
<?php include( 'partial/header.php' );?>
    <?php include( 'partial/sidebar.php' );?>
    <?php
    if( isset( $_GET['delete_task'] )  ){
        delete_task( $_GET['delete_task'] );
    }
    $tasks = get_user_tasks();
    ?>
    <main>
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
                    لیست کارهای  شما
                </h2>
                <a href="new.php">
                    + ثبت وظیفه جدید
                </a>
            </header>
            <?php if( ! empty( $tasks )  ):?>
            <div class="widget-body">
                <?php foreach( $tasks as $task ):?>
                    <?php include( 'partial/task-card.php' );?>
                <?php endforeach;?>
            </div><!--.widget-body-->
            <?php else:?>
            <h2>کاری ثبت نشده است</h2>
            <?php endif;?>
        </section>

    </main>
<?php include( 'partial/footer.php' );?>