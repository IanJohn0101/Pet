<html>
    <head>
        <title>Pet Society atay si ian</title>
        <link rel = "stylesheet" href="css/style.css" />
    </head>

    <body>
       
        <?php 
            include ("inc/db.php");
            include ("inc/function.php");
            include ("inc/header.php"); 
            include ("inc/navbar.php"); 
            echo "<div id='bodyleft'><ul>";
                    cat_detail(); echo"</ul>
                  </div>";
            include ("inc/bodyright.php"); 
            include ("inc/footer.php"); 
        ?>
        
        
        
        
    </body>
</html>