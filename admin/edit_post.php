<?php
include '../config/config.php';
include '../libraries/Database.php';
include '../admin/includes/header.php';
include '../helpers/format_helper.php';


//Create DB Obj
$db = new Database();


/*
 * Initialize Category
 */
if(isset($_GET['id'])){
    $id = $_GET['id'];

    //Create Query
    $query = "Select * from posts where id=$id ";

    //Run Query
    $posts = $db->select($query);
    $post = $posts->fetch_assoc();

}
//Create Query
$query = "Select * from categories";
//Run Query
$categories = $db->select($query);



/*
 * Update Post
 */
if(isset($_POST['submit'])){
    $id = $_GET['id'];

    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
    $author = mysqli_real_escape_string($db->link, $_POST['author']);
    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

    if($title=="" || $body=="" || $category=="" || $author==""  ){
        $error = "Please fill out all required fields";

    }else{
        $query = "UPDATE posts SET title = '$title', body= '$body', category= '$category' , author= '$author' , tags= '$tags' WHERE id=$id";

        $insert_no = $db->update($query);
    }
}


/*
 * Delete Post
 */
if(isset($_POST['delete'])){
    $id = $_GET['id'];

    $query = "Delete from posts where id=$id";

    $delete_key = $db->delete($query);

    if($delete_key){
        //$success = "Your New Post is Deleted successfully.";
    }else{
        $error = "Something wrong and your request is not completed.....";

    }
}

?>

<h2 class="">  Edit Post </h2>
<br>

<form method="post" action="edit_post.php?id=<?php echo $post['id']; ?>" >

    <?php if(isset($error)) : ?>
        <div class="form-group">
            <label class="error"> <?php echo $error; ?> </label>

        </div>
    <?php endif; ?>

    <div class="form-group">
        <label >Post Title : </label>
        <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $post['title']; ?>">
    </div>
    <div class="form-group">
        <label >Post Body : </label>
        <textarea style="height: 200px;" name="body" type="text" class="form-control" placeholder="Enter Post Body" >
            <?php echo $post['body']; ?>
        </textarea>
    </div>

    <div class="form-group">
        <label >Category : </label>
        <select name="category" class="form-control">
            <?php if($categories) : ?>
                <?php while($row = $categories->fetch_assoc()) : ?>

                    <?php
                    if($row['id']==$post['category']) {

                        $selected = "selected";
                    }else{
                        $selected = "";
                    }
                    ?>
                    <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>  ><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="form-group">
        <label >Author : </label>
        <input name="author" type="text" class="form-control" placeholder="Enter Author Name"  value="<?php echo $post['author']; ?>">
    </div>
    <div class="form-group">
        <label >Tags : </label>
        <input name="tags" type="text" class="form-control" placeholder="Enter Tags"  value="<?php echo $post['tags']; ?>">
    </div>
    <br>
    <div class="justify-content-between">

        <input name="submit" value="Update" type="submit" class="btn btn-primary">



        <input name="delete" value="Delete" type="submit" class="btn btn-danger" style="display: flex;">




    </div>
    <br>
    <div class="justify-content-end">
        <a href="index.php"  class="btn btn-default" style="">Cancel</a>
    </div>


    <br>
</form>




<?php
include '../admin/includes/footer.php';
?>

