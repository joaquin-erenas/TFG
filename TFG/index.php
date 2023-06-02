<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="./style/general-style.css?v=11">
    <link rel="stylesheet" type="text/css" href="./style/header.css?v=8">
    <link rel="stylesheet" type="text/css" href="./style/cards-presentation.css?v=8">
    <link rel="stylesheet" type="text/css" href="./style/separator1.css">
    <link rel="stylesheet" type="text/css" href="./style/main.css?v=8">


    <?php
    require_once("./bbdd/conexion.php");
    
    session_start();

    if (isset($_POST["login"])) {
        $u = $_POST["user"];
        $p = $_POST["passwd"];
        $_SESSION["user"] = $_POST["user"];
    }

    if(isset($_GET["status"]) && !empty($_GET["status"])){
        if ($_GET["status"] == "out") {
            session_destroy();
            $caducarCookie = time() - 3600;
            setcookie('user','',$caducarCookie);
            header("Location: ./index.php?w=taskForm&status=s");
        }
    }

    ?>
</head>

<body>

    <?php
    require_once("./struct/header.php");

    require_once("./struct/presentation.php");
    require_once("./struct/main.php");



    ?>



</body>

</html>