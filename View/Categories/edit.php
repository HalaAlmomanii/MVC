

<?php
include '../../Database/Database.php';
include '../../Model/Category.php';
$id= $_GET['fe'];
//echo $id;
$conn=new Database();
$connection =$conn->connect();
$update = new Category();
$result = $update->updatedata($connection,$id);

foreach ($result as $mini => $val) {
    $_GET["$mini"]=$val;


}

?>

<?php

$conn=new Database();
$connection =$conn->connect();
if(isset($_POST["submit"]))
{
//    echo ($_POST["name"]);

    $save=new Category() ;

    $save->setName($_POST["name"]);

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





        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>


</div>


<?php include '../Layout/Footer.php';?>

