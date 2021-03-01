<section>
        <div class="container login">
            <div class="cate" href="#">
                <div id="menu-icon" class="menu-icon">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="control-menu">
                    <i class="fas fa-bars"></i>
                    DANH MỤC
                </div>
                <nav id="list" class="list">
                    <ul>
                    <?php foreach($data['categories'] as $item):?>
                        <li>
                        
                            <a href="<?= BASE_URL?>/product_type_sale/index/<?= $item['cate_id']?>/1"><?=$item['cate_name']?></a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </nav>
                <!-- <a class="login-user" href=""></a> -->

                <i id="fa-user" class="fas fa-user"></i>

                <div id="acount" class="acount">
                    <ul>
                        <li><a href="<?=BASE_URL?>/login">Đăng nhập</a></li>
                        <li><a href="<?=BASE_URL?>/logout">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <nav class="bread">
                <li class="breadcrumb-item"><a href="<?= BASE_URL?>/home">Trang chủ</a></li>
                <i class="fas fa-caret-right cl-control"></i>
               