<div id = "bodyleft">

<div class="leftBody">
<ul>
        <li><a href = "index.php"><img src="../uploads/donation2.1.svg" class="navicons">Donations</a></li>
            <ul class="subList">
                <li>Manage Donations</li>
                <li>Manage Partners</li>
                <li>Ledger</li>
            </ul>
        <li><a href = "index.php?cat"><img src="../uploads/categories3.svg" class="navicons">Categories</a></li>
        <li><a href = "index.php?sales_inventory"><img src="../uploads/sales4.svg" class="navicons">Sales Inventory</a></li>
        <li><a href = "index.php?add_products"><img src="../uploads/box.svg" class="navicons">Product Management</a></li>
        <li><a href = "index.php?viewall_products"><img src="../uploads/deliver.svg" class="navicons">Deliveries</a></li>
        <li><a href= "index.php?viewall_users"><img src="../uploads/coupon.svg" class="navicons">Coupons</a></li> 
        <li><a href= "index.php?viewall_users"><img src="../uploads/user.svg" class="navicons">View All Users</a></li> 

    </ul>
</div>
    <div class="leftFooter">
        <div class="iconContainer">
            <img src="../uploads/settings.svg" class="footicons">
            <img src="../uploads/notification.svg" class="footicons">
        </div>
    </div>
</div>

<?php
    if(isset($_GET['cat']))
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