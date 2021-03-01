
<li class="breadcrumb-item active cl-control" aria-current="page">Thông tin khách hàng</li>
</nav>
</div>
</section>
<div class="container-fluild address-detail">
    <div class="container">
        <h4> THÔNG TIN KHÁCH HÀNG</h4>
        <?php  $session = new Session();  $session->flash();?> 
        <p>Vui lòng nhập thông tin</p>
        <form action="" method="post">
            <table>
                <tr>
                    <th>Họ tên</th>
                    <td>
                        <input name="customer_name" class="form-control" type="text" placeholder="Nhập họ tên" required>
                    </td>
                </tr>
                <tr>
                    <th>Điện thoại di động</th>
                    <td>
                        <input name="customer_phone" class="form-control" type="text" placeholder="Nhập số điện thoại" required>
                    </td>
                </tr>
                <tr>
                    <th>Tỉnh/thành phố</th>
                    <td>
                        <!-- <select class="form-control" name="" id="">
                            <option value="">Chọn tỉnh/thành phố</option>
                        </select> -->
                        <input name="city" class="form-control" type="text" placeholder="Nhập tỉnh/thành phố">
                    </td>
                </tr>
                <tr>
                    <th> Quận/huyện</th>
                    <td>
                        <!-- <select name="" class="form-control" id="">
                            <option value="">Chọn quận/huyện</option>
                        </select> -->
                        <input name="distric" class="form-control" type="text" placeholder="Nhập quận/huyện">
                    </td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <?php
                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                    ?>
                    <td>
                        <input name="order_date" type="hidden" value="<?= date("Y-m-d h:i:sa")?>">
                        <textarea class="form-control" name="address" id="" cols="30" rows="5" required
                            placeholder="Nhập địa chỉ"></textarea>
                    </td>
                </tr>
            </table>
            <div class="control-center">
                <a class="btn btn-warning" href="<?=BASE_URL?>/cart">Quay lại</a>
                <button name="btn_info" type="submit" class="btn btn-success">Giao đến địa chỉ này</button>
            </div>
        </form>
    </div>
</div>