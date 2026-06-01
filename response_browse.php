<!doctype html>
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

      $files = $dom->getElementsByTagName('file');
      $singleFiles = [];

      foreach ($files as $file) {
        $type = $file->getAttribute('type');

        if ($type == 'file') {
          $singleFiles[] = $file;
        }

      }

      echo "<div id='browse-repos'>";

        echo "<h1>Now displaying: <a href='" . $choosenRepo->getAttribute('url') . " '>" . $repo . "</a> </h1>";
        # Using a row-layout.
        echo "<table>";
        echo "<caption>Files in repo (unsorted)</caption>";
        foreach($singleFiles as $node) {
          echo "<tr>";
            echo "<td>";
              echo "<table>";
                echo "<thead>";
                  echo "<tr><th>Full name</th><th>Name</th><th>URL</th></tr>";
                echo "</thead>";
                echo "<tbody>";
                  echo "<tr>";
                    echo "<td>" . $node->getAttribute('fullname') . "</td>";
                    echo "<td>" . $node->getAttribute('name') . "</td>";
                    echo "<td> <a href='" . $node->getAttribute('url') . "'>" . $node->getAttribute('url') . "</a></td>";
                  echo "</tr>";
                echo "</tbody>";
              echo "</table>";
            echo "</td>";
          echo "</tr>";
        }
        echo "</table>";

      echo "</div>";
    ?>

  </body>

</html>

