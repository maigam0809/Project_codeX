<div class="container mr-4 ml-4 col-12">
    <h1>Thêm loại hàng</h1>
    <?php
    $session->flash();
    ?>
    <form class="row pr-4" action="" enctype="multipart/form-data" method="post">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên nhà cung cấp</label>
                <select name="supplier_id" class="form-control" id="cate_id">
                    <?php
                    foreach ($data['suppliers'] as $item) : ?>
                        <option value="<?= $item['supplier_id'] ?>"
                            <?php echo (isset($_POST['supplier_id']) && $_POST['supplier_id'] == $item['supplier_id']) ? 'selected' : ''; ?>>
                            <?= $item['supplier_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="product_name">Tên sản phẩm</label> 
                <input type="text" name="product_name" class="form-control" value="<?php echo $_POST['product_name'] ?? '';?> " placeholder="Enter name" id="product_name">
                <p style="color:red;">
                <?php echo $data['err']['product_name'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="product_intro" title="Product Intro">Xuất xứ</label>
                <input type="text" name="product_intro" value="<?php echo $_POST['product_intro'] ?? '';?>" class="form-control" placeholder="Enter name" id="product_intro">
                <p style="color:red;">
                <?php echo $data['err']['product_intro'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="product_price" title="Product Intro">Gía</label>
                <input type="number" name="product_price" value="<?php echo $_POST['product_price'] ?? '';?>" class="form-control" placeholder="Enter name" id="product_price">
                <p style="color:red;">
                <?php echo $data['err']['product_price'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="product_sale" title="Product view">Sale</label>
                <input type="number" name="product_sale" class="form-control" value="0" placeholder="Enter name" id="product_sale">
                <p style="color:red;">
                <?php echo $data['err']['product_sale'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="product_description" title="Product description">Mô tả</label>
                <p style="color:red;">
                <?php echo $data['err']['product_description'] ?? ''; ?>
                </p>
                <textarea name="product_description" id="info_detail" class="form-control" cols="30" rows="5"><?php echo $_POST['product_description'] ?? '';?></textarea>
            </div>
           
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="">Tên loại</label>
                <select name="cate_id" class="form-control" id="cate_id">
                    <?php
                    foreach ($data['categories'] as $item) : ?>
                        <option value="<?= $item['cate_id'] ?>"
                            <?php echo (isset($_POST['cate_id']) && $_POST['cate_id'] == $item['cate_id']) ? 'selected' : ''; ?>>
                            <?= $item['cate_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        
            <div class="form-group">
                <label for="product_image">Ảnh</label>
                <input type="file" class="form-control" name="product_image" id="product_image">
                <p style="color:red;">
                <?php echo $data['err']['product_image'] ?? ''; ?>
                </p>
            </div>

            <div class="form-group">
                <label for="product_created_at">Ngày tạo</label>
                <input type="date" name="product_created_at" class="form-control" value="<?=date("Y-m-d", time());?>" id="product_created_at">
            </div>
            <div class="form-group">
                <label for="product_created_by">Product Created by</label>
                <input type="date" name="product_created_by" class="form-control" value="<?=date("Y-m-d", time());?>" id="product_created_at">
            </div>

            <div class="form-group">
                <label for="product_view" title="Product view">View</label>
                <input type="number" name="product_view" class="form-control" value="0" placeholder="Enter name" id="product_view">
                <p style="color:red;">
                <?php echo $data['err']['product_view'] ?? ''; ?>
                </p>
            </div>
            
            <div class="form-group">
                <label for="product_status" title="Product view">Status</label>
                <input type="number" name="product_status" value="0" class="form-control" placeholder="Enter name" id="product_status">
            </div>

           
        </div>

        <button type="submit" name="insert_pro" class="btn btn-primary">Thêm danh mục</button>
    </form>
</div>