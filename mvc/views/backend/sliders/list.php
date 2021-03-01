<div class="container">
    <?php  $session->flash();?>
    <h2>Danh sách SLiders</h2>
    <div class="add-cate pt-2 pb-4">
        <a class="btn btn-info" href="<?=BASE_URL?>/admin/sliders/create">Thêm ảnh</a>
    </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['sliders'] as $item):?>
            <tr>
                <td><?=$item['slider_id']?></td>
                <td><?=$item['slider_name']?></td>
                <td class="text-center" style="width: 300px; margin: 20px;">
                <img src="<?=BASE_URL?>/public/backend/image/sliders/<?=$item['slider_image']?>" alt="" style="max-width:100%;max-height: 85px;" >
                </td>
                <td><?=$item['created_at']?></td>
                <td>
                    <a class="btn btn-warning" href="<?=BASE_URL?>/admin/sliders/update/<?=$item['slider_id']?>">Sửa</a>
                    <a onclick="return confirm('Bạn có muốn xóa thật không?')" class="btn btn-danger" 
                    href="<?=BASE_URL?>/admin/sliders/delete/<?=$item['slider_id']?>">Xóa</a>
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

