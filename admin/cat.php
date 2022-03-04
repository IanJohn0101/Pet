<div id ="bodyright">
<div class="below1">
    <h3 id = "add_cat">Add Category</h3>
    <form method = "POST">
        <table>
            <tr>
                <td>Enter Category Name: </td>
                <td><input type="text" id="input" name = "cat_name" /></td>
                <td> <button name = "add_cat" id="categoryBtn">Add Category</button></td>
            </tr>
        </table>
       
    </form>
    </div>

    <div class="above1">
    <h3>Categories</h3>
    <form method = "POST" enctype = "multipart/form-data">
        <table id="aboveTbl">
            <tr>
                <th>Category Id</th>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tr>
                <?php
                    include("inc/function.php"); 
                    echo viewall_category(); 
                ?>
            </tr>
        </table>
    </form>
    </div>
    
    
</div>

<?php
    echo add_cat();
?>
