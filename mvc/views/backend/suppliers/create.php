<div class="container">
    <h1>Thêm nhà cung cấp</h1>
    <?php  $session->flash();?>
    <form action="" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="supplier_name">Tên nhà cung cấp</label>
            <input type="text" name="supplier_name" class="form-control" placeholder="Enter name" id="supplier_name" value="<?php echo $_POST['supplier_name'] ?? '' ?>">
            <p style="color:red;">
            <?php echo $data['err']["supplier_name"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="supplier_image">Ảnh</label>
            <input type="file" class="form-control" name="supplier_image" id="supplier_image">
            <p style="color:red;">
            <?php echo $data['err']["supplier_image"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <input type="hidden" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
            
        </div>
        <div class="form-group">
            <label for="created_at">Giới thiệu</label>
            <textarea name="supplier_desc" id="" class="form-control" cols="30" rows="10"><?php echo $_POST['supplier_desc'] ?? '' ?>"</textarea>
            <p style="color:red;">
            <?php echo $data['err']["supplier_desc"] ?? ''; ?>
            </p>
        </div>
        
        <button type="submit" name="insert_supp" class="btn btn-primary">Thêm danh mục</button>
    </form>
</div>
