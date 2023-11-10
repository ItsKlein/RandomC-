<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
  <head>
    <style>
      body {
        background: #dddbdf !important;
      }

              /* Define the button style */
button {
  background-color: black;
  color: white; /* Text color */
  padding: 10px 20px; /* Padding around the text */
  border: none; /* Remove the border */
  border-radius: 5px; /* Rounded corners */
  cursor: pointer; /* Cursor on hover */
  transition: background-color 0.3s; /* Smooth transition effect */
  width: 45%;
  margin-left: 30%;
}

/* Style on hover */
button:hover {
  background-color: darkred; /* Change to a darker color on hover */
}

  /* CSS for the modal */
  .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
            justify-content: center;
            align-items: center;
        }
        
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
            
    </style>
    <meta charset="UTF-8">
    <title>WELCOME ADMIN</title>
    <link rel="stylesheet" href="../TumagaHealthTrack/Css/login.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="../TumagaHealthTrack/img/Barangaylogo.png" alt="">
        <div class="text">
          
        </div>
      </div>
      <div class="back">
        <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
    <div class="form-content">
        <div class="login-form">
            <div class="title">Login</div>
            <form action="http://localhost/TumagaHealthTrack/PhpFlow/login.php" method="post" id="loginForm">
                <div class="input-boxes">
                    <div class="input-box">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Enter your email" required name="email">
                    </div>
                    <div class="input-box">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Enter your password" name="password" required>
                    </div>
                </div>
                <br>
                <button type="submit" name="submit">SUBMIT</button>
            </form>
        </div>
    </div>
</div>


<div class="modal" id="loginModal">
    <div class="modal-content">
        <p>Login attempts exceeded. Please wait for 3 minutes.</p>
    </div>
</div>
        
      </form>
    </div>
    </div>
    </div>
  </div>
  <script src="../TumagaHealthTrack/Js/login-error.js"></script>
</body>
</html>

