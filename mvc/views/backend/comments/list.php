<div class="container">
    <h2>Tổng hợp bình luận</h2>
    <h4 style="color:red">
        <?php
            if(isset($message)){
                echo $message;
            }
        ?>
    </h4>
    <table class="table">
        <thead>
            <tr>
                <th>Hàng hóa</th>
                <th>Số bình luận</th>
                <th>Cũ nhất</th>
                <th>Mới nhất</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['cmts'] as $item):?>
            <tr>
                <td><?=$item['product_name']?></td>
                <td><?=$item['so_luong']?></td>
                <td>
                    <?=$item['cu_nhat']?>
                </td>
                <td><?=$item['moi_nhat']?></td>
                <td>
                    <a class="btn btn-warning"
                        href="<?=BASE_URL?>/admin/comment/detail/<?=$item['product_id']?>">Chi tiết</a>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
        <thead>
            <tr>
                <th>Hàng hóa</th>
                <th>Số bình luận</th>
                <th>Mới nhất</th>
                <th>Cũ nhất</th>
            </tr>
        </thead>
    </table>
</div>