
<html>

  <?php 
    if (isset($_POST['search'])) {
    $search = $_POST['search']; 
    echo "<h2>" . $search . "</h2>";
    } else {
      header("Refresh:0; url=index.php");
    }
  ?>

</html>

