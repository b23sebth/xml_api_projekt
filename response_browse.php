<html>

  <?php 
    if (isset($_POST['repo'])) {
    $repo = $_POST['repo']; 
    echo "<h2>" . $repo . "</h2>";
    } else {
      header("Refresh:0; url=index.php");
    }
?>

</html>

