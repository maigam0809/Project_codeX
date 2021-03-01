<?php
 if(isset($data['err'])){
        $err = $data['err'];
    }
    ?>

<li class="breadcrumb-item active cl-control" aria-current="page">Đăng ký tài khoản</li>
            </nav>
        </div>
    </section>
<div class="container-fluild register-detail">
        <div class="container">
            <h4>ĐĂNG KÝ TÀI KHOẢN</h4>
            <p>Nếu chưa có tài khoản vui lòng đăng ký tại đây</p>
          
            <?php $session = new Session();?>
            <?php $session->flash();?>
        </li>
          
        </div>
            <form action="" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="user_name">Tên</label>

            <input type="text" name="user_name" class="form-control" placeholder="Nhập Tên" id="user_name" value="<?php echo $_POST['user_name'] ?? '' ?>">
            <p class="m-3" style="color:red;margin-top: 10px;">
            <?php echo $err['user_name'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="user_email">Email</label>
            <input type="email" name="user_email" class="form-control"  id="user_email" placeholder="Nhập Email" value="<?php echo $_POST['user_email'] ?? '' ?>">
            <p class="m-3" style="color:red;margin-top: 10px; ">
            <?php echo $err['user_email'] ?? ''; ?>
            </p>
        </div>

        <div class="form-group">
            <label for="user_password">Mật khẩu</label>
            <input type="password" name="user_password" class="form-control" placeholder="Nhập Mật khẩu" id="user_password"  value="<?php echo $_POST['user_password'] ?? '' ?>">
            <p class="m-3" style="color:red;margin-top: 10px;">
            <?php echo $err['user_password'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="user_password">Xác nhận mật khẩu</label>
            <input type="password" name="user_password2" class="form-control" placeholder="Nhập Mật khẩu" id="user_password"  value="<?php echo $_POST['user_password2'] ?? '' ?>">
            <p class="m-3" style="color:red;margin-top: 10px;">
            <?php echo $err['user_password2'] ?? ''; ?>
            </p>
        </div>
    
        <div class="form-group">
            <input type="hidden" class="form-control" name="created_at" id="created_at" value="<?= date("Y-m-d", time()); ?>">
        </div>

        <button type="submit" name="btn-users" class="btn btn-primary">Đăng ký</button>
        <a href="<?=BASE_URL?>/login" class="btn btn-danger"> Đăng nhập</a>
    </form>
        </div>

    </div>