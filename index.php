<?php

    session_start();    

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'gym';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error)
    {
        die("Connection failed: ".$conn->connect_error);
    }
    
    $p = $_POST;

?>
    <div style="position: fixed;
                top: 53.5%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: hsl(221, 44%, 41%);
                color:aliceblue;
                padding: 10px;
                text-align: center;
                z-index:999;">
    <?php
    if(isset($p['send']))
    {
        $brukernavn = $p['epost'];
        $passord = $p['passord'];

        $sql = "SELECT email, passord FROM bruker WHERE email = '$brukernavn' AND passord = '$passord' ";
        $resultat = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultat) > 0)
        {
            $_SESSION['brukernavn'] = $brukernavn;
            header("location:minside.php");
        }
        else
        {
            echo ("Feil brukernavn eller passord");
        }
    }
    ?>
    </div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innlogging</title>
    <link rel="stylesheet" href="indexphp.css?v=2">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
</head>
<body>
    <header>
      <div class="link"><a href="http://127.0.0.1:5500/index.html" id="link">Jan Bob's Gym</a></div>
    </header>
    <div class="center">
    <h1>Logg inn</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" name="innlogging">
        <div class="txt-field">
            <input type="email" name="epost" id="epost">
            <span></span>
            <label for="epost">Email:</label>
        </div>
        <div class="txt-field">
            <input type="password" name="passord" id="passord">
            <span></span>
            <label for="passord">Passord:</label>
        </div>
        <input type="submit" name="send" id="send" value="Logg inn">
        <div class="signup-link">
            Ikke medlem? <a href="innmelding.html">Bli medlem</a>
        </div>
        
    </form>
    </div>
    <footer>
      <div class="copyright">
        &copy;
        <label id="time"></label>
        <div>Jan Bobs gym</div>
      </div>
      <ul class="social-icons">
        <li>
          <a href="https://facebook.com" class="fa fa-facebook"></a>
        </li>
        <li>
          <a href="https://twitter.com" class="fa fa-twitter"></a>
        </li>
        <li>
          <a href="https://instagram.com" class="fa fa-instagram"></a>
        </li>
      </ul>
    </footer>
    <script>
      let date = new Date();
      year = date.getFullYear();

      document.getElementById("time").innerHTML = year;
    </script>
</body>
</html>
