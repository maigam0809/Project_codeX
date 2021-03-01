
<div class="container">
    <?php  $session->flash();?>
    <h1>Thêm loại hàng</h1>
    <form action="" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="cate_name">Tên danh mục</label>
            <input type="text" name="cate_name" class="form-control" value="<?php echo $_POST['cate_name'] ?? ''; ?>" placeholder="Enter name" id="cate_name">
            <p style="color:red;">
            <?php echo $err['cate_name'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="cate_image">Ảnh</label>
            <input type="file" class="form-control" name="cate_image" id="cate_image">
            <p style="color:red;">
            <?php echo $err['cate_image'] ?? ''; ?>
            </p>
        </div>
        
        <div class="form-group">
            <label for="created_at">Tên danh mục</label>
            <input type="date" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
        </div>

        <button type="submit" name="cate" class="btn btn-primary">Thêm danh mục</button>
    </form>
</div>