<?php include( 'header.php' );?>
    <?php
        $search = isset( $_GET['search'] ) ? $_GET['search'] : '';
        $where  = ' WHERE 1 = 1 ';
        if( $search ){
            $where.= " AND username = '$search'";
        }
        $sql    = "SELECT * FROM users $where";
        $result = mysqli_query( db(), $sql );
        $users  = mysqli_fetch_all( $result, MYSQLI_ASSOC );
    ?>
    <div class="table-container">

            <form class="table-filters mb-4 row" action="">
                <div class="col-3">
                    <div class="form-group">
                        <label for="search">جستجو</label>
                        <input type="search" name="search" class="form-control" id="search" value="<?php echo $search;?>">
                    </div>
                </div>
                <div class="col-3">
                    <br>
                    <button class="btn btn-info" name="user_filter">اعمال فیلتر</button>
                </div>
            </form><!--.table-filters-->

            <table class="table table-hover table-striped table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام کاربری</th>
                        <th scope="col">نام و نام خانوادگی</th>
                        <th scope="col">کیف پول</th>
                        <th scope="col">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if( $result->num_rows ):?>
                        <?php foreach( $users as $index => $user ):?>
                        <tr>
                            <th scope="row"><?php echo $index + 1;?></th>
                            <td><?php echo $user['username'];?></td>
                            <td><?php echo $user['name'];?></td>
                            <td><?php echo number_format( $user['wallet'] / 10 );?></td>
                            <td>
                                <a href="#" class="btn btn-secondary">
                                    ویرایش
                                </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    <?php else:?>

                    <tr>
                        <td colspan="5">
                            کاربری یافت نشد
                        </td>
                    </tr>
                    <?php endif;?>
                </tbody>
            </table>
            <a href="new.php" class="btn btn-primary">ثبت کاربر جدید</a>
        </div>
<?php include( 'footer.php' );?>