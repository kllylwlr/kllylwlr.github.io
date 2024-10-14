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
        <li> <a class="activeLink" href="search.html"> BROWSE ITEMS </a> </li>
        <li> <a href="login.html"> LOG IN </a> </li>
        <li> <a href="signup.html"> SIGN UP </a> </li>
        <li> <a href="contact.html"> CONTACT US </a> </li>
      </div>
    </ul>
  </nav>

  <h1>BROWSE ITEMS</h1>
  <div id=searchContainer>
    <form>
      <input type=text placeholder="Search for a product..." name=searchInput id=searchInput>
      <a href="search.html" class="backButton">BACK</a>
      <style>
        .backButton {
          background-color: #E37C33;
          border-radius: 64px;
          border: none;
          padding: 10px 16px;
          cursor: pointer;
          transition: 0.5s ease;
          /* text style */
          text-align: center;
          font-size: 16px;
          text-decoration: none;
          font-weight: 500;
          color: white;
          display: inline-block; /* Add this to make it inline with the input */
      }

        .backButton:hover {
            background-color: #FFA366; /* Change the color on hover if needed */
        }
      </style>
    </form>
  </div>


  <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $searchInput = $_POST['searchInput'];
        $foundProducts = searchProducts($searchInput);
        displaySearchResults($foundProducts);
    }

    function searchProducts($searchInput)
    {
        $products = [
            ['name' => 'Hot Coffee', 'description' => 'A piping hot cup of freshly brewed coffee.', 'image' => 'images/hot-coffee.png', 'price' => '$3.00'],
            ['name' => 'Cappuccino', 'description' => 'A triple espresso shot drink topped with foamed milk. ', 'image' => 'images/cappuccino.png', 'price' => '$4.50'],
            ['name' => 'Americano', 'description' => 'Rich shots of espresso combined with hot spring water. ', 'image' => 'images/americano.png', 'price' => '$2.50'],
            ['name' => 'Cold Brew', 'description' => "Our cafe's signature cold brew, infused with rich vanilla. ", 'image' => 'images/iced-coffee.png', 'price' => '$4.50'],
            ['name' => 'Frappe', 'description' => "Frappe topped with whipped cream and a fudge syrup drizzle. ", 'image' => 'images/frappe.png', 'price' => '$6.00'],
            ['name' => 'Peach Ice Tea', 'description' => "A refreshing glass of peach ice tea brewed in-house. ", 'image' => 'images/iced-tea.png', 'price' => '$3.00'],
            ['name' => 'Apple Danish', 'description' => "A buttery pastry dough filled with sweet apple-cinamon filling. ", 'image' => 'images/apple-danish.png', 'price' => '$4.00'],
            ['name' => 'Almond Croissant', 'description' => "A flaky croissant topped with powdered sugar and almonds. ", 'image' => 'images/almond-croissant.png', 'price' => '$4.50'],
            ['name' => 'Cinnamon Bun', 'description' => "Classic cinnamon roll dusted in sugar. ", 'image' => 'images/cinnamon-bun.png', 'price' => '$3.50']
        ];

        $foundProducts = [];

        foreach ($products as $product) {
            if (stripos($product['name'], $searchInput) !== false || stripos($product['description'], $searchInput) !== false) {
                $foundProducts[] = $product;
            }
        }

        return $foundProducts;
    }

    function displaySearchResults($foundProducts)
    {
        if (!empty($foundProducts)) {
            foreach ($foundProducts as $product) {
                echo '<div class="prodContainer">';
                echo '<img class="menuImg" src="' . $product['image'] . '">';
                echo '<p class="prodName">' . $product['name'] . '</p>';
                echo '<p class="prodDesc">' . $product['description'] . '</p>';
                echo '<p class="prodPrice">' . $product['price'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p style="text-align: center;">No matching products found.</p>';
        }
    }
    ?>


  <footer>
    <div class="flexContainer">
      <!-- Cafe Blurb Section -->
      <div class="flexCol40">
        <img class="logo" src="images/codebrew-logo.png">
        <p> Developing the best coffee since 2023.</p>
        <p>&copy 2023 - Cafe CodeBrew</p>
      </div>

      <!-- Pages Section -->
      <div class="flexCol25">
        <p class="footerSecHead"> PAGES </p>
        <ul>
          <li> <a href="index.html"> Home </a> </li>
          <li> <a href="products.html"> Menu </a> </li>
          <li> <a href="search.html"> Search </a> </li>
          <li> <a href="contact.html"> Contact </a> </li>
        </ul>
      </div>

      <!-- Contact Section -->
      <div class="flexCol25">
        <p class="footerSecHead"> CONTACT </p>
        <ul>
          <li> <i class="fa-solid fa-location-dot"></i> 16 Fake Road, New York, NY 10003</li>
          <li> <i class="fa-solid fa-phone"></i> (212) XXX - XXXX </li>
          <li> <i class="fa-solid fa-envelope"></i> cafecodebrew@gmail.com </li>
        </ul>
      </div>
    </div>
  </footer>

</body>

</html>

</HTML>

</HTML>
