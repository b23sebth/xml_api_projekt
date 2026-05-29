<html>

  <head>
    <title>Github Service</title>
  </head>

  <body>
    <form method='POST' action='index.php'>

      <?php
        $xml = file_get_contents('https://wwwlab.webug.se/examples/XML/githubservice/repos/');
        $dom = new DomDocument;
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($xml);

        echo "<select name='repo'>";
        echo "<option disabled selected>Repos</option>";
        $repos = $dom->getElementsByTagName('repo');
        foreach ($repos as $repo) {
          echo "<option value='" . $repo->getAttribute("name") . "'>";
          echo $repo->getAttribute("name");
          echo "</option>";
        }
        echo "</select>";
        ?>
        <button>Submit!</button>
    </form>

</body>

</html>
