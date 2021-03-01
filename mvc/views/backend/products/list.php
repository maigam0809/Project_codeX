<div class="container">
    <h2>Danh sách sản phẩm</h2>
    <?php
    $session->flash();
    ?> 

    <div class="add-cate pt-2 pb-4">
        <a class="btn btn-info" href="<?=BASE_URL?>/admin/products/create">Thêm sản phẩm</a>
    </div>
    
    <table class="table text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Loại</th>
                <th>Tên sản phẩm</th>              
                <th>Hình ảnh</th>
                <th>Ngày tạo</th>
                <th>Chi tiết</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['products'] as $item):?>
            <tr>
                <td><?=$item['product_id']?></td>
                <td value="<?=$item['cate_id']?>"><?=$item['cate_name']?></td>
                <td><?=$item['product_name']?></td>
                
                <td style="width: 200px; height: 150px; margin: 0 20px;">
                <img style="max-width: 100%; max-height: 100%;" src="<?=BASE_URL?>/public/backend/image/products/<?=$item['product_image']?>" alt="">
                </td>
                <td><?=$item['product_created_at']?></td>
                <td>
                    <a class="btn btn-success" href="<?= BASE_URL?>/admin/products/detail/<?=$item['product_id']?>">Chi tiết</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="<?=BASE_URL?>/admin/products/update/<?=$item['product_id']?>">Sửa</a>
                    <a onclick="return confirm('Bạn có muốn xóa thật không?')" class="btn btn-danger" href="<?=BASE_URL?>/admin/products/delete/<?=$item['product_id']?>">Xóa</a>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
    <div class="text-right mr-4 mt-0">
    <?php if ($_SESSION['so_luong_page'] > 1) { ?>
        <?php for ($i = 1; $i <= $_SESSION['so_luong_page']; $i++) { ?>
            <a style="width: 50px;" class="btn btn-outline-info mr-1" href="<?= BASE_URL ?>/admin/products/index/<?= $i?>"><?= $i ?></a>
    <?php 
            }
        } 
    ?>
    </div>
    
</div>


