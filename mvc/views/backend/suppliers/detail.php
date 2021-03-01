<div class="container">
    <h2>Thông tin nhà cung cấp</h2>
    <div class="add-cate pt-2 pb-4">
        <a class="btn btn-info" href="<?= BASE_URL ?>/admin/suppliers/index">Quay Lại</a>
    </div>
    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th class="a">ID :</th>
                <th><?= $suppliers['supplier_id'] ?></th>
            </tr>
            <tr>
                <th class="a">Tên Nhà Cung Cấp:</th>
                <th><?= $suppliers['supplier_name'] ?></th>
            </tr>
            <tr>
                <th class="a">Ảnh:</th>
                <th><img src="<?= BASE_URL ?>/public/backend/image/suppliers/<?= $suppliers['supplier_image'] ?>" alt="" width="80px"></th>
            </tr>
            <tr>
                <th class="a">Giới thiệu nhà cung cấp</th>
                <th><?= $suppliers['supplier_desc'] ?></th>
            </tr>
            
        </thead>
    </table>
</div>
<style>
    .a{
        color: black;
    }
</style>