<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- slider sick -->
    <link rel="stylesheet" href="<?=TOPUBLIC?>/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=TOPUBLIC?>/owlcarousel/assets/owl.theme.default.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?=TOPUBLIC?>/owlcarousel/owl.carousel.min.js"></script>
    <!-- end slider sick -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?=TOPUBLIC?>/font/awesome/css/all.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="<?=TOPUBLIC?>/css/nouislider.css">
    <link href="<?=TOPUBLIC?>/css/style4.css" rel="stylesheet">
    <link href="<?=TOPUBLIC?>/css/style.css" rel="stylesheet">
    <link href="<?=TOPUBLIC?>/css/setting.css" rel="stylesheet">
    <title>Home</title>
</head>

<body>

    <!-- start header -->
        <?php
         $session = new Session();
         $errors = $session->getFormError();
         $states = $session->getFormState();
            include_once VIEW_URL."/frontend/layout/header.php";
        ?>
    <!-- end header -->

    <!-- start menu -->
        <?php
            include_once $menu;
        ?>
    <!-- end menu
    <!-- start content -->
        <?php
            include_once $feContent;
        ?>
    <!-- end content-->

    <!-- bắt đầu footer -->
        <?php
            include_once VIEW_URL."/frontend/layout/footer.php"
        ?>
    <!-- stop footer -->


    <script type="text/javascript" src="<?=TOPUBLIC?>/js/slider_sick.js"></script>

    <script src="<?=TOPUBLIC?>/js/hidden-menu.js"></script>
    <script src="<?=TOPUBLIC?>/js/nouislider.js"></script>
    <script src="<?=TOPUBLIC?>/js/cart.js"></script>
</body>

</html>