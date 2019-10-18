<?php include '../Layout/Header.php'; ?>



<?php include '../../Database/Database.php';
include '../../Model/Category.php';
$conn=new Database();
$connection =$conn->connect();


if(isset($_POST["submit"]))
{
    $category=new Category() ;
    $category->setName($_POST["name"]);

    $category->create($connection);
}
?>

<div class="container">
    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">

           </div>
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>


</div>


<?php include '../Layout/Footer.php';?>


