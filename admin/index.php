<?php
include '../config/config.php';
include '../libraries/Database.php';
include '../admin/includes/header.php';
include '../helpers/format_helper.php';
?>
<?php

    //Create DB Obj
    $db = new Database();


    $query= "Select posts.*,categories.name from posts 
              INNER JOIN categories 
              ON posts.category=categories.id";
    $posts = $db->select($query);



    //Create Query
    $query = "Select * from categories";
    //Run Query
    $categories = $db->select($query);

?>

<div class="blog-post">
    <h3 class=""> Admin Area </h3>
    <br>
        <table class="table table-striped">
            <tr>
                <th> Post Id#  </th>
                <th> Post Title  </th>
                <th> Category  </th>
                <th> Author </th>
                <th> Date  </th>
            </tr>
            <?php if ($posts): ?>
                <?php while($row = $posts->fetch_assoc()) : ?>
                    <tr>
                        <td> <?php echo $row['id']; ?>  </td>
                        <td>
                            <a href="edit_post.php?id=<?php echo $row['id'];?>">
                                <?php echo $row['title']; ?>
                            </a>
                        </td>
                        <td>  <?php echo $row['name']; ?>    </td>
                        <td>  <?php echo $row['author']; ?>   </td>
                        <td>  <?php echo FormatDate($row['date']); ?>   </td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </table>
        <br>
        <table class="table table-striped">
            <tr>
                <th> Category Id#  </th>
                <th> Category Name  </th>

            </tr>
            <?php if ($categories): ?>
                <?php while($row = $categories->fetch_assoc()) : ?>
                    <tr>
                        <td>  <?php echo $row['id']; ?> </td>
                        <td>
                            <a href="edid_category.php?id=<?php echo $row['id'];?>">
                                <?php echo $row['name']; ?>
                            </a>
                        </td>

                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </table>



</div>








<?php
    include 'includes/footer.php';
?>

