<html>
    <head>
        <title>Pet Society</title>
        <link rel = "stylesheet" href="css/style.css" />
    </head>

    <body>
       
        <?php 

            include ("inc/db.php");
            include ("inc/function.php");
            include ("inc/header.php"); 
            include ("inc/navbar.php"); 
            include ("inc/bodyleft.php"); 
            include ("inc/bodyright.php"); 
            include ("inc/footer.php"); 
            echo add_cart();
            echo signUp();
            
        ?>

    </body>
</html>