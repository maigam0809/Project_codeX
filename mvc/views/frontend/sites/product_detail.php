<li class="breadcrumb-item active cl-control" aria-current="page">Chi tiết sản phẩm</li>
</nav>
</div>
</section>

<div class="container-fluild product_detail">
    <div class="container info">
        <?php  $session = new Session();  $session->flash();?>
        <div class="row">
            <div class="image col-lg-5 col-md-6 col-sm-12">
                <img src="<?= IMGAE_DISPLAY ?>/backend/image/products/<?= $data['product']['product_image'] ?>" alt="">
            </div>
            <div class="info-product col-lg-5 col-md-6 col-sm-12">
                <p>
                <h4 style="font-weight:bold; margin-bottom: 10px;font-size: 20px">
                    <?= $data['product']['product_name'] ?>
                </h4>
                <span>Xuất xứ: <?= $data['product']['product_intro'] ?></span>
                </p>
                <p>
                    <?php
                    $sale = (int)$data['product']['product_sale'];
                    // $sale=(float)$data['product']['product_sale'];
                    $toll_sale = 100 - $sale;
                    $tich = $toll_sale * $data['product']['product_price'];
                    $price_sale = ($tich / 100);
                    ?>
                    <span style="color: #ff8e4a; font-size:24px; font-weight:bold"
                        class="price"><?= $price_sale ?>đ/kg</span>
                    <?php if ($data['product']['product_sale'] != "0") { ?>
                    <span style="color:#707070; font-size: 16px; font-weight:bold"
                        class="sale"><del><?= $data['product']['product_price'] ?>đ/kg</del></span>
                    <?php } ?>
                </p>
                <p>

                </p>
                <div class="count">
                    <p>Số lượng: </p>
                    <p class="btn-count">
                        <button id="btn_delete">-</button>
                        <span id="count">1</span>
                        <!-- <input id="count" type="hidden" value="1"> -->
                        <button id="btn_add">+</button>
                    </p>
                </div>
                <p class="cart">

                <form action="" method="post">
                    <input name="count" id="set_count" type="hidden" value="1">
                    <button
                        style="background-color: #ff8e4a;color: white;padding: 13px 20px 13px 20px;border-radius: 3px;outline: none;border: none;"
                        name="btn_cart" type="submit">Thêm vào giỏ hàng</button>
                </form>
                </p>
            </div>
            <div class="product-icon col-lg-2">
                <div class="icon">
                    <img src="<?= TOPUBLIC ?>/images/icon/serpro_1.png" alt="">
                    <p>Giao hàng miễn phí</p>
                </div>
                <div class="icon">
                    <img src="<?= TOPUBLIC ?>/images/icon/serpro_2.png" alt="">
                    <p>Tích điểm đổi quà</p>
                </div>
                <div class="icon">
                    <img src="<?= TOPUBLIC ?>/images/icon/serpro_3.png" alt="">
                    <p>100% an toàn thực phẩm</p>
                </div>
                <div class="icon">
                    <img src="<?= TOPUBLIC ?>/images/icon/serpro_4.png" alt="">
                    <p>Tư vấn 8/24</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container info pl-4">
        <h2 style="font-family:Arial;font-size: 2rem; font-weight:bold; margin: 10px 5px;">Mô tả </h2>
        <p style="font-size: 0.8rem;">
            <?= $data['product']['product_description'] ?>
        </p>
    </div>
    <div class="container info pl-3">

        <h2 class="mb-2 text-danger" style="font-family:Arial;font-size: 2rem; font-weight:bold; margin: 10px 5px;">Bình
            luận của bạn: </h2>
        <script>
        function post() {
            var customer_id = document.getElementById("customer_id").value;
            var product_id = document.getElementById("product_id").value;
            var comment = document.getElementById("comment").value;
            if (customer_id && product_id && comment) {
                $.ajax({

                        type: 'post',
                        url: 'http://localhost<?= BASE_URL?>/ajaxcomment/index',
                        data: {
                            customer_id: customer_id,
                            product_id: product_id,
                            comment: comment
                        }

                        ,
                        success: function(response) {
                            document.getElementById("all_comments").innerHTML = response + document
                                .getElementById("all_comments").innerHTML;
                            document.getElementById("comment").value = "";
                            document.getElementById("customer_id").value = "<?php $a = $_SESSION['user'];
                                                                                    if (isset($_SESSION['user'])) {
                                                                                        echo $a[0]["user_id"];
                                                                                    } else {
                                                                                        echo "";
                                                                                    }  ?>";
                            document.getElementById("product_id").value =
                                "<?= $data['product']['product_id'] ?>";

                        }
                    }

                );
            }
            return false;
        }
        </script>
        <form class="" method='post' action="" onsubmit="return post();" id="container">
            <input type="hidden" id="customer_id" value="<?php
                                                                if (isset($_SESSION['user'])) {
                                                                    $a = $_SESSION['user'];
                                                                    echo $a[0]["user_id"];
                                                                } else {
                                                                    echo "";
                                                                }  ?>" name="name" disabled>
            <input type="hidden" id="product_id" value="<?= $data['product']['product_id'] ?>" disabled>
            <textarea class="form-control" name="" id="comment" cols="100" rows="5"
                <?php if (!isset($_SESSION['user'])) {
                                                                        echo "disabled";
                                                                    } ?>><?php if (!isset($_SESSION['user'])) {
                                                                                                                                echo "YÊU CẦU ĐĂNG NHẬP TRƯỚC KHI BÌNH LUẬN!";
                                                                                                                            } ?></textarea> <br>


            <button <?php if (!isset($_SESSION['user'])) {
                            echo "disabled";
                        } ?> type="submit" value="Post Comment" id="submit"
                style="background-color: #ff8e4a;color: white;padding: 10px 20px 10px 20px;border-radius: 3px;outline: none;border: none;">Bình
                luận</button>
        </form>
        <h5 class="font-weight-bold text-success">Bình luận mới nhất</h5>
        <div class="comments-list col-xl-6 col-md-6" style="margin-top: 20px; " id ="all_comments">
                <?php foreach ($data["comment"] as $item) : ?>
                <div class="media mb-4 pl-1 col-10" style="border-bottom: 0.2px solid #DDDDDD;">

                    <a class="media-left mr-3 " href="#">
                        <img src="https://ui-avatars.com/api/?name=<?= $item['user_name'] ?>">
                    </a>
                    <div class="media-body">

                        <h6 class="media-heading user_name font-weight-bold"><?=$item['user_name']?></h6>
                        <p class="font-size-2" style="font-size: 14px;"><?=$item['content']?></p>
                    </div>

                    <p class="pull-right">
                        <small><?=$item['created_at']?></small>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
    </div>
</div>
<style>
#container {
    margin-bottom: 30px;
    width: 38%;
}

#comment {
    width: 100%;
    height: 100px;
    border: 1px solid silver;
    border-radius: 5px;
    font-size: 17px;
    padding: 10px;
    font-family: helvetica;
}

.comment_div {
    margin-bottom: 15px;
    width: 500px;
    border: 1px solid black;
    background: #F3F3F3;
}

.name {
    height: 30px;
    line-height: 30px;
    padding: 8px;
    background: #fff;
    color: #777;
    text-align: left;
}

.comments {
    padding: 0px 0px 24px 0px;
    font-size: 20px;
    padding: 8px;
}
</style>