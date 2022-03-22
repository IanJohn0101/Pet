<div id = "navbar">
            <ul>
                <li id = "serves">
                    <a href="/Pet/user/index.php" id = "try">HOME</a>
                </li>
                <li>
                    <a href = "#">CATEGORIES</a>
                    <ul>
                        <?php echo all_cat(); ?>
                    </ul>
                </li>
                <li id = "serves"> 
                    <a href = "#" id = "try">SERVICES</a>
                </li>
                <li> <a href = "/Pet/user/index.php?donation" >DONATE</a></li>
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
    <script>
        const evs = document.getElementById('try');
        evs.addEventListener("click", function(){
            var webUrl = window.location.href;
            console.log(webUrl);
            if(webUrl == "http://localhost/Pet/user/index.php"){
                
            document.getElementById('serves').style.background = "white";
            document.getElementById('try').style.color = "#777";
            }
        })    
    </script>