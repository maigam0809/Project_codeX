<?php
    if(isset($data['message'])){
        $message = $data['message'];
    }

    $session = new Session();
    $errors = $session->getFormError();
    $states = $session->getFormState();
    require_once VIEW_URL . "/backend/main/index.php";
?>