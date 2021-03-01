
<li class="breadcrumb-item active cl-control" aria-current="page">Giỏ hàng</li>
</nav>
</div>
</section>
<div class="container-fluild cart-detail">
    <div class="container">
        <h4>Lịch sử mua hàng</h4> <br>
        <?php if (!empty($data['message'])) {?>
    <div class="alert-danger alert">
                <li><?php
                echo $data['message'];
                    ?></li>

                        </div><br>
                    <?php }?>
        <table>
            <tr>
                <th>Mã</th>
                <th>Ngày đặt</th>
                <th> Trạng thái</th>
                <th>Chi tiết</th>
            </tr>
            <?php foreach($data['orders'] as $item):?>
            <tr>
                <td><?=$item['order_id']?></td>
                <td><?=$item['order_date']?></td>
                <td><?= $item['order_status'] ? 'Đã nhận hàng' : 'Đang giao' ?></td>
                <td>
                    <a class="btn btn-success" href="<?=BASE_URL?>/order_detail/index/<?=$item['order_id']?>">Chi tiết</a>
                </td>
            </tr>

            <?php endforeach;?>

            <tr>
                <th>Mã</th>
                <th>Ngày đặt</th>
                <th> Trạng thái</th>
                <th>Chi tiết</th>
            </tr>
        </table>
    </div>

</div>