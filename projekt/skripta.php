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
    include 'conect.php';
    if(isset($_POST['idvjesti'])){
    $idvjesti=$_POST['idvjesti'];
    }
    if(isset($_POST['delete'])){
      $query = "DELETE FROM vjesti WHERE id=$idvjesti ";
      $result = mysqli_query($dbc, $query);
      echo"<h2 class=brisanjevjesti> Uspješno ste obrisali vjest";
     }

    else{
    $naslov=$_POST['naslov'];
    $kratkisadrzaj=$_POST['kratkisadrzaj'];
    $sadrzaj1=$_POST['sadrzaj1'];
    $sadrzaj2=$_POST['sadrzaj2'];
    $podnaslov=$_POST['podnaslov'];
    $datum = date("d.m.Y");
    if (isset($_POST['vidljivost'])){
        $vidljivost=1;
    }
    else{
        $vidljivost=0;
    }
    $kategorija=$_POST['odaberi_kategoriju_clanka'];


    if(isset($_POST['staraslika'])) {
      $slika = $_POST['staraslika'];
    }
    if($_POST['idvjesti']==0 || !empty($_FILES['slikavjesti']['name'])){
      $currentDirectory = getcwd();
      $uploadDirectory = "/images/";
      

      $fileName = $_FILES['slikavjesti']['name'];
      $fileSize = $_FILES['slikavjesti']['size'];
      $fileTmpName  = $_FILES['slikavjesti']['tmp_name'];
      $fileType = $_FILES['slikavjesti']['type'];

      $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
      $slika=$fileName;

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
      }
    }

    
    if($_POST['idvjesti']==0){
      
          
        $query= "INSERT INTO vjesti(naslov, kratkisadrzaj, sadrzaj1, podnaslov, sadrzaj2, slika, kategorija, vidljivost, datum)
        VALUES('$naslov', '$kratkisadrzaj', '$sadrzaj1', '$podnaslov', '$sadrzaj2', '$fileName', '$kategorija', '$vidljivost', '$datum')";

        $result = mysqli_query($dbc,$query) or die('Error querying has been inserted.');
        mysqli_close($dbc);
        
        
        echo"<div class='conteiner'>
        <h2 class='naslov_vjesti'>$naslov </h2>
        <p class='datum_vjesti'>$datum</p>
        <img src='images/". basename($fileName) ."' class='slika_clanak'>
        <h5 class='kratki_sadrzaj'>$kratkisadrzaj</h5>
        <p class='sadrzaj_1'>$sadrzaj1</p>
        <h3 class='podnaslov_clanka'>$podnaslov</h3>
        <p class='sadrzaj_2'>$sadrzaj2</p>
        </div>";
    }
    else{

      $query= "UPDATE vjesti 
      SET naslov='$naslov', kratkisadrzaj='$kratkisadrzaj', sadrzaj1='$sadrzaj1', podnaslov='$podnaslov', sadrzaj2='$sadrzaj2', slika='$slika', kategorija='$kategorija', vidljivost=$vidljivost, datum='$datum'
      WHERE id=$idvjesti";
         
         
      $result = mysqli_query($dbc,$query) or die('Error querying has been inserted.');
      mysqli_close($dbc);
      
      
      
      echo"<div class='conteiner'>
        <h2 class='naslov_vjesti'>$naslov </h2>
        <p class='datum_vjesti'>$datum</p>
        <img src='images/". $slika ."' class='slika_clanak'>
        <h5 class='kratki_sadrzaj'>$kratkisadrzaj</h5>
        <p class='sadrzaj_1'>$sadrzaj1</p>
        <h3 class='podnaslov_clanka'>$podnaslov</h3>
        <p class='sadrzaj_2'>$sadrzaj2</p>
        </div>";
    }
  }

    ?>
    <footer>
        <p>Luka Plemenčić | lplemenci@tvz.hr | 2022.</p>
    </footer>
</body>
</html>