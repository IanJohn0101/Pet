<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <link rel = "stylesheet" href="css/style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&family=Nunito:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&family=Rubik:wght@500&family=Varela+Round&display=swap" rel="stylesheet">
    </head>
    <style>


p{
    padding: 10px;
}
.selection {
background: #28287774;
}
.hed{
    font-size: 22px;
    font-weight: bold;
    color: white;
}
.hhes{
    font-size: 22px;
    font-weight: bold;
    color: white;
}
.body{
    margin-top: 7vh;
    background: #fff;
    width: 95%;
    border-radius: 5px;
    padding: 10px;
    margin-left: 20px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;

}
.hedGrid{
    display: grid;
    grid-template-columns:10% 15% 10% 12% 12% 10% 14% 12%;
    text-align: center;
    font-weight: bold;
    border-bottom: 1px solid black;
}
.btn{
    display: flex;
}
.innerGrid{
    display: grid;
    grid-template-columns:10% 15% 10% 12% 12% 10% 14% 12%;
    text-align: center;
    
    margin-top: 20px;
}
.btnssih{
    height: 30px;
color: #fff;
border-radius: 3px;
width: 70%;
background: #5a5bf3;
border: 1px solid  #5a5bf3;
text-decoration: none;
padding: 5px;
margin-left: 15%;

}
.dets{
    height: 30px;
}
.btnssihed{
height: 30px;
color: red;
border-radius: 3px;
width: 70%;
background: none;
border: 1px solid  red;
text-decoration: none;
padding: 5px;
margin-left: 15%;
}
.noorders{
        width: 70%;
        margin-left: 15%;
        margin-top: 20vh;
        text-align: center;
        font-size: 20px;
        font-family: "Varela Round", sans-serif;
        color: white;
}
.imgw{
height: 25px;
width: 25px;
    }
</style>
    <body>
    <?php 
           
                include ("inc/db.php");
                include ("inc/function.php"); 
                include ("inc/header.php"); 
                include ("inc/navbar.php"); 
                ?>
                <div class="mainContainer">
                <div id = "bodyleft">
<div class="leftBody">
      <ul class = 'mainUl'>
        <li class =  "donate"><a href = "index.php"><img src="../uploads/donation2.1.svg" class="navicons">Donations</a></li>
            <ul class="subList">
                <li><a href="coupons.php">Coupon Application</a></li>
                <li><a href="manage_partner.php">Manage Partners</a></li>
                <li><a href="ledger.php">Ledger</a></li>
            </ul>
        <li><a href = "/Pet/admin/products.php"><img src="../uploads/sales4.svg" class="navicons">Product Inventory</a></li>
        <li><a href = "/Pet/admin/add_products.php"><img src="../uploads/box.svg" class="navicons">Add Product</a></li>
        <li class = 'selection' ><a href = "/Pet/admin/deliveries.php"><img src="../uploads/deliver.svg" class="navicons">Deliveries(<?php echo count_deliveries();?>)</a></li>
        <li><a href = "/Pet/admin/viewall_orders.php"><img src="../uploads/ord2.png" class="navicons">Orders(<?php echo count_orders();?>)</a></li>
        <li><a href= "/Pet/admin/users.php"><img src="../uploads/user.svg" class="navicons">Users</a></li> 
        <li><a href= "/Pet/admin/sales.php"><img src="../uploads/report.png" class="navicons">Generate Report</a></li>
        <li><a href= "/Pet/admin/petcenterApplication.php"><img src="../uploads/deliver.svg" class="navicons">Pet Center Application</a></li>
        </ul>
</div>
         <div div class="leftFooter">
          <div class="iconContainer">
            <img src="../uploads/settings.svg" class="footicons">
            <img src="../uploads/notification.svg" class="footicons">
        </div>
        </div>
</div>
<div id="bodyright">
<?php

include("inc/db.php");
$viewall_ords = $con->prepare("SELECT * FROM delivery_tbl");
$viewall_ords->setFetchMode(PDO:: FETCH_ASSOC);
$viewall_ords->execute();

$row = $viewall_ords->fetch();

if($row == 0)
{
    
    echo "
    <div class = 'noorders'>
    <p><img class = 'imgw' src = '../uploads/warn2.png'> NO DELIVERIES</p>
    </div>";
}
else
{

?>
<p class = 'hed'>View All Deliveries</p>
<div class = "body">
    
    <form method = "POST" enctype = "multipart/form-data">
    <div>
        <div class = 'hedGrid'>
  
            <p>Delivery Id</p>
            <p>Items</p>
            <p>Total Amount</p>
            <p>Customer</p>
            <p>Delivery Address</p>
            <p>Delivery Date </p>
            <p>Status </p>
        </div>
        <div>
            <?php
                echo viewall_deliveries(); 
                
            ?>
        </div>
        </div>
    </form>
</div>
<br>
<br>
<br>
<br>
<p class = 'hhes'>REQUEST FOR REDELIVER</p>
<div class = "body">
    
    <form method = "POST" enctype = "multipart/form-data">
    <div>
        <div class = 'hedGrid'>
  
            <p>Delivery Id</p>
            <p>Items</p>
            <p>Total Amount</p>
            <p>Customer</p>
            <p>Delivery Address</p>
            <p>Delivery Date </p>
            <p>Status</p>
        </div>
        <div>
            <?php
                echo viewall_unsuccessful_deliveries(); 
                
            ?>
        </div>
        </div>
    </form>
</div>

              
                </div>
                </div>
                
            <?php
                include ("inc/footer.php"); 
            
        ?>
    </body>
   



    <script>
        var month = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
        var today = new Date();
        var date = today.getFullYear()+'-'+month[(today.getMonth())]+'-'+today.getDate();
        var date2 = month[(today.getMonth())]+' '+today.getDate()+' '+today.getFullYear();
        document.getElementById("currentDate").innerHTML = date2;
    </script>
</html>
<?php } ?>







