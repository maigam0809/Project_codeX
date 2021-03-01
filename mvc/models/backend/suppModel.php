<?php
class SuppModel extends Db
{
    protected $table = 'suppliers';
    protected $supplier_id = 'supplier_id';
    protected $supplier_name = 'supplier_name';
    protected $supplier_desc = 'supplier_desc';
    protected $supplier_image = 'supplier_image';
    protected $created_at = 'created_at';

    
    // truy vấn tất cả cá loại
    public function getSuppAll()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->pdo_query($sql);
    }
    public function getBySql($sql)
    {
        return $this->pdo_query($sql);
    }

    public function getSuppByName($supplier_name)
    {
        $a = strtoupper($supplier_name);
        
        $sql = "SELECT supplier_name FROM $this->table where supplier_name like '$supplier_name' ";
        // var_dump($sql);
        // die;
        $result =  $this->pdo_query($sql);
        return $result;
        
    }


    public function supp_insert($supplier_name, $supplier_image, $supplier_desc, $created_at)
    {
        $sql = "insert into $this->table($this->supplier_name, $this->supplier_image, $this->supplier_desc, $this->created_at) values(?,?,?,?)";
        $this->pdo_execute($sql, $supplier_name, $supplier_image, $supplier_desc, $created_at);
    }

    public function supp_update($supplier_name, $supplier_image, $supplier_desc, $created_at, $supplier_id)
    {
        $sql = "UPDATE $this->table SET $this->supplier_name=?, $this->supplier_image=?, $this->supplier_desc=?, $this->created_at=?WHERE $this->supplier_id=?";
        // print_r($_REQUEST);

        $this->pdo_execute($sql,$supplier_name, $supplier_image, $supplier_desc, $created_at, $supplier_id);
    }

    public function supp_delete($supplier_id)
    {
        $sql = "DELETE FROM $this->table WHERE $this->supplier_id=?";
        if (is_array($supplier_id)) {
            foreach ($supplier_id as $ma) {
                $this->pdo_execute($sql, $ma);
            }
        } else {
            $this->pdo_execute($sql, $supplier_id);
        }
    }

    public function supp_select_by_id($supplier_id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->supplier_id=?";
        return $this->pdo_query_one($sql, $supplier_id);
    }
    // public function book(){
    //     $sql = "select * from books";
    //     $stmt = $this->con->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    //
}
