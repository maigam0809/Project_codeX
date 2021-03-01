<?php
    if(isset($data['products'])){
    $products = $data['products'];

    } 
    if(isset($data['categories'])){
        $categories = $data['categories'];
    }
    if(isset($data['suppliers'])){
        $suppliers = $data['suppliers'];
    }
    if(isset($data['err'])){
        $err = $data['err'];
    }

    $session = new Session();
    require_once "./mvc/views/backend/main/index.php";
?>