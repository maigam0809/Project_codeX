<div class="container">
<?php  $session->flash();?>
    <h1>Cập nhật tin tức</h1>
    <form style="margin-bottom: 20px;" action="" enctype="multipart/form-data" method="post">
    <div class="form-group">
            <label for="created_at">Tiêu đề</label>
            <input type="text" class="form-control" name="new_name" value=" <?=isset($data['news']['new_name'])?$data['news']['new_name']:''?>">
            <p style="color:red;">
            <?php echo $err['new_name'] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="image">Ảnh</label>
            <input class="form-control" type="file" class="" name="image" id="image">
            <input type="hidden" value="<?=$data['news']['new_image']?>" class="" name="new_image"  id="new_image">
            <div style="width: 200px;max-height: 150px; margin-top: 10px;">
                <img style="max-width: 100%; max-height: 200px;" src="<?= BASE_URL?>/public/backend/image/new/<?=$data['news']['new_image']?>" alt="" >
            </div>
            <p style="color:red;">
                <?php echo $err['new_image'] ?? ''; ?>
            </p>
        
        </div>

        <div class="form-group">
            <input type="hidden" name="created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="created_at">
        </div>
        <div class="form-group pt-2">
            <label for="new_detail">Mô tả</label>
            <textarea class="form-control" name="new_description" id="new_description" cols="30" rows="5">
                <?=isset($data['news']['new_description'])?$data['news']['new_description']:''?>
            </textarea>
            <p style="color:red;">
            <?php echo $data['err']["new_description"] ?? ''; ?>
            </p>
        </div>
        <div class="form-group">
            <label for="new_detail">Chi tiết</label>
            <textarea class="form-control" name="new_detail" id="detail2" cols="30" rows="50">
                <?=isset($data['news']['new_detail'])?$data['news']['new_detail']:''?>
            </textarea>
            <p style="color:red;">
            <?php echo $data['err']["new_detail"] ?? ''; ?>
            </p>
        </div>
        <button type="submit" name="news_update" class="btn btn-primary ">Cập nhật</button>
    </form>
</div>
