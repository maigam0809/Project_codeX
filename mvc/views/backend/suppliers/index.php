<?php
    
    if(isset($data['suppliers'])){
        $suppliers = $data['suppliers'];
    }
    if(isset($data['items'])){
        $items = $data['items'];
    }
   
    $session = new Session();
    $errors = $session->getFormError();
    $states = $session->getFormState();
    
    require_once "./mvc/views/backend/main/index.php";
?>
