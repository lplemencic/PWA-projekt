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
    <div class="login">
    <form method=post>
        <label for="kime">Korisničko ime</label>
        <br />
        <input name="kime" type="text" required/>
        <br />
        <label for="lozinka">Lozinka</label>
        <br />
        <input name="lozinka" type="password" required/>
        <br />
        <br />
        <input name="submit" type="submit" value="Login" /> 
    </form>
    </div>
    <?php
    include 'conect.php';
    if(isset($_POST['submit'])){
       
        
        $korisnicko_ime=$_POST['kime'];
        $lozinka=$_POST['lozinka'];

        $query = "SELECT * FROM users";
                  $result = mysqli_query($dbc, $query) or die('Error querying database.');
                  $brojac = 0;

        if($result) {
        while($row = mysqli_fetch_array($result)){
          $kime = $row['korisnicko_ime'];
          $hash_lozinka = $row['lozinka'];
  


          if($korisnicko_ime == $kime){
            if(password_verify($lozinka, $hash_lozinka)){
              $brojac = 1;
              $_SESSION['admin'] = $row['admin'];
              $_SESSION['korisnicko_ime'] = $korisnicko_ime;
            } 
          }
        }
      }
      if($brojac == 1){
        echo "<div class=sredina>Dobrodošli ".$_SESSION['korisnicko_ime']."</div>";
        if($_SESSION['admin'] == 1){
          echo "<script>
          location.href = 'administracija.php';
          </script>";
        }
        else{
          echo "<script>
          location.href = 'index.php';
          </script>";
        }
      } else {
        echo "<div class=sredina>Unjeli ste krivo korisnicko ime ili lozinku. <br /> Ukoliko niste registrirani registrirajte se na ovom <a href='signin.php'>linku</a></div>";
      }
    }
    
    
    ?>
    <footer>
        <p>Luka Plemenčić | lplemenci@tvz.hr | 2022.</p>
    </footer>
</body>
</html>