<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TravelBuddy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }
    .content {
      -webkit-text-stroke-width: 0.2px;
            -webkit-text-stroke-color: white;
      top: 80px;
      left: 41.5%;
      font-size: 60px;
    margin-left: auto;
    margin-right: auto;
    border-collapse: collapse;
    z-index: 1;
    position:absolute;
    }
    .contentText {

      top: 180px;
      left: 29%;
      font-size: 20px;
    margin-left: auto;
    margin-right: auto;
    border-collapse: collapse;
    z-index: 1;
    position:absolute;
    }
    .contentButton{
      padding: 14px 40px;
      top: 250px;
      left: 42.5%;
      margin-left: auto;
        margin-right: auto;
        border-collapse: collapse;
        z-index: 1;
        position:absolute;
        background-color: #FF5403;
        border-radius: 6px;
        box-shadow: 1px 2px 3px 0px #000000;
    }
    .left{
      margin-left: 40px;
    }
    .left2{
      margin-left: 150px;
    }
    .right{
      margin-right: 60px;
    }
    .h-font {
      font-family: 'Merienda', cursive;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .swiper-container {
      width: 100%;
      height: 350px;
      object-fit: fill
      
    }

    .swiper-container-slide-img {
      object-fit: cover;
      z-index: -1;
    position:relative;
    }

    .custom-bg {
      background-color: #2ec1ac;
    }

    .custom-bg:hover {
      background-color: #2ec12e;
    }

    .availability-form {
      margin-top: -50px;
      z-index: 2;
      position: relative;
    }
    .error-message {
    color: red;
}

  </style>
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
    <img src="img/logo.png" alt="logo"/>
      <a class="left navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">TravelBuddy</a>
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class=" left2 collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active me-2" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="#Rooms" id="rooms-link">Foods</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link" href="#Facilities" id="facilities-link">Places</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link me-2" href="#Contactus" id="contactus-link">Contacts </a>
          </li>
          


        </ul>
        <div class="d-flex">
          <?php
          // Check if user is logged in
          if (isset($_SESSION['user_id'])) {
            // User is logged in, show logout button
            echo '<button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" id="logoutButton">Logout</button>';
          } else {
            // User is not logged in, show login and register buttons
            echo '<button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>';
            echo '<button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>';
          }
          ?>
        </div>

      </div>
    </div>
  </nav>

  <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="loginForm">


          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center">
              <i class="bi bi-person-fill fs-3 me-2"></i> Client Login
            </h5>
            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control shadow-none" name="email" id="email">
            </div>
            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control shadow-none" name="password" id="password">
            </div>
            <div id="error-message" class="text-danger"></div>

            <div class="d-flex align-items-center justify-content-between mb-2">
              <button class="btn btn-dark shadow-none">Login</button>
              <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password</a>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>

  <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="registrationForm">
          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center">
              <i class="bi bi-person-lines-fill fs-3 me-2"></i> Client Register

            </h5>
            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
              Note: Your details must match with your Identification Card that will be required during check-in.
            </span>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 ps-0 mb-3">
                  <label for="name" class="form-label">Full Name</label>
                  <input type="text" class="form-control shadow-none" required name="name" id="name">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control shadow-none" required name="email" required id="email">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control shadow-none" required name="password" id="password">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label for="confirmPassword" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control shadow-none" required name="confirmpassword" id="confirmPassword">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label for="phone" class="form-label">Phone Number</label>
                  <input type="number" class="form-control shadow-none" required name="phone" id="phone">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label for="birthdate" class="form-label">Birthdate</label>
                  <input type="date" class="form-control shadow-none" required name="birthdate" id="birthdate">
                </div>

                <div class="col-md-12 ps-0 mb-3">
                  <label for="address" class="form-label">Address</label>
                  <textarea type="text" class="form-control shadow-none" required name="address" id="address" rows="1"></textarea>
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label for="postalcode" class="form-label">Postal Code</label>
                  <input type="text" class="form-control shadow-none" required name="postalcode" id="postalcode">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label for="id" class="form-label">Identification Card</label>
                  <input type="file" class="form-control shadow-none" required name="id" id="id">
                </div>
              </div>
              <div class="text-end my-l mb-3">
                <button type="submit" class="btn btn-dark shadow-none">
                  Register
                </button>

              </div>
            </div>

        </form>

      </div>
    </div>
  </div>
  </div>

  <!-- Carousel -->
   
  <div class="container-fluid px-lg-4 mt-4">
  
    <div class="swiper swiper-container">
      
    
      <div class="swiper-wrapper">
      
        <div class="swiper-slide">
        <div class="content h-font">TripBud</div>
        <div class="contentText">Let’s start your journey with us, your dream will come true</div>
        <button class="contentButton"type="button" name="myButton">
          Discover Now!
        </button>
          <img src="img/banner_bg.png" alt="image1" class="w-100 d-block" />
        </div>
      
        
      </div>

    </div>
    
  </div>

  
  <!--Rooms -->
  <section id="rooms">
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Top Places to Visit</h2>
    <h5 class=" mb-5 text-center h-font" >Best Destinations in the Philippines</h5>
    <div class="container">
      <div class="row">
        <div class="row">
        <?php
          include('db/db.php');

          // Retrieve rooms data from the database
          $recordsPerPage = isset($_GET['per_page']) ? $_GET['per_page'] : 6;
          $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
          $offset = ($currentPage - 1) * $recordsPerPage;

          // Initialize search query
          $searchQuery = "";

          // Check if search term is provided
          if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
            $search = $_GET['search'];
            // Add search criteria to the SQL query
            $searchQuery = " WHERE room_name LIKE '%$search%' OR price LIKE '%$search%' OR room_size LIKE '%$search%' OR num_rooms LIKE '%$search%' OR num_bathrooms LIKE '%$search%' OR amenities LIKE '%$search%'";
          }

          // Retrieve rooms data from the database with pagination and search
          $sql = "SELECT * FROM rooms $searchQuery LIMIT $recordsPerPage OFFSET $offset";
          $result = $conn->query($sql);


          if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
          ?>
              <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto; ">
                  <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="Room">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['room_name']; ?></h5>
                    <h6 class="mb-4">₱<?php echo $row['price']; ?> / 8 Hours</h6>
                    <div class="features mb-4">
                      <h6 class="mb-2">Features</h6>
                      <span class="badge rounded-pill bg-success text-light text-wrap  mb-3">
                        Room Size: <?php echo $row['room_size']; ?>
                      </span>
                      <span class="badge rounded-pill bg-success text-light text-wrap  mb-3">
                        <?php echo $row['num_rooms']; ?> Room(s)
                      </span>
                      <span class="badge rounded-pill bg-success text-light text-wrap  mb-3">
                        <?php echo $row['num_bathrooms']; ?> Bathroom(s)
                      </span>
                    </div>
                    <div class="facilities mb-4">
                      <h6 class="mb-2">Amenities</h6>
                      <?php
                      $amenities = explode(', ', $row['amenities']);
                      foreach ($amenities as $amenity) {
                        echo '<span class="badge rounded-pill bg-info text-light text-wrap mb-3">' . $amenity . '</span>';
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Booking Modal for Room <?php echo $row['room_name']; ?> -->
              
          <?php
            }
          } else {
            echo "0 results";
          }
          // Close the database connection
          $conn->close();
          ?>
        </div>
        <div class="col-lg-12 text-center mt-5">
          <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Explore >> </a>
        </div>
      </div>
  </section>

  <!-- Booking result Modal  -->
  <div class="modal fade" id="bookingResultModal" tabindex="-1" aria-labelledby="bookingResultModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bookingResultModalLabel">Booking Result</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="bookingResultBody">
          <!-- Result will be displayed here -->
        </div>
      </div>
    </div>
  </div>

  <!-- Facilities -->
  <section id="facilities">
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Facilities</h2>
    <div class="container">
      <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        <div class="col-lg-3 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="svg/wifi.svg" class="mt-2" width="250px">
          <h5 class="mt-1">Wifi</h5>
        </div>
        <div class="col-lg-3 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="svg/basketball.svg" class="mt-2" width="180px">
          <h5 class="mt-4">Court</h5>
        </div>
        <div class="col-lg-3 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="svg/pool.svg" width="250px">
          <h5 class="mt-2">Swimming Pools</h5>
        </div>

      </div>
    </div>
  </section>

  <section id="contactus">
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Contact us</h2>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3">
          <iframe class="w-100 rounded" height="350" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.7820103315935!2d121.11050247431297!3d14.324091186130175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d9978d5ca277%3A0xf820361350de1dc6!2sSouthpick%20Resort!5e0!3m2!1sen!2sph!4v1708251550921!5m2!1sen!2sph" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="bg-white p-4 rounded">
            <h5> Contact us </h5>
            <a href="tel : +09123456789" class="d-inline-block mb-2 text-decoration-none text-dark">
              <i class="bi bi-telephone-fill"></i> 0923 657 7107
            </a>
            <br>
            <a href="tel : +09123456789" class="d-inline-block  text-decoration-none text-dark">
              <i class="bi bi-telephone-fill"></i> 0923 657 7107
            </a>
          </div>
          <div class="bg-white p-4 rounded">
            <h5> Follow us </h5>
            <a href="https://www.facebook.com/southpickresortandhotel/" class="d-inline-block mb-3">
              <span class="badge bg-light text-dark fs-6 p-2">
                <i class="bi bi-facebook"></i> Southpick Resort and Hotel
              </span>
            </a>
            <br>
            <a href="#" class="d-inline-block mb-3">
              <span class="badge bg-light text-dark fs-6 p-2">
                <i class="bi bi-twitter"></i></i> Southpick Resort and Hotel
              </span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <br> <br> <br>
  <br> <br> <br>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 3500,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
  <script>
    function validateDateInput(input) {
      var currentDate = new Date();
      var selectedDate = new Date(input.value);
      var errorElementId = input.id + "-error";
      var errorElement = document.getElementById(errorElementId);

      if (selectedDate < currentDate) {
        input.value = ''; // Clear the input value if it's earlier than the current date

        // Check if error message element already exists
        if (!errorElement) {
          // Create and insert error message element
          errorElement = document.createElement("div");
          errorElement.id = errorElementId;
          errorElement.className = "text-danger";
          errorElement.innerText = "Please select a date equal to or later than today.";
          input.parentNode.insertBefore(errorElement, input.nextSibling);
        }
      } else {
        // Remove error message element if it exists
        if (errorElement) {
          errorElement.parentNode.removeChild(errorElement);
        }
      }
    }
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get the registration form
      const registrationForm = document.getElementById('registrationForm');

      // Add event listener for form submission
      registrationForm.addEventListener('submit', function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Gather form data
        const formData = new FormData(registrationForm);

        // Log the form data being sent
        for (const [key, value] of formData.entries()) {
          console.log(key + ': ' + value);
        }

        // Send AJAX request to the PHP script
        fetch('php/registration-process.php', {
            method: 'POST',
            body: formData
          })
          .then(response => response.text())
          .then(data => {
            // Display the response from the PHP script (e.g., success message)
            console.log(data);
          })
          .catch(error => {
            console.error('Error:', error);
          });
      });
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('registrationForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Fetch all input elements and log their values
        var inputs = document.querySelectorAll('#registrationForm input, #registrationForm textarea, #registrationForm select');
        inputs.forEach(function(input) {
          console.log(input.id + ': ' + input.value);
        });

        // Optionally, you can submit the form programmatically or perform other actions here

      });
    });
    document.getElementById('loginForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent the default form submission behavior
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;

      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'php/login-process.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.status === 'success') {
              // Display success message
              document.getElementById('error-message').innerHTML = "Login successful!";
              // Reload the page after a short delay
              setTimeout(function() {
                location.reload();
              }, 1000); // 1000 milliseconds = 1 second
            } else {
              // Display error message
              document.getElementById('error-message').innerHTML = response.message;
            }
          } else {
            // Error occurred during request
            console.error('Error occurred during request');
          }
        }
      };
      var formData = 'email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password);
      xhr.send(formData);
    });


    // Add an event listener to the logout button
    document.getElementById("logoutButton").addEventListener("click", function() {
      // Send an AJAX request to logout.php to destroy the session
      fetch('logout.php', {
          method: 'POST'
        })
        .then(response => {
          // Redirect to the home page or do further processing
          window.location.href = 'index.php';
        })
        .catch(error => console.error('Error:', error));
    });
  </script>
  <script>
    // JavaScript to scroll to the "Rooms" section when the link is clicked
    document.getElementById('rooms-link').addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      var roomsSection = document.getElementById('rooms');
      roomsSection.scrollIntoView({
        behavior: 'smooth'
      }); // Scroll to the rooms section smoothly
    });
    document.getElementById('facilities-link').addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      var facilitiesSection = document.getElementById('facilities');
      facilitiesSection.scrollIntoView({
        behavior: 'smooth'
      }); // Scroll to the rooms section smoothly
    });
    document.getElementById('contactus-link').addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      var contactusSection = document.getElementById('contactus');
      contactusSection.scrollIntoView({
        behavior: 'smooth'
      }); // Scroll to the rooms section smoothly
    });
  </script>
  <script>
    // Function to calculate the total price based on the duration of stay
    function calculateTotalPrice(checkinId, checkoutId, checkinTimeId, checkoutTimeId, price, totalPriceId) {
      var checkinDate = new Date(document.getElementById(checkinId).value);
      var checkoutDate = new Date(document.getElementById(checkoutId).value);
      var checkinTime = document.getElementById(checkinTimeId).value;
      var checkoutTime = document.getElementById(checkoutTimeId).value;

      // Convert check-in and check-out times to Date objects
      var checkinDateTime = new Date(checkinDate.toDateString() + ' ' + checkinTime);
      var checkoutDateTime = new Date(checkoutDate.toDateString() + ' ' + checkoutTime);

      // Adjust checkout date if it's before the check-in time
      if (checkoutDateTime < checkinDateTime) {
        checkoutDateTime.setDate(checkoutDateTime.getDate() + 1);
      }

      // Calculate the duration of stay in milliseconds
      var duration = checkoutDateTime.getTime() - checkinDateTime.getTime();

      // Convert duration to hours
      var hours = duration / (1000 * 60 * 60);

      // Calculate the total price based on the duration of stay
      var totalPrice;
      if (hours <= 8) {
        totalPrice = price;
      } else {
        var basePrice = price; // Price for the first 8 hours
        var additionalHours = Math.ceil(hours - 8); // Additional hours beyond the first 8 hours
        var additionalPricePerHour = price / 8; // Price per hour for the additional hours
        totalPrice = basePrice + (additionalHours * additionalPricePerHour);
      }

      // Update the total price input field
      document.getElementById(totalPriceId).value = totalPrice.toFixed(2); // Assuming price is in PHP

    }

    // Add event listeners to check-in, check-out date inputs, and check-in/check-out time inputs
    document.addEventListener("DOMContentLoaded", function() {
      <?php
      include('db/db.php');
      $result = $conn->query("SELECT * FROM rooms");
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "document.getElementById('checkin_" . $row['room_id'] . "').addEventListener('change', function() {";
          echo "calculateTotalPrice('checkin_" . $row['room_id'] . "', 'checkout_" . $row['room_id'] . "', 'checkin_time_" . $row['room_id'] . "', 'checkout_time_" . $row['room_id'] . "', " . $row['price'] . ", 'total_price_" . $row['room_id'] . "');";
          echo "});";
          echo "document.getElementById('checkout_" . $row['room_id'] . "').addEventListener('change', function() {";
          echo "calculateTotalPrice('checkin_" . $row['room_id'] . "', 'checkout_" . $row['room_id'] . "', 'checkin_time_" . $row['room_id'] . "', 'checkout_time_" . $row['room_id'] . "', " . $row['price'] . ", 'total_price_" . $row['room_id'] . "');";
          echo "});";
          echo "document.getElementById('checkin_time_" . $row['room_id'] . "').addEventListener('change', function() {";
          echo "calculateTotalPrice('checkin_" . $row['room_id'] . "', 'checkout_" . $row['room_id'] . "', 'checkin_time_" . $row['room_id'] . "', 'checkout_time_" . $row['room_id'] . "', " . $row['price'] . ", 'total_price_" . $row['room_id'] . "');";
          echo "});";
          echo "document.getElementById('checkout_time_" . $row['room_id'] . "').addEventListener('change', function() {";
          echo "calculateTotalPrice('checkin_" . $row['room_id'] . "', 'checkout_" . $row['room_id'] . "', 'checkin_time_" . $row['room_id'] . "', 'checkout_time_" . $row['room_id'] . "', " . $row['price'] . ", 'total_price_" . $row['room_id'] . "');";
          echo "});";
        }
      }
      $conn->close();
      ?>
    });
  </script>

    <!-- Booking Process script -->
    
    <script>
   $(document).ready(function() {
    $('form[id^="bookingForm_"]').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        var form = $(this);
        var url = form.attr('action');
        var formData = form.serialize(); // Serialize form data

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function(response) {
                form.closest('.modal').modal('hide'); // Hide the modal upon successful submission
                $('#bookingResultBody').html(response); // Display the response in the modal body
                $('#bookingResultModal').modal('show'); // Show the modal
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log any errors to the console
            }
        });
    });
});

