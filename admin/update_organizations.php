<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <link rel = "stylesheet" href="css/style.css" />
        <link rel = "stylesheet" href="css/updateOrd.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&family=Nunito:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&family=Rubik:wght@500&family=Varela+Round&display=swap" rel="stylesheet">
    </head>

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
                <li class = 'selection' ><a href="manage_partner.php">Manage Partners</a></li>
                <li><a href="ledger.php">Ledger</a></li>
            </ul>
        <li><a href = "/Pet/admin/products.php"><img src="../uploads/sales4.svg" class="navicons">Products</a></li>
        <li><a href = "/Pet/admin/add_products.php"><img src="../uploads/box.svg" class="navicons">Add Product</a></li>
        <li><a href = "/Pet/admin/viewall_products.php"><img src="../uploads/deliver.svg" class="navicons">Deliveries(<?php echo count_deliveries();?>)</a></li>
        <li><a href = "/Pet/admin/viewall_orders.php"><img src="../uploads/deliver.svg" class="navicons">Orders(<?php echo count_orders();?>)</a></li>
        <li><a href= "/Pet/admin/viewall_coupons.php"><img src="../uploads/coupon.svg" class="navicons">Coupons</a></li> 
        <li><a href= "/Pet/admin/users.php"><img src="../uploads/user.svg" class="navicons">Users</a></li> 
        <li><a href= "/Pet/admin/sales.php"><img src="../uploads/deliver.svg" class="navicons">Sales Inventory</a></li>
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
<p class = 'hed'>Edit Organization</p>
<div class = 'body'>
<?php
    include("inc/db.php");

    if(isset($_POST['edit_org']))
    {
        $id = $_POST['edit_org'];
        $edit_details = $con->prepare("SELECT * FROM organizations WHERE id = '$id'");
        $edit_details->setFetchMode(PDO:: FETCH_ASSOC);
        $edit_details->execute();

        $row = $edit_details->fetch();

        echo
        "<form method = 'POST' action = 'edit_org.php' enctype = 'multipart/form-data'>
        <div class = 'formGrid'>
            <div class = 'inbodsDiv'>
                <p class = 'labes'>Organization Name</p>
                <input class = 'inp' type = 'text' name = 'org_name' value = '".$row['org_name']."' />
            </div>
            <div>
            <p class = 'labes'>Location</p>
                <input class = 'inp' type = 'text' name = 'org_location' value = '".$row['org_location']."' />
            </div>
            <tr>
                <td><input type = 'text' name = 'org_contact_number' value = '".$row['org_contact_number']."' /></td>
            </tr><br>
            <tr>
                <td><input type = 'text' name = 'org_email_address' value = '".$row['org_email_address']."' /></td>
            </tr><br>
            <tr>
                <td><input type = 'text' name = 'bank_details' value = '".$row['bank_details']."' /></td>
            </tr><br>
            <tr>
                <td><input type = 'text' name = 'website' value = '".$row['website']."' /></td>
            </tr><br>
            <tr>
                <td><input type = 'text' name = 'paymaya' value = '".$row['paymaya']."' /></td>
            </tr><br>
            <tr>
                <td><input type = 'text' name = 'org_manager' value = '".$row['org_manager']."' /></td>
            </tr><br>
            <tr>
                <td><input type = 'text' name = 'facebook' value = '".$row['facebook']."' /></td>
            </tr><br>
            
            <button name = 'update' value = ".$row['id'].">Update</button>
            </div>
        </form>
        <form method = 'POST' enctype = 'multipart/form-data'>
        <tr>
                <td><input type = 'file' name = 'org_photo' value = '".$row['org_photo']."' required/></td>
            </tr><br>
            <button name = 'update_img'>Update Image<button>
        </form>";
    
        
      
    
    }
    if(isset($_POST['delete_org']))
    {
        $id = $_POST['delete_org'];
        $delete_org =$con->prepare("DELETE FROM organizations WHERE id = '$id'");
        $delete_org->setFetchMode(PDO:: FETCH_ASSOC);
        $delete_org->execute();

        if($delete_org->execute())
        {
            echo "<script>alert('Deleted Successfully!');</script>";
        }
    }

    if(isset($_POST['update_img']))
    {
        $org_photo = $_FILES['org_photo']['name'];
        $org_photo_tmp = $_FILES['org_photo']['tmp_name'];

        move_uploaded_file($org_photo_tmp,"../uploads/orgs/$org_photo");

        $upd_img = $con->prepare("UPDATE organizations SET org_photo = '$org_photo' WHERE id = '$id'");
        if($upd_img->execute())
        {
            echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.open('manage_partner.php', '_self');</script>";
        }

    }
?>

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






