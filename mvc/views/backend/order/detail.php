<?php

$a = $data['order'];
$tong=0;
?>
<div class="container">
    <h2>Thông tin đơn hàng:</h2>
    <div class="add-cate pt-2 pb-4">
        <a class="btn btn-info" href="<?= BASE_URL ?>/admin/order/index">QUAY LẠI</a>
    </div>
    <table class="table" id="dataTable">
    <tfoot>    
        
            <?php foreach($data['order'] as $item):?>       
            <tr>
                <th class="a">TÊN SẢN PHẨM:</th>
                <th><?= $item['product_name'] ?></th>
                <th class="a">SỐ LƯỢNG SẢN PHẨM :</th>
                <th><?= $item['order_quantity'] ?></th>
                <th class="a">GIẢM GIÁ :</th>
                <th><?= $item['order_discount'] ?>%</th>
            </tr>
            <?php
            $c=(integer)$item['order_quantity'];
            $tong+=$c;
            ?>
            <?php endforeach ;?>
            </tfoot>

        <thead>
            <tr>
                <th class="a">ID :</th>
                <th><?= $a[0]['order_detail_id'] ?></th>
            </tr>
            <tr>
                <th class="a">MÃ ĐƠN HÀNG :</th>
                <th><?= $a[0]['order_id'] ?></th>
            </tr> 
            <tr>
                <th class="a">TỔNG SẢN PHẨM :</th>
                <th><?php echo$tong; ?></th>
            </tr>
           
        </thead>
    </table>
</div>
<style>
    .a{
        color: black;
    }
</style>