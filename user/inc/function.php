<?php
    session_start();
    function signUp()
    {
        include("inc/db.php");
        if(isset($_POST['sign_up']))
        {
            $user_username = $_POST['user_username'];
            $user_pass = $_POST['user_pass'];
            $user_email = $_POST['user_email'];
            $user_contact_number = $_POST['user_contact_number'];

            $user_img = $_FILES['user_img']['name'];
            $user_img_tmp = $_FILES['user_img']['tmp_name'];

            move_uploaded_file($user_img_tmp,"../uploads/user_profile/$user_img");

            $add_user = $con->prepare("INSERT INTO users_tbl
            (
                user_username, 
                user_pass,
                user_email,
                user_contact_number,
                user_img
            ) 
            VALUES
            (
                '$user_username',
                '$user_pass',
                '$user_email',
                '$user_contact_number',
                '$user_img'
            )");

            if($add_user->execute())
            {
                echo "<script>alert('Registration Successful!');</script>";
                echo "<script>window.open('index.php','_self');</script>";
            }
            else
            {
                echo "<script>alert('Registration Failed!');</script>";
            }
        }
    }

    function LogIn()
    {
        include("inc/db.php");
        if(isset($_POST['login_user']))
        {
            $user_username = $_POST['user_username'];
            $user_password = $_POST['user_password'];

            $fetchuser = $con->prepare("SELECT * FROM users_table WHERE user_username = '$user_username' AND user_password = '$user_password'");
            $fetchuser->setFetchMode(PDO:: FETCH_ASSOC);
            $fetchuser->execute();
            $countUser = $fetchuser->rowCount();

            $row = $fetchuser->fetch();
            $user_role = $row['user_type'];
            if($countUser>0)
            {
                switch($user_role)
                {
                    case "user":
                        $_SESSION['user_username'] = $_POST['user_username'];
                        echo "<script>window.open('index.php?login_user=".$_SESSION['user_username']."','_self');</script>";
                    break;
                    case "admin":
                        $_SESSION['admin_name'] = $_POST['user_username'];
                        echo "<script>window.open('/Pet/admin/index.php?login_user=".$_SESSION['admin_name']."','_self');</script>";
                    break;
                }
            }
            else
            {
                echo "<script>alert('Username or Password is incorrect!');</script>";
            }
        }

    }
    
    function myProfile()
    {
        include("inc/db.php");
        if(isset($_SESSION['user_username']))
        {
            $user_id = $_SESSION['user_username'];
            $fetch_user_username = $con->prepare("SELECT * FROM users_table WHERE user_username = '$user_id'");
            $fetch_user_username->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_user_username->execute();
    
            $row = $fetch_user_username->fetch();
            $id = $row['user_id'];
    
            echo 
            "<form method = 'POST' enctype='multipart/form-data'>
                <table>
                    <tr>
                        <td>Username: </td>
                        <td><input type = 'text' name =  'user_username' value = '".$row['user_username']."' /></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type = 'password' name = 'user_password' value = '".$row['user_password']."' /></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input type = 'email' name = 'user_email' value = '".$row['user_email']."' /></td>
                    </tr>
                    <tr>
                        <td>Contact Number: </td>
                        <td><input type = 'text' name = 'user_contactnumber' value = '".$row['user_contactnumber']."' /></td>
                    </tr>
                    <tr>
                        <td>Profile Photo: </td>
                        <td>
                            <input type = 'file' name = 'user_profilephoto' />
                            <img src = '../uploads/user_profile/".$row['user_profilephoto']."'  />
                        </td>
                    </tr>
                </table>
                <button name = 'update_user'>Update Profile</button>
            </form>";
    
            if(isset($_POST['update_user']))
            {
                $user_username = $_POST['user_username'];
                $user_password =  $_POST['user_password'];
                $user_contactnumber = $_POST['user_contactnumber'];
                $user_email = $_POST['user_email'];
                $user_profilephoto = $_POST['user_profilephoto'];
    
                $update_user = $con->prepare("UPDATE users_table 
                SET 
                    user_username='$user_username',
                    user_password = '$user_password',
                    user_contactnumber = '$user_contactnumber',
                    user_email = '$user_email',
                    user_profilephoto = '$user_profilephoto'
                WHERE 
                    user_id = '$id'");
    
                if($update_user->execute())
                {
                    echo "<script>alert('Your Information Successfully Updated!');</script>";
                    echo "<script>window.open('index.php?login_user=".$_SESSION['user_username']."', '_self');</script>";
                }
            }
        }
    }

    function getIp() 
    {
        $ip = $_SERVER['REMOTE_ADDR'];

        if(!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        return $ip;
    }

    function add_cart()
    {
        include("inc/db.php");
        if(isset($_POST['cart_btn']))
        {
            $pro_id = $_POST['pro_id'];
            $ip = getIp();

            $check_cart=$con->prepare("SELECT * from cart WHERE pro_id = '$pro_id' AND ip_add = '$ip'");
            $check_cart->execute();

            $row_check = $check_cart->rowCount();

            if($row_check==1)
            {
                echo "<script>alert('This product already in your cart!');</script>";
            }
            else
            {
                $add_cart = $con->prepare("INSERT INTO cart
                (
                    pro_id, 
                    qty, 
                    ip_add
                ) 
                values
                (
                    '$pro_id', 
                    '1',
                    '$ip'
                )");
                        
                if($add_cart->execute())
                {
                    echo "<script>window.open('index.php','_self');</script>";
                }
                else
                {
                    echo "<script>alert('Try Again');</script>";
                }
            }
        }
    }

    function cart_count()
    {
        include("inc/db.php");

        $ip = getIp();
        $get_cart_item = $con->prepare("SELECT * FROM cart WHERE ip_add='$ip'");
        $get_cart_item->execute();

        $count_cart = $get_cart_item->rowCount();

        echo $count_cart;
    }
    
    function cart_display()
    {
        include("inc/db.php");
        $ip = getIp();
            $get_cart_item = $con->prepare("SELECT * FROM cart WHERE ip_add='$ip'");
            $get_cart_item->setFetchMode(PDO:: FETCH_ASSOC);
            $get_cart_item->execute();
            $cart_empty = $get_cart_item->rowCount();
            
            $net_total = "0";
            if($cart_empty==0)
            {
                echo "<center><h2>No Items Found in your cart! <a href = 'index.php'>Continue Shopping</a></h2></center>";
            }
            else
            {
                if(isset($_POST['up_qty']))
                {
                    $quantity = $_POST['qty'];
    
                    foreach($quantity as $key=>$value)
                    {
                        $update_qty = $con->prepare("UPDATE cart set qty = '$value' WHERE cart_id = '$key'");
                        if($update_qty->execute())
                        {
                            echo "<script>window.open('cart.php','_self');</script>";
                        }
                    }
                }   
                echo "<table cellpadding='0' cellspacing = '0'>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sub Total</th>
                            <th>Remove</th>
                        </tr>";
                while($row=$get_cart_item->fetch()):
                    $pro_id = $row['pro_id'];
    
                    $get_pro = $con->prepare("SELECT * FROM product_tbl WHERE pro_id = '$pro_id'");
                    $get_pro->setFetchMode(PDO:: FETCH_ASSOC);
                    $get_pro->execute();
                    $row_pro = $get_pro->fetch();
    
                    echo"<tr>
                            <td>
                                <img src ='../uploads/products/".$row_pro['pro_img']."' />
                            </td>
                            <td>
                                ".$row_pro['pro_name']."
                            </td>
                            <td>
                                <input type ='text'  name = 'qty[".$row['cart_id']."]' value='".$row['qty']."' /><input type = 'submit' name = 'up_qty' value = 'Save' />
                            </td>
                            <td>P".$row_pro['pro_price']."</td>
                            <td>";
                                $qty = $row['qty'];
                                $pro_price = $row_pro['pro_price'];
                                $sub_total = $pro_price*$qty;
                                echo $sub_total;
    
                                $net_total = $net_total + $sub_total;
                            echo"</td>
                            <td><a href = 'delete.php?delete_id=".$row_pro['pro_id']."'>Delete</a></td>
                        </tr>";
                endwhile;
                echo "<tr>
                        <td></td>
                        <td>
                            <button id = 'buy_now'><a href = 'index.php'>Choose Another Product</a></button>
                        </td>
                        <td>
                            <button id = 'buy_now'>Checkout</button>
                        </td>
                    
                        <td>
                            <b>Net Total: </b>
                        </td>
                        <td>
                            <b>P$net_total</b>
                        </td>
                    </tr>";
                echo "<div class = 'Coupon'>
                        <h2>Apply Coupon Code: </h2>
                            <input type = 'text' name = 'coupon_code' />
                            <input type = 'submit' name = 'coupon_code' value = 'Verify' />
                    </div>";
            }            
    }

    function delete_cart_items()
    {
        include("inc/db.php");
        if(isset($_GET['delete_id']))
        {
            $pro_id = $_GET['delete_id'];
            $delete_pro = $con->prepare("DELETE FROM cart WHERE pro_id = '$pro_id'");
            
            if($delete_pro->execute())
            {
                echo "<script>alert('Item Removed Successfully!');</script>";
                echo "<script>window.open('cart.php', '_self');</script>";
            }
        }
    }
    
    function dog_food_products()
    {
        include("inc/db.php");

        $fetch_cat = $con->prepare("SELECT * FROM pet_prod WHERE prod_id='1'");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();

        $row_cat=$fetch_cat->fetch();
        $cat_id = $row_cat['prod_id'];
        echo"<h3>".$row_cat['cat_name']."</h3>";

        $fetch_pro = $con->prepare("select * from product_tbl where cat_id='$cat_id' LIMIT 0,3");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        while($row_pro = $fetch_pro->fetch()):
            echo"
                <li>
                    <form method = 'post' enctype='multipart/form-data'>
                    <a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                        <h4>".$row_pro['pro_name']."</h4>
                        <img src ='../uploads/products/".$row_pro['pro_img']."' />
                        <center>
                            <button id = 'pro_btn'>
                                <a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a>
                            </button>
                            <input type = 'hidden' value = '".$row_pro['pro_id']."' name = 'pro_id' />
                            <button id = 'pro_btn' name = 'cart_btn'>
                            Cart
                            </button>
                            <button id = 'pro_btn'>
                                <a href = '#'>Wishlist</a>
                            </button>
                        </center>
                    </a>
                    </form>
                </li>
                ";
        endwhile;
    }

    function fish_food_products()
    {
        include("inc/db.php");

        $fetch_cat = $con->prepare("SELECT * FROM pet_prod WHERE prod_id='4' LIMIT 0,3");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();

        $row_cat=$fetch_cat->fetch();
        $cat_id = $row_cat['prod_id'];
        echo"<h3>".$row_cat['cat_name']."</h3>";

        $fetch_pro = $con->prepare("select * from product_tbl where cat_id='$cat_id'");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        while($row_pro = $fetch_pro->fetch()):
            echo"
                <li>
                    <form method = 'post' enctype='multipart/form-data'>
                    <a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                        <h4>".$row_pro['pro_name']."</h4>
                        <img src ='/uploads/products/".$row_pro['pro_img']."' />
                        <center>
                            <button id = 'pro_btn'>
                                <a href = 'pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a>
                            </button>
                            <input type = 'hidden' value = '".$row_pro['pro_id']."' name = 'pro_id' />
                            <button id = 'pro_btn' name = 'cart_btn'>Cart
                            </button>
                            <button id = 'pro_btn'>
                                <a href = '#'>Wishlist</a>
                            </button>
                        </center>
                    </a>
                    </form>
                </li>
                ";
        endwhile;
    }

    function pro_details()
    {
        include("inc/db.php");

        if(isset($_GET['pro_id']))
        {
            $pro_id = $_GET['pro_id'];
            $pro_fetch=$con->prepare("SELECT * FROM product_tbl WHERE pro_id = '$pro_id'");
            $pro_fetch->setFetchMode(PDO:: FETCH_ASSOC);
            $pro_fetch->execute();

            $row_pro = $pro_fetch->fetch();
            $cat_id = $row_pro['cat_id'];
            echo 
                "<div id = 'pro_img'>
                    <img src ='../uploads/products/".$row_pro['pro_img']."'/>
                    <ul>
                        <li>
                            <img src ='../uploads/products/".$row_pro['pro_img']."'/>
                        </li>
                        <li>
                            <img src ='../uploads/products/".$row_pro['pro_img2']."'/>
                        </li>
                        <li>
                            <img src ='../uploads/products/".$row_pro['pro_img3']."'/>
                        </li>
                        <li>
                            <img src ='../uploads/products/".$row_pro['pro_img4']."'/>
                        </li>
                    </ul>
                  </div>
                  <div id = 'pro_brand'>
                    <h3>".$row_pro['pro_name']."</h3>
                    <ul>
                        <li>
                            
                        </li>
                    </ul>
                    <ul>

                    </ul><br clear = 'all'>
                    <center>
                        <h4>Price: ".$row_pro['pro_price']."</h4>
                        <form method = 'POST'>
                            <input type = 'hidden' value = '".$row_pro['pro_id']."' name = 'pro_id' />
                            <button name = 'buy_now' id = 'buy_now' style = color:#000>Buy Now</button>
                            <button name = 'cart_btn'>Add to Cart</button>
                        </form>
                    </center>
                </div><br clear = 'all'>    
                <div id = 'sim_pro'>
                    <h3>Related Products</h3>
                    <ul>";
                        echo add_cart();
                        $sim_pro = $con->prepare("SELECT * from product_tbl WHERE pro_id!=$pro_id AND cat_id='$cat_id' LIMIT 0,5");
                        $sim_pro->setFetchMode(PDO:: FETCH_ASSOC);
                        $sim_pro->execute();

                        while($row=$sim_pro->fetch()):
                            echo "<li>
                                    <a href = 'pro_detail.php?pro_id=".$row['pro_id']."'>
                                        <img src ='../uploads/products/".$row['pro_img']."'/>
                                        <p>Product Name: ".$row['pro_name']."</p>
                                        <p>Price: ".$row['pro_price']."</p>
                                    </a>
                                  </li>";
                        endwhile;
                    echo "</ul>";
                "</div>";
            ;            
        }
    }

    function all_cat() 
    {
        include("inc/db.php");
        $all_cat = $con->prepare("SELECT * FROM pet_prod");
        $all_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $all_cat->execute();

        while($row=$all_cat->fetch()):
            echo "<li>
                    <a href = 'cat_detail.php?cat_id=".$row['prod_id']."'>
                        ".$row['cat_name']."
                    </a>
                  </li>";
        endwhile;
    }

    function cat_detail()
    {
        include("inc/db.php");

        if(isset($_GET['cat_id']))
        {
            $cat_id = $_GET['cat_id'];
            $cat_pro = $con->prepare("SELECT * FROM product_tbl where cat_id = '$cat_id'");
            $cat_pro->setFetchMode(PDO:: FETCH_ASSOC);
            $cat_pro->execute();
            
            $fetch_cat_name = $con->prepare("SELECT * FROM pet_prod WHERE prod_id='$cat_id'");
            $fetch_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat_name->execute();
    
            $row_cat=$fetch_cat_name->fetch();
            $cat_id = $row_cat['prod_id'];
            echo"<h3>".$row_cat['cat_name']."</h3>";

            while($row_cat = $cat_pro->fetch()):
                echo"
                    <li>
                        <a href='pro_detail.php?pro_id=".$row_cat['pro_id']."'>
                            <h4>".$row_cat['pro_name']."</h4>
                            <img src ='../uploads/products/".$row_cat['pro_img']."' />
                            <center>
                                <button id = 'pro_btn'>
                                    <a href = 'pro_detail.php?pro_id=".$row_cat['pro_id']."'>View</a>
                                </button>
                                <button id = 'pro_btn'>
                                    <a href = '#'>Cart</a>
                                </button>
                                <button id = 'pro_btn'>
                                    <a href = '#'>Wishlist</a>
                                </button>
                            </center>
                        </a>
                    </li>
                    ";
            endwhile;
        }
    }

    function search() {
        include("inc/db.php");

        if(isset($_GET['search']))
        {
            $user_query = $_GET['user_query'];
            $search = $con->prepare("SELECT * from product_tbl WHERE pro_name LIKE '%$user_query%' or pro_keyword LIKE '%$user_query%'");
            $search->setFetchMode(PDO:: FETCH_ASSOC);
            $search->execute();

            echo "<div id = 'bodyleft'><ul>";
            if($search->rowCount() == 0){
                echo "<h2>Product Not Found</h2>";
            }
            else
            {
                while($row=$search->fetch()):
                    echo"
                        <li>
                            <a href='pro_detail.php?pro_id=".$row['pro_id']."'>
                                <h4>".$row['pro_name']."</h4>
                                <img src ='./uploads/products/".$row['pro_img']."' />
                                <center>
                                    <button id = 'pro_btn'>
                                        <a href = 'pro_detail.php?pro_id=".$row['pro_id']."'>View</a>
                                    </button>
                                    <button id = 'pro_btn' name = 'cart_btn'>
                                    Cart
                                    </button>
                                    <button id = 'pro_btn'>
                                        <a href = '#'>Wishlist</a>
                                    </button>
                                </center>
                            </a>
                        </li>
                        ";
                endwhile;
            }
            echo "</ul></div>";
        }
    }
?>
