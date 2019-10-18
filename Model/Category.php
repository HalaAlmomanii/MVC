<?php


class Category
{
    private $name  ;
    private $created   ;


    private function setCreated()
    {
        $date = new DateTime('2000-01-01');
        $datetime_created = $date->format('Y-m-d H:i:s');
        $this->created = $datetime_created;
    }


    function create($connection)
    {
        $this->setCreated();

        $sql = "INSERT INTO categories (name,created) VALUES ('$this->name','$this->created')";
//        var_dump($sql);
//
//        var_dump($connection);
        $connection->exec($sql);
    }


    function updatedata($connection,$id){
        $sql="SELECT * FROM categories where id=$id";
//echo $sql;

        $result= $connection->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }



    function change($connection,$id){

        $this->setCreated();
        $sql = "UPDATE categories SET name='$this->name',created='$this->created' WHERE id=$id";
//   echo $sql;
//        var_dump($connection);
        $connection->exec($sql);

    }

    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCreated()
    {
        return $this->created;
    }





    function deldata($connection,$id){
 
        $sql="DELETE FROM categories WHERE id=$id";

           return $connection->exec($sql);
    }



function getdata($connection){
        $sql="SELECT * FROM categories";

        $result= $connection->query($sql);
       return $result->fetchAll(PDO::FETCH_ASSOC);


    }
}
