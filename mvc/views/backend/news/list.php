<div class="container">
<?php  $session->flash();?>
    <h2>Danh sách tin tức</h2>
    <div class="add-cate pt-2 pb-4">
        <a class="btn btn-info" href="<?=BASE_URL?>/admin/news/create">Thêm mới</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Mã</th>
                <th>TIÊU ĐỀ</th>
                <th>ẢNH</th>
                <th>NGÀY TẠO</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody>
        
            <?php foreach($data['news'] as $item):?>
            <tr>
                <td><?=$item['new_id']?></td>
                <td style="width: 400px;"><?=$item['new_name']?></td>
                <td style="width: 170px; height: 150px; margin:0px 10px;">
                <img style="max-width: 100%; max-height: 100%;" src="<?=BASE_URL?>/public/backend/image/new/<?=$item['new_image']?>" alt="" >
                </td>
                <td><?=$item['created_at']?></td>
                <td>
                    <a class="btn btn-warning" href="<?=BASE_URL?>/admin/news/update/<?=$item['new_id']?>">Sửa</a>
                    <a onclick="return confirm('Bạn có muốn xóa thật không?')" class="btn btn-danger"
                        href="<?=BASE_URL?>/admin/news/delete/<?=$item['new_id']?>">Xóa</a>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
        <thead>
            <tr>
            <th>Mã</th>
                <th>TÊN TIN TỨC</th>
                <th>ẢNH</th>
                <th>NGÀY TẠO</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
    </table>
</div>