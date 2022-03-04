<div id ="bodyright">
<div class="add_brand">
<h3 id = "add_cat">Inventory</h3>
    <form method = "POST">
        <table>
            <tr>
                <td>Brand Name: </td>
                <td>
                    <select name = "main_cat">
                        <?php 
                            include("inc/function.php");
                            echo viewall_cat();
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Enter Sub Category Name: </td>
                <td><input type="text" name = "sub_cat_name" /></td>
            </tr>
        </table>
        <button name = "add_sub_cat">Add Sub Category</button>
    </form>
</div>
<div class="lsit_brand">
    <h3>Overview</h3>
    <form method = "POST" enctype = "multipart/form-data">
        <table>
            <tr>
                <th>Brand Id</th>
                <th>Brand Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tr>
                <?php
                    include("inc/function.php"); 
                    echo viewall_sub_category(); 
                ?>
            </tr>
        </table>
    </form>
    </div>
</div>

<?php
   echo add_sub_cat();
?>
