<div class="container">
    <h1> Sửa thông tin User</h1>
    <?php  $session->flash();?>
    <?php
    $a = $data['user'];
    ?>
    <?php date_default_timezone_set("Asia/Ho_Chi_Minh"); ?>
    <form action="" enctype="multipart/form-data" method="post">
    <input  name="user_id" type="hidden" value="<?= $a[0]['user_id'] ?>">
        <div class="form-group">
            <label for="user_name">Tên</label>
            <input type="text" name="user_name" class="form-control" placeholder="Nhập username" id="user_name" value="<?= $a[0]['user_name'] ?>">
            <p style="color:red;">
            <?php echo $data['err']["user_name"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
             <label for="user_image">Ảnh</label>
            <!-- <input type="text" class="form-control" name="user_image" id="user_image"value=""> -->
            <input name="user_image" type="hidden" value="<?= $a[0]['user_image'] ?>">
            <input class="form-control p-2" name="image" type="file">
            <div style="width: 200px;max-height: 150px; margin-top: 10px;">
                <img style="max-width: 100%; max-height: 200px;" src="<?= BASE_URL ?>/public/backend/image/user/<?= $a[0]['user_image'] ?>" alt="" width="80px">
            </div>
            <p style="color:red;">
            <?php echo $data['err']["image"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="user_email">Email</label>
            <input type="email" name="user_email" class="form-control" id="user_email" placeholder="Nhập Email" value="<?= $a[0]['user_email'] ?>">
            <p style="color:red;">
            <?php echo $data['err']['user_email'] ?? ''; ?>
            </p>
        </div>

        <div class="form-group">
            <label for="user_password">Mật khẩu</label>
            <input type="password" name="user_password" class="form-control" placeholder="Nhập Mật khẩu" id="user_password" value="<?= $a[0]['user_password'] ?>">
            <p style="color:red;">
            <?php echo $data['err']['user_password'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="user_address">Địa chỉ</label>
            <input type="text" class="form-control" name="user_address" id="user_address" placeholder="Nhập Địa chỉ" value="<?= $a[0]['user_address'] ?>">
            <p style="color:red;">
            <?php echo $data['err']['user_address'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="role">Vai trò</label> <br>
            <span>Khach hang: </span><input type="radio" id="role" name="role" value="0" <?php if ($a[0]['role'] == 0) {
                                                                                                echo "checked";
                                                                                            } ?>>
            <span>Nhân viên: </span><input type="radio" id="role" name="role" value="1" <?php if ($a[0]['role'] == 1) {
                                                                                            echo "checked";
                                                                                        } ?>>
        </div>
        <div class="form-group">
            <label for="user_phone">Số điện thoại</label>
            <input type="text" name="user_phone" class="form-control" id="user_phone" placeholder="Nhập số điện thoại" value="<?= $a[0]['user_phone'] ?>">
            <p style="color:red;">
            <?php echo $data['err']['user_phone'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
     
            <input type="hidden" class="form-control" name="created_at" id="created_at" value="<?= $a[0]['created_at'] ?>">
        </div>
        <div class="form-group ">
         
            <input type="hidden" class="form-control" name="updated_at" id="updated_at" value="<?= date("Y-m-d") ?>">

        </div>
        <button type="submit" name="btn-users" class="btn btn-primary">Sửa user name</button>
        <a class="btn btn-info" href="<?=BASE_URL?>/admin/user/index">Quay lại</a>
    </form>
</div>
