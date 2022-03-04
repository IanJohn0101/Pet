<div id = "header">
            <div id = "logo">
                <a href = "index.php"><img src = "../Pet/uploads/logo.png" /></a>
            </div><!-- <End of Logo> -->
            <div id = "link">
                <ul>
                    <li><a href = '#'>Donate</li>
                    <li><a href = 'signup.php'>Sign Up</li>
                    <li><a href = 'login.php'>Log In</li>
                </ul>
            </div><!-- <End of Link> -->
            <div id = "search">
                <form method = "get" action = "search.php" enctype="multipart/form-data">
                    <input type="text" name = 'user_query' placeholder = "Search products here..">
                    <button id = "search_btn" name = "search">Search</button>
                    <button id = "cart_btn"><a href = 'cart.php'>Cart (<?php echo cart_count(); ?>)</a></button>
                </form>
            </div><!-- <End of Search> -->
</div><!-- <End of Header> -->

