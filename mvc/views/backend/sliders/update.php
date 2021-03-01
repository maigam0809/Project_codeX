
<div class="container">
    <?php  $session->flash();?>
    <h1>Cập nhật sliders</h1>
    <form action="" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="">Tên silders</label>
            <input type="text" name="slider_name" value="<?=$data['sliders']['slider_name']?>" class="form-control" placeholder="Enter name" id="slider_name">
            <p style="color:red;">
            <?php echo $err['slider_name'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="image">Ảnh</label>
            <input type="file" class="form-control" name="image" id="image">
            <input type="hidden" value="<?=$data['sliders']['slider_image']?>" class="form-control" name="slider_image"  id="slider_image">
            
            <div class="m-3" style="width: 200px;max-height: 150px;">
                <img style="max-width: 100%; max-height: 150px;" src="<?=IMGAE_DISPLAY?>/backend/image/sliders/<?=$data['sliders']['slider_image']?>" alt="">
            </div>
            <p style="color:red;">
                <?php echo $err['slider_image'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="created_at">Ngày tạo</label>
            <input type="date" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
        </div>
        <button type="submit" name="slide_update" class="btn btn-primary">Cập nhật danh mục</button>
    </form>
</div>