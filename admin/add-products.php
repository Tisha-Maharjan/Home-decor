<?php
include('partials/header.php');
?>

<div class="main-content">
  <div class="wrapper">

    <br><br>

    <?php

      if(isset($_SESSION['upload']))
      {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
      }
    ?>

    <form action="" method="POST" enctype="multipart/form-data" class="add">
      <h1 class="h1"><b> Add Product </b></h1>
      <table class="tbl-30">
        <tr>
          <td>Title</td>
          <td><input type="text" name="title" placeholder="Title of the product" class="box"></td>
        </tr>

        <tr>
          <td>Description</td>
          <td>
            <textarea name="description" cols="30" rows="5" placeholder="Description of the product"
              class="box"></textarea>
          </td>
        </tr>

        <tr>
          <td>Price</td>
          <td>
            <input type="number" name="price" class="box">
          </td>
        </tr>

        <tr>
          <td>Select Image</td>
          <td>
            <input type="file" name="image">
          </td>
        </tr>

        <tr>
          <td>Category</td>
          <td>
            <select name="category" class="box">

              <?php 
                  //create php code to display categories from database
                  //1. sql to get all active categories form database

                  $sql="SELECT * FROM category WHERE active='Yes'";


                  $res=mysqli_query($conn,$sql);

                  $count=mysqli_num_rows($res);

                  if($count>0){

                    while($row=mysqli_fetch_assoc($res)){
                      //get the details of categories
                      $id=$row['id'];
                      $title=$row['title'];
                      ?>

              <option value="<?php echo $id;?>"><?php echo $title; ?></option>

              <?php
                    }

                  }else{
                    ?>
              <option value="0">No Categories Found</option>

              <?php
                  }


                  //2.display drop down

                ?>
            </select>
          </td>
        </tr>

        <tr>
          <td>Featured</td>
          <td>
            <input type="radio" name="featured" value="Yes">Yes &nbsp;

            <input type="radio" name="featured" value="No">No
          </td>
        </tr>

        <tr>
          <td>Active</td>
          <td>
            <input type="radio" name="active" value="Yes">Yes &nbsp;

            <input type="radio" name="active" value="No">No
          </td>
        </tr>

        <tr>
          <td colspan="2" style="text-align: center;">
            <input type="submit" name="submit" value="Add Product" class="btn-secondary" style="text-align: center;">
          </td>
        </tr>

      </table>

    </form>


    <?php

        if(isset($_POST['submit'])){

          // echo "clicked";

          //get data from form
          $title=$_POST['title'];
          $description=$_POST['description'];
          $price=$_POST['price'];
          $category=$_POST['category'];

          //check radio button
          if(isset($_POST['featured'])){
            $featured=$_POST['featured'];
          }
          else{
            $featured="No"; //setting default value
          }

          if(isset($_POST['active'])){
            $active=$_POST['active'];
          }
          else{
            $active="No"; //setting default value
          }


          //upload the image if selected
          //chechk whether the select image is clicked or not and upload the  image only if the image is selected
          if(isset($_FILES['image']['name'])){
            //get details of selcted image
            $image_name=$_FILES['image']['name'];

            //check if imaghe is selected and upload if image is selected
            if($image_name!=""){
              // image is selected
              //rename the image
              $ext=end(explode('.',$image_name));

               //upload the image
               $image_name="Product_Name_".rand(0000,9999).'.'.$ext;



               $src=$_FILES['image']['tmp_name'];
     
               $dst="../img/products/".$image_name;
     
               //upload the image
               $upload=move_uploaded_file($src,$dst);
     
               //check whether the image is uploaded or not
               //and if image is not uploaded then we will stop the process and redirect with error message
               if($upload==false){
                 $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
                 header("location:".$home.'admin/add-products.php');
                 //stop the process
                 die();
               }

            }



          }else{
            $image_name="";//setting default value 
          }


          //insert into database

          $sql2="INSERT INTO products(title,description,price,image_name,category_id,featured,active) 
            VALUES('$title','$description',$price,'$image_name',$category,'$featured','$active')
           ";

          $res2=mysqli_query($conn,$sql2);
          //redirect with message to manage food

          if($res2==TRUE){

            $_SESSION['add']="<div class='success'>Product Added Successfully</div>";
            header("location:".$home.'admin/manage-products.php');

          }else{

            $_SESSION['add']="<div class='error'>Failed to Add</div>";
            header("location:".$home.'admin/manage-products.php');

          }
          
        }
                  
      ?>

  </div>
</div>




<?php
//include('partials/footer.php');
?>