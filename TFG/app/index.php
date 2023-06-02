<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>



    <link rel="stylesheet" type="text/css" href="../style/general-style.css?v=3">
    <link rel="stylesheet" type="text/css" href="../style/header.css?v=8">
    <link rel="stylesheet" type="text/css" href="../style/menuApp.css?v=4">
    <link rel="stylesheet" type="text/css" href="../style/mainApp.css?v=8">
    <link rel="stylesheet" type="text/css" href="../style/dashboard.css?v=3">
    <link rel="stylesheet" type="text/css" href="../style/taskForm.css?v=7">
    <link rel="stylesheet" type="text/css" href="../style/graphs.css">
    <link rel="stylesheet" type="text/css" href="../style/friends.css?v=9">
    <link rel="stylesheet" type="text/css" href="../style/profile.css?v=4">


    <?php
    require_once("../bbdd/conexion.php");

    if (isset($_GET["status"]) && !empty($_GET["status"])) {
        if ($_GET["status"] == "out") {
            $caducarCookie = time() - 3600;
            setcookie('user','',$caducarCookie);
            session_destroy();
            header("Location: ../index.php?status=out");
        }
    }

    session_start();

    if (isset($_POST["login"])) {
        require_once("../bbdd/login.php");
        if (isset($_POST["user"]) && isset($_POST["passwd"])) {
            if (iniciarSesion($_POST["user"], $_POST["passwd"])) {
                $u = $_POST["user"];
                $p = $_POST["passwd"];
                require_once("../bbdd/userData.php");
                $_SESSION["idUser"] = obtenerId($u);
                $_SESSION["user"] = $_POST["user"];
                if (obtenerPremium() == "premium") {
                    $_SESSION["premium"] = true;
                }

                if(isset($_POST["remember"])){
                    $dosHoras = time() + (2 * 60 * 60);
                    setcookie('user', $u , $dosHoras);
                }

            } else {
                header("Location: ../login.php?error=1");
            }
        } else {
            header("Location: ../login.php?error=2");
        }
    } else if (isset($_POST["name"])) {
        $name = (!empty($_POST["name"])) ? strtolower(trim(htmlspecialchars($_POST["name"]), " ")) : null;
        $subname = (!empty($_POST["subname"])) ? strtolower(trim(htmlspecialchars($_POST["subname"]), " ")) : null;
        $mail = (!empty($_POST["mail"])) ? strtolower(trim(htmlspecialchars($_POST["mail"]), " ")) : null;
        $user = (!empty($_POST["user"])) ? strtolower(trim(htmlspecialchars($_POST["user"]), " ")) : null;
        $passwd = (!empty($_POST["passwd"])) ? htmlspecialchars($_POST["passwd"]) : null;

        if (isset($name) && isset($subname) && isset($mail) && isset($user) && isset($passwd)) {
            require_once("../bbdd/register.php");
            require_once("../bbdd/userData.php");
            if (registrarUsuario($name, $subname, $mail, $user, $passwd)) {
                $_SESSION["idUser"] = obtenerId($user);
                $_SESSION["user"] = $user;
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
        }
    } else if (isset($_GET["taskName"])) {
        $tarea = (!empty($_GET["taskName"])) ? htmlspecialchars($_GET["taskName"]) : null;
        $descTarea = (!empty($_GET["taskDesc"])) ? htmlspecialchars($_GET["taskDesc"]) : null;
        $typeTask = (!empty($_GET["taskType"])) ? htmlspecialchars($_GET["taskType"]) : null;
        $startTask = (!empty($_GET["taskDateStart"])) ? htmlspecialchars($_GET["taskDateStart"]) : null;
        $endTask = (!empty($_GET["taskDateEnd"])) ? htmlspecialchars($_GET["taskDateEnd"]) : null;

        if (isset($tarea) && isset($descTarea) && isset($typeTask) && isset($startTask) && isset($endTask)) {
            require_once("../bbdd/task.php");
            if (setTarea($tarea, $descTarea, $typeTask, $startTask, $endTask)) {
                unset($_GET);
                header("Location: ./index.php?w=taskForm&status=s");
            } else {
                unset($_GET);
                header("Location: ./index.php?w=taskForm&status=er");
            }
        }
    }


    ?>

</head>

<body>
    <?php
    require_once("./headerApp.php");
    require_once("./menuApp.php");
    require_once("./mainApp.php");


    if (isset($_GET["status"])) {
        $status = $_GET["status"];

        if ($status == "s") {
            $msj = "Tarea creada correctamente ! 😊";
        } else if ($status == "er") {
            $msj = "Ha ocurrido un error 😕";
        } else if ($status == "erT") {
            $msj = "Ha ocurrido un error al encontrar la tarea solicitada 😞";
        } else if ($status == "tB") {
            $msj = "Tarea borrada correctamente 👋";
        } else if ($status == "tBer") {
            $msj = "Ha ocurrido un error al eliminar la tarea 😞";
        } else if ($status == "tComp") {
            $msj = "Tarea completada correctamente ! 😊";
        } else if ($status == "tCompEr") {
            $msj = "Ha ocurrido un error al completar la tarea 😞";
        } else if ($status == "sub") {
            $_SESSION["premium"] = true;
            planPremium();
            $msj = "Bienvenid@ a <b>FlowPlan +</b> 🥳🍾";
            unset($_GET["status"]);
        } else if ($status == "unsub") {
            if (isset($_SESSION["premium"])) {
                unset($_SESSION["premium"]);
            }
            $msj = "Plan de <b>FlowPlan +</b> cancelado 👋";
            require_once("../bbdd/userData.php");
            quitarPremium();
            unset($_GET["status"]);
        }else if ($status == "nFri") {
            $msj = "Amigo agregado correctamente ! 👥";
        }else if ($status == "nFri_no") {
            $msj = "Error al agregar al amigo 😒";
        }else if ($status == "nEli") {
            $msj = "Amigo eliminado";
        }else if ($status == "nEli_no") {
            $msj = "Error al eliminar al amigo 😒";
        }


        echo <<<EOT
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="../media/logo.png" style="max-height:20px;"class="rounded me-2" alt="FlowPlan">
                <strong class="me-auto"><b>FlowPlan</b></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" id="cerrarNoti"></button>
            </div>
            <div class="toast-body">
                {$msj}
            </div>
        </div>
        </div>

        EOT;
    }
    ?>


    <script>
        let cerrarNoti = document.getElementById("cerrarNoti");
        if (cerrarNoti != null) {
            cerrarNoti.addEventListener("click", function () {
                let toast = document.getElementById("liveToast");
                toast.className = "toast hide";
            })
        }
    </script>

</body>


</html>