<html lang="en">
    
<head> <?php include ("pack/header.php");?> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">

</head>

<style>
.back_img{
  background-image:url("img/image (62).png");
  height:80vh;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  width:100%;
  margin-top:50px;
  padding:40px;
}
.main_txt{
    position: absolute;
padding:30px;
left: 0px;
top: 80px;
background: #FFFFFF;
}

.btn{
    /*padding : 7px !important;*/
    /*font-size : 14px !important;*/
      padding : 7px !important;
        font-size : 17px !important;
        font-weight:600 !important;
}

.top-left {
  position: absolute;
 top: 35%;
  left: 0px;
  background:#2c2a2a66;
 font-weight: 600;
font-size: 48px;
line-height: 58px;
letter-spacing: 0.025em;
color: white;
padding:30px;
width:30%;


}
.heig_ht{
    width:100%;
    height:60vh !important;
    /*margin-top:80px;*/
}
.carousel {
    position: relative;
    margin-top: 100px;
}
.carousel-control .glyphicon-chevron-right, .carousel-control .icon-next {
    margin-right: -10px;
    display: none;
}
.carousel-control .glyphicon-chevron-left, .carousel-control .icon-prev {
    margin-left: -10px;
    display: none;
}
.carousel-control.left {
    background-image: -webkit-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);
    background-image: -o-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);
    /* background-image: -webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.5)),to(rgba(0,0,0,.0001))); */
    /* background-image: linear-gradient(to right,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%); */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
    /* background-repeat: repeat-x; */
    display: none;
}
.carousel-control.right {
    right: 0;
    left: auto;
    background-image: -webkit-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
    background-image: -o-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
    background-image: -webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.0001)),to(rgba(0,0,0,.5)));
    background-image: linear-gradient(to right,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
    background-repeat: repeat-x;
    display: none;
}
.projects {
  font-weight: 600;
  font-size: 48px;
  line-height: 58px;
  letter-spacing: 0.025em;
  color: #000000;
}

.con_top{
    margin-top:70px;
    margin-bottom : 10px;
}

h2 {
     margin-top: 0px; 
     margin-bottom: 0px;
}
.it{
    font-weight: 400;
    font-size: 18px;

}


/*.img-responsive{*/
/*    display : block;*/
/*    max-width: 75%;*/
/*    height: auto;*/
/*}*/

/*.top-left{*/
/*    background : #FFF6;    */
/*}*/

.center_itemm {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
    margin-bottom:40px;
}

@media (max-width:1440px) {

    .top-left {
    position: absolute;
    top: 35%;
    left: 0px;
    background:#2c2a2a66;
    font-weight: 600;
    font-size: 48px;
    line-height: 58px;
    letter-spacing: 0.025em;
    color: white;
    padding: 30px;
}
}


@media only screen and (min-width: 769px) and(max-width:992px){
    .img-responsive {
      display: block;
      max-width: 100%;
      height: auto;
    }
    
    .center_itemm {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
    } 
    
    .it {
      font-weight: 400;
      font-size: 15px;
      margin-top: 30px;
      text-align: justify;
    }
    
    .top-left {
      position: absolute;
      top: 123px;
      left: 0px;
    background:#2c2a2a66;
      font-weight: 600;
      font-size: 40px;
      line-height: 58px;
      letter-spacing: 0.025em;
      color: white;
      padding: 12px;
      width: 26%;
    }
}


