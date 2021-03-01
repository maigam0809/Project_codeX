<?php
    if(isset($data['message'])){
        $message = $data['message'];
    }
    if(isset($data['err'])){
        $err = $data['err'];
    }
    
    $session = new Session();
    $errors = $session->getFormError();
    $states = $session->getFormState();
    
    require_once "./mvc/views/backend/main/index.php";
?>
