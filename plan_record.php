<?php
include "admin/pack/config.php";
if(isset($_SESSION['TheUser'])){
    $uid=$_SESSION['userid'];  
?>
<html>
    <head>
        <?php include "pack/header.php";?>
        <style>
         table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 2px solid black;
}
.a1{
            padding:20px;
        }
        .a2{
            padding:15px 0px 0px 27px;
        }
        .a3{
            padding:15px 0px 12px 27px;
        }
.info{
            color:red;
            font-size:14px;
        }
        .info1{
            color:black;
            font-size:15px;
        }
th, td {
  text-align: left;
  padding: 8px;
  border: 2px solid black;
}

tr:nth-child(even){background-color: #f2f2f2}

       .input{
            border: none;
            background: #80808030;
            border-radius: 25px;
            padding: 0px 0px 0px 22px;
            width: 95px;
            margin-right: 20px;
            height: 27px;
        }
        .crd{
            background:orange;
            margin:10px 0px 0px 0px;
            border-radius:25px;
            width:356px;
            
        }
        .aad{
           background:orange;
           color:white;
           display:flex;
           align-items:center;
        }
        .al{
            font-size:17px;
            margin:0px 0px 0px 0px;
        }
        .personal{
            font-size:14px;
            margin:1px 0px 0px 94px;
            padding:15px 0px 14px 0px;
        }
        .tab {
  overflow: hidden;
  border: 1px solid #ccc;
  display:flex;
  color:orange;
}

/* Style the buttons inside the tab */
.tab button {
    background:#80808000;
    color: orange;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 75px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: orange;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: orange;
  color:white;
}

/* Style the tab content */
.tabcontent {
}
/*@media screen and (max-width: 667px){*/
/*     .tab {*/
/*  overflow: hidden;*/
/*  border: 1px solid #ccc;*/
/*  color:orange;*/
/*}*/

/* Style the buttons inside the tab */
/*.tab button {*/
/*    background:#80808000;*/
/*    color: orange;*/
/*    float: left;*/
/*    border: none;*/
/*    outline: none;*/
/*    cursor: pointer;*/
/*    padding: 14px 68px;*/
/*    transition: 0.3s;*/
/*    font-size: 17px;*/
/*}*/
/*    .tab button:hover {*/
/*  background-color: orange;*/
/*}*/

/* Create an active/current tablink class */
/*.tab button.active {*/
/*  background-color: orange;*/
/*  color:white;*/
/*}*/

/* Style the tab content */
/*.tabcontent {*/
/*  display: none;*/
/*  padding: 6px 12px;*/
/*  border: 1px solid #ccc;*/
/*  border-top: none;*/
/*}*/
/*}*/
/*@media screen and (max-width: 844px){*/
/*     .tab {*/
/*  overflow: hidden;*/
/*  border: 1px solid #ccc;*/
/*  color:orange;*/
/*}*/

/* Style the buttons inside the tab */
/*.tab button {*/
/*    background:#80808000;*/
/*    color: orange;*/
/*    float: left;*/
/*    border: none;*/
/*    outline: none;*/
/*    cursor: pointer;*/
/*    padding: 14px 71px;*/
/*    transition: 0.3s;*/
/*    font-size: 17px;*/
/*}*/
/*    .tab button:hover {*/
/*  background-color: orange;*/
/*}*/

/* Create an active/current tablink class */
/*.tab button.active {*/
/*  background-color: orange;*/
/*  color:white;*/
/*}*/

/* Style the tab content */
/*.tabcontent {*/
/*  display: none;*/
/*  padding: 6px 12px;*/
/*  border: 1px solid #ccc;*/
/*  border-top: none;*/
/*}*/
/*}*/
/*@media screen and (max-width: 896px){*/
/*     .tab {*/
/*  overflow: hidden;*/
/*  border: 1px solid #ccc;*/
/*  color:orange;*/
/*}*/

/* Style the buttons inside the tab */
/*.tab button {*/
/*    background:#80808000;*/
/*    color: orange;*/
/*    float: left;*/
/*    border: none;*/
/*    outline: none;*/
/*    cursor: pointer;*/
/*    padding: 14px 77px;*/
/*    transition: 0.3s;*/
/*    font-size: 17px;*/
/*}*/
/*    .tab button:hover {*/
/*  background-color: orange;*/
/*}*/

/* Create an active/current tablink class */
/*.tab button.active {*/
/*  background-color: orange;*/
/*  color:white;*/
/*}*/

/* Style the tab content */
/*.tabcontent {*/
/*  display: none;*/
/*  padding: 6px 12px;*/
/*  border: 1px solid #ccc;*/
/*  border-top: none;*/
/*}*/
/*}*/
        </style>
    </head>
    <body>
        <div class="container-fluid aad">
                <i class="fa fa-angle-left al" onclick="goBack()"></i>
                <p class="personal">Plan Record</p>
            </div>
            <div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'London')">Income</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Finish</button>
