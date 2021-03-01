<?php
    
class infoModel extends Db{
    protected $table = 'info_shop';
    protected $info_id = 'info_id';
    protected $info_name = 'info_name';
    protected $info_detail = 'info_detail';
    protected $info_email = 'info_email';
    protected $info_adress = 'info_adress';
    protected $info_phone = 'info_phone';

    public function getInfoAll()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->pdo_query($sql);
    }

    public function getBySql($sql)
    {
        return $this->pdo_query($sql);
    }


    public function getInfoByName($info_name){
        
        $a = strtoupper($info_name);
        $sql = "SELECT info_name FROM $this->table where info_name like '$info_name' ";
        $result =  $this->pdo_query($sql);
        return $result;
        
    }

    public function info_insert($info_name, $info_detail, $info_email, $info_adress, $info_phone)
    {
        $sql = "insert into $this->table($this->info_name, $this->info_detail, $this->info_email, $this->info_adress,$this->info_phone) 
        values(?,?,?,?,?)";
        $this->pdo_execute($sql, $info_name, $info_detail, $info_email,$info_adress,$info_phone);
    }

    public function info_update($info_name, $info_detail, $info_email, $info_adress, $info_phone, $info_id)
    {
        $sql = "UPDATE $this->table SET $this->info_name=?, $this->info_detail=?, $this->info_email=?, $this->info_adress=?, $this->info_phone=?
        WHERE $this->info_id=?";
        // print_r($_REQUEST);

        $this->pdo_execute($sql, $info_name, $info_detail, $info_email, $info_adress, $info_phone, $info_id);
    }

    public function info_delete($info_id)
    {
        $sql = "DELETE FROM $this->table WHERE $this->info_id=?";
        if (is_array($info_id)) {
            foreach ($info_id as $ma) {
                $this->pdo_execute($sql, $ma);
            }
        } else {
            $this->pdo_execute($sql, $info_id);
        }
    }

    public function info_select_by_id($info_id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->info_id=?";
        return $this->pdo_query_one($sql, $info_id);
    }
}


?>