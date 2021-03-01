<!-- bắt đầu phần content -->

<li class="breadcrumb-item active cl-control" aria-current="page">Tin tức</li>
            </nav>
        </div>
    </section>
    <div class="content content_news">
    <div class="container col-12">
        <?php foreach($data['news'] as $item): ?>
            <br>
        <div class="row ">
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
            <img src="<?=BASE_URL?>/public/backend/image/new/<?=$item['new_image']?>" alt="" style="width: 100%; height: 200px;">
               
            </div>
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-8">
            <a href="<?= BASE_URL ?>/news/new_detail/<?=$item['new_id']?>"><h4 class="text-title"><?=$item['new_name']?></h4></a>
                <p><?=$item['new_description']?>...</p>
            </div>

        </div>
<?php endforeach ?>

        </div>
      


    </div>
</div>
<!-- kết thúc phần content -->