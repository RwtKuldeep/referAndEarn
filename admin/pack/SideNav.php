<!--<php include("header.php"); ?>-->

<div class="sidenav">
  <div class="container-fluid">
    <div class="row py-3">
      <div class="col-md-12">
        <div class="row align-items-center">
          <div class="col-12" style="margin-bottom:-20px;">
            <div class="user-pic">
              <!--<a href="dashboard.php"> <img src="../img/arenaalogo.jpeg" class="img-fluid"></a>-->
              <a href="request.php" style="text-decoration:none; text-align:center;">
                <h3><?php echo $siteName; ?></h3>
              </a>
              <div class="sidebar-header">
                <a href="request.php" style="text-decoration:none; text-align:center;">
                  <!-- <div class="user-info text-white"> <span class="user-name">Ecommerce </span> <span class="user-role">Administrator</span> <span class="user-status"><i class="fa fa-circle" style="color:green;"></i></div> -->
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr style="height:0.15px;background-color:lightgrey;">
  </div>
  <div class="menu">
    <ul class="list-unstyle list-inline ">
      <li><a class="text-white" href="dashboard.php"> <i class="fas fa-columns"></i> <span>Dashboard</span> </a></li>
      <li><a class="text-white" href="users.php"> <i class="fas fa-shapes"></i> <span>Users</span> </a></li>
      <li><a class="text-white" href="bookmarklist.php"> <i class="fas fa-shapes"></i> <span>Favourite</span> </a></li>
      <li><a class="text-white" href="projects.php"> <i class="fas fa-chalkboard-teacher"></i> <span>Projects</span> </a></li>
      <li><a class="text-white" href="payments.php"> <i class="fas fa-chalkboard-teacher"></i> <span>Recharges</span> </a></li>
      <li><a class="text-white" href="wallet.php"> <i class="fas fa-chalkboard-teacher"></i> <span>Wallets</span> </a></li>
      <li><a class="text-white" href="asset.php"> <i class="fas fa-chalkboard-teacher"></i> <span>Asset</span> </a></li>
      <li><a class="text-white" href="withdraw.php"> <i class="fas fa-chalkboard-teacher"></i> <span>Withdrawal Request</span> </a></li>
      <!--<li><a class="text-white" href="request.php"> <i class="fas fa-chalkboard-teacher"></i> <span>Requests</span> </a></li>-->
      <!--<li><a class="text-white" href="changePassword.php"> <i class="fas fa-shapes"></i> <span>Change Password</span> </a></li>-->
      <li><a class="text-white" href="logout.php"> <i class="fas fa-sign-out-alt"></i> <span>Logout</span> </a></li>
    </ul>
  </div>

