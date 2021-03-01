<?php
    if(isset($data['message'])){
        $message = $data['message'];
    }

    $session = new Session();
    require_once VIEW_URL . "/backend/main/index.php";
?>
