<?php
require 'pack/config.php';
if ($Admin) {
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <!--<script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table-locale-all.min.js"></script>-->
    <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/extensions/export/bootstrap-table-export.min.js"></script>

    
</head>
<style>
  .select,
  #locale {
    width: 100%;
  }
  .like {
    margin-right: 10px;
  }
</style>
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
    </style>

<body>
    <?php include 'pack/SideNav.php'; ?>

        <div class="main">
        <div class="container-fluid family">
            <?php include("pack/nav.php"); ?>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="row  mt-5">
                      <div class="col-8"><h3 class="family"><b>Asset</b></h3></div>
                      <!--<div class="col-4 text-right "><i class="fal fa-plus-circle iconss" aria-hidden="true" data-toggle="modal" data-target="#AddCategory"></i> </div>-->
                    </div>
                    <hr style="height:2px;color:grey;">
                    <div class="row mt-2">
                        <div class="col-md-12">   
                            <!--;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;-->
                                <div class="select"></div> 
                                <div id="toolbar">
                                  <button id="remove" class="btn btn-danger" disabled><i class="fa fa-trash"></i> Delete</button>
                                </div>
                                <table
                                  id="table"
                                  data-toolbar="#toolbar"
                                  data-search="true"
                                  data-show-refresh="true"
                                  data-show-toggle="true"
                                  data-show-fullscreen="true"
                                  data-show-columns="true"
                                  data-show-columns-toggle-all="true"
                                  data-detail-view="true"
                                  data-show-export="true"
                                  data-click-to-select="true"
                                  data-detail-formatter="detailFormatter"
                                  data-minimum-count-columns="2"
                                  data-show-pagination-switch="true"
                                  data-pagination="true"
                                  data-id-field="id"
                                  data-page-size="10"
                                  data-page-list="[10, 25, 50, 100, all]"
                                  data-show-footer="true"
                                  data-side-pagination="server"
                                  data-url="server/asset.php"
                                  data-response-handler="responseHandler"
                                  data-toggle="table"
                                  data-height="400">
                                </table>
                            <!--;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <!-- Add Student Modal -->
            <!--<div class="modal fade" id="AddCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">-->
            <!--    <div class="modal-dialog modal-xl" role="document">-->
            <!--      <form method="post" action="php/category/category_Add.php" autocomplete="off" enctype="multipart/form-data" id="add_student_form">-->
            <!--          <div class="modal-content">-->
            <!--            <div class="modal-header">-->
            <!--              <h3 class="modal-title family font-weight-bold" id="exampleModalLongTitle">Add Category</h3>-->
            <!--              <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close"> <span style="font-size: 32px;" aria-hidden="true">&times;</span> </button>-->
            <!--            </div>-->
            <!--            <div class="modal-body ml-3">-->
            
            <!--              <div class="row">-->
            <!--                <div class="mt-3">-->
            <!--                  <h3 class="family">Category's Information</h3>-->
            <!--                  <hr class="m-0" style="border:2px solid #395573; width:150px;float:left">-->
            <!--                </div>-->
            <!--              </div>-->
                          
            <!--              <div class="row w-100 mt-4 mb-4">-->
            <!--                <div class="col-md-6">-->
            <!--                  <div class="form-group">-->
            <!--                    <label class="family">Name*</label>-->
            <!--                    <input type="text" class="form-control family" name="name" placeholder="Enter Category Name" required>-->
            <!--                  </div>-->
            <!--                </div>-->
            <!--                <div class="col-md-6">-->
            <!--                  <div class="form-group" style="overflow:hidden;">-->
            <!--                    <label class="family">Profile Image</label><br>-->
            <!--                    <input type="file" name="profile[]" accept="image/*">-->
                                <!--required='yes'-->
            <!--                  </div>-->
            <!--                </div>-->
            <!--              </div>-->
            <!--              <div class="row w-100 mt-4">-->
            <!--                <div class="col-md-12">-->
            <!--                  <div class="form-group">-->
            <!--                    <label class="family">Description</label>-->
            <!--                    <textarea class="form-control" name="description" id="descriptionAdd" required rows="3"></textarea>-->
            <!--                  </div>-->
            <!--                </div>-->
            <!--              </div>-->
                          
            <!--              <div class="modal-footer">-->
            <!--                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>-->
            <!--                <input type="submit" name="add" class="btn btn-dark" value="ADD">-->
            <!--              </div>-->
            <!--            </div>-->
            <!--          </div>-->
            <!--      </form>-->
            <!--    </div>-->
            <!--</div>-->
        <!-- Add Student Modal -->
     
    <div id="snackbar"></div>   
    
    <?php include("pack/footer.php"); ?>
    
  </body>
  
