<?php
    function add_cat() 
    {
        include("inc/db.php");
        if(isset($_POST['add_cat']))
        {
            $cat_name = $_POST['cat_name'];
            $add_cat = $con->prepare("insert into pet_prod(cat_name) values('$cat_name')");
            
            if($add_cat->execute())
            {
    
            echo "<script>window.open('index.php?cat','_self');</script>";
            }
            else
            {
                echo "<script>alert('Category Not Added Successfully!');</script>";
            }
        }
    }
    
    function add_sub_cat()
    {
        include("inc/db.php");
        if(isset($_POST['add_sub_cat']))
        {
            $cat_id = $_POST['main_cat'];
            $sub_cat_name = $_POST['sub_cat_name'];
            $add_sub_cat = $con->prepare("insert into sub_cat
            (
                sub_cat_name, 
                cat_id
            ) 
            values
            (
                '$sub_cat_name', 
                '$cat_id'
            )");
            
            if($add_sub_cat->execute())
            {
               echo "<script>alert('Sub Category Added Successfully!');</script>"; 
            }
            else
            {
                echo "<script>alert('Sub Category Not Added Successfully!');</script>";
            }
        }
    }

    function add_product() 
    {
       include("inc/db.php");
       if(isset($_POST['add_prod']))
       {
           $pro_name = $_POST['pro_name'];
           $cat_id = $_POST['cat_name'];
           $sub_cat_id = $_POST['sub_cat_name'];
           $pro_brand = $_POST['pro_brand'];
           $pro_keyword = $_POST['pro_keyword'];
           
           $pro_img = $_FILES['pro_img']['name'];
           $pro_img_tmp = $_FILES['pro_img']['tmp_name'];

           $pro_img2 = $_FILES['pro_img2']['name'];
           $pro_img2_tmp = $_FILES['pro_img2']['tmp_name'];
           
           $pro_img3 = $_FILES['pro_img3']['name'];
           $pro_img3_tmp = $_FILES['pro_img3']['tmp_name'];
           
           $pro_img4 = $_FILES['pro_img4']['name'];
           $pro_img4_tmp = $_FILES['pro_img4']['tmp_name'];
        
           move_uploaded_file($pro_img_tmp,"../uploads/products/$pro_img");
           move_uploaded_file($pro_img2_tmp,"../uploads/products/$pro_img2");
           move_uploaded_file($pro_img3_tmp,"../uploads/products/$pro_img3");
           move_uploaded_file($pro_img4_tmp,"../uploads/products/$pro_img4");
           
           $pro_price = $_POST['pro_price'];
           $pro_quantity = $_POST['pro_quantity'];

           $add_pro = $con->prepare("insert into product_tbl
           (
               pro_name, 
               cat_id, 
               sub_cat_id, 
               pro_brand, 
               pro_img, 
               pro_img2, 
               pro_img3, 
               pro_img4, 
               pro_price, 
               pro_quantity,
               pro_keyword
            ) values
            (
                '$pro_name',
                '$cat_id',
                '$sub_cat_id',
                '$pro_brand',
                '$pro_img',
                '$pro_img2',
                '$pro_img3',
                '$pro_img4',
                '$pro_price',
                '$pro_quantity',
                '$pro_keyword'
            )");
            
           if($add_pro->execute())
           {
                echo "<script>alert('Product Added Successfully!');</script>"; 
           }
           else
           {
                echo "<script>alert('Product Not Added Successfully!');</script>";
           }
       }
    }

    function viewall_cat()
    {   
        include("inc/db.php");
        $fetch_cat=$con->prepare("SELECT * from pet_prod");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();
                            
        while($row=$fetch_cat->fetch()):
            echo "<option value = '".$row['prod_id']."'>".$row['cat_name']."</option>";
        endwhile;
    }

    function viewall_category()
    {
        include("inc/db.php");
        $fetch_cat=$con->prepare("SELECT * from pet_prod ORDER BY cat_name");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();
        $i=1;

        while($row=$fetch_cat->fetch()):
            echo "<tr>
                    <td>".$i++."</td>
                    <td>".$row['cat_name']."</td>
                    <td style='width:5%'><a href='index.php?edit_cat=".$row['prod_id']."'><img src='../uploads/edit2.svg' class = 'editIcon'></img></a></td>
                    <td style='width:5%'><a href='delete_cat.php?delete_cat=".$row['prod_id']."'><img src='../uploads/delete1.svg' class = 'editIcon'></a></td>
                 </tr>";
        endwhile;
    }

    function viewall_sub_category()
    {
        include("inc/db.php");
        $fetch_cat=$con->prepare("SELECT * from sub_cat ORDER BY sub_cat_name");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();
        $i=1;

        while($row=$fetch_cat->fetch()):
            echo "<tr>
                    <td>".$i++."</td>
                    <td>".$row['sub_cat_name']."</td>
                    <td><a href='index.php?edit_sub_cat=".$row['sub_cat_id']."'>Edit</a></td>
                    <td><a href='delete_cat.php?delete_sub_cat=".$row['sub_cat_id']."'>Delete</a></td>
                 </tr>";
        endwhile;
    }
    
    function viewall_sub_cat()
    {
        include("inc/db.php");
        $fetch_sub_cat=$con->prepare("SELECT * from sub_cat");
        $fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_sub_cat->execute();
                            
        while($row=$fetch_sub_cat->fetch()):
            echo "<option value = '".$row['sub_cat_id']."'>".$row['sub_cat_name']."</option>";
        endwhile;
    }

    function view_all_products()
    {
        include("inc/db.php");
        $fetch_pro = $con->prepare("SELECT * from product_tbl");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        $i=1;

        while($row=$fetch_pro->fetch()):
            echo "<tr>
                <td>".$i++."</td>
                <td style = 'min-width:200px'>".$row['pro_name']."</td>
                <td>".$row['pro_brand']."</td>
                <td style = 'min-width:200px'>
                    <img src = '../uploads/products/".$row['pro_img']."'/>
                    <img src = '../uploads/products/".$row['pro_img2']."'/>
                    <img src = '../uploads/products/".$row['pro_img3']."'/>
                    <img src = '../uploads/products/".$row['pro_img4']."'/>
                </td>
                <td>".$row['pro_price']."</td>
                <td>".$row['pro_quantity']."</td>
                <td>".$row['pro_keyword']."</td>
                <td><a href='index.php?edit_prod=".$row['pro_id']."'>Edit</a></td>
                <td><a href='delete_cat.php?delete_prod=".$row['pro_id']."'>Delete</a></td>
         </tr>";
        endwhile;
    }

    function edit_cat() 
    {
        include("inc/db.php");
        if(isset($_GET['edit_cat']))
        {
            $cat_id = $_GET['edit_cat'];
            $fetch_cat_name = $con->prepare("SELECT * from pet_prod WHERE prod_id='$cat_id'");
            $fetch_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat_name->execute();
            $row = $fetch_cat_name->fetch();

            echo "<h3>Edit Category</h3>
            <form method = 'POST'>
                <table>
                    <tr>
                        <td>Category Name: </td>
                        <td><input type='text' name = 'cat_name' value = '".$row['cat_name']."'/></td>
                    </tr>
                </table>
                <button name = 'update_cat'>Update Category</button>
            </form>";

            if(isset($_POST['update_cat']))
            {
                $cat_name = $_POST['cat_name'];
                $update_cat = $con->prepare("UPDATE pet_prod SET cat_name='$cat_name' WHERE prod_id = '$cat_id'");
                
                if($update_cat->execute())
                {
                    echo "<script>alert('Category Updated Successfully!');</script>";
                    echo "<script>window.open('index.php?viewall_cat','_self');</script>";
                }
            }
        }
    }

    function edit_sub_cat()
    {
        include("inc/db.php");
        if(isset($_GET['edit_sub_cat']))
        {
            $sub_cat_id = $_GET['edit_sub_cat'];
            $fetch_sub_cat_name = $con->prepare("SELECT * from sub_cat WHERE sub_cat_id='$sub_cat_id'");
            $fetch_sub_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_sub_cat_name->execute();
            $row = $fetch_sub_cat_name->fetch();

            echo "<h3>Edit Sub-Category</h3>
            <form method = 'POST'>
                <table>
                    <tr>
                        <td>Sub-Category Name: </td>
                        <td><input type='text' name = 'sub_cat_name' value = '".$row['sub_cat_name']."'/></td>
                    </tr>
                </table>
                <button name = 'update_sub_cat'>Update Sub Category</button>
            </form>";

            if(isset($_POST['update_sub_cat']))
            {
                $sub_cat_name = $_POST['sub_cat_name'];
                $update_sub_cat = $con->prepare("UPDATE sub_cat SET sub_cat_name='$sub_cat_name' WHERE sub_cat_id = '$sub_cat_id'");
                
                if($update_sub_cat->execute())
                {
                    echo "<script>alert('Category Updated Successfully!');</script>";
                    echo "<script>window.open('index.php?viewall_sub_cat','_self');</script>";
                }
            }
        }
    }

    function viewall_users()
    {
        include("inc/db.php");
        $fetch_pro = $con->prepare("SELECT * from usercustomer");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();

        $i=1;

        while($row=$fetch_pro->fetch()):
            echo "<tr>
                <td>".$i++."</td>
                <td style = 'min-width:200px'>".$row['custUsername']."</td>
                <td>".$row['custPassword']."</td>
                <td>".$row['custName']."</td>
                <td>".$row['custContactInfo']."</td>
                <td style = 'min-width:200px'>
                    <img src = '../uploads/user_profile/".$row['profilePic']."'/>
                </td>
                <td><a href='#'>Edit</a></td>
                <td><a href='#'>Delete</a></td>
         </tr>";
        endwhile;
    }

    function edit_prod()
    {
        include("inc/db.php");
        if(isset($_GET['edit_prod']))
        {
            $pro_id = $_GET['edit_prod'];
            $fetch_pro_name = $con->prepare("SELECT * from product_tbl WHERE pro_id='$pro_id'");
            $fetch_pro_name->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_pro_name->execute();
            $row = $fetch_pro_name->fetch();
            $cat_id = $row['cat_id'];
            $sub_cat_id = $row['sub_cat_id'];

            $fetch_cat = $con->prepare("SELECT * from pet_prod WHERE prod_id='$cat_id'");
            $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat->execute();
            $row_cat = $fetch_cat->fetch();
            $cat_name = $row_cat['cat_name'];

            $fetch_sub_cat = $con->prepare("SELECT * from sub_cat WHERE sub_cat_id='$sub_cat_id'");
            $fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_sub_cat->execute();
            $row_sub_cat = $fetch_cat->fetch();
            $sub_cat_name = $row_sub_cat['sub_cat_name'];

            echo "<h3>Edit Product</h3>
            <form method = 'POST'>
                <table>
                    <tr>
                        <td>Update Category Name: </td>
                        <td>
                            <select name = 'cat_name'>
                                <option value = '".$row['cat_id']."'>".$cat_name."</option>
                                ";echo viewall_cat(); echo"
                            </select>
                        </td>
                    </tr>
                   <tr>
                        <td>Update Sub-Category Name: </td>
                        <td>
                            <select name = 'sub_cat_name'>
                                <option value = '".$row['sub_cat_id']."'>".$sub_cat_name."</option>
                                ";echo viewall_sub_cat(); echo"
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Name: </td>
                        <td><input type='text' name = 'pro_name' value = '".$row['pro_name']."'/></td>
                    </tr>
                    <tr>
                        <td>Product Brand: </td>
                        <td><input type='text' name = 'pro_brand' value = '".$row['pro_brand']."'/></td>
                    </tr>
                    <tr>
                        <td>Product Price: </td>
                        <td><input type='text' name = 'pro_price' value = '".$row['pro_price']."'/></td>
                    </tr>
                    <tr>
                        <td>Product Quantity: </td>
                        <td><input type='text' name = 'pro_quantity' value = '".$row['pro_quantity']."'/></td>
                    </tr>
                    <tr>
                        <td>Product Keyword: </td>
                        <td><input type='text' name = 'pro_keyword' value = '".$row['pro_keyword']."'/></td>
                    </tr>
                    <tr>
                        <td>Update 1st Product Image: </td>
                        <td>
                            <input type='file' name = 'pro_img'/>
                            <img src = '../uploads/products/".$row['pro_img']."'  />
                        </td>
                    </tr>
                    <tr>
                        <td>Update 2nd Product Image: </td>
                        <td>
                            <input type='file' name = 'pro_img2'/>
                            <img src = '../uploads/products/".$row['pro_img2']."' />
                        </td>
                    </tr>
                    <tr>
                        <td>Update 3rd Product Image: </td>
                        <td>
                            <input type='file' name = 'pro_img3'/>
                            <img src = '../uploads/products/".$row['pro_img3']."' />
                        </td>
                    </tr>
                    <tr>
                        <td>Update 4th Product Image: </td>
                        <td>
                            <input type='file' name = 'pro_img4'/>
                            <img src = '../uploads/products/".$row['pro_img4']."' />
                        </td>
                    </tr>
                    
                   
                </table>
                <button name = 'update_prod'>Update Product</button>
            </form>";

            if(isset($_POST['update_prod']))
            {
                $pro_name = $_POST['pro_name'];
                $pro_brand = $_POST['pro_brand'];
                $pro_quantity = $_POST['pro_quantity'];
                $pro_price = $_POST['pro_price'];
                $pro_img = $_POST['pro_img'];
                $pro_img2 = $_POST['pro_img2'];
                $pro_img3 = $_POST['pro_img3'];
                $pro_img4 = $_POST['pro_img4'];
                $pro_keyword = $_POST['pro_keyword'];
                $update_prod = $con->prepare("UPDATE product_tbl 
                SET 
                pro_name='$pro_name',
                pro_brand = '$pro_brand',
                pro_quantity = '$pro_quantity',
                pro_price = '$pro_price',
                pro_img = '$pro_img',
                pro_img2 = '$pro_img2',
                pro_img3 = '$pro_img3',
                pro_img4 = '$pro_img4',
                pro_keyword = '$pro_keyword'
                WHERE 
                pro_id = '$pro_id'");
                
                if($update_prod->execute())
                {
                    echo "<script>alert('Product Updated Successfully!');</script>";
                    echo "<script>window.open('index.php?viewall_products','_self');</script>";
                }
            }
        }
    }

    function delete_cat()
    {
        include("inc/db.php");

        $delete_cat_id = $_GET['delete_cat'];
        $delete_cat  = $con->prepare("delete from pet_prod where prod_id = '$delete_cat_id'");
        if($delete_cat->execute())
        {
            
            echo "<script>window.open('index.php?cat','_self');</script>";
        }
    }

    function delete_sub_cat()
    {
        include("inc/db.php");

        $delete_sub_cat_id = $_GET['delete_sub_cat'];
        $delete_sub_cat  = $con->prepare("delete from sub_cat where sub_cat_id = '$delete_sub_cat_id'");
        if($delete_sub_cat->execute())
        {
            echo "<script>alert('Sub Category Deleted Successfully!');</script>";
            echo "<script>window.open('index.php?viewall_sub_cat','_self');</script>";
        }
    }

    function delete_prod()
    {
        include("inc/db.php");

        $delete_product_id = $_GET['delete_prod'];
        $delete_prod  = $con->prepare("delete from product_tbl where pro_id = '$delete_product_id'");
        if($delete_prod->execute())
        {
            echo "<script>alert('Product Deleted Successfully!');</script>";
            echo "<script>window.open('index.php?viewall_products','_self');</script>";
        }
    }


?>
    

    
