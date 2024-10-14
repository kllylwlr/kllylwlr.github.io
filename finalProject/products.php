<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Products - Catalog </title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome Icons library Link: https://cdnjs.com/libraries/font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <?php
      //grab info for all products (name, desc, price)
      //product 1
      $prod1Name = $_POST['prod1Name'];
      $prod1Desc = $_POST['prod1Desc'];
      $prod1Price = floatval($_POST['prod1Price']);
      //product 2
      $prod2Name = $_POST['prod2Name'];
      $prod2Desc = $_POST['prod2Desc'];
      $prod2Price = floatval($_POST['prod2Price']);
      //product 3
      $prod3Name = $_POST['prod3Name'];
      $prod3Desc = $_POST['prod3Desc'];
      $prod3Price = floatval($_POST['prod3Price']);
      //product 4
      $prod4Name = $_POST['prod4Name'];
      $prod4Desc = $_POST['prod4Desc'];
      $prod4Price = floatval($_POST['prod4Price']);
      //product 5
      $prod5Name = $_POST['prod5Name'];
      $prod5Desc = $_POST['prod5Desc'];
      $prod5Price = floatval($_POST['prod5Price']);
      //product 6
      $prod6Name = $_POST['prod6Name'];
      $prod6Desc = $_POST['prod6Desc'];
      $prod6Price = floatval($_POST['prod6Price']);
      //product 7
      $prod7Name = $_POST['prod7Name'];
      $prod7Desc = $_POST['prod7Desc'];
      $prod7Price = floatval($_POST['prod7Price']);
      //product 8
      $prod8Name = $_POST['prod8Name'];
      $prod8Desc = $_POST['prod8Desc'];
      $prod8Price = floatval($_POST['prod8Price']);
      //product 9
      $prod9Name = $_POST['prod9Name'];
      $prod9Desc = $_POST['prod9Desc'];
      $prod9Price = floatval($_POST['prod9Price']);

      //print out header stuff
      print ("
        <!-- NAVIGATION BAR ------------------------------------------------------>
        <nav>
          <ul>
            <div class='navRight'>
              <img class='navLogo' src='images/codebrew-logo.png'>
              <li> <a href='index.html'>HOME</a> </li>
              <li> <a class='activeLink' href='products.html'> MENU</a></li>
              <li> <a href='search.html'> BROWSE ITEMS </a> </li>
              <li> <a href='login.html'> LOG IN </a> </li>
              <li> <a href='signup.html'> SIGN UP </a> </li>
              <li> <a href='contact.html'> CONTACT US </a> </li>
            </div>
          </ul>
        </nav>

        <!-- HEADING -->
        <div class='catalogContainer'>
        <h1> CATALOG </h1>

        ");

      //PRINT OUT PRODUCT INFO ONTO PHP PAGE -----------------------------------

      //make 3 arrays (product names, product descs, product prices)
      $nameArray = array($prod1Name, $prod2Name, $prod3Name, $prod4Name, $prod5Name, $prod6Name, $prod7Name, $prod8Name, $prod9Name);
      $descArray = array($prod1Desc, $prod2Desc, $prod3Desc, $prod4Desc, $prod5Desc, $prod6Desc, $prod7Desc, $prod8Desc, $prod9Desc);
      $priceArray = array($prod1Price, $prod2Price, $prod3Price, $prod4Price, $prod5Price, $prod6Price, $prod7Price, $prod8Price, $prod9Price);

      //print w/ for loop
      for ($i=0; $i < count($nameArray); $i++)
      {
        //print out product number (i+1)
        print("<h3> PRODUCT #".($i+1).": </h3>");
        //print out product name
        print("<p> Product Name: ".$nameArray[$i]."</p>");
        //print out price (formated to 2 decimal places)
        print("<p> Price: $".number_format($priceArray[$i], 2, '.', '')." </p>");
        //print out desc
        print("<p> Description: ".$descArray[$i]." </p> <br>");

      }

      //SEND INFO TO DATABASE ----------------------------------------------------
      //Step 1 - import file path variable
      $path = "/home/kjl9846/databases";

      //Step 2 - connect to database
      //$db = new SQLite3($path.'/cafecodebrew.db');
			$db = new SQLite3($path.'/test2.db');

      //Step 3 - construct an INSERT query to add values to table

			//ATTEMPT 2 (Insert 1 row) --------------------
			//(DID NOT WORK)
			$query = "INSERT INTO PRODUCTS VALUES ('PRODUCTID', '$prod1Name', '$prod1Desc', '$prod1Price')";
			$db->exec($query);

			/*
      $db->exec("INSERT INTO PRODUCTS (PRODUCTNAME, PRODUCTID, PRODUCTDESC, PRODUCTPRICE)
       VALUES
       ('$prod1Name', '$prod1Desc', '$prod1Price'), //row 1
       ('$prod2Name', '$prod2Desc', '$prod2Price'), //row 2
       ('$prod3Name', '$prod3Desc', '$prod3Price'),
       ('$prod4Name', '$prod4Desc', '$prod4Price'),
       ('$prod5Name', '$prod5Desc', '$prod5Price'),
       ('$prod6Name', '$prod6Desc', '$prod6Price'),
       ('$prod7Name', '$prod7Desc', '$prod7Price'),
       ('$prod8Name', '$prod8Desc', '$prod8Price'),
       ('$prod9Name', '$prod9Desc', '$prod9Price'),
       ");
			 */

       /* NOTES
        - col names r at top after (insert into)
        - values represents the values in a row
        - autoincrement values r left blank (they generate themselves)
      */

      //Step 4 - close database
      $db->close();
      unset($db);

      //testing purposes, print message
      //print("<p> Sql commands executed successfully! </p>");

      //TESTING RETRIEVAL OF DATA ---------------------------------------------
      //step 1 - connect to database
      $db2 = new SQLite3($path.'/cafecodebrew.db');

      //Step 2 - construct a SELECT query to get values from table
      $res = $db2->query('SELECT * FROM PRODUCTS');
      print("<p> Printing data from PRODUCTS table");
      while ($row = $res->fetchArray())
      {
        print("<p> {$row['PRODUCTNAME']} : {$row['PRODUCTID']} : {$row['PRODUCTDESC']} : {$row['PRODUCTPRICE']} </p>");
      }

      //Step 3 - close database
      $db2-> close();
      unset($db2);

      //test if executed
      //print("<p> Retriev sql commands executed! </p>");

      //print footer -----------------------------------------------------------
      print("

      </div>

      <footer>
        <div class='flexContainer'>
          <!-- Cafe Blurb Section -->
          <div class='flexCol40'>
            <img class='logo' src='images/codebrew-logo.png'>
            <p> Developing the best coffee since 2023.</p>
            <p>&copy 2023 - Cafe CodeBrew</p>
          </div>

          <!-- Pages Section -->
          <div class='flexCol25'>
            <p class='footerSecHead'> PAGES </p>
            <ul>
              <li> <a href='index.html'> Home </a> </li>
              <li> <a href='products.html'> Menu </a> </li>
              <li> <a href='search.html'> Search </a> </li>
              <li> <a href='contact.html'> Contact </a> </li>
            </ul>
          </div>

          <!-- Contact Section -->
          <div class='flexCol25'>
            <p class='footerSecHead'> CONTACT </p>
            <ul>
              <li> <i class='fa-solid fa-location-dot'></i> 16 Fake Road, New York, NY 10003</li>
              <li> <i class='fa-solid fa-phone'></i> (212) XXX - XXXX </li>
              <li> <i class='fa-solid fa-envelope'></i> cafecodebrew@gmail.com </li>
            </ul>
          </div>
        </div>
      </footer>

      ");

    ?>
  </body>
</html>
