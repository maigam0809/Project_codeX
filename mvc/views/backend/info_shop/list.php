<div class="container">
<?php  $session->flash();?>
    <h2>Thông tin cửa hàng</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Mã</th>
                <th>TÊN SHOP</th>
                <th>EMAIL</th>
                <th>ĐỊA CHỈ</th>
                <th>SỐ ĐIỆN THOẠI</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['infos'] as $item):?>
            <tr>
                <td><?=$item['info_id']?></td>
                <td><?=$item['info_name']?></td>
                <td><?=$item['info_email']?></td>
                <td><?=$item['info_adress']?></td>
                <td><?=$item['info_phone']?></td>
                <td>
                    <a class="btn btn-warning" href="<?=BASE_URL?>/admin/info_shop/update/<?=$item['info_id']?>">Sửa</a>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
        <thead>
            <tr>
                <th>Mã</th>
                <th>TÊN SHOP</th>
                <th>EMAIL</th>
                <th>ĐỊA CHỈ</th>
                <th>SỐ ĐIỆN THOẠI</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
    </table>
</div>