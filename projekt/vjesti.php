<?php
session_start();
?>
<!DOCTYPE html>
<head>

    <meta charset="UTF-8">
    <title>LeParisien</title>
    <link rel="stylesheet" type="text/css" href="style.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<?php
include 'header.php'
?>
<div class='conteiner'>
    <?php
    include 'conect.php';

    $id=$_GET['id'];
    
    $query="SELECT * FROM vjesti WHERE id = $id;";
        
    $result = mysqli_query($dbc, $query) or die('Error querying database.');

    if($result){
      while($row = mysqli_fetch_array($result)){
        echo  "<h2 class='naslov_vjesti'>".$row['naslov']."</h2>
          <p class='datum_vjesti'>".$row['datum']."</p>
          <img src='images/".$row['slika']."' class='slika_clanak'>
          <h5 class='kratki_sadrzaj'>".$row['kratkisadrzaj']."</h5>
          <p class='sadrzaj_1'>".$row['sadrzaj1']."</p>
          <h3 class='podnaslov_clanka'>".$row['podnaslov']."</h3>
          <p class='sadrzaj_2'>".$row['sadrzaj2']."</p>";
      }
    }
?>
</div>
<footer>
  <p>Luka Plemenčić | lplemenci@tvz.hr | 2022.</p>
</footer>


</body>
</html>