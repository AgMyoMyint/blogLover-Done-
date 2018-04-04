<?php
include 'config/config.php';
include 'libraries/Database.php';
include 'includes/header.php';
include 'helpers/format_helper.php';
?>
<?php

//Create DB Obj
$db = new Database();

//Create Query
$query = "Select * from posts";

//Run Query
$posts = $db->select($query);



//Create Query
$query = "Select * from categories";

//Run Query
$categories = $db->select($query);


?>

<?php   if($posts):   ?>
    <?php while($row = $posts->fetch_assoc()) : ?>

        <div class="blog-post">
            <h4 class="blog-post-title"><?php echo $row['title']; ?> </h4>
            <p class="blog-post-meta">


                <?php echo formatDate($row['date']); ?> by

                <a href="#">
                    <?php echo $row['author']; ?>
                </a>

            </p>

            <?php echo shortenText($row['body'] ); ?>

            <div class="alignright">
                <a class="continue-reading" href="post.php?id=<?php echo urlencode($row["id"]); ?>">
                    Read More >>
                </a>
            </div>

        </div><!-- /.blog-post -->



    <?php endwhile;  ?>
<?php   else :   ?>
<p>There is no post here.<p>
    <?php   endif;   ?>



    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#"> Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>



    <?php
    include 'includes/footer.php';
    ?>

