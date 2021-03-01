<li class="breadcrumb-item active cl-control" aria-current="page">Đăng nhập tài khoản</li>
            </nav>
        </div>
    </section>
    <div class="container-fluild login-detail">
        <div class="container">
        <?php  $session->flash();?>
            <h4>ĐĂNG NHẬP TÀI KHOẢN</h4>
            <div class="main">
                <div class="to-login">
                    <p>Nếu bán đã có tài khoản, đăng nhập tại đây</p>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email" name="user_email"  placeholder="Email" value="<?php echo $_POST['user_email'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mật khẩu *</label>
                            <input type="password" class="form-control" id="pwd" name="user_password" placeholder="Mật khẩu" value="<?php echo $_POST['user_password'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" name="btn_dn">Đăng nhập</button>
                            <a class="btn btn-info" href="<?=BASE_URL ?>/register">Đăng ký</a>
                        </div>
                    </form>
                </div>
                <div class="get-pass">
                    <p>Bạn quên mật khẩu? Nhập địa chỉ email để lấy lại mật khẩu qua email</p>
                    <form action="<?= BASE_URL?>/reset" method="post">
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" name="email" id="email" required placeholder="Email">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info" name="btn_reset">Lấy lại mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>