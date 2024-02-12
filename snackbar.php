<!DOCTYPE html>
<html>
<head>
    <?php include "pack/header.php";?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<a href="https://www.flaticon.com/free-icons/tick" title="tick icons"></a>
<style>
.success {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #98bb60; /* Green background for success message */
  color: black;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-weight:800;
  font-size: 17px;
}
.error{
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: red; /* Green background for success message */
  color: black;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-weight:800;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

#tick-icon {
  display: inline-block;
  width: 20px;
  height: 20px;
  background-image: url('img/check-mark.png'); /* Provide the URL of your tick icon image */
  background-size: cover;
  margin-top:-2px;
  margin-right: 10px;
  vertical-align: middle;
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
</style>
</head>
<body>
<button onclick="myFunction()">Show Snackbar</button>

<div id="snackbar" class="<?php echo $snackbarClass; ?>"><span id="tick-icon"></span><?php echo $snackbarMessage; ?></div>


<script>
function myFunction() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 300000000000000);
}
</script>

</body>
</html>
