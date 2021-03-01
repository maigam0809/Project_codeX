
<div class="container mr-4 ml-4 col-12">
    <h1>Sửa sản phẩm</h1>
    <?php 
    $session->flash();?>
    <form class="row pr-4" action="" enctype="multipart/form-data" method="post">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên nhà cung cấp</label>
                <select name="supplier_id" class="form-control">
                    <?php
                            foreach ($suppliers as $item) {
                                if($item['supplier_id'] == $products['supplier_id']){
                                    echo '<option selected value="'.$item['supplier_id'].'">'.$item['supplier_name'].'</option>';
                                }
                                else{
                                    echo '<option value="'.$item['supplier_id'].'">'.$item['supplier_name'].'</option>';
                                }
                            }
                        ?>
                </select>
            </div>

            <div class="form-group">
                <label for="product_name">Tên sản phẩm</label>
                <input value="<?=$data['products']['product_name']?>" type="text" name="product_name" class="form-control" placeholder="Enter name" id="product_name">
                <p style="color:red;">
                <?php echo $data['err']['product_name'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="product_intro" title="Product Intro">Giới thiệu</label>
                <input value="<?=$data['products']['product_intro']?>" type="text" name="product_intro" class="form-control" placeholder="Enter name" id="product_intro">
                <p style="color:red;">
                <?php echo $data['err']['product_intro'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="product_price" title="Product Intro">Giá</label>
                <input value="<?=$data['products']['product_price']?>" type="number" name="product_price" class="form-control" placeholder="Enter name" id="product_price">
                <p style="color:red;">
                <?php echo $data['err']['product_price'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="product_created_at" title="product_created_at">Created_at</label>
                <input value="<?=$data['products']['product_created_at']?>" type="date" name="product_created_at" class="form-control" placeholder="Enter name" id="product_created_at">
            
            </div>
            <div class="form-group">
                <label for="product_created_by" title="Product view">Created_by</label>
                <input value="<?=$data['products']['product_created_by']?>" type="date" name="product_created_by" class="form-control" placeholder="Enter name" id="product_created_by">
                <p style="color:red;">
                <?php echo $data['err']['product_created_by'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="product_description" title="Product description">Mô tả</label>
                <textarea name="product_description" id="" class="form-control" cols="30" rows="5">
                    <?=$data['products']['product_description']?>
                </textarea>
                <p style="color:red;">
                <?php echo $data['err']['product_description'] ?? ''; ?>
                </p>
            </div>
           
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="">Tên loại</label>
                <select name="cate_id" class="form-control">
                    <?php
                            foreach ($categories as $item) {
                                if($item['cate_id'] == $products['cate_id']){
                                    echo '<option selected value="'.$item['cate_id'].'">'.$item['cate_name'].'</option>';
                                }
                                else{
                                    echo '<option value="'.$item['cate_id'].'">'.$item['cate_name'].'</option>';
                                }
                            }
                        ?>
                </select>
            </div>
        
            <div class="form-group">
                <label for="image">Ảnh</label>
                <input type="file" class="form-control" name="image" id="image">
                <input type="hidden" value="<?=$data['products']['product_image']?>" class="form-control" name="product_image"  id="product_image">
                <div style="margin: 20px 0px; ">
                    <img src="<?=IMGAE_DISPLAY?>/backend/image/products/<?=$data['products']['product_image']?>" alt="" style="width:150px">
                </div>
                <p style="color:red;">
                <?php echo $data['err']['image'] ?? ''; ?>
                </p>
            </div>

            <div class="form-group">
                <label for="product_view" title="Product view">View</label>
                <input value="<?=$data['products']['product_view']?>" type="number" name="product_view" class="form-control" placeholder="Enter name" id="product_view">
                <p style="color:red;">
                <?php echo $data['err']['product_view'] ?? ''; ?>
                </p>
            </div>

            <div class="form-group">
                <label for="product_sale" title="Product view">Sale</label>
                <input value="<?=$data['products']['product_sale']?>" type="number" name="product_sale" class="form-control" placeholder="Enter name" id="product_sale">
                <p style="color:red;">
                <?php echo $data['err']['product_sale'] ?? ''; ?>
                </p>
            </div>
            <div class="form-group">
                <label for="product_status" title="Product status">Status</label>
                <input value="<?=$data['products']['product_status']?>" type="number" name="product_status" class="form-control" placeholder="Enter name" id="product_status">
                <p style="color:red;">
                <?php echo $data['err']['product_status'] ?? ''; ?>
                </p>
            </div>
           
        </div>

        <button type="submit" name="product_update" class="btn btn-primary">Cập nhật sản phẩm</button>
    </form>
</div>