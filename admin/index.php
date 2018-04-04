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

<div class="blog-post">
    <h4 class="blog-post-title"> Admin Area </h4>

        <table class="table table-striped">
            <tr>
                <th> Post Id#  </th>
                <th> Post Title  </th>
                <th> Category  </th>
                <th> Author </th>
                <th> Date  </th>
            </tr>
            <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td>   </td>
            </tr>
        </table>

        <table class="table table-striped">
            <tr>
                <th> Category Id#  </th>
                <th> Category Name  </th>

            </tr>
            <tr>
                <td>   </td>
                <td>   </td>

            </tr>
        </table>



</div>








<?php
    include 'includes/footer.php';
?>

