<li class="breadcrumb-item active cl-control" aria-current="page">Đặt lại mật khẩu</li>
            </nav>
        </div>
    </section>
<div class="container-fluild register-detail">
        <div class="container">
            
            <p>Lấy mã xác nhận tại email đăng kí của bản</p>
            <?php  $session->flash();?>
            <form action="<?= BASE_URL?>/reset/update_acc"method="post">
        <div class="form-group">
            <label for="user_password">Mật khẩu mới </label>
            <input type="password" name="user_password" class="form-control" placeholder="Nhập Mật khẩu" id="user_password"  value="<?php echo $_POST['user_password'] ?? '' ?>">
            <p style="color:red;">
            <?php echo $data['err']["user_password"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="user_password">Xác nhận khẩu mới </label>
            <input type="password" name="user_password2" class="form-control" placeholder="Nhập Mật khẩu" id="user_password"  value="<?php echo $_POST['user_password2'] ?? '' ?>">
            <p style="color:red;">
            <?php echo $data['err']["user_password2"] ?? ''; ?>
            </p>
        </div>
        <button type="submit" name="btn-update" class="btn btn-primary">Cập nhật</button>
        <a href="<?=BASE_URL?>/login" class="btn btn-danger"> Đăng nhập</a>
    </form>
        </div>

    </div>