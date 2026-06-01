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

        $sections = $dom->getElementsByTagName('section');
        echo "<table>";
        echo "<thead>";
          echo "<tr>";
              echo "<th>Filename</th>";
              echo "<th>Author</th>";
              echo "<th>CommitID</th>";
              echo "<th>Message</th>";
          echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
            $ids = [];
            foreach ($sections as $section) {
              
              #Only unique commitIDs get added to the table.

              $commitid = $section->getAttribute('commitid');

              if (isset($ids[$commitid])) {
                continue;
              }

              $ids[$commitid] = TRUE;

              echo "<tr>";
              echo "<td>" . $section->getAttribute('filename') . "</td>";
              echo "<td>" . $section->getAttribute('author') . "</td>";
              echo "<td>" . $section->getAttribute('commitid') . "</td>";
              echo "<td>" . $section->getAttribute('message') . "</td>";
              echo "</tr>";
            }
          echo "</tbody>";
        echo "</table>";

      echo "</div>";
    ?>

  </body>

</html>

