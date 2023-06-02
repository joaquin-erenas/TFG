<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlowPlan | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./style/general-style.css?v=8">
    <link rel="stylesheet" type="text/css" href="./style/header.css?v=3">
    <link rel="stylesheet" type="text/css" href="./style/update.css?v=5">

</head>

<body>
    <?php
    session_start();

    if (!isset($_SESSION["user"])) {
        header("Location: ./login.php?error=log");
    }

    require_once("./struct/header.php");

    if (isset($_GET["error"])) {
        $e = $_GET["error"];
        if ($e == 1) {
            $invalid = true;
        } else if ($e == 2) {
            $camps = true;
        }
    }
    ?>

    <div id="contenedorUpdate">
        <?php

        if (isset($_SESSION["premium"])) {
            $premium = true;
        }
        ?>
        <div id="gridPlans">
            <div class="plan shadow"
            <?php 
                if (isset($premium)) {
                    echo 'id="noPremium"';
                }
            ?>
            ><img src="./media/undraw_explore_re_8l4v.svg" alt="Plan normal">
                <h4>Plan estándar
                    <?php if (!isset($premium)) {
                        echo '(Actual)';
                    } ?>
                </h4>
                <p>0 €</p>
            </div>
            <div class="plan shadow" 
            <?php 
            if (!isset($premium)) {
                echo 'id="premiumBtn"';
            }
            ?>
                ><img src="./media/undraw_outer_space_re_u9vd.svg" alt="Plan premium">
                <h4>Plan premium
                    <?php if (isset($premium)) {
                        echo '(Actual)';
                    } ?>
                </h4>
                <p>10 €</p>
            </div>
        </div>
    </div>
</body>

<script>
    let premiumBtn = document.getElementById("premiumBtn");
    let no_premiumBtn = document.getElementById("noPremium");

    if (premiumBtn != null) {
        premiumBtn.addEventListener("click", function () {

            location.href = './app/index.php?status=sub';
        })
    }


    if (no_premiumBtn != null) {
        no_premiumBtn.addEventListener("click", function () {
            location.href = './app/index.php?status=unsub';
        })
    }

</script>

</html>