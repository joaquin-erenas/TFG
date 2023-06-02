<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlowPlan | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./style/general-style.css?v=8">
    <link rel="stylesheet" type="text/css" href="./style/header.css?v=3">
    <link rel="stylesheet" type="text/css" href="./style/login.css?v=2">

</head>

<body>
    <?php
    session_start();
    require_once("./struct/header.php");

    if (isset($_GET["error"])) {
        $e = $_GET["error"];
        if ($e == 1) {
            $invalid = true;
        }else if($e == 2){
            $camps = true;
        }else if($e == "log"){
            $log = true;
        }
    }
    ?>

    <div id="contenedorLogin">
        <div id="loginGrid">
            <div id="loginImg">
                <img src="./media/undraw_spreadsheet_re_cn18.svg" alt="">
            </div>
            <div id="loginForm">
                <form action="./app/index.php" method="post">
                    <h4>Sign in</h4>
                    <p>Enter at your existent <b>FlowPlan</b> account !</p>
                    <?php
                    if (isset($invalid)) {
                        echo <<< EOT
                        <div class="alert alert-danger" role="alert">
                            Usuario o contraseña incorrectos 😕
                        </div>
                        EOT;
                    }else if(isset($camps)){
                        echo <<< EOT
                        <div class="alert alert-warning" role="alert">
                            Debes rellenar ambos campos ✍️
                        </div>
                        EOT;
                    }else if(isset($log)){
                        echo <<< EOT
                        <div class="alert alert-warning" role="alert">
                            Debes iniciar sesión para ver los planes ✍️
                        </div>
                        EOT;
                    }

                    ?>
                    <div class="form-floating mb-3">
                        <input type="text" <?php if (isset($invalid)) {
                                                echo 'class="form-control is-invalid"';
                                            } else {
                                                echo 'class="form-control"';
                                            } ?> id="user" name="user" placeholder="@user_123" required>
                        <label for="floatingInput">FlowPlan ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" <?php if (isset($invalid)) {
                                                    echo 'class="form-control is-invalid"';
                                                } else {
                                                    echo 'class="form-control"';
                                                } ?> id="passwd" name="passwd" placeholder="123123123" required>
                        <label for="floatingInput">FlowPlan Password</label>
                    </div>
                    <div class="formFlex">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="remember" id="remember">
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <input type="submit" name="login" id="login" class="btn btn-principal" value="Log in">
                    <a href="./register.php" class="btn btn-secundario" id="btnRegister">Or sign up</a>

                    <hr>
                    <div class="formFlex" id="socialLogin">
                        <div class="iconForm">
                            <img src="./media/gogIcon.png" alt="">
                        </div>
                        <div class="iconForm">
                            <img src="./media/gitIcon.png" alt="">
                        </div>
                        <div class="iconForm">
                            <img src="./media/winIcon.png" alt="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<script>

</script>