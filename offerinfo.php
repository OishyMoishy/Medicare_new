<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Information - MEDI CARE</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
       * {
            box-sizing: border-box
        }
        body {
            font-family: Verdana, sans-serif; margin:0
        }
        .mySlides {
            display: none
        }
        img {
            vertical-align: middle;
        }
        /* Slideshow container */
        .slideshow-container {
            max-width: 90%;
            position: relative;
            margin: auto;
        }
        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }
        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }
        /* Caption text */
        .reg-button{
            background: var(--green);
            color:white;
            font-weight: bold;
          display: flex;
          justify-content: center;
          align-items: center;
          padding: 10px 15px;
          width: 20%;
          margin: auto;
        }
        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }
        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }
        .active, .dot:hover {
            background-color: #717171;
        }
        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }
        @-webkit-keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }
        @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }
        .slide{
            margin-top: 100px;
        }
        .register-form-container {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .register-form-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            animation: animatezoom 0.6s;
            border-radius: 10px;
            position: relative;
        }
        .register-form-content input[type=text], 
        .register-form-content input[type=password],
        .register-form-content input[type=email],
        .register-form-content textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
        }
        .register-form-content button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }
        .register-form-content button:hover {
            opacity: 0.8;
        }
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }
        @keyframes animatezoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 50px;
        }

        .card {
            width: 300px;
            margin: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .card-img {
            width: 100%;
           height: auto;
            overflow: hidden;
            border-radius: 8px 8px 0 0;
        }

        .card-img img {
            width: 100%;
            height: auto; /* Changed width */
            display: block;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card-content p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            margin-top: 1rem;
            padding: .3rem;
            padding-left: .5rem;
            border: var(--border);
            border-radius: .3rem;
            box-shadow: var(--box-shadow);
            color: var(--green);
            cursor: pointer;
            font-size: 1.4rem;
            background: #fff;
        }

        .btn span {
            padding: .4rem .5rem;
            border-radius: .3rem;
            background: var(--green);
            color: #fff;
            margin-left: .3rem;
        }

        .btn:hover {
            background: var(--green);
            color: #fff;
        }

        .btn:hover span {
            color: var(--green);
            background: #fff;
            margin-left: .5rem;
        }

        @media only screen and (max-width: 500px) {
            .prev, .next,.text {font-size: 14px}
            .dot{
                height: 8px;
                width: 8px;
            }
            .register-form-container{
                margin-top: 20px;
            }
            .reg-button{
                font-size: 14px;
                width: 30%;

            }
        }
        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 350px) {
            .prev, .next,.text {font-size: 11px}
            .dot{
                height: 8px;
                width: 8px;
            }
        
            .slideshow-container {
                max-width: 100%;
                
                position: relative;
                margin: auto;
            }
            .slide{
                margin-top: 95px;
            }
            .register-form-container{
                margin-top: 15px;
            }
            .reg-button{
                font-size: 10px;
                width: 30%;

            }
        }
       
    </style>
</head>
<body>
    <header class="header">
        <a href="#" class="logo"> <i class="fas fa-heartbeat"></i>MEDI CARE</a> 
        <nav class="navbar">
            <a href="index.php#home">Home</a>
            <a href="#services">Services</a>
            <a href="medicine.php">Medicine</a>
            <a href="doctor.php">Doctors</a>
            <a href="location.php">Locations</a>
            <a href="#about">About</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>
    <div class="slide">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="Untitled design1.svg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="Untitled design2.svg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="Untitled design3.svg" style="width:100%">
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>
    <div class="button1">
        <button  class="reg-button" onclick="openForm()" >Registration</button>
      </div>
  
      <div class="register-form-container" id="registerForm">
          <form class="register-form-content" method="post" action="register.php" onsubmit="submitForm()">
              <span class="close" onclick="closeForm()">&times;</span>
              <h2>Registration Form</h2>
              <label for="username"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username" required>
              <label for="email"><b>Email</b></label>
              <input type="email" placeholder="Enter Email" name="email" required>
              <label for="short_info"><b>Short info about your hospital/diagnostic center</b></label>
              <textarea placeholder="Enter Short Info" name="short_info" required></textarea>
              <label for="address"><b>Address</b></label>
              <input type="text" placeholder="Enter Address" name="address" required>
              <label for="phone"><b>Phone Number</b></label>
              <input type="text" placeholder="Enter Phone Number" name="phone" required>
              <button type="submit">Submit</button>
          </form>
      </div>
      <section class="cards">
        <div class="card">
            <div class="card-img">
                <img src="MIM.svg" alt="Medicine 1">
            </div>
            <div class="card-content">
                <h3>Mim Dental Care</h3>
                <p>Explore free checkups every friday in your favourite Gulshan!</p>
                <a href="https://www.amzhospitalbd.com/" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>
        <div class="card">
            <div class="card-img">
                <img src="IBN SINA Hospital.svg" alt="Medicine 2">
            </div>
            <div class="card-content">
                <h3>Ibne Sina Hospital</h3>
                <p>We are offering 25% off on every tests.</p>
                <a href="https://www.ibnsinatrust.com/" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>
        <div class="card">
            <div class="card-img">
                <img src="HEALTHY.svg" alt="Medicine 3">
            </div>
            <div class="card-content">
                <h3>Healthy Life Hospital</h3>
                <p>Experience better care for your closed ones with 30% discount!!</p>
                <a href="https://uttara.bdeyehospital.com/" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>
       
        
    </section>
    
    <script src="script.js"></script>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
        // Auto Slide   if you need auto slide, remove the comment "//"
        var slideIndexAuto = 0;
        showSlidesAuto();
        function showSlidesAuto() {
            var i;
            var slidesAuto = document.getElementsByClassName("mySlides");
            for (i = 0; i < slidesAuto.length; i++) {
                slidesAuto[i].style.display = "none";
            }
            slideIndexAuto++;
            if (slideIndexAuto > slidesAuto.length) { slideIndexAuto = 1 }
            slidesAuto[slideIndexAuto - 1].style.display = "block";
            setTimeout(showSlidesAuto, 4000); // Change image every 2 seconds
        }
        function openForm() {
            document.getElementById("registerForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("registerForm").style.display = "none";
        }

        // Submit form
        function submitForm() {
            alert("Registration Successful!");
            closeForm();
        }
    </script>
</body>
</html>