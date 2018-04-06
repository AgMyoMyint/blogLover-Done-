<?php
include '../config/config.php';
include '../libraries/Database.php';
include '../admin/includes/header.php';
include '../helpers/format_helper.php';
?>
<?php

//Create DB Obj
$db = new Database();


/*
 * Add Category
 */
if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($db->link, $_POST['name']);

    if($name==""  ){
        $error = "Please fill out all required fields";

    }else{
        $query = "Insert into categories(name) VALUES ('$name') ";

        $insert_no = $db->update($query);
    }
}


?>

<h2 class="">  Add New Category</h2>
<br>

<form method="post" action="add_category.php">
    <?php if(isset($error)) : ?>
        <div class="form-group">
            <label class="error"> <?php echo $error; ?> </label>
        </div>
    <?php endif; ?>

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
include '../admin/includes/footer.php';
?>

