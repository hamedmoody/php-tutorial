<?php
$page_title = 'ثبت کاربر جدید';
?>
<?php include( 'header.php' );?>
<div class="table-container">
    <h1>ثبت کاربر جدید</h1>
    <form class="table-filters mb-4 row" action="" method="post">
        <div class="col-12">
            <div class="form-group">
                <label for="username">نام کاربری</label>
                <input type="text" name="username" class="form-control" id="username" value="">
            </div>
            <div class="form-group">
                <label for="name">نام </label>
                <input type="text" name="name" class="form-control" id="name" value="">
            </div>
            <div class="form-group">
                <label for="wallet">مبغ کیف پول </label>
                <input type="number" name="wallet" class="form-control" id="wallet" value="">
            </div>
            <div class="form-group">
                <label for="description">توضیحات </label>
                <textarea name="description" class="form-control" id="description" rows="5"></textarea>
            </div>
        </div>
        <div class="col-3">
            <br>
            <button class="btn btn-primary" name="save_user">ثبت کاربر</button>
        </div>
    </form><!--.table-filters-->
</div>

<?php include( 'footer.php' );?>