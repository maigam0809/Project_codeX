<div class="container">
<?php  $session->flash();?>
    <h2>Danh sách liên hệ</h2>
    <div class="add-cate pt-2 pb-4">
    </div>
    <table class="table"id="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>TÊN KH</th>
                <th>Email</th>
                <th>NGÀY GIỬI</th>
                <th>TRẠNG THÁI</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody>
       
            <?php foreach($data['contact'] as $item):?>
            <tr>
            <td><?=$item['contact_id']?></td>
                <td><?=$item['contact_name']?></td>
                <td><?=$item['contact_email']?></td>
                <td><?=$item['contact_create_at']?></td>
                <td><?= $item['contact_status'] ? 'Đã xem' : 'Chưa xem' ?></td>
                
                <td>
                    <a class="btn btn-warning" href="<?=BASE_URL?>/admin/contact/details/<?=$item['contact_id']?>">Mở thư</a>
                    <a class="btn btn-danger" onclick="return confirm('Ban có muốn xóa hay không ?')" href="<?=BASE_URL?>/admin/contact/delete/<?=$item['contact_id']?>">Xóa</a>
                </td>
            </tr>
            <?php endforeach ;?>
            
        </tbody>
        <thead>
        <tr>
        <th>ID</th>
                <th>TÊN KH</th>
                <th>Email</th>
                <th>NGÀY GIỬI</th>
                <th>TRẠNG THÁI</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
    </table>
</div>

