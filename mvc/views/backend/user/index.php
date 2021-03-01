<?php

    if(isset($data['err'])){
        $err = $data['err'];
    }
    if(isset($data['users'])){
        $users = $data['users'];
    }


    $session = new Session();
    require_once "./mvc/views/backend/main/index.php";
?>
