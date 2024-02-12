<?php
require 'pack/config.php';
if ($admin_Login_hypertonic_manufecture) {
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
    <?php include("pack/header.php"); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="ckeditor/ckeditor.js" ></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                $update = db("select * from slider where id='$id'");
                $numOfrow = mysqli_num_rows($update);
                if ($numOfrow > 0) 
                    {
                        $row = mysqli_fetch_assoc($update);
                        $user_id = $row['id'];                              
                        ?>
                                <!--EDIT MODAL-->
                                <div class="modal-dialog modal-xl" role="document">
                                    <form method="post" action="php/slider/edit.php" autocomplete="off">
                                            <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title family font-weight-bold" id="exampleModalLongTitle">Edit slider</h3>
                                                        <a href="slider.php"><button type="button" class="close text-danger" aria-label="Close"> <span style="font-size: 32px;" aria-hidden="true">&times;</span> </button></a>
                                                    </div>
                                                    <div class="modal-body ml-3">
                            
                                                        <div class="row">
                                                            <div class="col-md-9 mt-3">
                                                              <h3 class="family">slider's Information</h3>
                                                              <hr class="m-0" style="border:2px solid #395573; width:150px;float:left">
                                                            </div>
                                                            <div class="col-md-3 mt-3">
                                                              <h4 class="family"><b>slider's ID = <?php echo $row['id']; ?></b></h4>
                                                            </div>
                                                        </div>
                                                        
                                                        <input type="hidden" name='id' value="<?php echo $row['id']; ?>">
                                                        
                                                        <!--name-->
                                                          <div class="row w-100 mt-4">
                                                            <div class="col-md-12">
                                                              <div class="form-group">
                                                                <label class="family">slider Title*</label>
                                                                <input type="text" class="form-control family" name="title" placeholder="Enter slider title" value="<?php echo $row['title'];?>" required>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        <!--name-->
                                                        
                                                        
                                                        <!--............imgOne..............-->
                                                            <div class="row w-100 mt-3">
                                                                <div class="col-sm-6">
                                                                <label class="family">slider Image*</label>
                                                                <?php
                                                                    $path = '';
                                                                    if ($row['image_path'] != null)  
                                                                    {
                                                                        $path = $row['image_path'];
                                                                        ?>
                                                                                <center><a href="../image/slider/<?php echo $path; ?>" target="blank"><img src="../image/slider/<?php echo $path; ?>" class="img-fluid" style="height:40vh;" /></a></center>
                                                                                <div class="row mt-2">
                                                                                    <div class="col-sm-12">
                                                                                        <center>
                                                                                            <button type="button" class="btn btn-info" onclick="imgClick('<?php echo $row['id']; ?>')">Edit</button>
                                                                                            <a onclick="imgDelete('<?php echo $row['id']; ?>')"><button type="button" class="btn btn-info">Delete</button></a>
                                                                                        </center>
                                                                                    </div>
                                                                                </div>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                        
                                                                        <span style="color: red;">(No Image..)</span>
                                                                        <!--<button type="button" class="btn btn-primary" style="height:40px;" data-toggle="modal" data-target="#AddImage">+</button>-->
                                                                        <button type="button" class="btn btn-primary" onclick="imgAddFun('<?php echo $row['id']; ?>')">+</button>
                                                                    <?php
                                                                    }
                                                                ?>
                                                                </div>
                                                        <!--..........................-->
                            <!--document-->
                                                                <div class="col-sm-6">
                                                                <label class="family">slider document*</label>
                                                                <?php
                                                                    $path = '';
                                                                    if ($row['document_path'] != null)  
                                                                    {
                                                                        $path = $row['document_path'];
                                                                        ?>
                                                                               <center>
    <a href="../document/slider/<?php echo $path;?>" ><?php echo $path;?></a>
</center>





                                                                                <div class="row mt-2">
                                                                                    <div class="col-sm-12">
                                                                                        <center>
                                                                                            <button type="button" class="btn btn-info" onclick="docClick('<?php echo $row['id']; ?>')">Edit</button>
                                                                                            <a onclick="docDelete('<?php echo $row['id']; ?>')"><button type="button" class="btn btn-info">Delete</button></a>
                                                                                        </center>
                                                                                    </div>
                                                                                </div>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                        
                                                                        <span style="color: red;">(No document..)</span>
                                                                        <!--<button type="button" class="btn btn-primary" style="height:40px;" data-toggle="modal" data-target="#AddImage">+</button>-->
                                                                        <button type="button" class="btn btn-primary" onclick="docAddFun('<?php echo $row['id']; ?>')">+</button>
                                                                    <?php
                                                                    }
                                                                ?>
                                                                </div>
                                                                 <!--..........................-->
                            
                                                    </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="slider.php"><button type="button" class="btn btn-light" data-dismiss="modal">Close</button></a>
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
                <form method="post" action="php/slider/_imgEdit.php" enctype="multipart/form-data">
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
                <form method="POST" action="php/slider/_imgDelete.php" id="myModalDelete">
                    <input type="hidden" name="id" value="" id="modalDelete1" />
                </form>
            </div>
        <!--myModalDelete-->
    
        <!--Add-->
        <div class="modal fade" id="AddImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <form method="post" action="php/slider/_imgAdd.php" enctype="multipart/form-data">
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

<div class="modal fade" id="myModalEditDocument">
    <form method="post" action="php/slider/docEdit.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="" id="modalDocument1" />
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Document</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <input type="file" name="document[]" placeholder="Document" required accept="application/pdf">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-dark" value="Add Document">
                </div>
            </div>
        </div>
    </form>
</div>



<div class="modal fade" >
                <form method="POST" action="php/slider/docDelete.php" id="myModalDeleteDocument">
                    <input type="hidden" name="id" value="" id="modalDeleteDocument1" />
                </form>
            </div>
            
            <div class="modal fade" id="AddDocument" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="php/slider/docAdd.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="" id="modalAddDocument1" />
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Document</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <input type="file" name="document" placeholder="Document" required accept="application/pdf">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-dark" value="Add Document">
                </div>
            </div>
        </div>
    </form>
</div>

            

    <div id="snackbar"></div>   
    <?php include("pack/footer.php"); ?>
<script>
    CKEDITOR.replace('descriptionAdd',{width: "100%",height: "200px"}); 
    
    function imgClick(id)
    {
        $("#myModalEdit").modal("show");
        document.getElementById("modal1").value = id;
    }
    function imgDelete(id)
    {
        document.getElementById("modalDelete1").value = id;
        $("#myModalDelete").submit();
    }
    function imgAddFun(id)
    {
        $("#AddImage").modal("show");
        document.getElementById("modalAdd1").value = id;
    }
    
    
    function docClick(id)
    {
        $("#myModalEditDocument").modal("show");
        document.getElementById("modalDocument1").value = id;
    }
    function docDelete(id)
    {
        document.getElementById("modalDeleteDocument1").value = id;
        $("#myModalDeleteDocument").submit();
    }
    function docAddFun(id)
    {
        $("#AddDocument").modal("show");
        document.getElementById("modalAddDocument1").value = id;
    }
</script>
</body>
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