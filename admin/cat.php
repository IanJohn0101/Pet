<div id ="bodyright">
<div class="addCat">
    <h3 id = "add_cat">Add Category</h3>
    <form method = "POST">
        <table>
            <tr>
                <td style="width:25%">Enter Category Name: </td>
                <td style="width:50%"><input type="text" name = "cat_name" /></td>
                <td style="width:25%">  <button name = "add_cat">Add Category</button></td>
            </tr>
        </table>
       
    </form>
    </div>

    <div class="caty">
    <h3>Categories</h3>
    <form method = "POST" enctype = "multipart/form-data">
        <table style="width:100%">
            <tr class="heads" >
                <th style='width: 5%'>Id</th>
                <th colspan = '3' style='width: 80%'>Categories</th>
               
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
