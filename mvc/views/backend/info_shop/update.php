<div class="container">
<?php  $session->flash();?>
    <h2>Cập nhật thông tin cửa hàng</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="info_name">Tên cửa hàng</label>
            <input type="text" value="<?=$data['info']['info_name']?>" name="info_name" class="form-control" placeholder="Enter info" id="info_name">
            <p style="color:red;">
            <?php echo $err['info_name'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" value="<?=$data['info']['info_email']?>" name="info_email" class="form-control" placeholder="Enter email" id="email">
            <p style="color:red;">
            <?php echo $err['info_email'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="info_adress">Địa chỉ cửa hàng</label>
            <input type="text" value="<?=$data['info']['info_adress']?>" name="info_adress" class="form-control" placeholder="Enter address" id="info_adress">
            <p style="color:red;">
            <?php echo $err['info_adress'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="info_phone">Số điện thoại</label>
            <input type="phone" value="<?=$data['info']['info_phone']?>" name="info_phone" class="form-control" placeholder="Enter phone-number" id="info_adress">
            <p style="color:red;">
            <?php echo $err['info_phone'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="info_detail">Thông tin chi tiết</label>
            <!-- <textarea id="detail2" name="info_detail"  cols="30" rows="50"><?=$data['info']['info_detail']?></textarea> -->
            <textarea class="form-control" id="detail2" name="info_detail" id="info_detail" cols="30" rows="50"><?=$data['info']['info_detail']?></textarea>
        
        </div>
        
        <button type="submit" name="info_update" class="btn btn-primary">Submit</button>
    </form>
    
</div>