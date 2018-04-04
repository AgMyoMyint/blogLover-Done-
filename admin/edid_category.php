<?php
include '../config/config.php';
include '../libraries/Database.php';
include '../admin/includes/header.php';
include '../helpers/format_helper.php';
?>
<?php


if(isset($_GET['id'])){
    $id = $_GET['id'];

    //Create DB Obj
    $db = new Database();



    //Create Query
    $query = "Select * from categories where id =  $id";

    //Run Query
    $categories = $db->select($query);
    $category = $categories->fetch_assoc();
}



?>

<h2 class=""> Edit Category</h2>
<br>

<form method="post" action="edid_category.php">



    <div class="form-group">
        <label for="exampleInputEmail1">Category Name : </label>

        <input name="name" type="text" class="form-control" placeholder="Enter Category name " value="<?php echo $category['name']; ?>">
    </div>
    <br>
    <div class="">
        <input name="submit" value="Update " type="submit" class="btn btn-primary">
        <input name="delete" value="Delete" type="submit" class="btn btn-danger">
        <a href="index.php"  class="btn btn-default" style="">Cancel</a>
    </div>
    <br>
</form>




<?php
include 'includes/footer.php';
?>

