<html>

  <head>
    <title>Github Service</title>
  </head>

  <body>
    <h1>Search among the most popular Repos!</h1>

    <form method='POST' action='index.php'>


      <?php
        $xml = file_get_contents('https://wwwlab.webug.se/examples/XML/githubservice/repos/');
        $dom = new DomDocument;
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($xml);

        echo "<select name='repo'>";
        echo "<option disabled selected>Choose Repo</option>";
        $repos = $dom->getElementsByTagName('repo');
        foreach ($repos as $repo) {
          $name = $repo->getAttribute("name"); 
          echo "<option value='" . $name . "'>";
          echo $name;
          echo "</option>";
        }
        echo "</select>";
      ?>

      <input type='submit' value='Browse'></input>

    </form>

    <form method='POST', action='index.php'>
      <input type='text' placeholder='Search anything'></input>
      <input type='submit' value='Search'></input>
    </form>

</body>

</html>
