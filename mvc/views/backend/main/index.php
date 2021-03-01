<?php
if(isset($_SESSION["user"])){
    $a=$_SESSION["user"];
    if(($a[0]['role']) != 1){
    header("location:".BASE_URL."/login");
    }
}
else{
    header("location:".BASE_URL."/login");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Custom fonts for this template-->
    <link href="<?=BASE_URL?>/public/backend/be_asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
        <script src="https://cdn.tiny.cloud/1/ld34vclndumv7xny2s3pnsrpxwoe9floxn96fpbl57r085kv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Custom styles for this template-->
    <link href="<?=BASE_URL?>/public/backend/be_asset/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        #cke_1_contents{
            min-height: 600px;
        }
    </style>
<script>
		tinymce.init({
			selector: '#detail2',
			plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			toolbar_mode: 'floating',
		});
	</script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            require_once "mvc/views/backend/layouts/sidebar.php";
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    require_once "mvc/views/backend/layouts/header.php"
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php
                require_once $beContent;
                // echo $beContent;
            ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
                require_once "mvc/views/backend/layouts/footer.php";
                // echo $beContent;
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sẵn sàng rời đi?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn đã sẵn sàng kết thúc phiên hiện tại của mình.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ bỏ</button>
                    <a class="btn btn-primary" href="<?= BASE_URL?>/admin/logout">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=BASE_URL?>/public/backend/be_asset/vendor/jquery/jquery.min.js"></script>
    <script src="<?=BASE_URL?>/public/backend/be_asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=BASE_URL?>/public/backend/be_asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=BASE_URL?>/public/backend/be_asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=BASE_URL?>/public/backend/be_asset/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=BASE_URL?>/public/backend/be_asset/js/demo/chart-area-demo.js"></script>
    <script src="<?=BASE_URL?>/public/backend/be_asset/js/demo/chart-pie-demo.js"></script>

    <!-- ckeditor plugin -->
    <!-- <script src="<?=BASE_URL?>/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('info_detail');
        CKEDITOR.replace('new_detail');
    </script> -->
</body>

</html>