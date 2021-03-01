<?php
class CateModel extends Db
{
    protected $table = 'categories';
    protected $cate_id = 'cate_id';
    protected $cate_name = 'cate_name';
    protected $cate_image = 'cate_image';
    protected $created_at = 'created_at';
    // truy vấn tất cả cá loại
    public function getCateAll()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->pdo_query($sql);
    }


    public function getBySql($sql)
    {
        return $this->pdo_query($sql);
    }


    public function getCateByName($cate_name)
    {
        $a = strtoupper($cate_name); 
        $sql = "SELECT cate_name FROM $this->table where cate_name like '$cate_name' ";
        // var_dump($sql);
        // die;
        $result =  $this->pdo_query($sql);
        return $result;
        
    }

    
    public function getCate_by_id($id)
    {
        $sql = "SELECT * FROM $this->table WHERE cate_id=?";
        return $this->pdo_query($sql,$id);
    }

    public function cate_insert($cate_name, $cate_image, $created_at)
    {
        $sql = "insert into $this->table($this->cate_name, $this->cate_image, $this->created_at) values(?,?,?)";
        $this->pdo_execute($sql, $cate_name, $cate_image, $created_at);
    }

    public function cate_update($cate_name, $cate_image, $created_at, $cate_id)
    {
        $sql = "UPDATE $this->table SET $this->cate_name=?, $this->cate_image=?, $this->created_at=? WHERE $this->cate_id=?";
        // print_r($_REQUEST);

        $this->pdo_execute($sql, $cate_name, $cate_image, $created_at, $cate_id);
    }

    public function cate_delete($cate_id)
    {
        $sql = "DELETE FROM $this->table WHERE $this->cate_id=?";
        if (is_array($cate_id)) {
            foreach ($cate_id as $ma) {
                $this->pdo_execute($sql, $ma);
            }
        } else {
            $this->pdo_execute($sql, $cate_id);
        }
    }

    public function cate_select_by_id($cate_id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->cate_id=?";
        return $this->pdo_query_one($sql, $cate_id);
    }

   
}
