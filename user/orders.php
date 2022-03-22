<html>
    <head>

    </head>
    <body>
        <div class="main">
        <div class="left">

            <div class="ordersBtn">
                <a id= "orderBtnid"onclick = "orderBtn()"><img src = "../uploads/orderIcon.svg" style = "margin-right: 10px;height: 20px; width: 20px;">Orders</a>
            </div>
            <div class="purchase">
            <a id = "pur" onclick = "purBtn()"><img src = "../uploads/buy.svg" style = "margin-right: 10px;height: 20px; width: 20px;">Purchase</a>
            </div>
            <div class="transactions">
            <a id = "trans" onclick = "transBtn()" ><img src = "../uploads/deal.svg" style = "margin-right: 10px;height: 20px; width: 20px;">Transactions</a>
            </div>
        </div>
       
        <div class="right">

           <div id="ordersCont">
           <?php
    session_start();
    if(!isset($_SESSION['user_username']))
    {
        header("Location: login.php");
    }
    else
    {
        include("inc/db.php");
        $user_id = $_SESSION['user_username'];
        $fetch_user_username = $con->prepare("SELECT * FROM users_table WHERE user_username = '$user_id'");
        $fetch_user_username->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_user_username->execute();

        $display_cart = $con->prepare("SELECT * FROM product_tbl WHERE pro_id IN (".implode(',',$_SESSION['cart']).")");
        $display_cart->setFetchMode(PDO:: FETCH_ASSOC);
        $display_cart->execute();
    
        $row_user = $fetch_user_username->fetch();

       echo "Product Details:";
        while($row = $display_cart->fetch()):
        echo 
        "<form method = 'POST' enctype = 'multipart/form-data'>
            <div>
                <tr>";
                echo "Product Name: ";
                echo"
                    <td><input type = 'hidden' name = 'pro_id' value = ".$row['pro_id']." /></td>
                    <td>".$row['pro_name']."</td><br>
                </tr>";
        endwhile;
            echo"
                <tr>
                    <td>Total Cart Items: </td>
                    <td><input type = 'hidden' name = 'qty' value = ".count($_SESSION['cart'])." /></td>
                    <td>".count($_SESSION['cart'])."</td><br>
                </tr>";
            echo"
                <tr>
                    <td>Total Amount to be Paid: </td>
                    <td><input type = 'hidden' name = 'total_value' value = ".$_GET['net_total']." /></td>
                    <td>".$_GET['net_total']."</td><br><br>
                </tr>";
            
            echo "
                <tr>
                    <td>Your Information ⬇ </td><br>
                </tr>
                <tr>
                    <td>Your Name: </td>
                    <td><input type = 'hidden' name = 'user_username' value = ".$row_user['user_id']." /></td>
                    <td>".$row_user['user_username']."</td><br>
                </tr>
                <tr>
                    <td>Contact Number: </td>
                    <td><input type = 'hidden' name = 'user_contactnumber' value = ".$row_user['user_contactnumber']." /></td>
                    <td>".$row_user['user_contactnumber']."</td><br>
                </tr>
                <tr>
                    <td>Location: </td>
                    <td><input type = 'hidden' name = 'user_address' value = ".$row_user['user_address']." /></td>
                    <td>".$row_user['user_address']."</td><br>
                </tr>
                <tr>
                    <td>Email Address: </td>
                    <td><input type = 'hidden' name = 'user_email' value = ".$row_user['user_email']." /></td>
                    <td>".$row_user['user_email']."</td><br>
                </tr>
                <tr>
                    <td><button name = 'place_order'>Place Order</button></td>
                </tr>
                <tr>
                    <td><a href = 'index.php'>Go Home</a></td>
                </tr>
            </div>
        </form>";
        
        
        if(isset($_POST['place_order']))
        {
            $userID = $_POST['user_username']; 
            $cart_items = $_POST['pro_id']; 
            $qty = $_POST['qty'];
            $total_amount = $_POST['total_value'];

            $query = $con->prepare("INSERT INTO order_tbl (
                user_id,
                pro_id,
                qty,
                total_amount
            )
            VALUES (
                '$userID',
                '$cart_items',
                '$qty',
                '$total_amount'
            )");

            if($query->execute())
            {
                echo "<script>alert('Ordered Successfully!');</script>";
                unset($_SESSION['cart']);
                echo "<script>window.open('index.php', '_self');</script>";
            }
            else
            {
                echo "<script>alert('Unsuccessful!');</script>";
            }
        }
    }
?>

           </div>


        </div>
        
        </div>
       
    </body>
    <style>
        body{
            
        }
        .left{
            width: 15vw;
            height: 85vh;
            background: white;
            display: inline-flex;
           margin-left: 10px;
           margin-top: 30px;
            flex-direction: column;
        }
        .right{
            width: 80vw;
            background: #eee;
            height: 80vh;
            margin-top: 10px;
            border-radius: 10px;

        }
        .main{
            display: flex;
        }
        .ordersBtn{
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
      
        }
        .ordersBtn a{
            color: #444;
            background: #5AF3A6;
            padding-top: 20px;
            padding-bottom: 20px;
            width: 80%;
            text-align: left;
            padding-left: 10px;
            border-radius: 7px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            text-decoration: none;
        }
        .ordersBtn a:hover{
            background: #5AF3A6;
            transition: .8s;
        }
        .purchase{
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
      
        }
        .purchase a{
            color: #777;
            background: #fff;
            padding-top: 20px;
            padding-bottom: 20px;
            width: 80%;
            text-align: left;
            padding-left: 10px;
            border-radius: 7px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }
        .purchase a:hover{
            background: #5AF3A6;
            transition: .8s;
        }
        
        .transactions{
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
      
        }
        .transactions a{
            color: #777;
            background: #fff;
            padding-top: 20px;
            padding-bottom: 20px;
            width: 80%;
            text-align: left;
            padding-left: 10px;
            border-radius: 7px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }
        .transactions a:hover{
            background: #5AF3A6;
            transition: .8s;
        }
        .right{
            padding: 10px;
        }
        
    </style>
    <script>
        function orderBtn() {
         document.getElementById("orderBtnid").style.background = "#5AF3A6";
         document.getElementById("orderBtnid").style.color = "black";
         document.getElementById("pur").style.color = "#777";
         document.getElementById("trans").style.color = "#777";
         document.getElementById("pur").style.background = "white";
         document.getElementById("trans").style.background = "white";

         document.getElementById("ordersCont").style.display = "inline";
        }

        function purBtn() {
         document.getElementById("orderBtnid").style.background = "white";
         
         document.getElementById("pur").style.background = "#5AF3A6";
         document.getElementById("pur").style.color = "black";
         document.getElementById("orderBtnid").style.color = "#777";
         document.getElementById("trans").style.color = "#777";
         document.getElementById("trans").style.background = "white";

         document.getElementById("ordersCont").style.display = "none";
        }
        function transBtn() {
         document.getElementById("orderBtnid").style.background = "white";
         document.getElementById("pur").style.background = "white";
         document.getElementById("trans").style.background = "#5AF3A6";
         document.getElementById("trans").style.color = "black";
         document.getElementById("orderBtnid").style.color = "#777";
         document.getElementById("pur").style.color = "#777";

         document.getElementById("ordersCont").style.display = "none";
        }
    </script>
</html>