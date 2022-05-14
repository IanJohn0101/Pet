<html>
    <head>
        <title>Pet Society</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href="css/style.css" />
        <link rel = "stylesheet" href="css/services.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Fredoka+One&family=Open+Sans:wght@500&family=Palette+Mosaic&family=Rubik:wght@500&family=Varela+Round&display=swap" rel="stylesheet">
    </head>

    <body>
        <?php 
            include ("inc/db.php");
            include ("inc/function.php");
            include ("inc/header.php"); 
            include ("inc/navbar.php"); 
            ?>
          <div id='main'>
          <div id = "insideDiv">
            <a class = 'servDiv' href = "service_grooming.php" style = "text-decoration: none;color:#000;"><img class = "image" src="../uploads/grooming.png" alt="">Grooming</a>
            <a class = 'servDiv' href = "service_pethotel.php" style = "text-decoration: none;color:#000;"><img class = "image2" src="../uploads/pethotel.png" alt="">Pet Hotel</a>
            <a class = 'servDiv' href = "service_training.php" style = "text-decoration: none;color:#000;"><img class = "image" src="../uploads/training.png" alt="">Training</a>
            <a class = 'servDiv' href = "service_clinic.php" style = "text-decoration: none;color:#000;"><img class = "image" src="../uploads/clinic.png" alt="">Vet Clinic</a>
            <a class = 'servDiv' href = "service_other.php" style = "text-decoration: none;color:#000;"><img class = "image" src="../uploads/otherService.png" alt="">others</a>
        </div>
        <br>
        <h3>Services Available </h3>
              <div class = 'fDogs'>
             
                   <?php viewall_services(); ?>
                   </div>
          </div>
            <?php
            include ("inc/bodyright.php"); 
            include ("inc/footer.php"); 
            ?>
  
    </body>
    <style>
        #main{
            width: 90%;
            margin-left: 5%;
        }
        .aLink{
            text-decoration: none;
            color: #777;
            padding: 5px;
            border: 1px solid black;
            border-radius: 5px;
            

        }
    </style>
</html>