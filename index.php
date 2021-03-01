<?php
    define('BASE_URL', "/minimart");
    define('VIEW_URL', './mvc/views');
    define('CONTROLLER_URL', './mvc/controllers');
    define('MODEL_URL', './mvc/models');
    //định nghĩa đường dẫn chứa ảnh sử dụng trong upload
    define('IMAGE_BE', $_SERVER["DOCUMENT_ROOT"] . BASE_URL . "/public/backend/image");

    // định nghĩa đường dẫn ảnh hiển thị
    define('IMGAE_DISPLAY', BASE_URL.'/public');
    // định nghĩa đường dẫn đến public frontend
    define('TOPUBLIC', BASE_URL.'/public/frontend');

    require_once "./mvc/Bridge.php";
    $myApp = new App();

    session_start();

?>