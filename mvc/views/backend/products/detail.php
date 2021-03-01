
<div class="container">
    <h2>Thông tin sản phẩm:</h2>
    <table class="table" id="dataTable">
    <tfoot>    
    <div class="add-cate pt-2 pb-4">
        <a class="btn btn-info" href="<?=BASE_URL?>/admin/products/index/1">QUAY LẠI</a>
    </div>
    <tr>
                <th class="a"><span> MÃ SẢN PHẨM :</span> <?= $data['products']["product_id"];?></th>
               
            <tr>
            <tr>
                <th class="a"><span> LOẠI SẢN PHẨM:</span> <?= $data['products']["cate_name"];?></th>
               
            <tr>
            <tr>
                <th class="a"><span> TÊN SẢN PHẨM:</span> <?= $data['products']["product_name"];?></th>
               
            <tr>
            <tr>
                <th class="a"><span> ẢNH SẢN PHẨM: <br> <img src="<?=BASE_URL?>/public/backend/image/products/<?= $data['products']["product_image"];?>" width="230px"; height="300px"; ></th>
               
            <tr>
            <tr>
                <th class="a"><span> XUẤT XỨ:</span> <?= $data['products']["product_intro"];?></th>
               
            <tr>
            <tr>
                <th class="a"><span> CUNG CẤP BỞI:</span> <?= $data['products']["supplier_name"];?></th>
              
            <tr>
          
            <tr>
                <th class="a"><span> TÌNH TRẠNG:</span> <?= $data['products']["product_status"] ? 'Hết hàng ' : 'Còn hàng' ?></th>
               
            <tr>
            <tr>
                <th class="a"><span> GIÁ ĐẦU VÀO:</span> <?= $data['products']["product_price"];?>VNĐ</th>
               
            <tr>
            <tr>
                <th class="a"><span> GIẢM GIÁ:</span> <?= $data['products']["product_sale"];?>%</th>
               
            <tr>
            <tr>
                <th class="a"><span> LƯỢT XEM:</span> <?= $data['products']["product_view"];?></th>
               
            <tr>
            <tr>
                <th class="a"><span> NGÀY ĐĂNG BÀI:</span> <?= $data['products']["product_created_at"];?></th>
               
            <tr>
            <tr>
                <th class="a"><span> NGÀY BÁN :</span> <?= $data['products']["product_updated_at"];?></th>
               
            <tr>
            <tr>
                <th class="a"><span> MÔ TẢ:</span> <br> 
                <textarea name="" id="" class="form-control" cols="100" rows="10"><?= $data['products']["product_description"];?></textarea></th>
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
