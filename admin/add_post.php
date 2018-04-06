<?php
include '../config/config.php';
include '../libraries/Database.php';
include '../admin/includes/header.php';
include '../helpers/format_helper.php';

//Create DB Obj
$db = new Database();

/*
* initialize
*/
//Create Query
$query = "Select * from categories";
//Run Query
$categories = $db->select($query);


/*
 * Add Post
 */
if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
    $author = mysqli_real_escape_string($db->link, $_POST['author']);
    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

    if($title!="" && $body!="" && $category!="" && $author!=""){
        $query = "INSERT INTO posts (title,body,category,author,tags) VALUES ('$title','$body','$category','$author','$tags')";

        $insert_no = $db->insert($query);

    }else{
        $error = "Please fill out all required fields";
    }
}
?>




<h2 class="">  Add New Post</h2>

<br>

<form method="post" action="add_post.php">

    <?php if(isset($error)) : ?>
        <div class="form-group">
            <label class="error"> <?php echo $error; ?> </label>
        </div>
    <?php endif; ?>


    <div class="form-group">
        <label >Post Title : </label>
        <input name="title" type="text" class="form-control" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label >Post Body : </label>
        <textarea   style="height: 200px;" name="body" type="text" class="form-control" placeholder="Enter Post Body">
        </textarea>
    </div>

    <div class="form-group">
        <label >Category : </label>
        <select name="category" class="form-control">
            <?php if($categories) : ?>
                <?php while($row = $categories->fetch_assoc()) : ?>


                    <option  value="<?php echo $row['id']; ?>" ><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="form-group">
        <label >Author : </label>
        <input name="author" type="text" class="form-control" placeholder="Enter Author Name">
    </div>
    <div class="form-group">
        <label >Tags : </label>
        <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
    </div>
    <br>
    <div class="justify-content-between">

        <input name="submit" value="Submit" type="submit" class="btn btn-primary">



        <a href="index.php"  class="btn btn-default" style="">Cancel</a>




    </div>

    <br>
</form>




<?php
include '../admin/includes/footer.php';
?>

