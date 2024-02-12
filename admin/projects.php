<?php
require 'pack/config.php';
if ($Admin) {
    if (isset($_GET['type'])) {
        $type = input($_GET['type']);
        if ($type == 'status') {
            $operation =  input($_GET['operation']);
            $id =  input($_GET['id']);
            if ($operation == 'active') {
                $status = '1';
            } else {
                $status = '0';
            }

            $update_status_sql = db("update product set status = '$status' where id='$id'");
        }
    }
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
                      <div class="col-8"><h3 class="family"><b>All Products</b></h3></div>
                      <div class="col-4 text-right "><i class="fal fa-plus-circle iconss" aria-hidden="true" data-toggle="modal" data-target="#AddProject"></i> </div>
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
                                  data-url="server/product.php"
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
            <div class="modal fade" id="AddProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
              <form method="post" action="php/product/product_add.php" autocomplete="off" enctype="multipart/form-data" id="add_student_form">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title family font-weight-bold" id="exampleModalLongTitle">Add Project</h3>
                      <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close"> <span style="font-size: 32px;" aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body ml-3">
        
                      <div class="row">
                        <div class="mt-3">
                          <h3 class="family">Project's Information</h3>
                          <hr class="m-0" style="border:2px solid #395573; width:150px;float:left">
                        </div>
                      </div>
                    
                        <div class="row w-100 mt-4">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="family">Trending price*</label>
                                <input type="text" class="form-control family" name="trending" placeholder="Enter Product Name" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="family">Daily Income</label>
                                <input type="text" class="form-control family" name="daily" placeholder="Enter Product Name" required>
                              </div>
                            </div>
                        </div>
                        <div class="row w-100 mt-4">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="family">Revenue Cycle*</label>
                                <input type="text" class="form-control family" name="revenue" placeholder="Enter Product Name" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="family">Total Income*</label>
                                <input type="text" class="form-control family" name="total" placeholder="Enter Product Name" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group" style="overflow:hidden;">
                                <label class="family">Product Image</label><br>
                                <input type="file" class="form-control family" style="width:100%;" name="image[]" accept="image/*" multiple required='yes'>
                              </div>
                            </div>
                        </div>
        
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-dark" value="ADD">
                      </div>
                    </div>
                  </div>
              </form>
                </div>
            </div>
        <!-- Add Student Modal -->

    <div id="snackbar"></div>   
    <?php include("pack/footer.php"); ?>
    <script>
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
          
          '<a class="remove" href="javascript:void(0)" title="Delete">',
          '<i class="fa fa-trash mr-2 text-danger"></i>',
          '</a>'
          
          
        ].join('')
      }
      
      window.operateEvents = 
      {
            
            'click .like': function (e, value, row, index) {
                let id = JSON.stringify(parseInt(row.id));
                location.href = "project_edit.php?id="+id;
                
                
            },
            'click .remove': function (e, value, row, index) 
            {
                let id = JSON.stringify(parseInt(row.id));
                delete_confirm("php/product/product_delete.php?id="+id);
            }
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
                location.href = "projects.php?type=status&operation=deactive&id="+userId;
              } else 
              {
                location.href = "projects.php?type=status&operation=active&id="+userId;
              }
        },
        'click .remove': function (e, value, row, index) {}
      }
    //   viewStatus Change End -----------------------------------------------
      
      
      
    
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
                [
                    [{
                      field: 'state',
                      checkbox: true,
                      align: 'center',
                      valign: 'middle'
                    }, {
                        title: 'S. NO',
                        field: 'sno',
                        align: 'center',
                        valign: 'middle',
                    }, {
                        title: 'Id',
                        field: 'id',
                        align: 'center',
                        valign: 'middle',
                        sortable: true
                    }, {
                        title: 'Trending Price',
                        field: 'trending',
                        sortable: true,
                        align: 'center'
                    }, {
                        title: 'Daily Income',
                        field: 'daily',
                        // sortable: true,
                        align: 'center'
                    },{
                        title: 'Revenue Cycle',
                        field: 'revenue',
                        // sortable: true,
                        align: 'center'
                    },{
                        title: 'Total Income',
                        field: 'total',
                        // sortable: true,
                        align: 'center'
                    },  {
                        title: 'InsertData',
                        field: 'insertData',
                        align: 'center',
                    }, {
                      field: 'operate',
                      title: 'Action',
                      align: 'center',
                      clickToSelect: false,
                      events: window.operateEvents,
                      formatter: operateFormatter
                    }]
                   
                ]
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
          delete_confirm("php/product/product_delete.php?id="+ids);
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