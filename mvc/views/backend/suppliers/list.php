<div class="container">
<?php  $session = new Session();  $session->flash();?> 
    <h2>Danh sách nhà cung cấp</h2>
    <div class="add-cate pt-2 pb-4">
        <a class="btn btn-info" href="<?=BASE_URL?>/admin/suppliers/create">Thêm loại hàng</a>
    </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Ngày tạo</th>
                <th>Giới thiệu</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['suppliers'] as $item):?>
            <tr>
                <td><?=$item['supplier_id']?></td>
                <td><?=$item['supplier_name']?></td>
                <td class="" style="width: 150px; max-height: 100px; margin: 0 5px;">
                    <img style="max-width: 100%; max-height: 100%;" src="<?=BASE_URL?>/public/backend/image/suppliers/<?=$item['supplier_image']?>" alt="">
                </td>
                <td><?=$item['created_at']?></td>
                <td><a class="btn btn-success" href="<?=BASE_URL?>/admin/suppliers/details/<?=$item['supplier_id']?>">Chi tiết</a></td>
                <td>
                    <a class="btn btn-warning" href="<?=BASE_URL?>/admin/suppliers/update/<?=$item['supplier_id']?>">Sửa</a>
                    <a onclick="return confirm('Bạn có muốn xóa thật không?')" class="btn btn-danger" 
                    href="<?=BASE_URL?>/admin/suppliers/delete/<?=$item['supplier_id']?>">Xóa</a>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
        <thead>
            <tr>
                <th>Mã</th>
                <th>TÊN</th>
                <th>HÌNH ẢNH</th>
                <th>NGÀY TẠO</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
    </table>
</div>

