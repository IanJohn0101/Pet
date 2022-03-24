function orderBtn() {
    document.getElementById("orderBtnid").style.background = "#5AF3A6";
    document.getElementById("orderBtnid").style.color = "black";
    document.getElementById("pur").style.color = "#777";
    document.getElementById("trans").style.color = "#777";
    document.getElementById("pur").style.background = "white";
    document.getElementById("trans").style.background = "white";

    document.getElementById("ordersCont").style.display = "inline";
   }

   function purBtn() {
    document.getElementById("orderBtnid").style.background = "white";
    
    document.getElementById("pur").style.background = "#5AF3A6";
    document.getElementById("pur").style.color = "black";
    document.getElementById("orderBtnid").style.color = "#777";
    document.getElementById("trans").style.color = "#777";
    document.getElementById("trans").style.background = "white";

    document.getElementById("ordersCont").style.display = "none";
   }
   function transBtn() {
    document.getElementById("orderBtnid").style.background = "white";
    document.getElementById("pur").style.background = "white";
    document.getElementById("trans").style.background = "#5AF3A6";
    document.getElementById("trans").style.color = "black";
    document.getElementById("orderBtnid").style.color = "#777";
    document.getElementById("pur").style.color = "#777";

    document.getElementById("ordersCont").style.display = "none";
   }