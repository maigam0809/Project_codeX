
<div class="container">
    <h2>Thông tin phản hồi từ khách hàng:</h2>
    <div class="add-cate pt-2 pb-4">
        <a class="btn btn-info" href="<?= BASE_URL ?>/admin/contact/index">QUAY LẠI</a>
    </div>
    <table class="table" id="dataTable">
    <?php

$a = $data['contact'];
?>
    <tfoot>    
        
          
            <tr>
                <th class="a"><span> TÊN KHÁCH HÀNG:</span> <?= $a[0]['contact_name'] ?></th>
               
            <tr>
            <th class="a"><p>  NỘI DUNG :</p><textarea id="contact_describe" ><?= $a[0]['contact_describe'] ?></textarea></th>
            </tr>

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
