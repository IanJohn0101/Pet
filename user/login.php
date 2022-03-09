<html>
    <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&family=Nunito:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&family=Rubik:wght@500&family=Varela+Round&display=swap" rel="stylesheet">
    </head>
    <body>
    <?php 
    include("inc/function.php");
    echo LogIn();
    ?>
        <div id ="log">
            <div class="container">
              <h3>Welcome to Pet Society</h3>
                    <form method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"; enctype = "multipart/form-data">
                        <p>Enter Username: </p>
                        <input type="text" name = "user_username" />
                        <p>Enter Password: </p>
                        <input type="password" name = "user_password" /> <br/>
                         <button name = "login_user" id = "login_user">Log In</button>
                     </form>
            </div>
        </div>


    </body>
<style>
*{
    font: optional;
    font-family: "Nunito", sans-serif;

    
}
#log {
    margin-left: 5vw;
    margin-right: 5vw;
    border-radius: 5px;
    width: 80vw;
    background: white;
    padding: 10px;
    display: flex;
    justify-content: center;
}
#login_user{
    border-radius: 10px;
}
.container{
    width: 80%;
    background: #eee;
    border-radius: 5px;
    text-align: center;
   
}

</style>
</html>

