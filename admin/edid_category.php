<?php
include '../config/config.php';
include '../libraries/Database.php';
include '../admin/includes/header.php';
include '../helpers/format_helper.php';
?>
<?php
//Create DB Obj
$db = new Database();

$id = $_GET['id'];



/*
 * Initialize
 */
//Create Query
$query = "Select * from categories where id =  $id";
//Run Query
$categories = $db->select($query);
$category = $categories->fetch_assoc();


/*
 * Edit Category
 */
if(isset($_POST['submit'])){
    $id = $_GET['id'];

    $name = mysqli_real_escape_string($db->link, $_POST['name']);

    if($name==""  ){
        $error = "Please fill out all required fields";

    }else{
        $query = "UPDATE categories SET name = '$name' WHERE id=$id";

        $insert_no = $db->update($query);

    }
}



/*
 * Delete Category
 */
if(isset($_POST['delete'])){

    $id = $_GET['id'];

    $query = "Delete from categories WHERE id=$id";

    $insert_no = $db->delete($query);
}

?>

<h2 class=""> Edit Category</h2>
<br>

<form method="post" action="edid_category.php?id=<?php echo $category['id']; ?>" >
    <?php if(isset($error)) : ?>
        <div class="form-group">
            <label class="error"> <?php echo $error; ?> </label>

        </div>
    <?php endif; ?>



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
include '../admin/includes/footer.php';
?>

