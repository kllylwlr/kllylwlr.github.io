<!DOCTYPE html>
<html>

<head>
  <!-- <link rel="stylesheet" href="signup.css" /> -->
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav>
      <ul>
        <div class="navRight">
          <img class="navLogo" src="images/codebrew-logo.png">
          <li> <a href="index.html">HOME</a> </li>
          <li> <a href="products.html"> MENU</a></li>
          <li> <a href="search.html"> BROWSE ITEMS </a> </li>
          <li> <a href="login.html"> LOG IN </a> </li>
          <li> <a href="signup.html"> SIGN UP </a> </li>
          <li> <a class="activeLink" href="contact.html"> CONTACT US </a> </li>
        </div>
      </ul>
    </nav>

    <div id="formContainer">
    <h1>CONTACT US</h1>

</body>

<?php

    $name = $_POST['name'];
    $country = $_POST['country'];
    $ethnicity = $_POST['ethnicity'];
    $birth = $_POST['birth'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    print ("Thank you for reaching out to us.");
    print ("<br>Your name: " . $name);
    print ("<br>Your country: " . $country);
    print ("<br>Your ethnicity: " . $ethnicity);
    print ("<br>Your date of birth: " . $birth);
    print ("<br>Your phone number: " . $phone);
    print ("<br>The message you send: " . $message);


    // Send info to database
    //Step 1 - import file path variable
    $path = "/home/yz8988/databases";

    //Step 2 - connect to database
    $db = new SQLite3($path.'/cafecoldbrew.db');

    //Step 3 - construct an INSERT query to add values to table
    $db->exec("INSERT INTO USERS VALUES('$name', '$country', '$ethnicity', '$birth', '$phone', '$email', '$message')"); 

    //Step 4 - close database
    $db->close();
    unset($db);

    // // optional: This is for testing purposes - remove later
    // print("<p>All fine- the sql commands executed successfully!- values inserted username:<p> " . $name . $country . $ethnicity . $birth . $phone . $email . $message );
?>

</html>
</html>