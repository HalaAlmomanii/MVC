
<?php include '../Layout/Header.php'; ?>



<?php include '../../Database/Database.php';
include '../../Model/Product.php';
$conn=new Database();
$connection =$conn->connect();

$categoty=new Product() ;
 $result=$categoty->getcategory($connection);
// var_dump($result);
// foreach ($result as $key=>$value){
//      $id= $value['id'];
//     $name= $value['name'];
// }

if(isset($_POST["submit"]))
{
  $product=new Product() ;
  $product->setName($_POST["name"]);
   $product->setPrice($_POST["price"]);
   $product->setDescription($_POST["description"]);
 $product->setCategoryId($_POST["category_id"]);
   $product->create($connection);
}
?>

<div class="container">
    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">description</label>
            <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Enter description">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="Enter Price" min="0">
        </div>
<!--        <div class="form-group">-->
<!--            <label for="exampleInputPassword1">created </label>-->
<!--            <input type="date"  name="created" class="form-control" id="exampleInputPassword1" placeholder="Enter time ">-->
<!--        </div>-->
        <select class="custom-select" name="category_id">

            <?php
            foreach ($result as $key=>$value){
                echo "<option value={$value['id']}>{$value['name']}</option>";

 }
            ?>


</select>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>


</div>


<?php include '../Layout/Footer.php';?>