</div>

                            <div id="London" class="container-fluid tabcontent active">
                                       <?php
                                      $current=date("Y-m-d");
                                      $o=db("select * from orders where uid='$uid'");
                                      if($num=mysqli_num_rows($o)>0){
                                          $k=1;
                                          while($ores=mysqli_fetch_assoc($o)){
                                              $pid=$ores['pid'];
                                            $days=$ores['days'];
                                            $updated_date=$ores['updated_date'];
                                            $p=db("select * from product where id='$pid'");
                                            $pres=mysqli_fetch_assoc($p);
                                            $income=$pres['daily'];
                                            $revenue=$pres['revenue'];
                                            $trending=$pres['trending'];
                                          
                                      ?>
                                     <div class="crd">
                                    <div class="row">
                                        <div class="col-xs-6 a2">
                                            <?php
                                            if($updated_date=='0'){
                                                
                                            }
                                            else{
                                            ?>
                                            <p class="info"><?php echo $updated_date;?></p>
                                            <?php
                                            }
                                            ?>
                                            <p class="info1">Plan <?php echo $trending?></p>
                                            <p class="info1">No of Days <?php echo $revenue?></p>
                                            <p class="info1">Daily Income <?php echo $income?></p>
                                            </div>
                                        <div class="col-xs-2 a3"></div>
                                        <div class="col-xs-4 a3">
                                            <p class="info1"><?php echo '+'.$income?></p>
                                            <p class="info2">
                                                <?php
                                                if($updated_date=='0'){
                                           echo '<span style="color: blue;backgroundColor:white;">Pending</span>';
                                                    
                                                }
                                                else{
                                           echo '<span style="color: blue;backgroundColor:white;">Success</span>';
                                                }
                                       ?>
                                       </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $k++;
                                          }
                                      }
                                      else{
                                          echo "No Record";
                                      }
                                    ?>
                                  
                                  
                                </div>

                            <div id="Paris" style="display:none;" class="container-fluid tabcontent">
                                       <?php
                                      $current=date("Y-m-d");
                                      $o=db("select * from orders where uid='$uid'");
                                      if($num=mysqli_num_rows($o)>0){
                                          $k=1;
                                          while($ores=mysqli_fetch_assoc($o)){
                                              $pid=$ores['pid'];
                                            $days=$ores['days'];
                                            $updated_date=$ores['updated_date'];
                                            $p=db("select * from product where id='$pid'");
                                            $pres=mysqli_fetch_assoc($p);
                                            $Total=$pres['total'];
                                            $income=$pres['daily'];
                                            $revenue=$pres['revenue'];
                                            $trending=$pres['trending'];
                                            if($days=='0'){
                                          
                                      ?>
                                      
                                      <div class="crd">
                                    <div class="row">
                                        <div class="col-xs-6 a2">
                                            <p class="info"><?php echo $updated_date;?></p>
                                            <p class="info1">Plan <?php echo $trending;?></p>
                                            <p class="info1">No of Days <?php echo $revenue;?></p>
                                            <p class="info1">Daily Income <?php echo $income;?></p>
                                            <p class="info1">Total Income <?php echo $Total;?></p>
                                            </div>
                                        <div class="col-xs-2 a3"></div>
                                        <div class="col-xs-4 a3">
                                            <p class="info1"><?php echo '+'.$Total?></p>
                                            <p class="info2">
                                                <?php
                                           echo '<span style="color: blue;backgroundColor:white;">Success</span>';
                                       ?>
                                       </p>
                                            </div>
                                        </div>
                                    </div>
                                      
                                       <?php
                                    $k++;
                                          }
                                          else{
                                              echo "No Record";
                                          }
                                          }
                                      }
                                      else{
                                          echo "No Record";
                                      }
                                    ?>
                                </div>
                                  

<script>
        function goBack() {
            // Use window.history to go back to the previous page
            window.history.back();
        }
        </script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
            
    </body>
    </html>
        <?php
}
else{
  header("Location:login.php"); 
}
if (isset($_SESSION['msg'])) {
$msg = $_SESSION['msg'];
$class=$_SESSION['class'];
?>
        <script>
            var x = document.getElementById("snackbar");
            x.innerHTML = "<?php echo $msg; ?>";
            x.classList.add("<?php echo $class;?>");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        </script>

<?php
unset($_SESSION['msg']);
}
?>                               