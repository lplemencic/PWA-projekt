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

<section class="sec">
<?php
            if(isset($_SESSION['korisnicko_ime'])){
                echo "Prijavljeni ste kao ";
                echo $_SESSION['korisnicko_ime'];
            }
        ?>
    <h2 class="podnaslov">Novosti</h2>

        <?php
        include 'conect.php';

        $query="SELECT * FROM vjesti WHERE kategorija = 'novosti' and vidljivost = 1 ORDER BY id DESC LIMIT 3;";
        
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

        ?>
</section>
<section class="sec">
    <h2 class="podnaslov">Sportske novosti</h2>
    <?php
        include 'conect.php';

        $query="SELECT * FROM vjesti WHERE kategorija = 'sportske_novosti' and vidljivost = 1 ORDER BY id DESC LIMIT 3;";
        
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


        ?>
</section>
<footer>
  <p>Luka Plemenčić | lplemenci@tvz.hr | 2022.</p>
</footer>


</body>
</html>