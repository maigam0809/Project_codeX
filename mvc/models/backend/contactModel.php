<?php
class contactModel extends Db{
    public $table = 'contact';
    // truy vấn tất cả cá loại
    public function getContactAll(){
        $sql = "SELECT * FROM $this->table";
        return $this->pdo_query($sql);
    }

    public function getContactDetail_by_id($id){
        $sql = "SELECT * FROM $this->table WHERE contact_id =?";
        return $this->pdo_query($sql,$id);
    }
    public function getContactUpdate_by_id($id){
        $sql = "UPDATE $this->table SET contact_status=1 WHERE contact_id =?";
        return $this->pdo_execute($sql,$id);
    }
    public function getContactDelete_by_id($id){
        $sql = "DELETE FROM $this->table WHERE contact_id =?";
        return $this->pdo_execute($sql, $id);
    }
    function contact_insert($contact_name,$contact_email,$contact_describe,$contact_create_at,$contact_status){
        $sql = "insert into $this->table(contact_name,contact_email,contact_describe,contact_create_at,contact_status) values(?,?,?,?,?)";
        $this->pdo_execute($sql,$contact_name,$contact_email,$contact_describe,$contact_create_at,$contact_status);
    }

}
?>