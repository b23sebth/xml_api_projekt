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

      echo "<div id='browse-repos'>";

      echo "<h1>Now displaying: <a href='" . $choosenRepo->getAttribute('url') . " '>" . $repo . "</a> </h1>";
      $miscFiles = [];
        
        #Using row-layout
        echo "<table>";
          echo "<caption>Repo Files</caption>";
          $files = $dom->getElementsByTagName('file');

          foreach ($files as $file) {
            $name = $file->getAttribute('name');

            if ($name == 'README.md' || $name == 'LICENSE') {
              $miscFiles[] = $file;
            }
          }

          if (count($miscFiles) > 0) {
            echo "<tr><td><table>
              <caption>Misc</caption>
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Name</th>
                  <th>URL</th>
                </tr>
              </thead>";
              echo "<tbody>";

                foreach ($miscFiles as $file) {

                  echo "<tr>
                    <td>" . $file->getAttribute('fullname') . "</td>
                    <td>" . $file->getAttribute('name') . "</td>
                    <td>" . "<a href=' " . $file->getAttribute('url') . "'>" . $file->getAttribute('url') ."</a>" . "</td>
                  </tr>";
                }

              echo "</tbody>";

            echo "</td></tr></table>";
          }

          foreach ($files as $file) {

            $type = $file->getAttribute('type');
            if ($type == 'directory') {

              echo "<tr><td>";
                echo "<table>";
                  echo "<caption>" . $file->getAttribute('fullname') . " (Directory)</caption>";

                  echo "<thead>";
                    echo "<tr>
                       <th>Full Name</th>
                       <th>Name</th>
                       <th>Raw URL</th>
                    </tr>";
                  echo "</thead>";

                  echo "<tbody>";

                    $subFiles = $file->getElementsByTagName('file');
                    foreach ($subFiles as $subFile) {
                      echo "<tr>
                        <td>" . $subFile->getAttribute('fullname') . "</td>
                        <td>" . $subFile->getAttribute('name') . "</td>
                        <td>" . "<a href=' " . $subFile->getAttribute('url') . "'>" . $subFile->getAttribute('url') ."</a>" . "</td>
                      </tr>";
                    }

                  echo "</tbody>";
                echo "</table>";

                echo "</td></tr>";
            }
          }
        echo "</table>";

      echo "</div>";
    ?>

  </body>

</html>

