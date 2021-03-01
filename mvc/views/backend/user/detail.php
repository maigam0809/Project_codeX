<?php
// thay thế $a banwngf $data['user']
$a = $data['user'];
?>
<div class="container">
    <h2>Thông tin user</h2>
    <div class="add-cate pt-2 pb-4">
        <a class="btn btn-info" href="<?= BASE_URL ?>/admin/user/index">QUAY LẠI USER</a>
    </div>
    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th class="a">ID :</th>
                <th><?= $a[0]['user_id'] ?></th>
            </tr>
            <tr>
                <th class="a">TÊN :</th>
                <th><?= $a[0]['user_name'] ?></th>
            </tr>
            <tr>
                <th class="a">HÌNH ẢNH :</th>
                <th><img src="<?= BASE_URL ?>/public/backend/image/user/<?= $a[0]['user_image'] ?>" alt="" width="80px"></th>
            </tr>
            <tr>
                <th class="a">TÊN :</th>
                <th><?= $a[0]['user_name'] ?></th>
            </tr>
            <tr>
                <th class="a">EMAIL :</th>
                <th><?= $a[0]['user_email'] ?></th>
            </tr>
            <tr>
                <th class="a">MẬT KHẨU :</th>
                <th><?= $a[0]['user_password'] ?></th>
            </tr>
            <tr>
                <th class="a">ĐỊA CHỈ :</th>
                <th><?= $a[0]['user_address'] ?></th>
            </tr>
            <tr>
                <th class="a">VAI TRÒ :</th>
                <th><?= $a[0]['role'] ? 'Nhân viên' : 'Khách hàng' ?></th>
            </tr>
            <tr>
                <th class="a">NGÀY TẠO :</th>
                <th><?= $a[0]['created_at'] ?></th>
            </tr>
            <tr>
                <th class="a">NGÀY CẬP NHẬT :</th>
                <th><?= $a[0]['updated_at'] ?></th>
            </tr>
            <tr>
                <th class="a">SỐ ĐIỆN THOẠI :</th>
                <th><?= $a[0]['user_phone'] ?></th>
            </tr>
        </thead>
    </table>
</div>
<style>
    .a{
        color: black;
    }
</style>