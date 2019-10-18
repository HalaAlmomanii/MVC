
<?php
include '../Layout/Header.php';
include '../../Database/Database.php';
include '../../Model/Category.php';
if (isset($_POST['del'])) {
    $id= $_POST['del'];
//    echo $id;
    $conn = new Database();
    $connection = $conn->connect();
    $del = new Category();
    $result = $del->deldata($connection,$id);

}

?>

<?php

$conn = new Database();
$connection = $conn->connect();
$get = new Category();
$result = $get->getdata($connection);


?>


<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">created</th>
        <th scope="col">Modifi</th>
        <th scope="col">del</th>
        <th scope="col">edit</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($result as $feild => $value) {
        echo "<tr>";

//        echo "<td>";
        foreach ($value as $mini) {
            echo "<td>$mini</td>";

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