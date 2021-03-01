<?php
class UserModel extends Db{
    public $table = 'users';
    // truy vấn tất cả cá loại
    public function getUserAll(){
        $sql = "SELECT * FROM $this->table";
        return $this->pdo_query($sql);
    }

    public function getBySql($sql)
    {
        return $this->pdo_query($sql);
    }


    public function getUserByName($user_email)
    {
        $a = strtoupper($user_email);
        
        $sql = "SELECT user_email FROM $this->table where user_email like '$user_email' ";
        $result =  $this->pdo_query($sql);
        return $result;
        
    }


    function user_insert($user_name,$user_image, $user_email,$user_password, $user_address, $role, $created_at, $user_phone){
        $sql = "insert into users(user_name, user_image, user_email,user_password, user_address, role, created_at, user_phone) values(?,?,?,?,?,?,?,?)";
        $this->pdo_execute($sql,$user_name, $user_image, $user_email,$user_password, $user_address, $role, $created_at, $user_phone);
    }
    function user_insert_dk($user_name, $user_email, $user_password, $role, $created_at){
        $sql = "insert into users(user_name, user_email,user_password, role, created_at) values(?,?,?,?,?)";
        $this->pdo_execute($sql,$user_name, $user_email, $user_password, $role, $created_at);
    }
    public function getUserAll_by_id($id){
        $sql = "SELECT * FROM $this->table WHERE user_id=?";
        return $this->pdo_query($sql,$id);
    }
    
    public function getUserAll_by_username($id){
        $sql = "SELECT * FROM $this->table WHERE user_email=?";
        return $this->pdo_query($sql,$id);
    }
    public function getUserUpdate_by_id($user_id,$user_name,$user_image, $user_email,$user_password, $user_address, $role, $created_at, $user_phone,$updated_at){
        $sql = "UPDATE `users` SET user_name=?,user_image=?, user_email=?,user_password=?, user_address=?, role=?, created_at=?, user_phone=?,updated_at=? WHERE `users`.`user_id` = ?";
        return $this->pdo_execute($sql,$user_name,$user_image, $user_email,$user_password, $user_address, $role, $created_at, $user_phone,$updated_at,$user_id);
    }
    public function getUserUpdate_by_email($user_email,$user_password){
        $sql = "UPDATE `users` SET user_password=? WHERE `users`.`user_email`= ?";
        return $this->pdo_execute($sql,$user_password,$user_email);
    }
    public function getUserDelete_by_id($id){
        $sql = "DELETE FROM $this->table WHERE user_id=?";
        return $this->pdo_execute($sql, $id);
    }
    public function getUserAll_by_email($email){
        $sql = "SELECT * FROM $this->table WHERE user_email=?";
        return $this->pdo_query($sql,$email);
    }
    public function getUserUpdate_by_id2($user_id, $user_name, $user_image, $user_email, $user_address,$user_phone, $updated_at){
        $sql = "UPDATE `users` SET user_name=?,user_image=?, user_email=?, user_address=?,  user_phone=?,updated_at=? WHERE `users`.`user_id` = ?";
        return $this->pdo_execute($sql,$user_name,$user_image, $user_email,$user_address,$user_phone,$updated_at,$user_id);
    }
    

}
?>