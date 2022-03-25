<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&family=Nunito:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&family=Rubik:wght@500&family=Varela+Round&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="ultiMain">
        <div class="leftMain">

        </div>
        <div class="main">
        <?php 
        include("inc/function.php");    
        call_user_func('add_pet_center_user');
        ?>
        </div>
        </div>
    </body>
</html>
<style>
    body{
        justify-content: center;
        display: flex;
        font-family: "Varela Round", sans-serif;
    }
    
    .ultiMain{
        height: 80vh;
        margin-top: 7vh;
        background: #eee;
        display: flex;
        justify-content: center;
        width: 85vw;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    }
    .main{
        display: flex;
        justify-content: center;
        background: green;
        width: 70%;
    }
    .leftMain{
        background-image: linear-gradient(#5a5bf3, #91e7d9);
        width: 30%;
    }
    #reg{
        width: 100%;
        
    }
    #frm{
      width: 100%;
    }
    #signUpForm{
        width: 100%;
        padding-left: 20px;
        background: white;
    }
    .fieldCont{
      
       
    }
    .fieldContbtn{
     
       
    }
    .data{
        display:grid;
        grid-template-columns: 50% 50%;
        grid-template-rows: 100px 100px 100px 80px;
        justify-content: center;
        column-gap: 10px;
        width: 100%;
    }
    input{
        height: 40px;
        width: 80%;
        outline: none;
        padding-left: 10px;
        border: .8px solid #888;
    }
    p{
        font-size: 14px;
        color: #777;
        padding: 0px;
       
    }
    #regBtn{
        width: 80%;
        height: 42px;
        outline: none; 
        border: none;
        border-radius: 5px;
        background:#5a5bf3;
        color: white;
        float: left;

 
    }
    #cancelBtn{
        width: 80%;
        height: 42px;
        outline: none; 
        border: 1px solid #5a5bf3;
        color: #5a5bf3;
        background: white;
        border-radius: 5px;
        margin-right: 2%;
    }
   
</style>
<script>
    const addEve = document.getElementById('cancelBtn');
    addEve.addEventListener("click", function(){
        window.location.href = '/Pet/user/login.php';
    })
</script>