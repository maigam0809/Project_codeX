
<div class="container">
    <h2>Thông tin quản trị viên:</h2>
    <table class="table" id="dataTable">
    <tfoot>    
        
    <tr>
                <th class="a"><span> MÃ ID:</span> <?= $a[0]["user_id"];?></th>
               
            <tr>
            <tr>
                <th class="a"><span> TÊN QUẢN TRỊ VIÊN:</span> <?= $a[0]["user_name"];?></th>
               
            <tr>
            <tr>
                <th class="a"><span> ẢNH ĐẠI DIỆN: <br> <img src="<?=BASE_URL?>/public/backend/image/user/<?= $a[0]["user_image"];?>" width="230px"; height="300px"; ></th>
               
            <tr>
            <tr>
                <th class="a"><span> ĐỊA CHỈ EMAIL:</span> <?= $a[0]["user_email"];?></th>
               
            <tr>
            <tr>
                <th class="a"><span> ĐỊA CHỈ CƯ TRÚ:</span> <?= $a[0]["user_address"];?></th>
               
            <tr>
            <tr>
                <th class="a"><span> SỐ ĐIỆN THOẠI:</span> <?= $a[0]["user_phone"];?></th>
               
            <tr>
            <tr>
                <th class="a"><span> VAI TRÒ:</span> Nhân viên</th>
               
            <tr>
            <tr>
                <th class="a"><span> NGÀY BẮT ĐẦU LÀM VIỆC:</span> <?= $a[0]["created_at"];?></th>
               
            <tr>
            <tr>
                <th class="a"><span> NGÀY SỬA THÔNG TIN:</span> <?= $a[0]["updated_at"];?></th>
               
            <tr>
            </tr>

            </tfoot>

       
    </table>
</div>
<style>
 tr>th>p{
      color: black;
  }
  tr>th>span{
      font-size: 15px;
      color: black;
  }
  tr>th{
    color: green;
  }
  #contact_describe{
      width: 100%;
      min-height: 300px;
  }
</style>
