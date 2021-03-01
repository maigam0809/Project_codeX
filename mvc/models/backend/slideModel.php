<?php
class SlideModel extends Db
{
    protected $table = 'sliders';
    protected $slider_id = 'slider_id';
    protected $slider_name = 'slider_name';
    // protected $chuc_nang = 'chuc_nang';
    protected $slider_image = 'slider_image';
    protected $created_at = 'created_at';

    
    // truy vấn tất cả cá loại
    public function getSlidepAll()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->pdo_query($sql);
    }
    public function getBySql($sql)
    {
        return $this->pdo_query($sql);
    }


    public function getSlideByName($slider_name)
    {
        $a = strtoupper($slider_name);
        
        $sql = "SELECT slider_name FROM $this->table where slider_name like '$slider_name' ";
        // var_dump($sql);
        // die;
        $result =  $this->pdo_query($sql);
        return $result;
        
    }

    public function slide_insert($slider_name, $slider_image, $created_at)
    {
        $sql = "insert into $this->table($this->slider_name, $this->slider_image, $this->created_at) values(?,?,?)";
        $this->pdo_execute($sql, $slider_name, $slider_image, $created_at);
    }

    public function slide_update($slider_name, $slider_image, $created_at, $slider_id)
    {
        $sql = "UPDATE $this->table SET $this->slider_name=?, $this->slider_image=?, $this->created_at=?WHERE $this->slider_id=?";
        // print_r($_REQUEST);

        $this->pdo_execute($sql,$slider_name, $slider_image, $created_at, $slider_id);
    }

    public function slide_delete($slider_id)
    {
        $sql = "DELETE FROM $this->table WHERE $this->slider_id=?";
        if (is_array($slider_id)) {
            foreach ($slider_id as $ma) {
                $this->pdo_execute($sql, $ma);
            }
        } else {
            $this->pdo_execute($sql, $slider_id);
        }
    }

    public function slide_select_by_id($slider_id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->slider_id=?";
        return $this->pdo_query_one($sql, $slider_id);
    }
    // public function book(){
    //     $sql = "select * from books";
    //     $stmt = $this->con->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    //
}