<script>
  
  function PaymentAmountFun(id)
  {
    $("#userId").val(id);
    $("#paymentModal").modal('show'); 
  }
  
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });
        
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple2').select2({
            placeholder: "Commission Recived which user",
            allowClear: true
        }); 
    });

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
  
    CKEDITOR.replace('descriptionAdd',{width: "100%",height: "200px"}); 
    
    </script>
    <script>
      var $table = $('#table')
      var $remove = $('#remove')
      var selections = []
    
      function getIdSelections() 
      {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
          return row.id
        })
      }
    
      function responseHandler(res) 
      {
        $.each(res.rows, function (i, row) {
          row.state = $.inArray(row.id, selections) !== -1
        })
        return res

      }
    
      function detailFormatter(index, row) {
        var html = []
        $.each(row, function (key, value) {
          html.push('<p><b>' + key + ':</b> ' + value + '</p>')
        })
        return html.join('')
      }
    
      function operateFormatter(value, row, index) 
      {
        return [
          '<a class="like" href="javascript:void(0)">',
          '<i class="fa fa-edit table_edit mr-2"></i>',
          '</a>  ',
          
          
        ].join('')
      }
      
      window.operateEvents = 
      {
            
            'click .like': function (e, value, row, index) {
                let id = JSON.stringify(parseInt(row.id));
                location.href = "asset_edit.php?id="+id;
                
                
            },
}


    //   viewStatus Change Start -----------------------------------------------
      function statusFormatter(value, row, index) 
      {
        var status = JSON.stringify(parseInt(row.status));
        if (status == 1) 
          {
            return [
              '<a class="viewStatus" href="javascript:void(0)" title="Add" style="color:blue;cursor:pointer;">',
              '<b id="statusChange">Active</b>',
              '</a>  '
            ].join('')
           
          } else 
          {
            return [
              '<a class="viewStatus" href="javascript:void(0)" title="Add" style="color:blue;cursor:pointer;">',
              '<b id="statusChange">Deactive</b>',
              '</a>  '
            ].join('')
          }
      }
      window.operateEventsViewStatus = 
      {
        'click .viewStatus': function (e, value, row, index) 
        {
            var status = JSON.stringify(parseInt(row.status));
            var userId = JSON.stringify(parseInt(row.id));
            // alert(status);
            if (status == 1) 
              {
                location.href = "users.php?type=status&operation=deactive&id="+userId;
              } else 
              {
                location.href = "users.php?type=status&operation=active&id="+userId;
              }
        },
        'click .remove': function (e, value, row, index) {}
      }
    //   viewStatus Change End -----------------------------------------------
      
      
    //   go subCategoryNameFormatter page---------------------------------------------------------
      function subCategoryNameFormatter(value, row, index) 
      {
      let goWallet = JSON.stringify(parseInt(row.id))
        return [
          '<a class="viewDetailsLink" href="javascript:void(0)" title="View" style="color:blue;cursor:pointer;">',
          '<b>View</b>',
          '</a>  '
        ].join('')
      }
      window.operateEventsViewSubCategoryName = 
      {
        'click .viewDetailsLink': function (e, value, row, index) {
            var userId = JSON.stringify(parseInt(row.id));
            location.href = "product.php?id="+userId;
        },
        'click .remove': function (e, value, row, index) {}
      }
    //   go subCategoryNameFormatter page---------------------------------------------------------
    
    //   go viewDetails page---------------------------------------------------------
      function viewDetailsFormatter(value, row, index) 
      {
      let goWallet = JSON.stringify(parseInt(row.id))
        return [
          '<a class="viewDetailsLink" href="javascript:void(0)" title="Add" style="color:blue;cursor:pointer;">',
          '<b>View</b>',
          '</a>  '
        ].join('')
      }
      window.operateEventsviewDetails = 
      {
        'click .viewDetailsLink': function (e, value, row, index) {
            var userId = JSON.stringify(parseInt(row.id));
            location.href = "viewDetails.php?id="+userId;
        },
        'click .remove': function (e, value, row, index) {}
      }
    //   go viewDetails page---------------------------------------------------------
      
      
    //   ModelOpenCreditAdd Start ----------------------------------------------
      function creditFormatter(value, row, index) 
      {
        return [
          '<a class="CreditModeOpen" href="javascript:void(0)" title="Add" style="color:blue;cursor:pointer;">',
          '<b>Add</b>',
          '</a>  '
        ].join('')
      }
      window.operateEventsModelOpenCredit = 
      {
        'click .CreditModeOpen': function (e, value, row, index) {
            var userId = JSON.stringify(parseInt(row.id));
            PaymentAmountFun(userId);
        },
        'click .remove': function (e, value, row, index) {}
      }
    //   ModelOpenCreditAdd End ------------------------------------------------
    
    
    
      function totalTextFormatter(data) 
      {
        return 'Total'
      }
    
      function totalNameFormatter(data) 
      {
        return data.length
      }
    
      function totalPriceFormatter(data) 
      {
        var field = this.field
        return '$' + data.map(function (row) {
          return +row[field].substring(1)
        }).reduce(function (sum, i) {
          return sum + i
        }, 0)
      }
    
      function initTable() 
      {
        $table.bootstrapTable('destroy').bootstrapTable({
                height: 650,
                // locale: $('#locale').val(),
                columns:
                    [{
                      field: 'state',
                      checkbox: true,
                      align: 'center',
                      valign: 'middle'
                    }, {
                        title: 'S.NO',
                        field: 'sno',
                        align: 'center',
                        valign: 'middle',
                        // sortable: true
                    }, {
                        title: 'UserId',
                        field: 'id',
                        align: 'center',
                        valign: 'middle',
                        sortable: true
                    },
                     {
                        title: 'Name',
                        field: 'name',
                        align: 'center',
                        valign: 'middle',
                        sortable: true
                    },
                    {
                        title: 'Mobile',
                        field: 'mobile',
                        align: 'center',
                        valign: 'middle',
                        sortable: true
                    },
                    {
                        title: 'Amount Balance',
                        field: 'amount',
                        align: 'center',
                        valign: 'middle',
                        sortable: true
                    },
                    {
                        title: 'InsertData',
                        field: 'insertData',
                        align: 'center',
                    }, {
                      field: 'operate',
                      title: 'Item Operate',
                      align: 'center',
                      clickToSelect: false,
                      events: window.operateEvents,
                      formatter: operateFormatter
                    }]
            })
        $table.on('check.bs.table uncheck.bs.table ' +'check-all.bs.table uncheck-all.bs.table',function () {
          $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)
          // save your data, here just save the current page
          selections = getIdSelections()
          // push or splice the selections if you want to save all data selections
        })
        $table.on('all.bs.table', function (e, name, args) {
        //   console.log(name, args)
        })
        $remove.click(function () {
          var ids = getIdSelections()
          delete_confirm("#");
        })
      }
    
      $(
          function() 
          {
            initTable()
            // $('#locale').change(initTable)
          }
        )
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