<div class="container">
    <h1>Cập nhật nhà cung cấp</h1>
    <?php  $session->flash();?>
    <form action="" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="supplier_name">Tên nhà cung cấp</label>
            <input type="text" name="supplier_name" value="<?=$data['suppliers']['supplier_name']?>" class="form-control" placeholder="Enter name" id="supplier_name">
            <p style="color:red;">
            <?php echo $data['err']["supplier_name"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="image">Ảnh</label>
            <input type="file" class="form-control" name="image" id="image">
            <input type="hidden" value="<?=$data['suppliers']['supplier_image']?>" class="form-control" name="supplier_image"  id="supplier_image">
            <div style="width: 200px;max-height: 100px; margin-top: 10px;">
                <img style="max-width: 100%; max-height: 100%;" src="<?=IMGAE_DISPLAY?>/backend/image/suppliers/<?=$data['suppliers']['supplier_image']?>" alt="">
            </div>
            <p style="color:red;">
            <?php echo $data['err']["supplier_image"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <input type="hidden" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
        </div>
        <div class="form-group pt-4">
            <label for="supplier_desc">Giới thiệu</label>
            <textarea name="supplier_desc" class="form-control" cols="30" rows="10"><?=$data['suppliers']['supplier_desc']?></textarea>
            <p style="color:red;">
            <?php echo $data['err']["supplier_desc"] ?? ''; ?>
            </p>
        </div>
        <button type="submit" name="supp_update" class="btn btn-primary">Cập nhật danh mục</button>
    </form>
</div>