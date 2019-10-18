
<?php
include '../../Database/Database.php';
include '../../Model/Product.php';
$id= $_GET['fe'];
//echo $id;
$conn=new Database();
$connection =$conn->connect();
 $update = new Product();
    $result = $update->updatedata($connection,$id);

foreach ($result as $mini => $val) {
    $_GET["$mini"]=$val;


}
$result2=$update->getcategory($connection)
?>

<?php

 $conn=new Database();
$connection =$conn->connect();
if(isset($_POST["submit"]))
{
//    echo ($_POST["name"]);

  $save=new Product() ;

  $save->setName($_POST["name"]);
   $save->setPrice($_POST["price"]);
   $save->setDescription($_POST["description"]);

   $save->change($connection,$id);

   header('location:index.php');
}
?>







<?php include '../Layout/Header.php'; ?>




<div class="container">
    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text"  value="<?php echo $_GET['name'];?>" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">description</label>
            <input type="text" name="description"   value="<?php echo $_GET['description'];?>" class="form-control" id="exampleInputPassword1" placeholder="Enter description">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="number"  value="<?php echo $_GET['price'];?>" name="price" class="form-control" id="exampleInputPassword1" placeholder="Enter Price" min="0">
        </div>
   <select class="custom-select" name="category_id">

            <?php
            foreach ($result2 as $key=>$value){
                echo "<option value={$value['id']}>{$value['name']}</option>";

 }
            ?>


</select>
        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>


</div>


<?php include '../Layout/Footer.php';?>

