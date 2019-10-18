



<?php
include '../Layout/Header.php';
include '../../Database/Database.php';
include '../../Model/Product.php';
if (isset($_POST['del'])) {
    $id= $_POST['del'];
//    echo $id;
    $conn = new Database();
    $connection = $conn->connect();
    $del = new Product();
    $result = $del->deldata($connection,$id);

}

//if (isset($_POST['edit'])) {
//    $id= $_POST['edit'];
//    header('Location:edit.php');
//
////    $conn = new Database();
////    $connection = $conn->connect();
////    $del = new Product();
////    $result = $del->deldata($connection,$id);
//
//}
?>

<?php

$conn = new Database();
$connection = $conn->connect();
$get = new Product();
$result = $get->getdata($connection);
 $result2=$get->getcategory($connection);
$arr=[];

 foreach ($result2 as $feild => $value2) {
     foreach ($value2 as $key2 => $val2) {
    $arr[$value2['id']]=$value2['name'];
//echo $key2;
//print_r($value2);
     }
//      $id2=array($value2 ['id']=>$value2 ['name']);
//      echo $id2[2];

 }

//print_r($result2);
//print_r($arr);
?>


<table class="table">
    <thead>
    <tr>
        <th >id</th>
        <th >name</th>
        <th >description</th>
        <th > price</th>
        <th > category_id</th>
        <th> category</th>
        <th >created</th>
        <th >Modifi</th>
        <th >del</th>
        <th >edit</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($result as $feild => $value) {
        echo "<tr>";

//        echo "<td>";
        foreach ($value as $key=>$val) {

            echo "<td>$val</td>";
//
            if($key==="category_id"){

              echo "<td>{$arr[$val]}</td>";
            }
//

//




        }
        echo "<td>
<form method='post' action='index.php' >
<button name='del' class='btn btn-danger' value={$value['id']}> delete</button></form></td> ";


        echo "<td>
 <a href='edit.php?fe={$value["id"]}'  class='btn btn-info' >edit</a></td>";
        echo "<tr>";

    }


    ?>

    </tbody>
</table>

<?php include '../Layout/Footer.php'; ?>
