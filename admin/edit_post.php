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
    $query = "Select * from posts where id=$id ";

    //Run Query
    $posts = $db->select($query);
    $post = $posts->fetch_assoc();



    //Create Query
    $query = "Select * from categories";

    //Run Query
    $categories = $db->select($query);
}



?>

<h2 class="">  Edit Post</h2>
<br>

<form method="post" action="edit_post.php">



    <div class="form-group">
        <label >Post Title : </label>
        <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $post['title']; ?>">
    </div>
    <div class="form-group">
        <label >Post Body : </label>
        <textarea style="height: 200px;" name="body" type="text" class="form-control" placeholder="Enter Post Body" value="<?php echo $post['body']; ?>">
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
                    <option <?php echo $selected; ?> ><?php echo $row['name']; ?></option>
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
include 'includes/footer.php';
?>

