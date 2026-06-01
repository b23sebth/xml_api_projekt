<!doctype html>
<html>

  <head>
    <title>Github Service</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>

  <body>
    <div id='homepage'>

      <h1>Search amongst the most popular Repos!</h1>

      <div id='inner-div'>

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

          <input type='submit' value='Browse'>

        </form>

        <form method='POST', action='response_search.php'>
          <input type='text' name='search' placeholder='Commit-message'>
          <input type='submit' value='Search'>
        </form>

        <div>
          <h3>Browse commits by author:</h3>
          
          <?php
            $xml_2 = file_get_contents('https://wwwlab.webug.se/examples/XML/githubservice/commits/');
            $dom_2 = new DomDocument;
            $dom_2->preserveWhiteSpace = FALSE;
            $dom_2->loadXML($xml_2);

            $printedAuthors = [];

            $authors = $dom_2->getElementsByTagName('commit');

            foreach ($authors as $author) {
              $login = $author->getAttribute('login');
              $name = $author->getAttribute('author');

              #Only prints out author if not done before.
              if (!isset($printedAuthors[$login])) {
                echo "<div>";
                echo "<a href='response_author.php?login=$login'>$name ($login)</a>";
                echo "</div>";

                $printedAuthors[$login] = TRUE;
              }
            }
          ?>
        </div>

      </div>
    </div>
  </body>

</html>
