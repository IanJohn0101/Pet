<div id = "navbar">
            <ul>
                <li>
                    <a href="/Pet/user/index.php">HOME</a>
                </li>
                <li>
                    <a href = "#">CATEGORIES</a>
                    <ul>
                        <?php echo all_cat(); ?>
                    </ul>
                </li>
                <li> 
                    <a href = "#">SERVICES</a>
                </li>
                <li> <a href = "/Pet/user/index.php?donation">DONATE</a></li>
                <li> <a href = "/Pet/user/index.php?myPet">MY PET</a></li>
                <li> <a href = "/Pet/user/index.php?orders">ORDERS</a></li>
            </ul>
        </div>
        <?php
        if(isset($_GET['myPet'])){
            include("myPet.php");
        }
        if(isset($_GET['donation'])){
            include("donate.php");
        }
        if(isset($_GET['orders'])){
            include("orders.php");
        }
    ?>