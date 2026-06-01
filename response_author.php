<!doctype html>
<html>
  <head>
    <?php
      if (!isset($_GET['login'])) {
        header("location: index.php");
      } else {
        $author = $_GET['login']; 
        echo "<title>" . $author . "</title>";
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
      $xml = file_get_contents('https://wwwlab.webug.se/examples/XML/githubservice/commits/?login=' . $author);
      $dom = new DomDocument;
      $dom->preserveWhiteSpace = FALSE;
      $dom->loadXML($xml);

      $commits = $dom->getElementsByTagName('commit');

      echo "<div id='author-page'>";
        echo "<h1>Showing results for: " . $commits->item(0)->getAttribute('author') . " (" . $author . ")" . "</h1>";

        echo "<table>";
          echo "<thead>";
            echo "<tr>";
                echo "<th>Repo</th>";
                echo "<th>CommitID</th>";
                echo "<th>Timestamp</th>";
                echo "<th>Message</th>";
            echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
            foreach ($commits as $commit) {
              echo "<tr>";
                echo "<td>" . $commit->getAttribute('repo') . "</td>";
                echo "<td>" . $commit->getAttribute('id') . "</td>";
                echo "<td>" . $commit->getAttribute('timestamp') . "</td>";
                echo "<td>" . $commit->getAttribute('message') . "</td>";
              echo "</tr>";
            }
          echo "</tbody>";
        echo "</table>";
      echo "</div>";
    ?>
  
  </body>

</html>
