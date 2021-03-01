<li class="breadcrumb-item"><a href="<?= BASE_URL?>/news">Tin tức</a></li>
                <i class="fas fa-caret-right cl-control"></i>
<li class="breadcrumb-item active cl-control" aria-current="page"><?= $data['news']['new_name'];?></li>
            </nav>
        </div>
    </section>
 
<div class="container-fluild cart-detail">
    <div class="container">
        <div class="tieude" >
            <h1 style="text-align: center;"><?= $data['news']['new_name'];?></h1>
        </div>
        <br>
     <div class="image" style="width:90%; margin:auto;">
         <img src="<?=BASE_URL?>/public/backend/image/new/<?=$data['news']['new_image']?>" alt="" width="100%" height="400px" >
     </div>
        <br>
        <div class="content">
            <b>
            <?=$data['news']['new_description']?>
            </b>
            <br>
            <div>
            <?=$data['news']['new_detail']?>
            </div>
        </div>
    </div>

</div>