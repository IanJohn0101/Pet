<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "css/signup.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&family=Palette+Mosaic&family=Rubik:wght@500&family=Varela+Round&display=swap" rel="stylesheet">
       
    </head>
    <body>
        <?php  include("inc/db.php"); ?>
        <div class = "mainContainer">
            <div class="insideDiv">
                <div class="rightSide">
                    <div class="topDiv">
                    <p id = "signUpHead">Sign Up</p> <img src="../uploads/homeS.svg" alt="" id="homies" onclick="window.location.href = 'index.php';">
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
                        <input type="text" name ="cEmail" class = "inputs" autocomplete = "username" required>
                    </div>
                    <div class="fieldCont">
                        <p class = "label">Contact No :</p>
                        <input type="number" name = "cContact" class = "inputs" required>
                    </div>
                    <div class="fieldCont">
                        <p class = "label">Password :</p>
                        <input type="password" id = "pass" class = "inputs" autocomplete = "new-password" required>
                    </div>
                    <div class="fieldCont">
                        <p class = "label">Confirm Password :</p>
                        <input type="password" id = "confirmPass" class = "inputs"  name = "cPass" autocomplete = "new-password" required>
                    </div>
                    </div>
                    <button id = "sngup" name = "signUp">Sign Up</button><br>  
                </form>
                <?php
                   

                     if(isset($_POST['signUp']))
                     {
                        $client_name = $_POST['cName'];
                        $client_address = $_POST['cAddress'];
                        $client_email = $_POST['cEmail'];
                        $client_contact = $_POST['cContact'];
                        $client_password = $_POST['cPass'];
                        $user_profilephoto = $_FILES['user2.png'];
                         $user_profilephoto_tmp = $_FILES['user2.png']['tmp_name'];
        
                      move_uploaded_file($user_profilephoto_tmp,"../uploads/user_profile/$user_profilephoto");
                     

                     $newClient = $con->prepare("INSERT INTO users_table (
                         user_username,
                         user_address,
                         user_email,
                         user_contactnumber,
                         user_password,
                         user_profilephoto
                     )VALUES (
                         '$client_name',
                         '$client_address',
                         '$client_email',
                         '$client_contact',
                         '$client_password',
                         '$user_profilephoto'
                     )");
                if($newClient->execute())
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
                
                        <img src="../uploads/signGirl.svg" alt="" id="imgLeft">
                </div>
            </div>
              
        </div>
    </body>
    <script src="js/signup.js"></script>
</html>