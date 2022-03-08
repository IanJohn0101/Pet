<div id = "header">
    <div id = "logo">
        <a href = "index.php"><img src = "../uploads/logo2.png" class="logo"/></a>
    </div><!-- <End of Logo> -->
   
   
    <div id = "search">
        <form method = "get" action = "search.php" enctype="multipart/form-data">
            <input type="text" name = 'user_query' placeholder = "Search products here..">
            <button id = "search_btn" name = "search">Search</button>
            <button id = "cart_btn"><a href = 'cart.php'>Cart (<?php echo cart_count(); ?>)</a></button>
        </form>
    </div><!-- <End of Search> -->

    
    <div id = 'link'>
        <ul>
            <?php
                if(isset($_SESSION['user_username']))
                {
                    // echo "<li>".$_SESSION['user_username']."</li>";
                    echo "<ul>
                            <li>".$_SESSION['user_username']."</li>
                            <li><a href = 'myProfile.php?username=".$_SESSION['user_username']."'>My Profile<a/></li>
                            <li><a href = 'logout.php'>Log Out</a></li>
                         </ul>";
                }
                else
                {
                    echo "<li><a href = 'login.php'>Log In</a></li>";
                    echo "<li><a href = 'signup.php'>Sign Up</a></li>";
                    echo "<li><a href = 'Donate'>Donate</a></li>";
                }
            ?>
        </ul>
    </div><!-- <End of Link> -->
</div><!-- <End of Header> -->
