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
      $xml = file_get_contents('https://wwwlab.webug.se/examples/XML/githubservice/repos/?name=' . $repo);
      $dom = new DomDocument;
      $dom->preserveWhiteSpace = FALSE;
      $dom->loadXML($xml);
      $choosenRepo = $dom->getElementsByTagName('repo');
      $choosenRepo = $choosenRepo->item(0); #The desired repo should be the only item in the list.

      echo "<div id='browse-repos'>";

        echo "<table>";
          echo "</caption> <a href = ' " . $choosenRepo->getAttribute('url') . " '>" . $repo ." (URL)</a> </caption>";
        echo "</table>";

      echo "</div>";
    ?>

  </body>

</html>

