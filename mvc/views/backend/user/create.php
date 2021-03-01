<div class="container">
    <h1>Thêm User</h1>
    <?php  $session->flash();?>
    
    <form action="" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="user_name">Tên</label>

            <input type="text" name="user_name" class="form-control" placeholder="Nhập username" id="user_name" value="<?php echo $_POST['user_name'] ?? '' ?>">
            <p style="color:red;">
            <?php echo $data['err']["user_name"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="user_image">Ảnh</label>
           
            <input type="file" class="form-control" name="user_image" id="user_image"  value="<?php echo $_POST['user_image'] ?? '' ?>">
            <p style="color:red;">
            <?php echo $data['err']["user_image"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="user_email">Email</label>
            <input type="email" name="user_email" class="form-control"  id="user_email" placeholder="Nhập Email" value="<?php echo $_POST['user_email'] ?? '' ?>">
            <p style="color:red;">
            <?php echo $data['err']["user_email"] ?? ''; ?>
            </p>
        </div>

        <div class="form-group">
            <label for="user_password">Mật khẩu</label>
            <input type="password" name="user_password" class="form-control" placeholder="Nhập Mật khẩu" id="user_password"  value="<?php echo $_POST['user_password'] ?? '' ?>">
            <p style="color:red;">
            <?php echo $data['err']["user_password"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="user_address">Địa chỉ</label>

            <input type="text" class="form-control" name="user_address" id="user_address" placeholder="Nhập Địa chỉ"  value="<?php echo $_POST['user_address'] ?? '' ?>">
            <p style="color:red;">
            <?php echo $data['err']["user_address"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="role">Vai trò</label> <br>
            <span>Khach hang: </span><input type="radio" id="role" name="role" value="0">
            <span>Nhân viên: </span><input type="radio" checked id="role" name="role" value="1"  >
        </div>
        <div class="form-group">
            <label for="user_phone">Số điện thoại</label>
            <input type="text" name="user_phone" class="form-control" id="user_phone" placeholder="Nhập số điện thoại"  value="<?php echo $_POST['user_phone'] ?? '' ?>">
            <p style="color:red;">
            <?php echo $data['err']["user_phone"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="created_at">Ngày tạo</label>
            <input type="date" class="form-control" name="created_at" id="created_at" value="<?= date("Y-m-d", time()); ?>">
        </div>

        <button type="submit" name="btn-users" class="btn btn-primary">Thêm danh mục</button>
    </form>
</div>