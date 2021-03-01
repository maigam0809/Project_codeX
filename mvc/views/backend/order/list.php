
<div class="container">
    <h2>Danh sách đơn hàng</h2>
    <?php $session->flash();?> 
    <table class="table"id="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>TÊN KH</th>
                <th>ĐỊA CHỈ GIAO HÀNG</th>
                <th>NGÀY ĐẶT</th>
                <!-- <th>NGÀY GIAO HÀNG</th> -->
                <th>TRẠNG THÁI</th>
                <th>CHI TIẾT</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['order'] as $item):?>
            <tr>
            
                <td><?=$item['order_id']?></td>
                <td><?=$item['user_name']?></td>
                <td><?=$item['order_address']?></td>
                <td><?=$item['order_date']?></td>
                <td><?= $item['order_status'] ? 'Đã thanh toán' : 'Chưa thanh toán' ?></td>
                <td> <a class="btn btn-success" href="<?=BASE_URL?>/admin/order/details/<?=$item['order_id']?>">Chi tiết</a></td>              
                <td>
                    <a class="btn btn-warning" href="<?=BASE_URL?>/admin/order/update/<?=$item['order_id']?>">Cập nhật</a>

                    <a class="btn btn-danger"  onclick="return confirm('Ban có muốn xóa hay không ?')"  href="<?=BASE_URL?>/admin/order/delete/<?=$item['order_id']?>">Xóa</a>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
</div>

