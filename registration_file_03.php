<?php
/*
MIT License
Copyright (c) 2019 Fernando 
https://github.com/fernandod1/
*/

// Configure your MySQL database connection details:
$mysqlserverhost = "localhost";
$database_name = "Registration_Page_DESIGN_03";
$username_mysql = "root";
$password_mysql = "";

function sanitize($variable){
    $clean_variable = strip_tags($variable);
    $clean_variable = htmlentities($clean_variable, ENT_QUOTES, 'UTF-8');
    return $clean_variable;
}

function connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name){
    $connect = mysqli_connect($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
    if (!$connect) {
        die("Connection failed mysql: " . mysqli_connect_error());
    }
    return $connect;    
}

if(isset($_POST["processform"])){
    $connection = connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
    $first_name = mysqli_real_escape_string($connection, sanitize($_POST["first_name"]));
    $last_name = mysqli_real_escape_string($connection, sanitize($_POST["last_name"]));
    $address1 = mysqli_real_escape_string($connection, sanitize($_POST["address1"]));
    $address2 = mysqli_real_escape_string($connection, sanitize($_POST["address2"]));
    $city = mysqli_real_escape_string($connection, sanitize($_POST["city"]));
    $state = mysqli_real_escape_string($connection, sanitize($_POST["state"]));
    $postal_code = mysqli_real_escape_string($connection, sanitize($_POST["postal_code"]));    
    $phone = mysqli_real_escape_string($connection, sanitize($_POST["phone"]));
    $email = mysqli_real_escape_string($connection, sanitize($_POST["email"]));
    $reference = mysqli_real_escape_string($connection, sanitize($_POST["reference"]));
    $feedback = mysqli_real_escape_string($connection, sanitize($_POST["feedback"]));
    $suggestions = mysqli_real_escape_string($connection, sanitize($_POST["suggestions"]));
    $recommend = mysqli_real_escape_string($connection, sanitize($_POST["recommend"]));
    $reference1_name = mysqli_real_escape_string($connection, sanitize($_POST["reference1_name"]));
    $reference1_address = mysqli_real_escape_string($connection, sanitize($_POST["reference1_address"]));
    $reference1_contact = mysqli_real_escape_string($connection, sanitize($_POST["reference1_contact"]));
    $reference2_name = mysqli_real_escape_string($connection, sanitize($_POST["reference2_name"]));
    $reference2_address = mysqli_real_escape_string($connection, sanitize($_POST["reference2_address"]));
    $reference2_contact = mysqli_real_escape_string($connection, sanitize($_POST["reference2_contact"]));
  
    $sql = "INSERT INTO signup_registrationform03 (
        First_Name,
        Last_Name,
        Address1, 
        Address2,
        City,
        State,
        Postal_Code,
        Phone_No,
        Email_Address,
        Reference,
        Feedback,
        Suggestions,
        Recommend,
        Reference1_Name,
        Reference1_Address,
        Reference1_Contact,
        Reference2_Name,
        Reference2_Address,
        Reference2_Contact
        ) 
      VALUES (
        '$first_name',
        '$last_name',
        '$address1',
        '$address2',
        '$city' ,
        '$state' ,
        '$postal_code',
        '$phone',
        '$email',
        '$reference',
        '$feedback',
        '$suggestions',
        '$recommend',
        '$reference1_name',
        '$reference1_address',
        '$reference1_contact',
        '$reference2_name',
        '$reference2_address',
        '$reference2_contact'
        )";

    if (mysqli_query($connection, $sql)) {
        echo "<h2><font color=blue>New record added to database.</font></h2>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Registration Form</title> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    body {
      background: #1abc9c;
      /* overflow: hidden; */
    }
    ::selection {
      background: rgba(26,188,156,0.3);
    }
    .container {
      max-width: 440px;
      padding: 0 20px;
      margin: 170px auto;
    }
    .wrapper {
      width: 100%;
      background: #fff;
      border-radius: 5px;
      box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
    }
    .wrapper .title {
      height: 90px;
      background: #16a085;
      border-radius: 5px 5px 0 0;
      color: #fff;
      font-size: 30px;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .wrapper form {
      padding: 30px 25px 25px 25px;
    }
    .wrapper form .row {
      height: 45px;
      margin-bottom: 15px;
      position: relative;
    }
    .wrapper form .row input {
      height: 100%;
      width: 100%;
      outline: none;
      padding-left: 60px;
      border-radius: 5px;
      border: 1px solid lightgrey;
      font-size: 16px;
      transition: all 0.3s ease;
    }
    form .row input:focus {
      border-color: #16a085;
      box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
    }
    form .row input::placeholder {
      color: #999;
    }
    .wrapper form .row i {
      position: absolute;
      width: 47px;
      height: 100%;
      color: #fff;
      font-size: 18px;
      background: #16a085;
      border: 1px solid #16a085;
      border-radius: 5px 0 0 5px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .wrapper form .pass {
      margin: -8px 0 20px 0;
    }
    .wrapper form .pass a {
      color: #16a085;
      font-size: 17px;
      text-decoration: none;
    }
    .wrapper form .pass a:hover {
      text-decoration: underline;
    }
    .wrapper form .button input {
      color: #fff;
      font-size: 20px;
      font-weight: 500;
      padding-left: 0px;
      background: #16a085;
      border: 1px solid #16a085;
      cursor: pointer;
    }
    form .button input:hover {
      background: #12876f;
    }
    .wrapper form .signup-link {
      text-align: center;
      margin-top: 20px;
      font-size: 17px;
    }
    .wrapper form .signup-link a {
      color: #16a085;
      text-decoration: none;
    }
    form .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
<script type="text/javascript">
  function validateForm() {
    var a = document.forms["Form"]["first_name"].value;
    var b = document.forms["Form"]["last_name"].value;
    var c = document.forms["Form"]["address1"].value;
    var d = document.forms["Form"]["address2"].value;
    var e = document.forms["Form"]["city"].value;
    var f = document.forms["Form"]["state"].value;
    var g = document.forms["Form"]["postal_code"].value;
    var h =document.forms["Form"]["phone"].value;
    var i =document.forms["Form"]["email"].value;
    var j =document.forms["Form"]["reference"].value;
    var k =document.forms["Form"]["feedback"].value;
    var l =document.forms["Form"]["suggestions"].value;
    var m =document.forms["Form"]["recommend"].value;
    var n =document.forms["Form"]["reference1_name"].value;
    var o =document.forms["Form"]["reference1_address"].value;
    var p =document.forms["Form"]["reference1_contact"].value;
    var q =document.forms["Form"]["reference2_name"].value;
    var r =document.forms["Form"]["reference2_address"].value;
    var s =document.forms["Form"]["reference2_contact"].value;

if (
a == null || a == "",
b == null || b == "",
c == null || c == "", 
d == null || d == "",
e == null || e == "",
f == null || f == "",
g == null || g == "",
h == null || h == "",
i == null || i == "",
j == null || j == "",
k == null || k == "",
l == null || l == "",
m == null || m == "",
n == null || n == "",
o == null || o == "",
p == null || p == "",
q == null || q == "",
r == null || r == "",
s == null || s == ""
)
    {
        alert("Please Fill All Required Field");    
        return false;
    }
}
</script>
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <span class="title">Registration Form</span>
      <form action="registration_file_03.php" method="post" name="Form" onsubmit="return validateForm()">
    <input type="hidden" name="processform" value="1">
      <!-- <form name="Form" action="" method="POST" onsubmit="return validateForm()"> -->
        <div class="details personal">
          <span class="title">Personal Details</span>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-user"></i>
              <label for="first_name"></label>
              <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
            </div>
          </div>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-user"></i>
              <label for="last_name"></label>
              <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
            </div>
          </div>
        </div>

        <div class="details personal">
          <span class="title">Address</span>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-map-marker-alt"></i>
              <label for="address1"></label>
              <input type="text" id="address1" name="address1" placeholder="Street Address" required>
            </div>
          </div>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-map-marker-alt"></i>
              <label for="address2"></label>
              <input type="text" id="address2" name="address2" placeholder="Street Address Line 2">
            </div>
          </div>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-city"></i>
              <label for="city"></label>
              <input type="text" id="city" name="city" placeholder="City" required>
            </div>
          </div>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-map-signs"></i>
              <label for="state"></label>
              <input type="text" id="state" name="state" placeholder="State / Province" required>
            </div>
          </div>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-envelope"></i>
              <label for="postal_code"></label>
              <input type="text" id="postal_code" name="postal_code" placeholder="Postal / Zip Code" required>
            </div>
          </div>
        </div>

        <div class="details personal">
          <span class="title">Contacts</span>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-phone"></i>
              <label for="phone"></label>
              <input type="tel" id="phone" name="phone" placeholder="(000) 000-0000" required>
            </div>
          </div>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-envelope"></i>
              <label for="email"></label>
              <input type="email" id="email" name="email" placeholder="example@example.com" required>
            </div>
          </div>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-user-friends"></i>
              <label for="reference"></label>
              <input type="text" id="reference" name="reference" placeholder="Reference" required>
            </div>
          </div>
        </div>

        <div class="details personal">
          <span class="title">Feedback Section</span>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-comments"></i>
              <label for="feedback"></label>
              <textarea id="feedback" name="feedback" placeholder="Your Feedback" required></textarea>
            </div>
          </div>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-lightbulb"></i>
              <label for="suggestions"></label>
              <textarea id="suggestions" name="suggestions" placeholder="Your Suggestions" required></textarea>
            </div>
          </div>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-thumbs-up"></i>
              <label for="recommend"></label>
              <textarea id="recommend" name="recommend" placeholder="Your Recommendations" required></textarea>
            </div>
          </div>
        </div>

        <div class="details personal">
          <span class="title">References</span>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-user-friends"></i>
              <label for="reference1_name"></label>
              <input type="text" id="reference1_name" name="reference1_name" placeholder="Reference 1 Name" required>
            </div>
          </div>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-user-friends"></i>
              <label for="reference1_address"></label>
              <input type="text" id="reference1_address" name="reference1_address" placeholder="Reference 1 Address" required>
            </div>
          </div>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-user-friends"></i>
              <label for="reference1_contact"></label>
              <input type="tel" id="reference1_contact" name="reference1_contact" placeholder="Reference 1 Contact" required>
            </div>
          </div>
        </div>

        <div class="details personal">
          <span class="title">References</span>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-user-friends"></i>
              <label for="reference2_name"></label>
              <input type="text" id="reference2_name" name="reference2_name" placeholder="Reference 2 Name" required>
            </div>
          </div>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-user-friends"></i>
              <label for="reference2_address"></label>
              <input type="text" id="reference2_address" name="reference2_address" placeholder="Reference 2 Address" required>
            </div>
          </div>
          <div class="field">
            <div class="row" style="padding: 1%">
              <i class="fas fa-user-friends"></i>
              <label for="reference2_contact"></label>
              <input type="tel" id="reference2_contact" name="reference2_contact" placeholder="Reference 2 Contact" required>
            </div>
          </div>
        </div>
        <!-- Submit button -->
        <div class="field">
        <div class="row button">
            <input class="button" type="submit" value="Submit">
            
          </div>
        </div>
        

        <!-- Login now link -->
        <!-- <div class="login-now">
          <a href="#">Login now</a>
        </div> -->
        <div class="signup-link">Already have Account ?<a href="login.html">Login now</a></div>
      </form>
    </div>
  </div>
</body>






</html>


