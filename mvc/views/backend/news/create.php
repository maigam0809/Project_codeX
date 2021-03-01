<div class="container">
<?php  $session->flash();?>
    <h1>Thêm tin tức</h1>
    <form style="margin-bottom: 20px;" action="" enctype="multipart/form-data" method="post">
    <div class="form-group">
            <label for="created_at">Tiêu đề</label>
            <input type="text" class="form-control" name="new_name" value="<?php echo $_POST['new_name'] ?? '';?>">
            <p style="color:red;">
            <?php echo $err['new_name'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="new_image">Ảnh</label>
            <input type="file" class="form-control" name="new_image" id="new_image" >
            <p style="color:red;">
            <?php echo $err['new_image'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="created_at">Mô tả</label>
            <textarea class="form-control" name="new_description" id="new_description"  cols="30" rows="5"><?php echo $_POST['new_description'] ?? '';?></textarea>
            <p style="color:red;">
            <?php echo $err['new_description'] ?? ''; ?>
            </p>
        </div>
        <input type="hidden" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
        <div class="form-group">
            <label for="new_detail">Chi tiết</label>
            <textarea class="form-control" name="new_detail" id="detail2"  cols="30" rows="15"><?php echo $_POST['new_detail'] ?? '';?></textarea>
            <p style="color:red;">
            <?php echo $err['new_detail'] ?? ''; ?>
            </p>
        </div>
        <button type="submit" name="news" class="btn btn-primary" id="count">Thêm mới</button>
    </form>
</div>
<script>



