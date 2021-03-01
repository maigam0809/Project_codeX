<?php
    if(isset($data['category'])){
        $category = $data['category'];
    }
    
    if(isset($data['categories'])){
        $categories = $data['categories'];
    }
    
    if(isset($data['err'])){
        $err = $data['err'];
    }

    $session = new Session();
    require_once "./mvc/views/backend/main/index.php";
?>
