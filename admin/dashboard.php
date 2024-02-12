<?php
require 'pack/config.php';
if ($Admin) {
    $res = db("select * from users");
    $user = mysqli_num_rows($res);
    // echo "select SUM(amount) as wtotal from withdrawal_request";
    $withdraw=db("select SUM(amount) as wtotal from withdrawal_request");
    $wres=mysqli_fetch_assoc($withdraw);
    $wamount=$wres['wtotal'];
    if($wamount==''){
        $wamount=0;
    }
    // echo "select SUM(amount) as rtotal from payments";
     $recharge=db("select SUM(amount) as rtotal from payments");
    $rres=mysqli_fetch_assoc($recharge);
    $ramount=$rres['rtotal'];
    if($ramount==''){
        $ramount=0;
    }
    
    // $res = db("select * from users");
    // $category = mysqli_num_rows($res);
    
    // $res = db("select * from category_sub");
    // $category_sub = mysqli_num_rows($res);
    
    // $res = db("select * from product");
    // $product = mysqli_num_rows($res);
    
    // $requestPending = 1;
    
    // $res = db("select * from orders where status ='5'");
    $CompleteOrders = 1;//mysqli_num_rows($res);
    
    // $res = db("select * from orders where status ='5'");
    $exchange_return_orders = 1;//mysqli_num_rows($res);
    
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
    <script src="ckeditor/ckeditor.js" ></script>
    
  </head>
  <style>
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
        
        @media screen and (max-width: 34em) {
      .row-offcanvas-left .sidebar-offcanvas {
        left: -45%;
      }
      .row-offcanvas-left.active {
        left: 45%;
        margin-left: -6px;
      }
      .sidebar-offcanvas {
        width: 45%;
      }
    }
    
    .card {
      overflow: hidden;
    }
    
    .card-block .rotate {
      z-index: 8;
      float: right;
      height: 100%;
    }
    
    .card-block .rotate i {
      color: rgba(20, 20, 20, 0.15);
      position: absolute;
      left: 0;
      left: auto;
      right: -10px;
      bottom: 0;
      display: block;
      -webkit-transform: rotate(-44deg);
      -moz-transform: rotate(-44deg);
      -o-transform: rotate(-44deg);
      -ms-transform: rotate(-44deg);
      transform: rotate(-44deg);
    }
    .col-xl-3{ margin:10px 0 10px 0; }
    </style>

  <body>
    <?php include 'pack/SideNav.php'; ?>

    <div class="main">
      <div class="container-fluid family">
        <?php include("pack/nav.php"); ?>
        <div class="row">
          <div class="col-md-12 ">
			<div class="col-md-12 p-0">
				<div class="container-fluid mt-5">
                    <div class="row">
                      <div class="col-xl-3 col-lg-6">
                        <a href="users.php" style="text-decoration:none;">
                            <div class="card card-inverse card-warning">
                              <div class="card-block p-3 bg-warning">
                                <div class="rotate">
                                  <i class="fa fa-user fa-5x"></i>
                                </div>
                                <h6 class="text-uppercase text-white">Users</h6>
                                <h1 class="display-3 text-white"><?php echo $user; ?></h1>
                              </div>
                            </div>
                        </a>
                      </div>
                      <!--<div class="col-xl-3 col-lg-6">-->
                      <!--  <a href="category.php" style="text-decoration:none;">-->
                      <!--      <div class="card card-inverse card-danger">-->
                      <!--    <div class="card-block p-3 bg-danger">-->
                      <!--      <div class="rotate">-->
                      <!--        <i class="fa fa-list fa-4x"></i>-->
                      <!--      </div>-->
                      <!--      <h6 class="text-uppercase text-white">Categories</h6>-->
                      <!--      <h1 class="display-3 text-white"><?php ; ?></h1>-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--  </a>-->
                      <!--</div>-->
                      <div class="col-xl-3 col-lg-6">
                          <a href="products.php" style="text-decoration:none;">
                            <div class="card card-inverse card-secondary">
                          <div class="card-block p-3 bg-secondary">
                            <div class="rotate">
                              <i class="fas fa-user-tie fa-5x"></i>
                            </div>
                            <h6 class="text-uppercase text-white">Total Recharge</h6>
                            <h1 class="display-3 text-white"><?php echo $ramount; ?></h1>
                          </div>
                        </div>
                          </a>
                      </div>
                      <div class="col-xl-3 col-lg-6">
                          <a href="request.php" style="text-decoration:none;">
                            <div class="card card-inverse card-primary">
                          <div class="card-block p-3 bg-primary">
                            <div class="rotate">
                              <i class="fas fa-file-alt fa-5x"></i>
                            </div>
                            <h6 class="text-uppercase text-white">Total Withdraw</h6>
                            <h1 class="display-3 text-white"><?php echo $wamount; ?></h1>
                          </div>
                        </div>
                          </a>
                      </div>
                      
                    </div>
                    <!--  <div class="row">-->
                          
                      <!--<div class="col-xl-3 col-lg-6">-->
                      <!--  <div class="card card-inverse card-info">-->
                      <!--    <div class="card-block p-3 bg-info">-->
                      <!--      <div class="rotate">-->
                      <!--        <i class="fas fa-book-open fa-5x"></i>-->
                      <!--      </div>-->
                      <!--      <h6 class="text-uppercase text-white">Sub Categories</h6>-->
                      <!--      <h1 class="display-3 text-white"><?php echo "Hello"; ?></h1>-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--</div>-->
                      <!--<div class="col-xl-3 col-lg-6">-->
                      <!--  <div class="card card-inverse card-secondary">-->
                      <!--    <div class="card-block p-3 bg-secondary">-->
                      <!--      <div class="rotate">-->
                      <!--        <i class="fas fa-user-tie fa-5x"></i>-->
                      <!--      </div>-->
                      <!--      <h6 class="text-uppercase text-white">Sub Sub Categories</h6>-->
                      <!--      <h1 class="display-3 text-white"><?php echo "Hello"; ?></h1>-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--</div>-->
                      
                      
                      <!--  <div class="col-xl-3 col-lg-6">-->
                      <!--  <div class="card card-inverse card-warning">-->
                      <!--    <div class="card-block p-3 bg-warning">-->
                      <!--      <div class="rotate">-->
                      <!--        <i class="fa fa-user fa-5x"></i>-->
                      <!--      </div>-->
                      <!--      <h6 class="text-uppercase text-white">Merchants</h6>-->
                      <!--      <h1 class="display-3 text-white"><?php echo "Hello"; ?></h1>-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--</div>-->
                    <!--</div>-->
                </div>
                <!--<div class="container-fluid mt-5">-->
                <!--    <div class="row">-->
                <!--        <div class="col-xl-6 col-lg-6">-->
                <!--            <a data-toggle="modal" data-target="#FeaturedCollection_Model_ONE" id="model">    -->
                <!--                <div class="card card-inverse card-warning">-->
                <!--                    <div class="card-block p-3 bg-warning">-->
                <!--                        <div class="rotate"><i class="fa fa-user fa-5x"></i></div>-->
                <!--                        <h6 class="text-uppercase text-white">Featured Collection</h6>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--        <div class="col-xl-6 col-lg-6">-->
                <!--            <a data-toggle="modal" data-target="#NewArrivals_Model_ONE" id="model">    -->
                <!--                <div class="card card-inverse card-warning">-->
                <!--                    <div class="card-block p-3 bg-warning">-->
                <!--                        <div class="rotate"><i class="fa fa-user fa-5x"></i></div>-->
                <!--                        <h6 class="text-uppercase text-white">New Arrivals</h6>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="row mt-5">-->
                <!--        <div class="col-xl-6 col-lg-6">-->
                <!--            <a data-toggle="modal" data-target="#InspiredByYou_Model_ONE" id="model">    -->
                <!--                <div class="card card-inverse card-warning">-->
                <!--                    <div class="card-block p-3 bg-warning">-->
                <!--                        <div class="rotate"><i class="fa fa-user fa-5x"></i></div>-->
                <!--                        <h6 class="text-uppercase text-white">Inspired By You</h6>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--        <div class="col-xl-6 col-lg-6">-->
                <!--            <a data-toggle="modal" data-target="#Poster_Model_ONE" id="model">    -->
                <!--                <div class="card card-inverse card-warning">-->
                <!--                    <div class="card-block p-3 bg-warning">-->
                <!--                        <div class="rotate"><i class="fa fa-user fa-5x"></i></div>-->
                <!--                        <h6 class="text-uppercase text-white">Poster</h6>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
			</div>
        </div>
      </div>
    </div>
    </div> 
    
    
    
    <!--1111111111111111111111111111111111111111111111111111111111111-->
        <!--Model One-->
    <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="FeaturedCollection_Model_ONE" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog  modal-xl" role="document">
                <form method="post" action="php/home/NewProductAdd.php" style="width:100%;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Featured Collection</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body ml-3">
                        <div class="row w-100 mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                	<label class="family">Select Product*</label>
                                    <select class="form-control family selectpicker" name="select[]" multiple>
                                         <?php
                                            $up_bud = db("SELECT * FROM product_list1");
                                            $num_bud = mysqli_num_rows($up_bud);
                                            if($num_bud == 1){
                                                $row = mysqli_fetch_assoc($up_bud);
                                                $str = $row['productid'];
                                                $final = explode(",",$str);
                                                $update3 = db("SELECT * FROM product where status='1' ");
                                                
                                                    while($res3 = mysqli_fetch_assoc($update3))
                                                    {
                                                        ?>
                                                            <option value="<?php echo $res3['id'];?>" 
                                                                <?php  foreach ($final as $select) { echo ($res3['id']==$select) ? ('selected') : (''); } ?>><?php echo $res3['name'];?>
                                                            </option>
                                                        <?php
                                                    }
                                                   
                                            }else{
                                                    $update4 = db("SELECT * FROM `product` where status='1'");
                                                    $num4 = mysqli_num_rows($update4);
                                                    if($num4 > 0)
                                                    {
                                                        while($res4 = mysqli_fetch_assoc($update4))
                                                        {
                                                            ?>
                                                                <option value="<?php echo $res4['id'];?>"><?php echo $res4['name'];?></option>
                                                            <?php
                                                        }
                                                    }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
    <!--Model One-->
    <!--1111111111111111111111111111111111111111111111111111111111111-->
     
     
    <div id="snackbar"></div>   
    <?php include("pack/footer.php"); ?>


  </body>
  
  <script>
    CKEDITOR.replace('descriptionAdd',{
    
    // width: "380px",
    width: "100%",
    height: "200px"
    
    }); 
    </script>
  <script>
    $(document).ready(function() {
      var table = $('.res').DataTable({
        "pageLength": 10,
        "order": [
          [0, "asc"]
        ],
        // "scrollX": true,
        "drawCallback": function(settings) {
          $('.selectpicker').selectpicker();
        },
        initComplete: function() {
          this.api().columns([0, 1, 2, 3, 4, 5, 6, 7]).every(function() {
            var column = this;
            var select = $('<select class="form-control form-control-sm"><option value="">All</option></select>')
              .appendTo($(column.footer()).empty())
              .on('change', function() {
                var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
                );

                column
                  .search(val ? '^' + val + '$' : '', true, false)
                  .draw();
              });

            column.data().unique().sort().each(function(d, j) {
              select.append('<option value="' + d + '">' + d + '</option>')
            });
          });
        },
        buttons: [{
          extend: 'collection',
          className: 'btn btn-sm btn-primary',
          text: 'Export',
          buttons: [{
              extend: 'csv',
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7],
              },
              title: 'Users - <?php echo date("d-M-Y"); ?>'
            },
            {
              extend: 'pdfHtml5',
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7],
              },
              orientation: 'landscape',
              pageSize: 'A3',
              title: 'Users - <?php echo date("d-M-Y"); ?>'
            },
          ]
        }]


      });
      table.buttons().container()
        .appendTo('#example_wrapper .col-md-6:eq(1)');

    });

    function change_status(value) {
      if ($("#" + value).is(":checked")) {
        $.get("php/student.php?id=" + value + "&type=block");
      } else {
        $.get("php/student.php?id=" + value + "&type=unblock");
      }
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