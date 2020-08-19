<!DOCTYPE html>
<html>
<head>
  <title>bookie.com</title>
   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <?php  include 'connection.php';?>
</head>

<body>

<style>

.cover{
  height:70vh;
  width: 100%;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size:3.5rem;
  font-family: 'Piedra', cursive;
  color:#fff;
}

.footer-brand{
  font-size:2.5rem;
}

.top-left {
   position: absolute;
  top: 8px;
  left: 16px;
}
.sidebar {
  height:100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top:0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

.fa-facebook:hover{
  color: #3B5998;
}

.fa-instagram:hover{
  color: #125688;
}

.fa-twitter:hover{
  color: #55ACEE;
}

.fa-youtube:hover{
  color: #bb0000;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

.logoimg{
  background-position:center;
  background-size:cover;
  height:180px;
  width:200px;
}

</style>
<div style="position: relative;text-align: center;color:white;">
  <!-- <img src="https://source.unsplash.com/1600x900/?library" class="overlay" style="width:100%; height:70vh"> -->
  <img src="img/cover.jpg" class="cover">
  <div class="centered ">"Reading brings us unknown friends"</div> 
    <div id="main" class="top-left">
        <button class="openbtn" onclick="openNav()">☰ Menu</button>
  </div>
</div><br><br><br><br><br>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="login.php"> <i class="fas fa-sign-in-alt"></i> Login </a>
  <a href="register.php"> <i class="fas fa-user-plus"></i> Signup</a>
  <a href="about.php"><i class="fas fa-info-circle"></i>  About us</a>
  <a href="gallery.php"><i class="far fa-image"></i>    Gallery </a>
</div>


<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>



<div class="container">
  <h2> Fresh Recommendations </h2><br>
  <div class="row ">

  <?php

    $query = "select * from viewbooks order by id ASC";
    $queryfire =  mysqli_query($con,$query) ;
    $num = mysqli_num_rows($queryfire);

    if ($num>0)
    {
      while($product = mysqli_fetch_array($queryfire))
      {
  ?>



        <div class="col-xl-3 col-lg-6 col-md-6 col-6">
          <form method="POST">
            <div class="card">
              <h6 name="name" class="card-title text-center"> <?php echo $product['name']; ?> </h6>
              <div class="card-body">
                <img src="  <?php echo $product['image']; ?> "  class="img-fluid mb-2"  style="height:180px; width:150px" name="image">
                <h6 class="card-title" name="price"> &#x20B9; <?php echo $product['price']; ?> </h6>
                <h6 class="badge badge-success"> 4.4 <i class="fa fa-star"></i> </h6>
              </div>

              <div class="btn container">
                <button class="btn  bg-success text-white" style="padding-top:5px " name="addcart"> Add to Cart </button>
              </div>

            </div><br><br><br>
          </form>
        </div>



        <?php
      }
    }

  ?>
  </div>
  </div><br>
<div class="container">
 <h3 class="text-center nav-link"> Load more </h3>
</div><br>



<div class="container">
  <div class="row">
    <div class="col-xl-6 col-lg-6 col-md-4 col-6">
      <img src="img/order.png" width="350" height="250">
    </div>

    <div  class=" col-xl-6 col-lg-6 col-md-6 col-6">
       <h2 class="text-center"> Easy to Buy and Sell </h2>
      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
    </div>

  </div>

</div><br><br>


<div class="container">
  <div class="row ">
    <div class="col-xl-6 col-lg-6 col-md-6 col-6">
       <h2 class="text-center"> Timely Pickup and Delivey </h2>
      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
    </div>

    <div  class="col-xl-6 col-lg-6 col-md-6 col-6">
    <img src="img/del.png" width="350" height="250" class="float-right">
  </div>
  </div>

</div><br><br>


<div class="container">
  <div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-6">
      <img src="img/as.png" width="400" height="250" class="float-left">
    </div>

    <div  class="col-xl-6 col-lg-6 col-md-6 col-6">
       <h2 class="text-center"> 100% Genuin books </h2>
      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
    </div>

  </div>

</div><br><br>


<div class="container w-50 m-auto" data-aos="flip-left">
  <div class="row">
    <div class="col-xl-12 col-lg-6 col-md-10 col-sm-12">
      <form>
        <h1 class="text-center"> Contact Us </h1>
        <hr class="bg-warning container" style="height:5px; width:200px;">
        <div class="form-group">
          <label> Username: </label>
          <input type="text" name="" class="form-control" placeholder="Username">
        </div>

        <div class="form-group">
          <label> Email: </label>
          <input type="email" name="" class="form-control" placeholder="Email">
        </div>

        <div class="form-group">
          <label> Contact: </label>
          <input type="text" name="" class="form-control" placeholder="Contact">
        </div>

        <div class="form-group">
          <label> Leave your Message: </label>
          <textarea class="form-control"></textarea>
        </div>
        <div class="container text-center  py-3">
           <button class="btn bt-md bg-success btn-center text-white w-30 ml-auto"> Leave your Message </button>
        </div>

      </form>
    </div>

  </div>
</div><br><br>

<div class="container-fluid" style="background-color:#282828">
  <div class="row">



    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-10">
      <div class="text-white text-center">
        <h5 class=" ml-auto mt-2"> LOCATIONS </h5>
        <hr class="bg-warning container" style="height:5px;  width:200px;">
        <h6 class="nav-link"> Ambagan </h6>
        <h6 class="nav-link"> Tezpur </h6>
        <h6 class="nav-link"> Nagaon </h6>
      </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-10">
      <div class="text-white text-center">
        <h5 class=" ml-auto mt-2"> REFURBISHED BOOK </h5>
        <hr class="bg-warning container" style="height:5px;  width:200px;">
        <h6 class="nav-link"> Help </h6>
        <h6 class="nav-link"> Sitemap </h6>
        <h6 class="nav-link"> Legal & Privacy information </h6>
      </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-10">
      <div class="text-white text-center">
        <h5 class=" ml-auto mt-2"> POLICY </h5>
        <hr class="bg-warning container" style="height:5px;  width:200px;">
        <h6 class="nav-link"> Return policy </h6>
        <h6 class="nav-link"> Terms Of Use </h6>
        <h6 class="nav-link"> Security </h6>
        <h6 class="nav-link"> Privacy </h6>
      </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-10">
      <div class="text-white text-center">
        <h5 class=" ml-auto mt-2"> ABOUT </h5>
        <hr class="bg-warning container" style="height:5px;  width:200px;">
        <h6 class="nav-link"> Contact Us </h6>
        <h6 class="nav-link"> About Us </h6>
        <h6 class="nav-link"> Careers </h6>
        <h6 class="nav-link"> bookie Stories </h6>
        <h6 class="nav-link"> Press </h6>
      </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-10">
      <div class="text-center text-white mb-2">
        <h5 class=" ml-auto mt-2"> FOLLOW </h5>
        <hr class="bg-warning container" style="height:5px;  width:200px;">
        <i class="fab fa-facebook fa-2x"></i>
        <i class="fab fa-twitter fa-2x"></i>
        <i class="fab fa-instagram fa-2x"></i>
        <i class="fab fa-youtube fa-2x"></i>
    </div>
</div>

<div class="container-fluid text-white text-center">
  <hr class="bg-warning" style="height:5px; width:100%">
  <h3 class="mb-2"> &copy; 2020-2030 bookie.com </h3>
</div>

</div>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      offset: 300,
      duration:2000
    });
  </script>

</body>
</html>

