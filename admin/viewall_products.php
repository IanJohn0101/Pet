<div class = "scroll" id ="bodyright">
    <h3>View Products</h3>
    <form method = "POST" enctype = "multipart/form-data">
    <table>
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Brand</th>
            <th>Product Images</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Product Key Word</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tr>
            <?php
                include("inc/function.php"); 
                echo view_all_products(); 
            ?>
        </tr>
        </table>
    </form>
</div>

