<html>

  <head>
    <title>Github Service</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>

  <body>
    <h1>Search among the most popular Repos!</h1>

    <form method='POST' action='response_browse.php'>


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

    <form method='POST', action='response_search.php'>
      <input type='text' placeholder='Search anything'></input>
      <input type='submit' value='Search'></input>
    </form>
  </body>

</html>
