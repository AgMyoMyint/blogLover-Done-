<?php
include 'config/config.php';
include 'libraries/Database.php';
include 'helpers/format_helper.php';
include 'includes/header.php';
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

    <?php   if($post):   ?>


        <div class="blog-post">
            <h4 class="blog-post-title"><?php echo $post['title']; ?> </h4>

            <p class="blog-post-meta">
                <?php echo formatDate($post['date']); ?> by
                <a href="#">
                    <?php echo $post['author']; ?>
                </a>
            </p>

            <?php echo $post['body']; ?>

        </div><!-- /.blog-post -->

    <?php   else :   ?>
        <p>There is no post here.<p>
    <?php   endif;   ?>











    <?php
        include 'includes/footer.php';
    ?>

