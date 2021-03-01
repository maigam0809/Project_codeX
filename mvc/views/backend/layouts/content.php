<div class="container-fluid ">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bảng thống kê số lượng</h1>
    </div>
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Categories(Loại)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Total:
                                <?php
                                foreach ($data['thong_ke_loai'] as $item) {
                                    echo "$item[dem_cate]";
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Suppliers
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Total:
                                <?php
                                foreach ($data['thong_ke_supp'] as $item) {
                                    echo "$item[dem_supp]";
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Bài viết(News)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Total:<?php
                                foreach ($data['thong_ke_new'] as $item) {
                                    echo "$item[dem_new]";
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Images(Ảnh)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Total:
                                <?php
                                    foreach ($data['thong_ke_slide'] as $item) {
                                        echo "$item[dem_slide]";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Comments(Bình luận)
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    Total:
                                    <?php
                                        foreach ($data['thong_ke_cmt'] as $item){
                                            echo "$item[dem_cmt]";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="pt-3 row no-gutters align-items-center">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Số lượng comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['thong_ke_cmt_sp'] as $item): ?>
                                        <tr>
                                            <th scope="row"><?=$item['Loại']?></th>
                                            <td><?=$item['so_luong_cmt']?></td>
                                        </tr>
                                        <?php endforeach;?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">

                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Users
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    Total:
                                    <?php
                                        foreach ($data['thong_ke_users'] as $item) {
                                            echo "$item[dem_user]";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="pt-3 row no-gutters align-items-center">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Role</th>
                                            <th scope="col">Số lượng users</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['thong_ke_loai_users'] as $item): ?>
                                        <tr>
                                            <th scope="row"><?=$item['Quyền']?></th>
                                            <td><?=$item['sl']?></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Content Row -->
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Products
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Total:
                                <?php
                                foreach ($data['thong_ke_sp'] as $item) {
                                    echo "$item[dem_pro]";
                                }
                            ?>
                            </div>
                        </div>
                        <table class="mt-3 table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Tên loại sản phẩm</th>
                                    <th scope="col">Số lượng sản phẩm</th>
                                    <th scope="col">Giá thấp nhất</th>
                                    <th scope="col">Giá cao nhất</th>
                                    <th scope="col">Giá trung bình</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['thong_ke'] as $item): ?>
                                <tr>
                                    <th scope="row"><?=$item['cate_name']?></th>
                                    <td><?=$item['sl']?></td>
                                    <td><?=number_format($item['gia_min'],0)?> VNĐ</td>
                                    <td><?=number_format($item['gia_max'],0)?> VNĐ</td>
                                    <td><?=number_format($item['gia_avg'],0)?> VNĐ</td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Pie Chart -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Orders</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                            foreach ($data['thong_ke_order'] as $item) {
                                                echo "$item[dem_order]";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <table class="mt-3 table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tên khách hàng</th>
                                            <th scope="col">Số lần orders</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['thong_ke_sp_order'] as $item): ?>
                                        <tr>
                                            <th scope="row"><?=$item['user_name']?></th>
                                            <th scope="row"><?=$item['dem_order']?></th>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">TỶ LỆ HÀNG HÓA</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <div id="piechart_3d" style="width: 100%; height: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Loại', 'Số Lượng'],
            <?php
                    foreach ($data['thong_ke'] as $item) {
                        echo "['$item[cate_name]',$item[so_luong]],";
                    }
                ?>
        ]);

        var options = {
            title: '',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
    </script>


</div>