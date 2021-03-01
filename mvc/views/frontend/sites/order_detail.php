<?php

$a = $data['order'];
//     echo"<pre>";
//     $b=(integer)$a[0]['order_quantity'];
// var_dump($b);

//     echo"<pre>";
    $tong=0;
    $sum = 0;
?>
<li class="breadcrumb-item active cl-control" aria-current="page">Đăng nhập tài khoản</li>
</nav>
</div>
</section>
<div class="container">
    <br>
    <h2>Thông tin đơn hàng:</h2> <br>
    <div class="add-cate pt-2 pb-4">
        <a class="btn btn-info" href="<?= BASE_URL ?>/history/">QUAY LẠI</a>
    </div>
    <br>
    <table class="table" id="dataTable">
    
        <tfoot>
            <tr>
                <th class="a">TÊN SẢN PHẨM:</th>
                <th class="a">SỐ LƯỢNG SẢN PHẨM :</th>
                <th class="a">Giá</th>
                <th class="a">GIẢM GIÁ :</th>

            </tr>
            <?php foreach($data['order'] as $item):?>

            <tr>
                <td><?= $item['product_name'] ?></td>
                <td><?= $item['order_quantity'] ?></td>
                <td><?= number_format($item['price']) ?> VND</td>
                <td><?= $item['order_discount'] ?> %</td>
            </tr>
            
            <?php
            $c=(integer)$item['order_quantity'];
            $tong+=$c;
            $sum+=$item['order_quantity']*$item['product_price']*(100-$item['order_discount'])/100;
            ?>
            <?php endforeach ;?>
            <tr>
                <th colspan="4" >Tổng tiền phải trả: <i> <?= number_format($sum)?> VND </i></th>
            </tr>
        </tfoot>
  
        <thead>
            <tr>
                <th class="a">ID :</th>
                <th ><?= $a[0]['order_detail_id'] ?></th>
            </tr>
            <tr>
                <th class="a">MÃ ĐƠN HÀNG :</th>
                <th ><?= $a[0]['order_id'] ?></th>
            </tr>
            <tr>
                <th class="a">TỔNG SẢN PHẨM :</th>
                <th ><?php echo$tong; ?></th>
            </tr>

        </thead>
    </table>
</div>
<style>
.a {
    color: black;
}
</style>