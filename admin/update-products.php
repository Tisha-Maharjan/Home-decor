<?php
  include('partials/header.php');
?>

<div class="main-content">
  <div class="wrapper">

    <br><br>
    <?php
      
      // check whether the3 id is set or not
      if(isset($_GET['id'])){

        // echo "Getting the data";
        $id=$_GET['id'];

        $sql2="SELECT * FROM products WHERE id=$id";

        $res2=mysqli_query($conn,$sql2);
     

        
          //get data
          $row2=mysqli_fetch_assoc($res2);

          $title=$row2['title'];
          $description=$row2['description'];
          $price=$row2['price'];
          $current_image=$row2['image_name'];
          $current_category=$row2['category_id'];
          $featured=$row2['featured'];
          $active=$row2['active'];

        }else{
        header("location:".$home.'admin/manage-food.php');
      }
    
    ?>

    <form action="" method="POST" enctype="multipart/form-data" class="add">
      <h1 class="h1"><b> Update Product </b></h1>
      <table class="tbl-30">
        <tr>
          <td>Title</td>
          <td><input type="text" name="title" value="<?php echo $title; ?>" class="box"></td>
        </tr>

        <tr>
          <td>Description</td>
          <td>
            <textarea class="box" name="description" cols="30" rows="5"><?php echo $description;?></textarea>
          </td>
        </tr>

        <tr>
          <td>Price</td>
          <td><input type="number" name="price" value="<?php echo $price; ?>" class="box"></td>
        </tr>

        <tr>
          <td>Current Image</td>
          <td>

            <?php
              if($current_image!=""){
                //display image
                ?>
            <img src="<?php echo $home;?>img/products/<?php echo $current_image;?>" width="100px">


            <?php

              }else{
                //error message
                echo "<div class='error'>Image Not Added</div>";

              }
              ?>
          </td>
        </tr>

        <tr>
          <td>New Image</td>
          <td><input type="file" name="image"></td>
        </tr>

        <tr>
          <td>Category</td>
          <td>
            <select name="category">

              <?php
              
                $sql="SELECT * FROM category WHERE active='Yes'";

                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);

                if($count>0){
                  //available
                  while($row=mysqli_fetch_assoc($res)){
                    $category_title=$row['title'];
                    $category_id=$row['id'];
                    
                    // echo "<option value='$category_id'>$category_title</option>";
                    ?>
              <option <?php if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id;?>">
                <?php echo $category_title; ?></option>
              <?php
                  }

                }else{
                  //not available

                  echo"<option value='0'>Category not available</option>";

                }
              ?>


            </select>
          </td>
        </tr>


        <tr>
          <td>Featured</td>
          <td>
            <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes

            <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No">No
          </td>
        </tr>

        <tr>
          <td>Active</td>
          <td>
            <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes

            <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">No
          </td>
        </tr>

        <tr>
          <td colspan="2" style="text-align: center;">
            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
            <input type="hidden" name="id" value="<?php echo $id;?>">

            <input type="submit" name="submit" value="Update Product" class="btn-secondary">
          </td>
        </tr>

      </table>

    </form>

    <?php


      if(isset($_POST['submit'])){
        
        // echo "clicked";
        //get value from form
        $id=$_POST['id'];
        $title=$_POST['title'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $current_image=$_POST['current_image'];
        $category=$_POST['category'];
        $featured=$_POST['featured'];
        $active=$_POST['active'];

        //update new image if selected
        if(isset($_FILES['image']['name'])){
          //get image detail
          $image_name=$_FILES['image']['name'];

          if($image_name!=""){
            //img available
            //1.upload the new image
            //Auto rename our image
            //get the extension of our image(jpg,png,gif,etc) 
            $ext=end(explode('.',$image_name));
            //rename image
            $image_name="Product_Name_".rand(0000,9999).'.'.$ext;



            $src_path=$_FILES['image']['tmp_name'];

            $dest_path="../img/products/".$image_name;

            //upload the image
            $upload=move_uploaded_file($src_path,$dest_path);

            //check whether the image is uploaded or not
            //and if image is not uploaded then we will stop the process and redirect with error message
            if($upload==false){
              $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
              header("location:".$home.'admin/manage-category.php');
              die();//stop the process
            }
            
            //2.remove current image if available
            if($current_image!=""){
              $remove_path="../img/products/".$current_image;
              $remove=unlink($remove_path);

              //check if the image is removed or not 
              //if failed to remove dispaly message and stop process
              if($remove==FALSE){
                //failed to remove image
                $_SESSION['remove-failed']="<div class='error'>Failed to remove current image.</div>";
                header("location:".$home.'admin/manage-products.php');
                die();//stop process
              }
            }

            
          }else{
            $image_name=$current_image;            
          }

        }else{
          $image_name=$current_image;
        }


        //update database
        $sql3="UPDATE products SET 
          title='$title',
          description='$description',
          price=$price,
          image_name='$image_name',
          category_id='$category',
          featured='$featured',
          active='$active'
          WHERE id=$id
        ";
        
        //ececute query
        $res3=mysqli_query($conn,$sql3);

        //redirect to manage category with message
        if($res3==TRUE){
          //category updated
          $_SESSION['update']="<div class='success'>Product Updated Successfully</div>";
          header("location:".$home.'admin/manage-products.php');

        }else{
          //failed to update category
          $_SESSION['update']="<div class='error'>Failed To Update Product</div>";
          header("location:".$home.'admin/manage-products.php');
        }


      }

    ?>

  </div>
</div>

<?php
  //include('partials/footer.php')
?>