@media only screen and (min-width: 577px) and(max-width:768px){
    .projects {
        font-weight: 600;
        font-size: 25px;
        line-height: 58px;
        letter-spacing: 0.025em;
        color: #000000;
    }
    .main_txt {
        position: absolute;
        padding: 30px;
        left: 0px;
        top: 85px;
        background: #ffffff94;
    }
    .back_img {
        background-image: url(img/1.jpg);
        height: 40vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        width: 100%;
        margin-top: 50px;
        padding: 40px;
    }
    .residential {
         font-size: 14px; 
        line-height: 30px;
        text-align: center;
         letter-spacing: 0em; 
    }
    .top-left {
        position: absolute;
        top: 90px;
        left: 0px;
     background:#2c2a2a66;
        font-weight: 600;
        font-size: 48px;
        line-height: 58px;
        letter-spacing: 0.025em;
        color: white;
        padding: 10px;
        width: 25%;
    }
    .heig_ht {
    width: 100%;
    height: 600px !important;
}
.top-left {
    position: absolute;
    top: 23%;
    left: 0px;
   background:#2c2a2a66;
    font-weight: 600;
    font-size: 48px;
    line-height: 58px;
    letter-spacing: 0.025em;
    color: white;
    padding: 41px;
}
    
    .it{
        text-align : justify;
    }
    
    .img-responsive{
        transform : translateY(23px);
        max-width : 90%;
    }
    .btn{
        padding : 7px !important;
        font-size : 17px !important;
        font-weight:600 !important;
    }
    
}



#footer-cont{
    margin : 0;
}

#footer-cont-child{
    margin-top : 25px;   
    padding-bottom:3%;
}

@media(max-width:576px){
    
    
    .btn{
        padding : 10px !important;
        font-size : 16px !important;
    }
    
    #footer-links{
        text-align : center;
    }
    
    /*.img-responsive{*/
    /*    width : 78%;*/
    /*    margin : auto;*/
    /*}*/
    
    .it{
        text-align : justify;
        padding : 0px 0px 2px 2px;
        margin-top:20px;
        margin-bottom:20px;
    }
    
    .top-left {
    position: absolute;
    top: 176px;
    left: 75px;
  background:#2c2a2a66;
    font-weight: bold;
    font-size: 28px;
    line-height: 42px;
    letter-spacing: 0.025em;
    color: white;
    padding: 10px;
    padding-left: 80px;
    width: 64%;
}
    
    .container4{
        width : 96%;
    }
    
    .center_itemm{
        display : flex;
        flex-direction : column;
        margin-bottom:0px;
    }
    .column_reverse{
        display : flex;
        flex-direction : column-reverse;
    }
    
    .heig_ht {
    width: 100%;
    height: 40vh !important;
}
}

.it{
    text-align : justify;
}

#footer-links{
        text-align : center;
}
</style>
<body>
    
      <div class="item">
        <img src="img/51.jpg" alt="New york" class="heig_ht">
         <div class="top-left">About </div>

      </div>

<div class="container con_top">
    <div class="row center_content center_itemm">
        
        <div class="col-sm-5">
            <img src="img/52.jpg" class="img-responsive">
        </div>
        <div class="col-sm-7">
            <p class='it'>Land Rover is a British luxury car manufacturer that specializes in four-wheel-drive vehicles. It is a brand within the Jaguar Land Rover (JLR) group, which is a subsidiary of the Indian company Tata Motors. The Land Rover name was originally used by the Rover Company for a model introduced in 1948, but it developed into a brand encompassing a range of four-wheel-drive models, including the Defender, Discovery, Freelander, Range Rover, Range Rover Sport, and Range Rover Evoque.


</p>
        </div>
    </div>
    <div class="row center_content center_itemm con_top1 column_reverse">
        <div class="col-sm-6">
            <p class='it'>The Range Rover is one of Land Rover's flagship models and is known for its luxury, off-road capability, and distinctive design. The Range Rover family includes different models catering to various market segments, from the compact Evoque to the full-size Range Rover. These vehicles are often associated with high-end features, advanced technology, and a combination of luxury and ruggedness.
</p>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
            <img src="img/50.png" class="img-responsive">
        </div>
    </div>
    <div class="row center_content center_itemm con_top1">
        <div class="col-sm-5">
            <img src="img/53.jpg" class="img-responsive">
        </div>
        <div class="col-sm-7">
            <p class='it'>As of my last knowledge update in January 2022, Land Rover has been focusing on electric and hybrid technologies to align with global trends toward more sustainable and environmentally friendly transportation. They have announced plans to introduce electric and hybrid variants across their lineup.
</p>
        </div>
    </div>
</div>




  <?php include("pack/footer.php");?>  

</body>
</html>