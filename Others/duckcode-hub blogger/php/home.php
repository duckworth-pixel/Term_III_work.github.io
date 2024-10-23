<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- swiper css -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- fontawesome cdn links -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <!-- my custom css -->
     <link rel="stylesheet" href="./css/styles.css">
    <title>home</title>
</head>
<body>

<!-- header starts -->

<section class="header">
    <a href="home.php" class="logo"><img src="./images/duckcodelogo.jpg" alt="duckcodelogo" height="50px" width="50px" style="border-radius: 50%;"></a>
    <nav class="navbar">
        <a href="home.php">home</a>
        <a href="about.php">about</a>
        <a href="package.php">package</a>
        <a href="book.php">book</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>
</section>
<!-- header ends -->
<!-- landing page here -->

<section class="home">
    <div class="swiper home-slide">
    <div class="swiper wrapper">
         <div class="swiper-slide slide" style="background: url('./images/th (1).jpeg') no-repeat">
            <div class="content">
                <span>explore, discover, travel</span>
                <h3>travel around the world</h3>
                <a href="package.php" class="btn">Discover</a>
            </div>
        </div>
         <div class="swiper-slide slide" style="background: url('./images/th (1).jpeg') no-repeat">
            <div class="content">
                <span>explore, discover, travel</span>
                <h3>discover new places</h3>
                <a href="package.php" class="btn">Discover</a>
            </div>
        </div>
         <div class="swiper-slide slide" style="background: url('./images/th (1).jpeg') no-repeat">
            <div class="content">
                <span>explore, discover, travel</span>
                <h3> make your tour</h3>
                <a href="package.php" class="btn">Discover</a>
            </div>
        </div>
     </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    
    </div>
</section>
<!-- home page ends here -->
<!-- ================================================
 ==================================================== -->

  <!-- home about section start here -->

  <section class="home ">
    <div class="about">
        <div class="image">
    <img src="./images/th (4).jpeg" alt="">
</div>
<div class="content">
    <h3>about us</h3>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus voluptatum nostrum incidunt consequuntur eius quis, excepturi laudantium unde dolores repellat dolorum modi exercitationem nam, recusandae aliquam cum? Neque, aliquid quidem.</p>
    <a href="about.php" class="btn">read more</a>
</div>
</div>

</section>

<!-- home package starts here -->
 <section class="home-packages">
    <h1 class="heading-title">our packages</h1>
    <div class="box-container">
        <div class="box">
            <div class="image">
                <img src="./images/th (5).jpeg" alt="">
            </div>
            <div class="content">
                <h3>adventure and tour</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quisquam aspernatur quae suscipit animi aperiam! Tempore temporibus dolore ipsum ab?</p>
                <a href="book.php" class="btn">book now</a>
            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="./images/th (5).jpeg" alt="">
            </div>
            <div class="content">
                <h3>adventure and tour</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quisquam aspernatur quae suscipit animi aperiam! Tempore temporibus dolore ipsum ab?</p>
                <a href="book.php" class="btn">book now</a>
            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="./images/th (5).jpeg" alt="">
            </div>
            <div class="content">
                <h3>adventure and tour</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quisquam aspernatur quae suscipit animi aperiam! Tempore temporibus dolore ipsum ab?</p>
                <a href="book.php" class="btn">book now</a>
            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="./images/th (5).jpeg" alt="">
            </div>
            <div class="content">
                <h3>adventure and tour</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quisquam aspernatur quae suscipit animi aperiam! Tempore temporibus dolore ipsum ab?</p>
                <a href="book.php" class="btn">book now</a>
            </div>
        </div>
    </div>
    <div class="load-more"><a href="package.php" class="btn">load more</a></div>

 </section>

  <!-- service section  here  -->
  <section class="services">
    <h1 class="heading-title">Our services</h1>

    <div class="box-container">

        <div class="box">
            <img src="./images/th (8).jpeg" alt="">
            <h3>adventure</h3>
        </div>

        <div class="box">
            <img src="./images/th (3).jpeg" alt="">
            <h3>tour guide</h3>
        </div>

        <div class="box">
            <img src="./images/th (2).jpeg" alt="">
            <h3>trekking</h3>
        </div>
        <div class="box">
            <img src="./images/goose.jpeg" alt="">
            <h3>camp fire</h3>
        </div>
    </div>
  </section>
  <!-- home offer section starts here -->

  <section class="home-offer">
    <div class="content">
        <h3>Upto 50% off</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
        <a href="book.php" class="btn">book now</a>
    </div>

  </section>

  <!-- home offer section ends here -->











<!-- footer section starts here -->

<section class="footer">
<div class="box-container">
    <div class="box">
        <h3>quick links</h3>
        <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
        <a href="about.php"><i class="fas fa-angle-right"></i>about</a>
        <a href="book.php"><i class="fas fa-angle-right"></i>book</a>
        <a href="package.php"><i class="fas fa-angle-right"></i>package</a>
    </div>
    <div class="box">
        <h3> extra links </h3>
        <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
        <a href="#"><i class="fas fa-angle-right"></i>terms of use</a>
        <a href="#"><i class="fas fa-angle-right"></i>privacy policy</a>
        <a href="#"><i class="fas fa-angle-right"></i>Customer Support</a>
    </div>
    <div class="box">
        <h3> contact info </h3>
        <a href="#"> <i class="fas fa-phone"></i><br> +254 111 531 686</a>
        <a href="#"><i class="fas fa-envelope"></i><br>duckcodes671@gmail.com</a>
        <a href="#"><i class="fas fa-map"></i><br>Virtual office,Nairobi - Kenya</a>
     
    </div>
    <div class="box">
        <h3> follow us</h3>
        <a href="#"> <i class="fab fa-facebook-f"></i><br>facebook</a>
        <a href="#"> <i class="fab fa-instagram"></i><br>instagram</a>
        <a href="#"> <i class="fab fa-twitter"></i><br>twitter</a>
        <a href="#"> <i class="fab fa-linkedin"></i><br>linkedin</a>
    </div>
</div>
<div class="credit"> &copy; 2024 || <span>duckcode-hub&reg;</span> || all rights reserved.<br>Sponsored by Kenswed Org.<!--  &trade; <= Trademarke   registered => &reg;-->
</div> 
</section>







 <!-- fooeter section ends here -->


    <!-- swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- custome  js -->
     <script src="./js/app.js"></script>
</body>
</html>