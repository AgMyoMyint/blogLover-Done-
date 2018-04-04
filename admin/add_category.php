<?php
include '../config/config.php';
include '../libraries/Database.php';
include '../admin/includes/header.php';
include '../helpers/format_helper.php';
?>
<?php

//Create DB Obj
$db = new Database();


?>

<h2 class="">  Add New Category</h2>
<br>

<form method="post" action="add_category.php">
    <div class="form-group">
        <label for="exampleInputEmail1">Category Name : </label>
        <input name="name" type="text" class="form-control" placeholder="Enter Category name ">
    </div>
    <br>
    <div class="justify-content-between">
        <input name="submit" value="submit" type="submit" class="btn btn-primary">

        <a href="index.php"  class="btn btn-default" style="">Cancel</a>
    </div>
    <br>
</form>




<?php
include 'includes/footer.php';
?>

