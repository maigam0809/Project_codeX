<?php
    
    if(isset($data['news'])){
        $news = $data['news'];
    }
    if(isset($data['err'])){
        $err = $data['err'];
    }


    $session = new Session();
    $errors = $session->getFormError();
    $states = $session->getFormState();
    require_once VIEW_URL . "/backend/main/index.php";
?>