<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "css/signup.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&family=Palette+Mosaic&family=Rubik:wght@500&family=Varela+Round&display=swap" rel="stylesheet">
       
    </head>
    <body>
        <div class = "mainContainer">
            <div class="insideDiv">
                <div class="rightSide">
                    <div class="topDiv">
                    <p id = "signUpHead">Sign Up</p> <img src="../img/home.svg" alt="" id="homies" onclick="window.location.href = 'index.php';">
                    </div>
                
                <form method = "POST" enctype = 'multipart/form-data'>
                    <div class="fieldMain">
                    <div class="fieldCont">
                        <p class = "label">Name:</p>
                        <input type="text" name = "cName" class = "inputs" required>
                    </div>
                    <div class="fieldCont">
                        <p class = "label">Address:</p>
                        <input type="text" name = "cAddress" class = "inputs" required>
                    </div>

                    <div class="fieldCont">
                        <p class = "label">Email:</p>
                        <input type="text" name ="user_email" class = "inputs" autocomplete = "username" required>
                    </div>
                    <div class="fieldCont">
                        <p class = "label">Contact No :</p>
                        <input type="number" name = "user_contactnumber" class = "inputs" required>
                    </div>
                    <div class="fieldCont">
                        <p class = "label">Password :</p>
                        <input type="password" id = "pass" class = "inputs" autocomplete = "new-password" required>
                    </div>
                    <div class="fieldCont">
                        <p class = "label">Confirm Password :</p>
                        <input type="password" id = "confirmPass" class = "inputs"  name = "user_password" autocomplete = "new-password" required>
                    </div>
                    </div>
                    <button id = "sngup" name = "signUp">Sign Up</button><br>  
                </form>
                <?php


                   include("inc/db.php");
                   if(isset($_POST['signUp']))
                   {
                       $user_username = $_POST['user_username'];
                       $user_password = $_POST['user_password'];
                       $user_email = $_POST['user_email'];
                       $user_contactnumber = $_POST['user_contactnumber'];
           
                       $user_profilephoto = $_FILES['user_profilephoto']['name'];
                       $user_profilephoto_tmp = $_FILES['user_profilephoto']['tmp_name'];
                   
                       move_uploaded_file($user_profilephoto_tmp,"../uploads/user_profile/$user_profilephoto");
           
                       $add_users = $con->prepare("INSERT INTO users_table (
                           user_username,
                           user_password,
                           user_email,
                           user_contactnumber,
                           user_profilephoto
                       ) 
                       VALUES (
                           '$user_username',
                           '$user_password',
                           '$user_email',
                           '$user_contactnumber',
                           '$user_profilephoto'
                       )");
           

           
           if($add_users->execute())
           {
            echo "<script>alert('Registration Successfull!');</script>"; 
            echo "<script>
            if ( window.history.replaceState ) {
               window.history.replaceState( null, null, window.location.href );
           }            
            </script>";
           }
           else
           {
               echo "<script>alert('Registration Unsuccessfull!');</script>";
           }
                   }

                ?>
                </div>
                <div class="leftSide">
                
                        <img src="../img/signUp.svg" alt="" id="imgLeft">
                </div>
            </div>
              
        </div>
    </body>
    <script src="jscripts/signup.js"></script>
</html>