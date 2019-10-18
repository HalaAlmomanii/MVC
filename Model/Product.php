<?php


class Product
{

    private $name;
    private $description;
    private $price;
    private $created;
    private $category_id;

    private function setCreated()
    {
        $date = new DateTime('2000-01-01');
        $datetime_created = $date->format('Y-m-d H:i:s');
        $this->created = $datetime_created;
    }


    function change($connection,$id){

         $this->setCreated();
         $sql = "UPDATE products SET name='$this->name', price=$this->price, description='$this->description',created='$this->created',category_id=1 WHERE id=$id";
//   echo $sql;
//        var_dump($connection);
  $connection->exec($sql);

   }




    function create($connection)
    {
        $this->setCreated();

        $sql = "INSERT INTO products (name,price, description,created,category_id)VALUES ('$this->name', $this->price,'$this->description','$this->created',$this->category_id)";
//        var_dump($sql);
//
//        var_dump($connection);
        $connection->exec($sql);
    }

    function getdata($connection){
        $sql="SELECT * FROM products";

        $result= $connection->query($sql);
       return $result->fetchAll(PDO::FETCH_ASSOC);


    }



    function deldata($connection,$id){

        $sql="DELETE FROM products WHERE id=$id";

           return $connection->exec($sql);
    }



function updatedata($connection,$id){
          $sql="SELECT * FROM products where id=$id";
//echo $sql;

           $result= $connection->query($sql)->fetch(PDO::FETCH_ASSOC);

       return $result;
}

function getcategory($connection)
{
    $sql = "SELECT id,name FROM categories";
//    echo $sql;

    $result = $connection->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price)
    {
        $this->price = $price;
    }


    public function getCreated()
    {
        return $this->created;
    }

}