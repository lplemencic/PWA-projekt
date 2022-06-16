<header class="header">
    <h1 class="naslov"><img src='images/naslov.png' width=300px></h1>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <ul class="nav navbar-nav navbar-center">
            <li><a href="index.php">Home</a></li>
            <li><a href="kategorija.php?kategorija=novosti">Novosti</a></li>
            <li><a href="kategorija.php?kategorija=sportske_novosti" id="sportskenovosti">Sportske novosti</a></li>
            <?php
            if(isset($_SESSION['korisnicko_ime']) && $_SESSION['admin'] == 1){
                echo "<li><a href='administracija.php'>Uredi vijest</a></li>
                      <li><a href='unos.php?id=0'>Nova vijest</a></li>";
            }
            ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
            if(!isset($_SESSION['korisnicko_ime'])){
                echo"
                <li><a href='signin.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
                <li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
            }
            if(isset($_SESSION['korisnicko_ime'])){
                echo "<li><a href='logout.php'>Log out</a></li>";
            }
            ?>
          </ul>
        </div>
      </nav>
</header>