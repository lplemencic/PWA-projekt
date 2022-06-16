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
    <div class="signin">
    <form name=signin method=post>
        <label for="ime">Ime</label>
        <br />
        <input name="ime" type="text" required/>
        <br />
        <label for="prezime">Prezime</label>
        <br />
        <input name="prezime" type="text" required/>
        <br />
        <label for="kime">Korisničko ime</label>
        <br />
        <input name="kime" type="text" required/>
        <br />
        <label for="lozinka">Lozinka</label>
        <br />
        <input name="lozinka" type="password" required/>
        <br />
        <label for="ponlozinka">Ponovi lozinku</label>
        <br />
        <input name="ponlozinka" type="password" required/>
        <br />
        <br />
        <input name="submit" type="submit" value="Pošalji" /> 
    </form>
    </div>
    <?php
    include 'conect.php';
    if(isset($_POST['submit'])){
        
        
        $ime=$_POST['ime'];
        $prezime=$_POST['prezime'];
        $korisnickoime=$_POST['kime'];
        $lozinka=$_POST['lozinka'];
        $ponlozinka=$_POST['ponlozinka'];
        $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);

        $query = "SELECT * FROM users";
            $result = mysqli_query($dbc, $query) or die('Error querying database.');
            $ispitivac = true;

            if($result) {
                while($row = mysqli_fetch_array($result))
                {
                    $temp = $row['korisnicko_ime'];

                    if($korisnickoime == $temp){
                        $ispitivac = false;
                    }
                }
            }
            if ($lozinka == $ponlozinka) {
                if($ispitivac){
                    $sql="INSERT INTO users (ime,prezime,korisnicko_ime,lozinka) values (?, ?, ?, ?)";

                        $stmt=mysqli_stmt_init($dbc);
                    if (mysqli_stmt_prepare($stmt, $sql)){
                        mysqli_stmt_bind_param($stmt,'ssss',$ime,$prezime,$korisnickoime,$hashed_password);
                        mysqli_stmt_execute($stmt);
                    } 
                        echo "<div class=registracija>Registracija je uspješna</div>";
                }
                else{
                    echo "<div class=registracija>Korinik već postoji.</div>";
                }
            }
            else {
                echo "<div class=registracija>Lozinke nisu iste</div>";
            }
        }
    ?>
    <footer>
        <p>Luka Plemenčić | lplemenci@tvz.hr | 2022.</p>
    </footer>
    <script>
      $(function() {
          $("form[name='signin']").validate({
            rules: {
              ime: {
                  required: true,
              },
              prezime: {
                  required: true,
              },
              kime: {
                  required: true,
                  minlength: 4,
                  maxlength: 15,
              },
              lozinka: {
                  required: true,
              },
              ponlozinka:{
                  required: true,
                  equalTo: "#password",
              }
            },

            messages: {
              ime: {
                required: "<br/> Ime ne smije biti prazno",
              },
              prezime: {
                required: "<br/> Prezime ne smije biti prazno",
              },
              kime: {
                required: "<br/> Username ne smije biti prazan",
                minlength: "<br/> Username mora imati barem 4 znaka",
                maxlength: "<br/> Username može imati najviše 15 znakova"
              },
              lozinka: {
                required: "<br/> Password ne smije biti prazan",
              },
              ponlozinka: {
                required: "<br/> Password ne smije biti prazan",
                equalTo: "<br/> Obje lozinke moraju biti iste",
              },
          },

            submitHandler: function(form) {
              form.submit();
            }
          });
        });
      </script>
</body>
</html>