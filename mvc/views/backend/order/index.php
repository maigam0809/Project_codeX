<?php
    
    if(isset($data['err'])){
        $err = $data['err'];
    }
    
    $session = new Session();
    require_once "./mvc/views/backend/main/index.php";
?>
