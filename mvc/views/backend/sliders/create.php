
<div class="container">
    <?php  $session->flash();?>
    <h1>Thêm sliders</h1>
    <form action="" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <label for="slider_name">Tên sliders</label>
            <input type="text" name="slider_name" class="form-control" value="<?php echo $_POST['slider_name'] ?? ''; ?>" placeholder="Enter name" id="supplier_name">
            <p style="color:red;">
            <?php echo $err['slider_name'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="slider_image">Ảnh</label>
            <input type="file" class="form-control" name="slider_image" id="slider_image">
            <p style="color:red;">
            <?php echo $err['slider_image'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="created_at">Ngày tạo</label>
            <input type="date" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
        </div>
        <button type="submit" name="insert_slide" class="btn btn-primary">Thêm silders</button>
    </form>
</div>