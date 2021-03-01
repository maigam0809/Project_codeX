<?php

$sum=0;

?>
<li class="breadcrumb-item active cl-control" aria-current="page">Giỏ hàng</li>
            </nav>
        </div>
    </section>
<div class="container-fluild cart-detail">
    <div class="container">
        <h4>GIỎ HÀNG CỦA BẠN</h4>
        <form action="<?=BASE_URL?>/cart/update" method="post">
            <table>
                <tr>
                    <th>Hành động</th>
                    <th>Sản phẩm</th>
                    <th> Giá</th>
                    <th> Số lượng</th>
                    <th> Giảm giá</th>
                    <th> Tổng</th>
                </tr>
               <?php   if(isset($_SESSION['cart'])){ ?>
                <?php foreach($_SESSION['cart'] as $item):?>

                <tr class="item">
                    <td>
                        <!-- <button class="btn btn-warning" type="submit" name="cart_delete">Xóa</button> -->
                        <a class="btn btn-warning" href="<?=BASE_URL?>/cart/delete/<?=$item['product']['product_id']?>">Xóa</a>
                    </td>
                    <td>
                        <img src="images/main-image/cua.jpg" alt="">
                        <span><?=$item['product']['product_name']?></span>
                    </td>
                    <td >
                        <?=number_format($item['product']['product_price'], 0)?>
                        <input id="price" type="hidden" value="<?=$item['product']['product_price']?>">
                    </td>
                    
                    <td>
                        <input type="hidden" name="cart_id" value="<?=$item['product']['product_id']?>">
                        <input class="cart_count" name="cart_count[<?=$item['product']['product_id']?>]" type="number" value="<?=$item['count']?>">
                    </td>
                    <td>
                    <?=$item['product']['product_sale']?>%
                    </td>
                    <td>
                        <span id="sum_item"><?=number_format($item['product']['product_price']*$item['count']*(100-$item['product']['product_sale'])/100, 0)?></span>
                    </td>
                </tr>
                    <?php
                        $sum +=$item['product']['product_price']*$item['count']*(100-$item['product']['product_sale'])/100;
                    ?>
                <?php  endforeach;?>
                <?php }?>
                <tr>
                    <td class="final" colspan="4">Tổng tiền: <?=number_format($sum)?> VND</td>
                    <input id="sum" type="hidden" name="sum" value="<?=$sum?>">
                </tr>

            </table>
            <div class="cart-btn">
                <button name="cart_update" type="submit" class="btn btn-warning">Cập nhật</button>
                <a class="btn btn-success" href="<?= BASE_URL?>/home">Tiếp tục mua hàng</a>
                <a class="btn btn-primary" href="<?= BASE_URL?>/order">Thanh toán</a>
            </div>
        </form>
    </div>

</div>