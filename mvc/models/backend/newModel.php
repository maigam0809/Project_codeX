<?php

class newModel extends Db
{
    protected $table = 'news';
    protected $new_id = 'new_id';
    protected $new_name = 'new_name';
    protected $new_image = 'new_image';
    protected $new_detail = 'new_detail';
    protected $created_at = 'created_at';
    protected $new_description = 'new_description';
    public function getNewAll()
    {
        $sql = "SELECT * FROM $this->table ORDER BY new_id DESC";
        return $this->pdo_query($sql);
    }

    public function getBySql($sql)
    {
        return $this->pdo_query($sql);
    }


    public function getNewByName($new_name)
    {
        $a = strtoupper($new_name);
        $sql = "SELECT new_name FROM $this->table where new_name like '$new_name' ";
        $result =  $this->pdo_query($sql);
        return $result;
        
    }

    public function new_insert($new_name, $new_image, $new_description, $new_detail, $created_at)
    {
        $sql = "INSERT INTO `news` (`new_name`, `new_image`, `new_description`, `new_detail`, `created_at`) VALUES (?,?,?,?,? );";
        $this->pdo_execute($sql,$new_name, $new_image, $new_description, $new_detail, $created_at);
    }

    public function new_update($new_name, $new_image, $new_description, $new_detail, $created_at, $new_id)
    {
        $sql = "UPDATE $this->table SET $this->new_name=?, $this->new_image=?, $this->new_description=?, $this->new_detail=?, $this->created_at=? WHERE $this->new_id=?";
        // print_r($_REQUEST);

        $this->pdo_execute($sql,$new_name, $new_image, $new_description, $new_detail, $created_at, $new_id);
    }

    public function new_delete($new_id)
    {
        $sql = "DELETE FROM $this->table WHERE $this->new_id=?";
        if (is_array($new_id)) {
            foreach ($new_id as $ma) {
                $this->pdo_execute($sql, $ma);
            }
        } else {
            $this->pdo_execute($sql, $new_id);
        }
    }

    public function new_select_by_id($new_id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->new_id=?";
        return $this->pdo_query_one($sql, $new_id);
    }
}


?>
