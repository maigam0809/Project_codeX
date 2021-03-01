<div class="container">
    <h1> Cập nhật đơn hàng</h1>
    <?php  $session->flash();?>

    <?php

    $a = $data['order'];
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    
    ?>
    <?php date_default_timezone_set("Asia/Ho_Chi_Minh"); ?>
    <form action="" method="post">
    <input  name="order_id" type="hidden" value="<?= $a[0]['order_id'] ?>">
    <div class="form-group">
            <label for="order_address">Địa chỉ giao hàng</label>
            <input type="text" class="form-control" name="order_address" id="require_date" value="<?= $a[0]['order_address'] ?>">
            <p style="color:red;">
            <?php echo $data['err']["order_address"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="require_date">Ngày giao hàng</label>
            <input type="date" class="form-control" name="require_date" id="require_date" value="<?=date("Y-m-d", time());?>">
            <p style="color:red;">
            <?php echo $data['err']["require_date"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="order_status">Trạng thái</label> <br>
            <span>Chưa thanh toán: </span><input type="radio" id="order_status" name="order_status" value="0" <?php if ($a[0]['order_status'] == 0) {
                                                                                                echo "checked";
                                                                                            } ?>>
            <span>Đã thanh toán: </span><input type="radio" id="order_status" name="order_status" value="1" <?php if ($a[0]['order_status'] == 1) {
                                                                                            echo "checked";
                                                                                        } ?>>
        </div>
        <button type="submit" name="btn-order" class="btn btn-primary">Cập nhật</button>
        <a class="btn btn-info" href="<?=BASE_URL?>/admin/order/index">Quay lại</a>
    </form>
</div>