<div id = "bodyleft">
<p id = "blText">Admin Dashboard</p>
    <ul>
        <li><img src="../uploads/home.svg" class="navicons"> <a href = "index.php">Home</a></li>
        <li><img src="../uploads/category.png" class="navicons"><a href = "index.php?viewall_cat">Categories</a></li>
        <li><img src="../uploads/brand.png" class="navicons"><a href = "index.php?sales_inventory">Sales Inventory</a></li>
        <li><img src="../uploads/add3.png" class="navicons"><a href = "index.php?add_products">Add New Product</a></li>
        <li><img src="../uploads/view.png" class="navicons"><a href = "index.php?viewall_products">View Products</a></li>
        <li><img src="../uploads/user2.png" class="navicons1"><a href= "index.php?viewall_users">View All Users</a></li> 

    </ul>
</div>
<div class="btm">

</div>
<?php
    if(isset($_GET['viewall_cat']))
    {
        include("cat.php");
    }
    if(isset($_GET['sales_inventory']))
    {
        include("sales_inventory.php");
    }
    if(isset($_GET['viewall_products']))
    {
        include("viewall_products.php");
    }
    if(isset($_GET['add_products']))
    {
        include("add_products.php");
    }
    if(isset($_GET['viewall_users']))
    {
        include("viewall_users.php");
    }

?>
<script>
    var $li = $('#bodyleft ul li').click(function(){
        $li.removeClass('selected');
        $(this).addClass('selected');
    })
</script>