</div>
<header class="header">
  <nav class="navbar">

    <div class="burger" id="burger">
      <span class="burger-open">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16">
          <g fill="#252a32" fill-rule="evenodd">
            <path d="M0 0h24v2H0zM0 7h24v2H0zM0 14h24v2H0z" />
          </g>
        </svg>
      </span>
      <span class="burger-close blue-bg">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
          <path fill="#ffffff" fill-rule="evenodd" d="M17.778.808l1.414 1.414L11.414 10l7.778 7.778-1.414 1.414L10 11.414l-7.778 7.778-1.414-1.414L8.586 10 .808 2.222 2.222.808 10 8.586 17.778.808z" />
        </svg>
      </span>
    </div>

    <p class="my-2 ml-4 font-weight-bold"><?php echo $siteName; ?></p>


    <div>


      <ul class="menu  blue-bg" id="menu">
        <li class="pl-3 pt-3">
          <div class="row align-items-center">
            <!--<div class="col-1"></div>-->

            <div class="col-10">
              <div class="user-pic">

                <!--<img src="../images/yesgirl.jpeg" class="img-fluid">-->
                <!--<a href="dashboard.php"> <img src="../images/yesgirl.jpeg" class="img-fluid"></a>-->
                <a href="request.php" class="user-info text-white" style="text-decoration:none;  text-align:center;">
                  <h5><?php echo $siteName; ?></h5>
                </a>
                <!--<a href="dashboard.php"> <img src="../img/arenaalogo.jpeg" class="img-fluid"></a>-->
              </div>
            </div>

            <div class="col-2"></div>
            <!--<div class="col-7">-->
            <!--  <div class="user-info text-white">-->
            <!--    <p class="user-name mb-2"></p>-->
            <!--    <p class="user-role mb-2">YesGirlStore</p>-->
            <!--    <p class="user-status mb-1"><i class="fa fa-circle text-success mr-2"></i><span class="text-white">Online</span> </p>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
        </li>
        <li class="pl-4 pt-3"><a class="text-white" href="dashboard.php"> <i class="fas fa-columns"></i> <span>Dashboard</span> </a></li>
        <li class="pl-4 pt-3"><a class="text-white" href="users.php"> <i class="fas fa-shapes"></i> <span>Users</span> </a></li>
        <li class="pl-4 pt-3"><a class="text-white" href="projects.php"> <i class="fas fa-chalkboard-teacher"></i> <span>Projects</span> </a></li>
        <li class="pl-4 pt-3"><a class="text-white" href="payments.php"> <i class="fas fa-chalkboard-teacher"></i> <span>Recharges</span> </a></li>
        <li class="pl-4 pt-3"><a class="text-white" href="asset.php"> <i class="fas fa-chalkboard-teacher"></i> <span>Asset</span> </a></li>
        <li class="pl-4 pt-3"><a class="text-white" href="wallet.php"> <i class="fas fa-chalkboard-teacher"></i> <span>Wallet</span> </a></li>
        <li class="pl-4 pt-3"><a class="text-white" href="withdraw.php"> <i class="fas fa-chalkboard-teacher"></i> <span>>Withdrawal Request</span> </a></li>
        <!--<li class="pl-4 pt-3"><a class="text-white" href="request.php"> <i class="fas fa-chalkboard-teacher"></i> <span>Requests</span> </a></li>-->
        <!--<li class="pl-4 pt-3"><a class="text-white" href="changePassword.php"> <i class="fas fa-shapes"></i> <span>Change Password</span> </a></li>-->
        <li class="pl-4 pt-3 pb-5"><a class="text-white" href="logout.php"> <i class="fas fa-sign-out-alt"></i> <span>Logout</span> </a></li>
      </ul>



  </nav>
</header>

<div id="snackbar"></div>


<script>
  const burger = document.getElementById("burger");
  const menu = document.getElementById("menu");
  const main = document.querySelector(".main");

  // Sidebar Menu Toggle
  burger.addEventListener("click", function() {
    burger.classList.toggle("active");
    menu.classList.toggle("active");
  });

  // Close Sidebar by Click Outside
  main.addEventListener("click", function() {
    if (menu.classList.contains("active")) {
      burger.classList.remove("active");
      menu.classList.remove("active");
    }
  });

  // Close Sidebar by Press Escape(ESC)
  window.addEventListener("keyup", function(e) {
    if (e.key == "Escape" && menu.classList.contains("active")) {
      burger.classList.remove("active");
      menu.classList.remove("active");
    }
  });


  $(".sidebar-dropdown > a").click(function() {
    $(".sidebar-submenu").slideUp(200);
    if ($(this).parent().hasClass("active")) {
      $(".sidebar-dropdown").removeClass("active");
      $(this).parent().removeClass("active");
    } else {
      $(".sidebar-dropdown").removeClass("active");
      $(this).next(".sidebar-submenu").slideDown(200);
      $(this).parent().addClass("active");
    }
  });
  $("#close-sidebar").click(function() {
    $(".page-wrapper").removeClass("toggled");
  });
  $("#show-sidebar").click(function() {
    $(".page-wrapper").addClass("toggled");
  });
</script>

<!--Accordion-->
<script>
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("activeSide");
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
      } else {
        panel.style.display = "block";
      }
    });
  }
</script>
<!--Accordion-->