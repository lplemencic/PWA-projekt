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

<?php
echo "<section class='sec'>";
$kategorija=$_GET['kategorija'];
if ($kategorija=='novosti'){
    echo"<h2 class='podnaslov'>Novosti</h2>";
        include 'conect.php';

        $query="SELECT * FROM vjesti WHERE kategorija = 'novosti' ORDER BY id;";
        
        $result = mysqli_query($dbc, $query) or die('Error querying database.');

        if($result){
                    while($row = mysqli_fetch_array($result)){
                        echo "<div class='col-lg-4 col-md-6 col-xs-12'>
                        <img src='images/". $row['slika'] ."' class='slika'>
                        <h2>".$row['naslov']."</h2>
                        <p>". $row['kratkisadrzaj']."s</p>
                        <a href='vjesti.php?id=".$row['id']."' class='procitajvise'>Pročitaj više</a>
                        </div>";
                    }
                }
}
else{
    echo"<h2 class='podnaslov'>Sportske novosti</h2>";
        include 'conect.php';

        $query="SELECT * FROM vjesti WHERE kategorija = 'sportske_novosti' ORDER BY id;";
        
        $result = mysqli_query($dbc, $query) or die('Error querying database.');

        if($result){
                    while($row = mysqli_fetch_array($result)){
                        echo "<div class='col-lg-4 col-md-6 col-xs-12'>
                        <img src='images/". $row['slika'] ."' class='slika'>
                        <h2>".$row['naslov']."</h2>
                        <p>". $row['kratkisadrzaj']."s</p>
                        <a href='vjesti.php?id=".$row['id']."' class='procitajvise'>Pročitaj više</a>
                        </div>";
                    }
                }
}
echo"</section>";
?>

<footer>
  <p>Luka Plemenčić | lplemenci@tvz.hr | 2022.</p>
</footer>


</body>
</html>