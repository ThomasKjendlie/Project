<?php
    session_start();

    $brukernavn = $_SESSION['brukernavn'];
    $servername = 'localhost';
    $username = 'root'; 
    $password = '';
    $dbname = 'gym';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection failed:" .$conn->connect_error);
    }

    $sql = "SELECT fornavn, etternavn, id, startdato, aktiv FROM bruker WHERE email = '$brukernavn' ";
    $resultat = mysqli_query($conn, $sql);

?>
<div class="center" style= "position: fixed;
                            top: 52%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            background-color: hsl(221, 44%, 41%);
                            color:aliceblue;
                            padding: 10px;
                            text-align: center;
                            font-weight: 700;
                            font-size: 30px;
                            z-index:999;">
<?php
    if($resultat){
        $data = mysqli_fetch_assoc($resultat);
        $navn = $data['fornavn'];
        $etternavn = $data['etternavn'];
        $id = $data['id'];
        $_SESSION['id'] = $id;
        $startdato = $data['startdato'];
        $aktiv = $data['aktiv'];

        echo("Velkommen ".$navn ." " .$etternavn ."<br></br>");
        echo("Du meldte deg inn " .$startdato);
    if($aktiv == 1){
        echo("<br></br> Du er aktiv medlem");
    }
    else {
        echo("<br></br> Du er ikke aktiv medlem");
    }
    }
?>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Min side</title>
    <link rel="stylesheet" href="minside.css?v=2">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
</head>
<body>
    <header>    
      <div class="link"><a href="http://127.0.0.1:5500/index.html" id="link">Jan Bob's Gym</a></div>
    </header>
    <div class="center"></div>

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