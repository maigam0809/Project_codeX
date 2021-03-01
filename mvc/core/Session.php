<?php
Class Session {

    public function __construct(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function setFlash($message, $type = 'danger'){
        $_SESSION['flash'] = array(
            'message' => $message,
            'type'    => $type
        );
    }

    public function setFlashSuccess($message){
        $this->setFlash($message, 'success');
    }

    public function setFlashError($message){
        $this->setFlash($message, 'danger');
    }

    public function flash(){
        if(isset($_SESSION['flash'])){
            ?>
            <div id="alert" class="alert alert-<?php echo $_SESSION['flash']['type'] ?>" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <strong><?php print_r($_SESSION['flash']['message']); ?></strong>
            </div>
            <?php
            unset($_SESSION['flash']);
        }
    }


    public function setFormError($data){
        if(!isset($_SESSION["formError"])){
            $_SESSION["formError"] = array();
        }
        $_SESSION["formError"] = $data;
    }

    public function getFormError() {
        if(isset($_SESSION["formError"])){
            $errors =  $_SESSION["formError"];
            unset($_SESSION["formError"]);
            return $errors;
        }
    }

    public function setFormState($data){
        if(!isset($_SESSION["formState"])){
            $_SESSION["formState"] = array();
        }
        $_SESSION["formState"] = $data;
    }

    public function getFormState() {
        if(isset($_SESSION["formState"])){
            $errors =  $_SESSION["formState"];
            unset($_SESSION["formState"]);
            return $errors;
        }
    }

}