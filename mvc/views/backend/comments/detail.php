
<div class="container">
    <h2>Thông tin phản hồi từ khách hàng:</h2>
    <div class="add-cate pt-2 pb-4">
        <a class="btn btn-info" href="<?= BASE_URL ?>/admin/comment/index">QUAY LẠI</a>
    </div>
    <?php  $session->flash();?>
    <table class="table" id="dataTable">
    <tfoot>    
        
          
            <tr>
                <th class="a"><span> TÊN KHÁCH HÀNG:</span> </th>
                <th class="a">SẢN PHẨM</th>
                <th class="a">NỘI DUNG</th>
               <th class="a">HÀNH ĐỘNG</th>
            <tr>
            <?php foreach($data['cmt'] as $item):?>
            <td><?=$item['user_name']?></td>
            <td><?=$item['product_name']?></td>
            <td><textarea id="contact_describe" cols="30" rows="5" ><?=$item['content']?></textarea></td>
            <td>
<a onclick="return confirm('Bạn có muốn xóa thật không?')" class="btn btn-danger" href="<?=BASE_URL?>/admin/comment/delete/<?=$item['comment_id']?>">Xóa</a>
</td>
            </tr>
<?php endforeach?>

            </tfoot>

       
    </table>
</div>
<style>
  tr>th>span,tr>th>p{
      color: black;
  }
  #contact_describe{
      width: 100%;
      min-height: 300px;
  }
</style>
