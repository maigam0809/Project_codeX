<div class="container">
    <?php $session->flash();?> 
    <h2>Danh sách loại hàng</h2>
    <div class="add-cate pt-2 pb-4">
        <a class="btn btn-info" href="<?=BASE_URL?>/admin/category/create">Thêm loại hàng</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Mã</th>
                <th>TÊN</th>
                <th>Ảnh</th>
                <th>NGÀY TẠO</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['categories'] as $item):?>
            <tr>
                <td><?=$item['cate_id']?></td>
                <td><?=$item['cate_name']?></td>
                <td style="width:200px;" class="m-4">
                <img src="<?=BASE_URL?>/public/backend/image/categories/<?=$item['cate_image']?>" alt="" style="max-width:100%; max-height: 100%;" >
                </td>
                <td><?=$item['created_at']?></td>
                <td>
                    <a class="btn btn-warning" href="<?=BASE_URL?>/admin/category/update/<?=$item['cate_id']?>">Sửa</a>
                    <a onclick="return confirm('Bạn có muốn xóa thật không?')" class="btn btn-danger" 
                    href="<?=BASE_URL?>/admin/category/delete/<?=$item['cate_id']?>">Xóa</a>
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


