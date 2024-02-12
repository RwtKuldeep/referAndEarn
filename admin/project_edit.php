<?php
require 'pack/config.php';
if ($Admin) {
    $id = input($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/home.css" />
    <title>Admin Dashboard</title>
    <script src="ckeditor/ckeditor.js" ></script>
    <?php include("pack/header.php"); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</head>
<style>
.select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
  iframe{
      width:50px;
      height:50px;
  }
      .up{
          text-transform: capitalize;
      }

        /*Snak Bar start*/
        #snackbar {
          visibility: hidden;
          min-width: 250px;
          margin-left: -125px;
          background-color: #333;
          color: #fff;
          text-align: center;
          border-radius: 2px;
          padding: 16px;
          position: fixed;
          z-index: 1;
          left: 50%;
          bottom: 30px;
          font-size: 17px;
        }
        
        #snackbar.show {
          visibility: visible;
          -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
          animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }
        
        @-webkit-keyframes fadein {
          from {bottom: 0; opacity: 0;} 
          to {bottom: 30px; opacity: 1;}
        }
        
        @keyframes fadein {
          from {bottom: 0; opacity: 0;}
          to {bottom: 30px; opacity: 1;}
        }
        
        @-webkit-keyframes fadeout {
          from {bottom: 30px; opacity: 1;} 
          to {bottom: 0; opacity: 0;}
        }
        
        @keyframes fadeout {
          from {bottom: 30px; opacity: 1;}
          to {bottom: 0; opacity: 0;}
        }
        /*Snak Bar End*/
    </style>

  <body>
    <?php include 'pack/SideNav.php'; ?>

    <div class="main">
      <div class="container-fluid family">
        <?php include("pack/nav.php"); ?>
        <div class="row">
          <div class="col-md-12 ">
            <div class="row mt-2">
              <div class="col-md-12">
                
                <div class="table-responsive">    			        
                <?php
                $i = 1;
                $update = db("select * from product where id='$id'");
                $numOfrow = mysqli_num_rows($update);
                if ($numOfrow > 0) 
                    {
                        $row = mysqli_fetch_assoc($update);
                        $product_id = $row['id'];
                        ?>
                            <!--EDIT MODAL-->
                                <div class="modal-dialog modal-xl" role="document">
                                    <form method="post" action="php/product/product_edit.php" autocomplete="off">
                                            <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title family font-weight-bold" id="exampleModalLongTitle">Edit Project</h3>
                                                        <a href="projects.php"><button type="button" class="close text-danger" aria-label="Close"> <span style="font-size: 32px;" aria-hidden="true">&times;</span> </button></a>
                                                    </div>
                                                    <div class="modal-body ml-3">
                            
                                                        <div class="row">
                                                            <div class="col-md-9 mt-3">
                                                              <h3 class="family">Project's Information</h3>
                                                              <hr class="m-0" style="border:2px solid #395573; width:150px;float:left">
                                                            </div>
                                                            <div class="col-md-3 mt-3">
                                                              <h4 class="family"><b>Project's ID = <?php echo $row['id']; ?></b></h4>
                                                            </div>
                                                        </div>
                                                        
                                                        <input type="hidden" name='id' value="<?php echo $row['id']; ?>">

                                                        <div class="row w-100 mt-4">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="family">Trending price*</label>
                                <input type="text" class="form-control family" name="trending" value="<?php echo $row['trending'];?>" placeholder="Enter Product Name" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="family">Daily Income</label>
                                <input type="text" class="form-control family" name="daily" value="<?php echo $row['daily'];?>" placeholder="Enter Product Name" required>
                              </div>
                            </div>
                        </div>
                        <div class="row w-100 mt-4">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="family">Revenue Cycle*</label>
                                <input type="text" class="form-control family" name="revenue" value="<?php echo $row['revenue'];?>" placeholder="Enter Product Name" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="family">Total Income*</label>
                                <input type="text" class="form-control family" name="total" value="<?php echo $row['total'];?>" placeholder="Enter Product Name" required>
                              </div>
                            </div>
                        </div>
                                                            <div class="row w-100 mt-3">
                                                                <div class="col-sm-12">
                                                                <label class="family">Project Image*</label>
                                                                        <div class="row mt-2">
                                                                <?php                            
                                                                            $path = $row['path'];
                                                                            if ($path != null)  
                                                                            {
                                                                                ?>
                                                                                    <div class="col-6 col-md-4 mb-2">
                                                                                        <center><a href="../image/product/<?php echo $path; ?>" target="blank"><img src="../image/product/<?php echo $path; ?>" class="img-fluid" style="height:20vh;width:20vh;" /></a></center>
                                                                                        <div class="row mt-2">
                                                                                            <div class="col-sm-12">
                                                                                                <center>
                                                                                                    <button type="button" class="btn btn-info" onclick="imgClick('<?php echo $row['id']; ?>')">Edit</button>
                                                                                                    <a onclick="imgDelete('<?php echo $row['id']; ?>')"><button type="button" class="btn btn-info">Delete</button></a>
                                                                                                </center>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                        </div>
                                                                        <?php
                                                                    }else{
                                                                    ?>
                                                                        <button type="button" class="btn btn-primary m-4 float-right" onclick="imgAddFun('<?php echo $row['id']; ?>')">+ Add Image</button>
                                                                   <?php
                                                                    }
                                                                ?>
                                                                </div>
                                                        <!--..........................-->
                            
                                                    </div>
                                                       <!--............img..............-->
                                                       
                                                    <div class="modal-footer">
                                                        <a href="projects.php"><button type="button" class="btn btn-light" data-dismiss="modal">Close</button></a>
                                                        <button type="submit" class="btn btn-dark" >Update</button>
                                                    </div>
                                            </div>
                                            </div>
                                    </form>
                                </div>
                            <!--EDIT MODAL-->	        
                        <?php
                    } 
                else 
                    {
                        echo '<center><h3>No Data Available Here..</h3></center>';
                    }
                ?>
                </div>
                
            </div>
            </div>

        </div>
      </div>
    </div>
    </div> 
    

    <!--All Model-->
        <!--Edit-->
            <div class="modal fade" id="myModalEdit">
                <form method="post" action="php/product/imgEdit.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="" id="modal1" />
                    <div class="modal-dialog">
                      <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Image</h4>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>
                            
                            <div class="modal-body">
                              <input type="file" name="image[]" placeholder="Image" required='yes' accept="image/*" >
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <input type="submit" class="btn btn-dark" value="Add Image">
                            </div>
                        
                      </div>
                    </div>
                </form>
            </div>
        <!--Edit-->
        
        <!--myModalDelete-->
            <div class="modal fade" >
                <form method="POST" action="php/product/imgDelete.php" id="myModalDelete">
                    <input type="hidden" name="id" value="" id="modalDelete1" />

                </form>
            </div>
        <!--myModalDelete-->
    
        <!--Add-->
        <div class="modal fade" id="AddImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <form method="post" action="php/product/imgAdd.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="" id="modalAdd1" />
                <div class="modal-dialog">
                  <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Add Image</h4>
                          <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                          <!--<input type="file" name="image[]" placeholder="Image" required='yes' >-->
                          <input type="file" name="image[]" placeholder="Image" required='yes' accept="image/*">
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <input type="submit" class="btn btn-dark" value="Add Image">
                        </div>
                    
                  </div>
                </div>
            </form>
        </div>
        <!--Add-->
    <!--All Model-->



    <div id="snackbar"></div>   
    <?php include("pack/footer.php"); ?>


  </body>
  
    <script>
        CKEDITOR.replace('descriptionEdit',{width: "100%",height: "200px"});
    </script>
    
    <script>

        function imgClick(id)
        {
            $("#myModalEdit").modal("show");
            document.getElementById("modal1").value = id;
        }
        
        function imgDelete(id,)
        {
            document.getElementById("modalDelete1").value = id;
            $("#myModalDelete").submit();
        }
        function imgAddFun(id)
        {
            $("#AddImage").modal("show");
            document.getElementById("modalAdd1").value = id;
        }
    </script>

  </html>


<?php
} else {
    header("location:index.php");
}

if (isset($_SESSION['msg'])) {
$msg = $_SESSION['msg'];
?>
        <script>
            var x = document.getElementById("snackbar");
            x.innerHTML = "<?php echo $msg; ?>";
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        </script>

<?php
unset($_SESSION['msg']);
}

?>