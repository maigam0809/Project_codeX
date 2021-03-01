<?php
class Contact extends Controller
{
    private $contactModel;
    public function __construct()
    {
        $this->contactModel = $this->model('ContactModel');
    }

    function index()
    {
        //    $this->checklogin_admin();
        $this->be_content = "./mvc/views/backend/contact/list.php";
        $contact = $this->contactModel->getContactAll();
        $this->view('contact/index', [
            'contact' => $contact
        ]);
    }
    
    function details($id)
    {
        $this->be_content = "./mvc/views/backend/contact/detail.php";

        $contact = $this->contactModel->getContactDetail_by_id($id);  
        if($contact[0]["contact_status"]==0){
            $this->contactModel->getContactUpdate_by_id($id);
        }

        $this->view('contact/index', [
            'contact' => $contact
        ]);
    }


    function delete($id)
    {   
        $session = new Session();
        $this->contactModel->getContactDelete_by_id($id); 
        $message='Xoá thành công';
        $session->setFlashSuccess($message);
        header('Location:../index');
        exit();
    }
   
}