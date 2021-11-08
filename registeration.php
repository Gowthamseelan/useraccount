<!DOCTYPE HTML> 
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="kaivale";

try{
    $conn=mysqli_connect($servername, $username, $password, $dbname);
    echo("successful in connection");
} catch (Exception $ex) {
    echo("error in connection");
}
if(isset($_POST['submit'])) {
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $address2=$_POST['address2'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $phone=$_POST['phone'];
    $register_query = "INSERT INTO employee (first_name, last_name, email, address, address2, city, state, phone) VALUES ('$first_name', '$last_name', '$email', '$address', '$address2', '$city', '$state', '$phone')";
    echo $register_query;;
    try{
        $register_result = mysqli_query($conn,$register_query);
        
        if($register_result){
            if(mysqli_affected_rows($conn)>0){
                echo("registration successful");
            }else{
                echo("error in registeration");
            }
        }
        
    } catch (Exception $ex) {
        echo("error".$ex->getMessage());

    }

}

$firstnameErr = $lastnameErr = $emailErr = $addressErr = $address2Err = $cityErr = $stateErr = $phoneErr = "";
$first_name = $last_name = $email = $address = $address2 = $city = $state = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first_name"])) {
    $nameErr = "Name is required";
  } else {
    $first_name = test_input($_POST["first_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
    if (empty($_POST["last_name"])) {
    $nameErr = "Name is required";
  } else {
    $last_name = test_input($_POST["last_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  //if (empty($_POST["address"])) {
    //$address = "";
  //} else {
    //$address = test_input($_POST["address"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    //if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$address)) {
      //$addressErr = "Invalid URL";
    //}
  //} 

  //if (empty($_POST["comment"])) {
    //$comment = "";
  //} else {
    //$comment = test_input($_POST["comment"]);
  //}

    if (empty($_POST["address"])) {
    $addressErr = "address is required";
  } else {
    $address = test_input($_POST["address"]);
    // check if name only contains letters and whitespace
  }
  
      if (empty($_POST["address2"])) {
    $addressErr = "address is required";
  } else {
    $address2 = test_input($_POST["address2"]);
    // check if name only contains letters and whitespace
  }
  
  if (empty($_POST["city"])) {
    $cityErr = "City is required";
  } else {
    $city = test_input($_POST["city"]);
  }
  
  if(empty($_POST["state"])) {
      $stateErr = "State is required";
  } else {
      $state = test_input($_POST ["state"]);
  }
  
  if(empty($_POST ["phone"])) {
      $phoneErr = "Phone is required";
  } else {
      $phone = test_input ($_POST ["phone"]);
      if(!preg_match("/^\d+\.?\d*$/",$phone)) {
          $phoneErr = "Enter Correct phone number";
      }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<html>
<head>
    <meta charset="UTD-8">
<style>
.error {color: #FF0000;}
h2 {
text-align: center;} 
p {
    text-align: center;
}

</style>
</head>

<body bgcolor="FBB917"> 


    <h2> Registration Form </h2>
<div align="center">
<form  action="" method="POST"> 
    
      <div class="form-row">
    <div class="col">
        <label for="first_name">First Name:</label>
      <input type="text" name="first_name" class="form-control" placeholder="First name">
    </div>
    <br><br>
    <div class="col">
        <label for="last_name">Last Name:</label>
      <input type="text" name="last_name" class="form-control" placeholder="Last name">
    </div>
  </div>
    <br><br>
    
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email:</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
      <br><br>
    
  <div class="form-group">
    <label for="inputAddress">Address:</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Door no">
  </div>
      <br><br>
      
  <div class="form-group">
    <label for="inputAddress2">Address 2:</label>
    <input type="text" name="address2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
      <br><br>
      
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City:</label>
      <input type="text" name="city" class="form-control" id="inputCity" placeholder="City">
    </div>
      <br><br>
    <div class="form-group col-md-4">
      <label for="state">State:</label>
      <select id="state" name="state" class="form-control">
        <option selected>Choose...</option>
        <option>TamilNadu</option>
        <option>Karnataka</option>
        <option>Kerala</option>
      </select>
    </div>
      <br><br>
    <div class="form-group col-md-2">
      <label for="inputPhone">Phone:</label>
      <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="Phone">
    </div>
  </div>
      <br><br>

  <button type="submit" class="btn btn-primary">submit</button>
</form>
</div> 
</body>
</html>
<?php
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

