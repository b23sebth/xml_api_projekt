<!doctype html>
<html>

  <head>
    <?php 
      if (!isset($_POST['search'])) {
      header("Refresh:0; url=index.php");
      } else {
        $search = $_POST['search']; 
        echo "<title>Search: " . $search . "</title>";
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
      $xml = file_get_contents('https://wwwlab.webug.se/examples/XML/githubservice/files/?messagesearch=' . $search);
      $dom = new DomDocument;
      $dom->preserveWhiteSpace = FALSE;
      $dom->loadXML($xml);

      echo "<div id='search-page'>";
        echo "<h1>Showing results for: " . $search . "</h1>";
      echo "</div>";


    ?>

  </body>

</html>

