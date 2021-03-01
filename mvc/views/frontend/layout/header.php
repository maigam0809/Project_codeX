<?php

$a="";
// session_destroy();
if(isset($_SESSION['user'])){
    $a=$_SESSION['user'];
}


if (isset($_SESSION['user']) && ($a[0]['role']) == 0) {
    

    if (!empty($a[0]['user_image'])) {
       $avatar= "<a href='".BASE_URL."/info_user/index/".$_SESSION['user'][0]['user_id']."'><img src='".IMGAE_DISPLAY."/backend/image/user/".$a[0]['user_image']." ' style='width:50px; height: 50px;border-radius: 90%;margin-right: 7px;'></a>";
    }
    else{
        $avatar="<a href='".BASE_URL."/info_user/index/".$_SESSION['user'][0]['user_id']."'><i class='fas fa-user'></i></a>"; 
    } 
    $text="<a href='".BASE_URL."/logout'>Đăng xuất</a>";
}
elseif(isset($_SESSION['user']) && ($a[0]['role']) == 1){
    
    if (!empty($a[0]['user_image'])) {
       $avatar= "<a href='".BASE_URL."/info_user/index/".$_SESSION['user'][0]['user_id']."'><img src='".IMGAE_DISPLAY."/backend/image/user/".$a[0]['user_image']." ' style='width:50px; height: 50px;border-radius: 90%;margin-right: 7px;'></a>";
    }
    else{
        $avatar="<i class='fas fa-user'></i>"; 
    } 
    $text="<a href='".BASE_URL."/admin'>Admin</a> <br>
    <a href='".BASE_URL."/logout'>Đăng xuất</a>";
}
else{
    $text="<a href='".BASE_URL."/login'>Đăng nhập</a> <br>
    <a href='".BASE_URL."/register'>Đăng ký</a>";
    $avatar="<i class='fas fa-user'></i>";
}
?>

<header>
    <div class="index-container"> 
        <!-- start top -->
        <div class="container" >
            <div class="index-top">
                <div class="top">
                    <i class="fas fa-check"></i>
                    <p>Giá cả nhiều ưu đãi hấp dẫn khi mua hàng</p>
                </div>
                <div class="top top-middle">
                    <i class="fas fa-plane"></i>
                    <p>Giao hàng miễn phí toàn quốc và nhanh chóng</p>
                </div>
                <div class="top">
                    <i class="fas fa-star"></i>
                    <p>Sản phẩm đa dạng đạt tiêu chuẩn có kiểm định</p>
                </div>
            </div>
        </div>
        <!-- end top -->
        <!-- start header -->
        <header class="container-fluid">
            <div class="container">
                <div class="index-header">
                    <div class="logo">
                        <a href="<?=BASE_URL?>/home">
                            <img src="<?=IMGAE_DISPLAY?>/backend/image/sliders/<?=$data['slides'][0]['slider_image']?>" alt="">
                        </a>
                    </div>
                    <div class="flex">
                        <div class="header-middle">
                            <form action=""  class="form" method="POST">
                                <i class="fas fa-search"></i>
                                <input type="text" id="myText" value=""  name="seach_text" placeholder="Tìm kiếm ở đây" >
                                <button id="seach" onclick="myFunction()">Tìm kiếm</button>
                            </form>


                            <div class="link">
                                <a href="<?= BASE_URL?>/product_type_sale/sp_bc">Bán chạy nhất</a> |
                                <a href="<?= BASE_URL?>/news">Tin tức</a> |
                                <a href="<?= BASE_URL?>/product_type_sale/sale/1">Giảm giá</a>
                            </div>
                        </div>
                        <div class="header-final">
                            <div class="detail detail-none1" >
                                <i class="fas fa-history"></i>
                                <a href="<?= BASE_URL?>/history"> Xem đơn hàng</a>
                            </div>
                            <div class="detail detail-none2">
                            <?php  echo $avatar; ?>  
                                <div>
                                <?php  echo $text; ?>
                                 
                                </div>
                            </div>
                            <div class="detail btn">
                                <i class="fas fa-shopping-bag"></i>
                                <a href="<?= BASE_URL?>/cart">GIỎ HÀNG(<?= isset ($_SESSION['dem'])?$_SESSION['dem']:"" ?>)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->
    </div>
</header>
<script>

function myFunction() {

  var x = document.getElementById("myText").value;
  
  if(x==""){
      alert("Nhập từ khóa tìm kiếm ! ")
  }
  else{
window.location.href = "http://localhost<?=BASE_URL?>/seach/seach/1/"+x;}

}
</script>