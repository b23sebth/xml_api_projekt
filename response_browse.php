<html>

  <head>
    <?php
      if (!isset($_POST['repo'])) {
        header("location: index.php");
      } else {
        $repo = $_POST['repo']; 
        echo "<title>" . $repo . "</title>";
      }
    ?>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>

  <body>
    
    <nav>
      <a id='return-homepage' href='index.php'>Homepage</a>
    </nav>

    <?php
      echo "<div id='browse-repos'>";
        echo "<h1>Now displaying: " . $repo . "</h1>";
      echo "</div>";
    ?>

  </body>

</html>

