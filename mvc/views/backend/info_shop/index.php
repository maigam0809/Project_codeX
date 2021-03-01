<?php
    if(isset($data['message'])){
        $message = $data['message'];
    }

    if(isset($data['err'])){
        $err = $data['err'];
    }

    if(isset($data['info'])){
        $info = $data['info'];
    }

    $session = new Session();
    require_once VIEW_URL . "/backend/main/index.php";
?>