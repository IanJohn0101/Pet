document.getElementById("sngup").addEventListener("click", function(){ 
    var str1 = document.getElementById("confirmPass").value;
    var str2 =document.getElementById("pass").value;
    var ans = str1.localeCompare(str2);
    if(!ans){
        document.getElementById("confirmPass").style.color = "green";
    }
    else{
        document.getElementById("confirmPass").style.color = "red";
    }
 });

   