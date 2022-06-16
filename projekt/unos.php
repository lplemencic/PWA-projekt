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
<body>
<?php
include 'conect.php';
if($_GET['id'] == 0){
echo "<div class='clanak_unos'>
        <form name='unos_clanka' action='skripta.php' method='post' enctype='multipart/form-data'>
        <input type='hidden' class='form-control' id='idvjesti' name='idvjesti' value=0>
        <label for='naslov'>Naslov vjesti</label>
        <br />
        <input name='naslov' id='naslov' type='text' />
        <span id='porukanaslov' class='error'></span>
        <br />
        <br />
        <label for='kratkisadrzaj'>Kratki sadržaj vjesti</label>
        <br />
        <textarea rows='5'cols='40' name='kratkisadrzaj' id='kratkisadrzaj' ></textarea>
        <span id='porukakratkisadrzaj' class='error'></span>
        <br />
        <br />
        <label for='sadrzaj1'>Sadržaj vjesti</label>
        <br />
        <textarea rows='10' cols='60' name='sadrzaj1' id='sadrzaj1' ></textarea>
        <span id='porukasadrzaj1' class='error'></span>
        <br />
        <br />
        <label for='podnaslov'>Podnaslov vijest</label>
        <br />
        <input name='podnaslov' type='text' />
        <br />
        <br />
        <label for='sadrzaj2'>Sadržaj vjesti</label>
        <br />
        <textarea rows='10'cols='60' name='sadrzaj2' ></textarea>
        <br />
        <br />
        <lable for='odaberi_kategoriju_clanka'>Odaberi kategoriju članka</lable> 
        <br />
        <select id='odaberi_kategoriju_clanka' name='odaberi_kategoriju_clanka'>
            <option value='none' selected disabled hidden>Odaberite kategoriju</option>
            <option value='novosti'>Novosti</option>
            <option value='sportske_novosti'>Sportske novosti</option>
        </select>
        <span id='porukaodaberi_kategoriju_clanka' class='error'></span>
        <br />
        <br />
        <label for='slikavjesti'>Odaberi sliku</label>
        <br />
        <input name='slikavjesti' id='slikavjesti' type='file' accept='image/*'/>
        <span id='porukaslikavjesti' class='error'></span>
        <br />
        <input name='vidljivost'type='checkbox'>Obavjest se prikazuje svima<br />
        <br />
        <input name='submit' type='submit' id='submit' value='Pošalji u bazu' /> 
    </form>
</div>";
}
else{
    $query = "SELECT * FROM vjesti WHERE id = ".$_GET['id']."";

    $result = mysqli_query($dbc, $query) or die('Error querying database.');

    $row = mysqli_fetch_array($result);
echo "<div class='clanak_unos'>
        <form name='unos_clanka' action='skripta.php' method='post' enctype='multipart/form-data'>
        <input type='hidden' class='form-control' id='idvjesti' name='idvjesti' value='".$row['id']."'>
        <label for='naslov'>Naslov vjesti</label>
        <br />
        <input name='naslov' id='naslov' type='text' value='".$row['naslov']."' />
        <span id='porukanaslov' class='error'></span>
        <br />
        <br />
        <label for='kratkisadrzaj'>Kratki sadržaj vjesti</label>
        <br />
        <textarea rows='5'cols='40' name='kratkisadrzaj' id='kratkisadrzaj'>".$row['kratkisadrzaj']."</textarea>
        <span id='porukakratkisadrzaj' class='error'></span>
        <br />
        <br />
        <label for='sadrzaj1'>Sadržaj vjesti</label>
        <br />
        <textarea rows='10' cols='100' name='sadrzaj1' id='sadrzaj1' >".$row['sadrzaj1']."</textarea>
        <span id='porukasadrzaj1' class='error'></span>
        <br />
        <br />
        <label for='podnaslov'>Podnaslov vijest</label>
        <br />
        <input name='podnaslov' type='text' value='".$row['podnaslov']."' />
        <br />
        <br />
        <label for='sadrzaj2'>Sadržaj vjesti</label>
        <br />
        <textarea rows='10'cols='100' name='sadrzaj2' >".$row['sadrzaj2']."</textarea>
        <br />
        <br />
        <lable for='odaberi_kategoriju_clanka'>Odaberi kategoriju članka</lable> 
        <br />
        <select id='odaberi_kategoriju_clanka' name='odaberi_kategoriju_clanka' value='".$row['kategorija']."'>
            <option value='".$row['kategorija']."' selected hidden>".$row['kategorija']."</option>
            <option value='novosti'>Novosti</option>
            <option value='sportske_novosti'>Sportske novosti</option>
        </select>
        <span id='porukaodaberi_kategoriju_clanka' class='error'></span>
        <br />
        <br />
        <label for='slikavjesti'>Odaberi sliku</label>
        <br />
        <input type='hidden' class='form-control' id='staraslika' name='staraslika' value='".$row['slika']."'>
        <input name='slikavjesti' id='slikavjesti' type='file' accept='image/*'/><br><img src='images/" .$row['slika'] . "' width=100px>
        <span id='porukaslikavjesti' class='error'></span>
        <br />";
        if("".$row['vidljivost']."" == 0) {
            echo"<input type='checkbox' name='vidljivost' id='vidljivost'/> 
            Obavijest je vidljiva svima";
            } 
        else {
            echo"<input type='checkbox' name='vidljivost' id='vidljivost' checked/> 
            Obavijest je vidljiva svima<br /><br />";
            }
            
        echo"<input name='submit' type='submit' id='submit' value='Spremi promjenu' /> 
            <input name='delete' type='submit' id='delete' value='Obriši vjest' /> 
    </form>
</div>";
}
?>
<script type = "text/javascript">
  document.getElementById("submit").onclick = function(event) {
  var slanje_forme = true;


  var poljenaslov = document.getElementById("naslov");
  var naslov = document.getElementById("naslov").value;
  if (naslov.length < 5 || naslov.lenght > 30) {
      slanje_forme = false;
      poljenaslov.style.border = "1px solid red";
      document.getElementById("porukanaslov").innerHTML = "Naslov vjesti mora imati između 5 i 30 znakova<br>";
      document.getElementById("porukanaslov").style.color="red";
  }

  var poljekratkisadrzaj = document.getElementById("kratkisadrzaj");
  var kratkisadrzaj = document.getElementById("kratkisadrzaj").value;
  if (kratkisadrzaj.length < 10 || kratkisadrzaj.lenght > 100) {
      slanje_forme = false;
      poljekratkisadrzaj.style.border = "1px solid red";
      document.getElementById("porukakratkisadrzaj").innerHTML = "Kratki sadržaj mora imati između 10 i 100 znakova<br>";
      document.getElementById("porukakratkisadrzaj").style.color="red";
  }

  var poljesadrzaj1 = document.getElementById("sadrzaj1");
  var sadrzaj1 = document.getElementById("sadrzaj1").value;
  if (sadrzaj1.length == 0) {
      slanje_forme = false;
      poljesadrzaj1.style.border = "1px solid red";
      document.getElementById("porukasadrzaj1").innerHTML = "Sadržaj ne smije biti prazan<br>";
      document.getElementById("porukasadrzaj1").style.color="red";
  }
  var idvjesti = document.getElementById('idvjesti').value;
  var poljeslikavjesti = document.getElementById("slikavjesti");
  var slikavjesti = document.getElementById("slikavjesti").value;
  if (slikavjesti.length == 0 && idvjesti==0) {
      slanje_forme = false;
      poljeslikavjesti.style.border = "1px solid red";
      document.getElementById("porukaslikavjesti").innerHTML = "Slika mora bit odabrana<br>";
      document.getElementById("porukaslikavjesti").style.color="red";
  }

  var poljeodaberi_kategoriju_clanka = document.getElementById("odaberi_kategoriju_clanka");
  if (document.getElementById("odaberi_kategoriju_clanka").selectedIndex==0 && idvjesti==0) {
      slanje_forme = false;
      poljeodaberi_kategoriju_clanka.style.border = "1px solid red";
      document.getElementById("porukaodaberi_kategoriju_clanka").innerHTML = "Kategorija mora biti odabrana<br>";
      document.getElementById("porukaodaberi_kategoriju_clanka").style.color="red";
  }

  if (slanje_forme != true) {
      event.preventDefault();
  }

}
</script>
    <footer>
        <p>Luka Plemenčić | lplemenci@tvz.hr | 2022.</p>
    </footer>
</body>
</html>