</script>


<script>
    function validateForm(roomId) {
        var checkinDate = document.getElementById('checkin_' + roomId).value;
        var checkoutDate = document.getElementById('checkout_' + roomId).value;
        var checkinTime = document.getElementById('checkin_time_' + roomId).value;
        var checkoutTime = document.getElementById('checkout_time_' + roomId).value;
        var numAdults = document.getElementById('num_adults_' + roomId).value;
        var numChildren = document.getElementById('num_children_' + roomId).value;

        var errorCheckin = document.getElementById('error-checkin_' + roomId);
        var errorCheckout = document.getElementById('error-checkout_' + roomId);
        var errorCheckinTime = document.getElementById('error-checkin-time_' + roomId);
        var errorCheckoutTime = document.getElementById('error-checkout-time_' + roomId);
        var errorNumAdults = document.getElementById('error-num-adults_' + roomId);

        errorCheckin.innerText = '';
        errorCheckout.innerText = '';
        errorCheckinTime.innerText = '';
        errorCheckoutTime.innerText = '';
        errorNumAdults.innerText = '';

        var isValid = true;

        if (checkinDate === '') {
            errorCheckin.innerText = 'Please enter a valid check-in date.';
            isValid = false;
        }
        if (checkoutDate === '') {
            errorCheckout.innerText = 'Please enter a valid check-out date.';
            isValid = false;
        }
        if (checkinTime === '') {
            errorCheckinTime.innerText = 'Please enter a valid check-in time.';
            isValid = false;
        }
        if (checkoutTime === '') {
            errorCheckoutTime.innerText = 'Please enter a valid check-out time.';
            isValid = false;
        }
        if (numAdults === '') {
            errorNumAdults.innerText = 'Please enter the number of adults.';
            isValid = false;
        }

        return isValid;
    }
</script>




</body>

</html>