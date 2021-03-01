<section class="content">
    <div class="container">
        <!-- start Sản phẩm bán chạy -->
        <?php   if (!empty($data['top10'])) :  ?>
            <div class="product">
                <div class="title_top_menu">
                    <span class="title-head">
                        <a href="#" class="dk" title="Sản phẩm bán chạy">Sản phẩm bán chạy</a>

                    </span>
                </div>
                <div class="product_wap owl-carousel ">

                    <?php foreach ($data['top10'] as $item) { 
                        // extract($item);
                        $toll_sale = 100 - $item['product_sale'];
                        $tich = $toll_sale * $item['product_price'];
                        $price_sale = ($tich / 100);
                        // $price_fomat = number_format($product_price);
                    ?>
                        <div class="card">
                            <div class="product_border">
                                <div class="product-box-h">
                                    <div class="border_in">
                                        <div class="icon_pro">
                                            <?php if ($item['product_sale'] > 0) : ?>
                                                <div class="price" style="background-color:green;margin-left: -12px;  padding: 5px 6px;">
                                                    <a data-toggle="modal" data-target="#myModal" class="xem_nhanh" href="">
                                                        - <?= $item['product_sale'] ?>%
                                                    </a>
                                                </div>
                                            <?php else : ?>
                                                <div class="price" style="background-color:#fff;margin-left: -12px;  padding: 5px 6px;">
                                                    <a data-toggle="modal" data-target="#myModal" href="">
                                                        no price
                                                    </a>
                                                </div>
                                            <?php endif ?>
                                            <div>
                                                <a class="like xem_nhanh hidden" href="#">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-thumbnail">
                                            <a class="image_link" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>">
                                                <img class="lazyload loaded" src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item['product_image'] ?>">
                                            </a>
                                            <div class="pro_action">
                                            <?php if ($item['product_status'] != "1") : ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="<?= $item['product_id'] ?>" value="1">
                                                    <button type="submit" name="btn_cart" class="btn btn-cart hidden ">Thêm vào giỏ hàng </button>
                                                </form>
                                                <?php else : ?>
                                                    <form >                                               
                                                    <a class="btn btn_cart">Hết hàng </a>
                                                </form>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a class="height_name" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>"><?= $item['product_name'] ?></a>
                                            </h3>
                                            <div class="product-hides">
                                                <div class="price-box clearfix">
                                                    <span class="price product-price"><?= $price_sale ?>₫/kg</span>
                                                    <span class="price product-price-old">
                                                   
                                                        <?php if ($item['product_sale'] > 0) : ?>
                                                        <del><?= $item['product_price'] ?>₫/kg</del>
                                                        <?php endif ?>
                                                        
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                    <!-- end product -->
                </div>

            </div>
        <?php endif ?>
        <!-- end Sản phẩm bán chạy -->


        <!-- start đồ khô -->
        <?php if (!empty($data['do_kho5'])) :  ?>

            <div class="product hidden-product">
                <div class="title_top_menu ">
                    <span class="title-head">
                        <a href="#" class="dk" title="Đồ khô">Đồ khô</a>
                    </span>
                </div>
                <div class="product_wap owl-carousel ">
                    <?php foreach ($data['do_kho5'] as $item) :
                        $toll_sale = 100 - $item['product_sale'];
                        $tich = $toll_sale * $item['product_price'];
                        $price_sale = ($tich / 100);
                    ?>
                        <div class="card">
                            <div class="product_border">
                                <div class="product-box-h">
                                    <div class="border_in">
                                        <div class="icon_pro">
                                            <?php if ($item['product_sale'] > 0) : ?>
                                                <div class="price" style="background-color:green;margin-left: -12px;  padding: 5px 6px;">
                                                    <a data-toggle="modal" data-target="#myModal" class="xem_nhanh" href="">
                                                        - <?= $item['product_sale'] ?>%
                                                    </a>
                                                </div>
                                            <?php else : ?>
                                                <div class="price" style="background-color:#fff;margin-left: -12px;  padding: 5px 6px;">
                                                    <a data-toggle="modal" data-target="#myModal" href="">
                                                        no price
                                                    </a>
                                                </div>
                                            <?php endif ?>
                                            <div>
                                                <a class="like xem_nhanh hidden" href="#">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-thumbnail">
                                            <a class="image_link" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>">
                                                <img class="lazyload loaded" src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item['product_image'] ?>">
                                            </a>
                                            <div class="pro_action">
                                            <?php if ($item['product_status'] != "1") : ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="<?= $item['product_id'] ?>" value="1">
                                                    <button type="submit" name="btn_cart" class="btn btn-cart hidden ">Thêm vào giỏ hàng </button>
                                                </form>
                                                <?php else : ?>
                                                    <form >                                               
                                                    <a class="btn btn_cart">Hết hàng </a>
                                                </form>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a class="height_name" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>"><?= $item['product_name'] ?></a>
                                            </h3>
                                            <div class="product-hides">
                                                <div class="price-box clearfix">
                                                    <span class="price product-price"><?= $price_sale ?>₫/kg</span>
                                                    <span class="price product-price-old">
                                                        <?php if ($item['product_sale'] > 0) : ?>
                                                        <del><?= $item['product_price'] ?>₫/kg</del>
                                                        <?php endif ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="product show-product">
                <div class="title_top_menu">
                    <span class="title-head">
                        <a href="<?= BASE_URL ?>/product_type_sale/index/4/1" class="dk" title="Đồ khô">Đồ khô</a>
                        <a href="<?= BASE_URL ?>/product_type_sale/index/4/1" class="xem-them" title="Xem thêm">Xem thêm <i class="fa fa-caret-right"></i></a>
                    </span>
                </div>
                <div class="pro_do_kho">
                    <?php $dem = 0;
                    foreach ($data['do_kho5'] as $item) :
                        $toll_sale = 100 - $item['product_sale'];
                        $tich = $toll_sale * $item['product_price'];
                        $price_sale = ($tich / 100);
                    ?>

                        <?php if ($dem < 5) { ?>

                            <div class="product_border">
                                <div class="product-box-h">
                                    <div class="border_in">
                                        <div class="icon_pro">
                                            <?php if ($item['product_sale'] > 0) : ?>
                                                <div class="price" style="background-color:green;margin-left: -12px;  padding: 5px 6px;">
                                                    <a data-toggle="modal" data-target="#myModal" class="xem_nhanh" href="">
                                                        - <?= $item['product_sale'] ?>%
                                                    </a>
                                                </div>
                                            <?php else : ?>
                                                <div class="price" style="background-color:#fff;margin-left: -12px;  padding: 5px 6px;">
                                                    <a data-toggle="modal" data-target="#myModal" href="">
                                                        no price
                                                    </a>
                                                </div>
                                            <?php endif ?>
                                            <div>
                                                <a class="like xem_nhanh hidden" href="#">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-thumbnail">
                                            <a class="image_link" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>">
                                                <img class="lazyload loaded" src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item['product_image'] ?>">
                                            </a>
                                            <div class="pro_action">
                                            <?php if ($item['product_status'] != "1") : ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="<?= $item['product_id'] ?>" value="1">
                                                    <button type="submit" name="btn_cart" class="btn btn-cart hidden ">Thêm vào giỏ hàng </button>
                                                </form>
                                                <?php else : ?>
                                                    <form >                                               
                                                    <a class="btn btn_cart">Hết hàng </a>
                                                </form>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a class="height_name" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>"><?= $item['product_name'] ?></a>
                                            </h3>
                                            <div class="product-hides">
                                                <div class="price-box clearfix">
                                                    <span class="price product-price"><?= $price_sale ?>₫/kg</span>
                                                    <span class="price product-price-old">
                                                        <?php if ($item['product_sale'] > 0) : ?>
                                                        <del><?= $item['product_price'] ?>₫/kg</del>
                                                        <?php endif ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $dem++;
                        } ?>
                    <?php endforeach; ?>
                </div>

            </div>
        <?php endif ?>
        <!-- end đồ khô -->

        <!-- start Rau quả -->
        <?php if (!empty($data['raucu'])) :  ?>
            <div class="product hidden-product">
                <div class="title_top_menu ">
                    <span class="title-head">
                        <a href="#" class="dk" title="Đồ khô">Rau củ</a>
                    </span>
                </div>
                <div class="product_wap owl-carousel ">
                    <?php foreach ($data['raucu'] as $item) :
                        $toll_sale = 100 - $item['product_sale'];
                        $tich = $toll_sale * $item['product_price'];
                        $price_sale = ($tich / 100);
                    ?>
                        <div class="card">
                            <div class="product_border">
                                <div class="product-box-h">
                                    <div class="border_in">
                                        <div class="icon_pro">
                                            <?php if ($item['product_sale'] > 0) : ?>
                                                <div class="price" style="background-color:green;margin-left: -12px;  padding: 5px 6px;">
                                                    <a data-toggle="modal" data-target="#myModal" class="xem_nhanh" href="">
                                                        - <?= $item['product_sale'] ?>%
                                                    </a>
                                                </div>
                                            <?php else : ?>
                                                <div class="price" style="background-color:#fff;margin-left: -12px;  padding: 5px 6px;">
                                                    <a data-toggle="modal" data-target="#myModal" href="">
                                                        no price
                                                    </a>
                                                </div>
                                            <?php endif ?>
                                            <div>
                                                <a class="like xem_nhanh hidden" href="#">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-thumbnail">
                                            <a class="image_link" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>">
                                                <img class="lazyload loaded" src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item['product_image'] ?>">
                                            </a>
                                            <div class="pro_action">
                                            <?php if ($item['product_status'] != "1") : ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="<?= $item['product_id'] ?>" value="1">
                                                    <button type="submit" name="btn_cart" class="btn btn-cart hidden ">Thêm vào giỏ hàng </button>
                                                </form>
                                                <?php else : ?>
                                                    <form >                                               
                                                    <a class="btn btn_cart">Hết hàng </a>
                                                </form>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a class="height_name" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>"><?= $item['product_name'] ?></a>
                                            </h3>
                                            <div class="product-hides">
                                                <div class="price-box clearfix">
                                                    <span class="price product-price"><?= $price_sale ?>₫/kg</span>
                                                    <span class="price product-price-old">
                                                        <?php if ($item['product_sale'] > 0) : ?>
                                                        <del><?= $item['product_price'] ?>₫/kg</del>
                                                        <?php endif ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="product show-product">
                <div class="title_top_menu">
                    <span class="title-head">
                        <a href="<?= BASE_URL ?>/product_type_sale/index/1/1" class="dk" title="Đồ khô">Rau quả</a>
                        <a href="<?= BASE_URL ?>/product_type_sale/index/1/1" class="xem-them" title="Xem thêm">Xem thêm <i class="fa fa-caret-right"></i></a>
                    </span>
                </div>
                <div class="pro_do_kho">
                    <?php $dem = 0;
                    foreach ($data['raucu'] as $item) :

                        $toll_sale = 100 - $item['product_sale'];
                        $tich = $toll_sale * $item['product_price'];
                        $price_sale = ($tich / 100);
                    ?>

                        <?php if ($dem < 5) { ?>

                            <div class="product_border">
                                <div class="product-box-h">
                                    <div class="border_in">
                                        <div class="icon_pro">
                                            <?php if ($item['product_sale'] > 0) : ?>
                                                <div class="price" style="background-color:green;margin-left: -12px;  padding: 5px 6px;">
                                                    <a data-toggle="modal" data-target="#myModal" class="xem_nhanh" href="">
                                                        - <?= $item['product_sale'] ?>%
                                                    </a>
                                                </div>
                                            <?php else : ?>
                                                <div class="price" style="background-color:#fff;margin-left: -12px;  padding: 5px 6px;">
                                                    <a data-toggle="modal" data-target="#myModal" href="">
                                                        no price
                                                    </a>
                                                </div>
                                            <?php endif ?>
                                            <div>
                                                <a class="like xem_nhanh hidden" href="#">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-thumbnail">
                                            <a class="image_link" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>">
                                                <img class="lazyload loaded" src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item['product_image'] ?>">
                                            </a>
                                            <div class="pro_action">
                                            <?php if ($item['product_status'] != "1") : ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="<?= $item['product_id'] ?>" value="1">
                                                    <button type="submit" name="btn_cart" class="btn btn-cart hidden ">Thêm vào giỏ hàng </button>
                                                </form>
                                                <?php else : ?>
                                                    <form >                                               
                                                    <a class="btn btn_cart">Hết hàng </a>
                                                </form>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a class="height_name" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>"><?= $item['product_name'] ?></a>
                                            </h3>
                                            <div class="product-hides">
                                                <div class="price-box clearfix">
                                                    <span class="price product-price"><?= $price_sale ?>₫/kg</span>
                                                    <span class="price product-price-old">
                                                        <?php if ($item['product_sale'] > 0) : ?>
                                                        <del><?= $item['product_price'] ?>₫/kg</del>
                                                        <?php endif ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $dem++;
                        } ?>
                    <?php endforeach; ?>
                </div>

            </div>

            <!-- end rau cu -->
        <?php endif ?>
    </div>


    <?php if (!empty($data['thit'])) :  ?>
        <div class="content-buttom show-product">
            <div class="img flex">
                <img src="<?= IMGAE_DISPLAY ?>/backend/image/sliders/<?= $data['slides'][7]['slider_image'] ?>" alt="">
                <img src="<?= IMGAE_DISPLAY ?>/backend/image/sliders/<?= $data['slides'][8]['slider_image'] ?>" alt="">
            </div>
            <div class="container content_product_relative">
                <div class="product">
                    <div class="title_top_menu">
                        <span class="title-head">
                            <a href="<?= BASE_URL ?>/product_type_sale/index/5/1" class="dk" title="Rau quả">Thịt đông lạnh</a>
                            <a href="<?= BASE_URL ?>/product_type_sale/index/5/1" class="xem-them" title="Xem thêm">Xem thêm <i class="fa fa-caret-right"></i></a>
                        </span>
                    </div>
                    <div class="pro_do_kho">
                        <?php $dem = 0;
                        foreach ($data['thit'] as $item) :

                            $toll_sale = 100 - $item['product_sale'];
                            $tich = $toll_sale * $item['product_price'];
                            $price_sale = ($tich / 100);
                        ?>

                            <?php if ($dem < 5) { ?>

                                <div class="product_border">
                                    <div class="product-box-h">
                                        <div class="border_in">
                                            <div class="icon_pro">
                                                <?php if ($item['product_sale'] > 0) : ?>
                                                    <div class="price" style="background-color:green;margin-left: -12px;  padding: 5px 6px;">
                                                        <a data-toggle="modal" data-target="#myModal" class="xem_nhanh" href="">
                                                            - <?= $item['product_sale'] ?>%
                                                        </a>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="price" style="background-color:#fff;margin-left: -12px;  padding: 5px 6px;">
                                                        <a data-toggle="modal" data-target="#myModal" href="">
                                                            no price
                                                        </a>
                                                    </div>
                                                <?php endif ?>
                                                <div>
                                                    <a class="like xem_nhanh hidden" href="#">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-thumbnail">
                                                <a class="image_link" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>">
                                                    <img class="lazyload loaded" src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item['product_image'] ?>">
                                                </a>
                                                <div class="pro_action">
                                                <?php if ($item['product_status'] != "1") : ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="<?= $item['product_id'] ?>" value="1">
                                                    <button type="submit" name="btn_cart" class="btn btn-cart hidden ">Thêm vào giỏ hàng </button>
                                                </form>
                                                <?php else : ?>
                                                    <form >                                               
                                                    <a class="btn btn_cart">Hết hàng </a>
                                                </form>
                                                <?php endif ?>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h3 class="product-name"><a class="height_name" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>"><?= $item['product_name'] ?></a>
                                                </h3>
                                                <div class="product-hides">
                                                    <div class="price-box clearfix">
                                                        <span class="price product-price"><?= $price_sale ?>₫/kg</span>
                                                        <span class="price product-price-old">
                                                            <?php if ($item['product_sale'] > 0) : ?>
                                                        <del><?= $item['product_price'] ?>₫/kg</del>
                                                        <?php endif ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $dem++;
                            } ?>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>



        </div>
        <div class="container">
            <div class="product hidden-product">
                <div class="title_top_menu ">
                    <span class="title-head">
                        <a href="#" class="dk" title="Đồ khô">Thịt đông lạnh</a>
                    </span>
                </div>
                <div class="product_wap owl-carousel ">
                    <?php foreach ($data['thit'] as $item) :
                        $toll_sale = 100 - $item['product_sale'];
                        $tich = $toll_sale * $item['product_price'];
                        $price_sale = ($tich / 100);
                    ?>
                        <div class="card">
                            <div class="product_border">
                                <div class="product-box-h">
                                    <div class="border_in">
                                        <div class="icon_pro">
                                            <?php if ($item['product_sale'] > 0) : ?>
                                                <div class="price" style="background-color:green;margin-left: -12px;  padding: 5px 6px;">
                                                    <a data-toggle="modal" data-target="#myModal" class="xem_nhanh" href="">
                                                        - <?= $item['product_sale'] ?>%
                                                    </a>
                                                </div>
                                            <?php else : ?>
                                                <div class="price" style="background-color:#fff;margin-left: -12px;  padding: 5px 6px;">
                                                    <a data-toggle="modal" data-target="#myModal" href="">
                                                        no price
                                                    </a>
                                                </div>
                                            <?php endif ?>
                                            <div>
                                                <a class="like xem_nhanh hidden" href="#">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-thumbnail">
                                            <a class="image_link" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>">
                                                <img class="lazyload loaded" src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $item['product_image'] ?>">
                                            </a>
                                            <div class="pro_action">
                                            <?php if ($item['product_status'] != "1") : ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="<?= $item['product_id'] ?>" value="1">
                                                    <button type="submit" name="btn_cart" class="btn btn-cart hidden ">Thêm vào giỏ hàng </button>
                                                </form>
                                                <?php else : ?>
                                                    <form >                                               
                                                    <a class="btn btn_cart">Hết hàng </a>
                                                </form>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-name"><a class="height_name" href="<?= BASE_URL ?>/product_detail/index/<?= $item['product_id'] ?>" title="<?= $item['product_name'] ?>"><?= $item['product_name'] ?></a>
                                            </h3>
                                            <div class="product-hides">
                                                <div class="price-box clearfix">
                                                    <span class="price product-price"><?= $price_sale ?>₫/kg</span>
                                                    <span class="price product-price-old">
                                                        <?php if ($item['product_sale'] > 0) : ?>
                                                        <del><?= $item['product_price'] ?>₫/kg</del>
                                                        <?php endif ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    <?php endif ?>
</section>