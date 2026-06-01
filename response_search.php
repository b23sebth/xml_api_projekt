<!doctype html>
<html>

  <head>
    <?php 
      if (!isset($_POST['search'])) {
      header("Refresh:0; url=index.php");
      } else {
        $search = $_POST['search']; 
        echo "<title>" . $search . "</title>";
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

  </body>

</html>

