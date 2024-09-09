<?php
$page_name = 'tasklist';
?>
<?php include( 'partial/header.php' );?>
    <?php

    $success    = '';
    $error      = '';

    $title      = '';
    $status     = 'queue';
    $progress   = 0;
    $date       = date( 'Y-m-d H:i:s' );

    $is_edit    = false;

    if( isset( $_GET['edit'] )  ){
        $edit_uid   = $_GET['edit'];
        $is_edit    = true;
        $task       = get_task( $edit_uid  );
        if( $task ){
            $title      = $task['title'];
            $status     = $task['status'];
            $progress   = $task['progress'];
            $date       = $task['date'];
        }
    }


    if( isset( $_POST['save_task'] ) ){
        
        $title      = $_POST['title'];
        $status     = $_POST['status'];
        $progress   = $_POST['progress'];
        $date       = $_POST['date'];

        if( strlen( $title ) < 3 ){
            $error = 'نام کار باید وارد شود';
        }

        if( ! $error ){

            if( $is_edit ){
                edit_task( $edit_uid, $title, $status, $progress, $date );
                $success = 'ویرایش انجام شد';
            }else{
                $uid = insert_task( $title, $status, $progress, $date );
                redirect( 'tasklist.php' );
            }

        }

    }

    ?>
    <?php include( 'partial/sidebar.php' );?>
    <main>
        <h1>
            <?php if( $is_edit ):?>
                ویرایش «<?php echo $title;?>»
            <?php else:?>
                ثبت کار جدید
            <?php endif;?>
        </h1>

        <?php if( $error ):?>
        <div class="message error">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"><path d="m14 16.16-3.96-3.96M13.96 12.24 10 16.2M10 6h4c2 0 2-1 2-2 0-2-1-2-2-2h-4C9 2 8 2 8 4s1 2 2 2Z" stroke="#FF8A65" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 4.02c3.33.18 5 1.41 5 5.98v6c0 4-1 6-6 6H9c-5 0-6-2-6-6v-6c0-4.56 1.67-5.8 5-5.98" stroke="#FF8A65" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            <p>
                <?php echo $error;?>
            </p>
        </div><!--.message-->
        <?php endif;?>

        <?php if( $success ):?>
        <div class="message success">
            <svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="21.5" viewBox="0 0 19.5 21.5">
                <g id="clipboard-tick" transform="translate(-2.25 -1.25)">
                    <path id="Path_84" data-name="Path 84" d="M10.81,16.95a.75.75,0,0,1-.53-.22l-1.5-1.5A.75.75,0,1,1,9.841,14.17l.97.97,3.47-3.47a.75.75,0,1,1,1.061,1.061l-4,4A.75.75,0,0,1,10.81,16.95Z" fill="#00954f"/>
                    <path id="Path_85" data-name="Path 85" d="M14,6.75H10a3.083,3.083,0,0,1-1.791-.376A2.626,2.626,0,0,1,7.25,4a2.626,2.626,0,0,1,.959-2.374A3.083,3.083,0,0,1,10,1.25h.96a.75.75,0,0,1,0,1.5H10a2.1,2.1,0,0,0-.959.124C8.853,3,8.75,3.4,8.75,4s.1,1,.291,1.126A2.1,2.1,0,0,0,10,5.25h4c.6,0,1-.1,1.126-.291A2.1,2.1,0,0,0,15.25,4c0-.6-.1-1-.291-1.126A2.1,2.1,0,0,0,14,2.75a.75.75,0,0,1,0-1.5,3.083,3.083,0,0,1,1.791.376A2.626,2.626,0,0,1,16.75,4a3.083,3.083,0,0,1-.376,1.791A2.626,2.626,0,0,1,14,6.75Z" fill="#00954f"/>
                    <path id="Path_86" data-name="Path 86" d="M3,10.75A.75.75,0,0,1,2.25,10c0-2.437.461-4.07,1.45-5.141.913-.988,2.226-1.478,4.259-1.587a.75.75,0,1,1,.081,1.5A4.5,4.5,0,0,0,4.8,5.876C4.094,6.643,3.75,7.992,3.75,10A.75.75,0,0,1,3,10.75Z" fill="#00954f"/>
                    <path id="Path_87" data-name="Path 87" d="M15,22.75H9c-2.663,0-4.391-.558-5.439-1.756C2.406,19.674,2.25,17.729,2.25,16V13.91a.75.75,0,0,1,1.5,0V16c0,2.055.281,3.254.939,4.006C5.432,20.855,6.8,21.25,9,21.25h6c2.2,0,3.568-.4,4.311-1.244.658-.753.939-1.951.939-4.006V10c0-2.012-.344-3.362-1.052-4.127a4.507,4.507,0,0,0-3.239-1.1.75.75,0,0,1,.081-1.5c2.034.11,3.348.6,4.259,1.583.99,1.07,1.451,2.7,1.451,5.146v6c0,1.729-.156,3.674-1.311,4.994C19.391,22.192,17.663,22.75,15,22.75Z" fill="#00954f"/>
                </g>
            </svg>
            <p>
                <?php echo $success;?>
            </p>
        </div><!--.message-->
        <?php endif;?>

        <form action="" method="post" class="row">
            <div class="col col-12">
                <div class="form-group">
                    <label for="title">نام کار</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $title;?>">
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select name="status" id="status" class="form-control">
                        <option value="queue" <?php echo $status == 'queue' ? 'selected' : '';?>>در صف انجام</option>
                        <option value="doing" <?php echo $status == 'doing' ? 'selected' : '';?>>در حال انجام</option>
                        <option value="done" <?php echo $status == 'done' ? 'selected' : '';?>>انجام شده</option>
                        <option value="expire" <?php echo $status == 'expire' ? 'selected' : '';?>>منقضی شده</option>
                    </select>
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="progress">درصد پیشرفت</label>
                    <input type="number" min="0" max="100" step="1" class="form-control" id="progress" name="progress" value="<?php echo $progress;?>">
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="date">مهلت زمانی</label>
                    <input type="text" min="0" max="100" step="1" class="form-control date-field" id="date" name="date" value="<?php echo $date;?>">
                </div>
            </div>
            <div class="col col-12">
                <button class="btn btn-primary" name="save_task">
                    ذخیره کار
                </button>
            </div>
        </form>

    </main>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr(".date-field", {
            enableTime  : true,
            dateFormat  : "Y-m-d H:i:s",
            minDate     : "today"
        });
    </script>

<?php include( 'partial/footer.php' );?>