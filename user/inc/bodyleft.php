<?php
    if(!isset($_GET['myPet'])){
    if(!isset($_GET['donation'])){
    if(!isset($_GET['orders'])){
?>
<div id = "bodyleft">
<div id = "insideDiv">
            <div class="contDiv">
            <img class = "image" src="../uploads/dog.svg" alt="">
            <a>Dog</a>
            </div>
            <div class="contDiv">
            <img class = "image2" src="../uploads/cat.svg" alt="">
            <a>Cat</a>
            </div>
            <div class="contDiv">
            <img class = "image" src="../uploads/fish.png" alt="">
            <a>Fish</a>
            </div>
            <div class="contDiv">
            <img class = "image" src="../uploads/bird.jpg" alt="">
            <a>Bird</a>
            </div>
            <div class="contDiv">
            <img class = "image" src="../uploads/spider.svg" alt="">
            <a>others</a>
            </div>
        </div>
        <div id = "slider">
        <div class="slideHead">
        <img class = "image" src="../uploads/featureProd.gif" alt="">
        <p>FEATURED PRODUCTS</p>
        </div>
       
        <iframe width="100%" height="400px"
        src="https://www.youtube.com/embed/tgbNymZ7vqY">
    </iframe>
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
    <div class="bottomDiv">
    <ul><?php echo dog_food_products(); ?></ul><br clear='all' />
    <ul><?php echo fish_food_products(); ?></ul><br clear='all' />
    </div>
   
</div><!-- <End of Bodyleft> -->
<?php }}}?>