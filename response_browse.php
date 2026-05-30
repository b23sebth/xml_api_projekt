<html>

  <?php 
    if (isset($_POST['repo'])) {
    $repo = $_POST['repo']; 
    echo "<h2>" . $repo . "</h2>";
    } else {
      header("location: index.php");
    }
  ?>

</html>

