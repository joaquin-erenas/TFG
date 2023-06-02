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
    <link rel="stylesheet" type="text/css" href="./style/header.css?v=4">
    <link rel="stylesheet" type="text/css" href="./style/login.css?v=6">

</head>

<body>
    <?php
    require_once("./struct/header.php")
    ?>

    <div id="contenedorLogin">
        <div id="loginGrid">
            <div id="loginImg">
                <img src="./media/undraw_meet_the_team_re_4h08.svg" alt="">
            </div>
            <div id="loginForm">
                <form action="./app/index.php" method="post" id="registerForm">
                    <h4>Sign up</h4>
                    <p>Join <b>FlowPlan</b> and start organizing with us !</p>
                    <div class="row g-2">
                        <div class="col-sm-7">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                <label for="floatingInput">Name</label>
                                <div class="invalid-feedback" id="feedbackName"></div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="subname" id="subname" placeholder="Subame" required>
                                <label for="floatingInput">Subname</label>
                                <div class="invalid-feedback" id="feedbackSubName"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="mail" name="mail" placeholder="asa@mail.com" required>
                        <label for="floatingInput">Mail</label>
                        <div class="invalid-feedback" id="feedbackMail"></div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="user" name="user" placeholder="@user_123" required>
                        <label for="floatingInput">FlowPlan ID</label>
                        <div class="invalid-feedback" id="feedbackUser"></div>
                    </div>
                    <div class="row g-2">
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="123123123" required>
                                <label for="floatingInput">FlowPlan Password</label>
                                <div class="invalid-feedback" id="feedbackPasswd"></div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="passwd2" placeholder="123123123" required disabled>
                                <label for="floatingInput">Repeat Password</label>
                                <div class="invalid-feedback" id="feedbackPasswd2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="formFlex">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="remember" id="remember" required>
                            <label class="form-check-label" for="flexCheckDefault">
                                He leído y acepto la <a href="">política de privacidad</a>
                            </label>
                        </div>
                    </div>
                    <input type="button" name="register" id="register" class="btn btn-principal" value="Sign up">
                    <a href="./login.php" class="btn btn-secundario" id="btnRegister">Or sign in</a>

                </form>
            </div>
        </div>
    </div>
</body>


<script>
    let botonRegister = document.getElementById("register");
    let formularioRegister = document.getElementById("registerForm");
    let inputName = document.getElementById("name");
    let inputSubname = document.getElementById("subname");
    let inputMail = document.getElementById("mail");
    let inputUser = document.getElementById("user");
    let inputPasswd = document.getElementById("passwd");
    let inputPasswd2 = document.getElementById("passwd2");

    inputName.addEventListener("keyup", function() {
        checkNombre();

    });

    inputSubname.addEventListener("keyup", function() {
        checkApe();
    })

    inputMail.addEventListener("keyup", function() {
        checkMail();
    })

    inputUser.addEventListener("keyup", function() {
        checkUser();

    })

    inputPasswd.addEventListener("keyup", function() {
        checkPasswd();

    })

    inputPasswd2.addEventListener("keyup", function() {
        checkPasswd2();

    })

    function checkNombre() {
        let valor = inputName.value;
        let fbackName = document.getElementById("feedbackName");

        if (valor.length == 0) {
            inputName.className = "form-control is-invalid";
            fbackName.innerHTML = "Este campo es obligatorio";
            return false;


        } else if (/[0-9]/.test(valor)) {
            inputName.className = "form-control is-invalid";
            fbackName.innerHTML = "No debe contener números";
            return false;

        } else {
            inputName.className = "form-control is-valid";
            fbackName.innerHTML = "";
            return true;
        }
    }

    function checkApe() {
        let valor = inputSubname.value;
        let fbackSubName = document.getElementById("feedbackSubName");

        if (valor.length == 0) {
            inputSubname.className = "form-control is-invalid";
            fbackSubName.innerHTML = "Este campo es obligatorio";
            return false;

        } else if (/[0-9]/.test(valor)) {
            inputSubname.className = "form-control is-invalid";
            fbackSubName.innerHTML = "No debe contener números";
            return false;
        } else {
            inputSubname.className = "form-control is-valid";
            fbackSubName.innerHTML = "";
            return true;
        }
    }

    function checkMail() {
        let valor = inputMail.value;
        let fbackMail = document.getElementById("feedbackMail");

        if (valor.length == 0) {
            inputMail.className = "form-control is-invalid";
            fbackMail.innerHTML = "Este campo es obligatorio";
            return false;

        } else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor))) {
            inputMail.className = "form-control is-invalid";
            fbackMail.innerHTML = "Debes introducir un correo válido";
            return false;
        } else {
            inputMail.className = "form-control is-valid";
            fbackMail.innerHTML = "";
            return true;
        }
    }

    function checkUser() {
        let valor = inputUser.value;
        let fbackUser = document.getElementById("feedbackUser");

        if (valor.length == 0) {
            inputUser.className = "form-control is-invalid";
            fbackUser.innerHTML = "Este campo es obligatorio";
            return false;

        } else {
            inputUser.className = "form-control is-valid";
            fbackUser.innerHTML = "";
            return true;
        }
    }

    function checkPasswd() {
        let valor = inputPasswd.value;
        let fbackPasswd = document.getElementById("feedbackPasswd");
        inputPasswd2.disabled = true;

        if (valor.length == 0) {
            inputPasswd.className = "form-control is-invalid";
            fbackPasswd.innerHTML = "Este campo es obligatorio";
            return false;

        } else if (valor.length < 8) {
            inputPasswd.className = "form-control is-invalid";
            fbackPasswd.innerHTML = "Debe contener como mínimo 8 caracteres";
            return false;
        } else {
            inputPasswd.className = "form-control is-valid";
            fbackPasswd.innerHTML = "";
            inputPasswd2.value = "";
            inputPasswd2.disabled = false;
            return true;
        }

    }

    function checkPasswd2() {
        let fbackPasswd2 = document.getElementById("feedbackPasswd2");

        console.log("uno -> "+inputPasswd.value+" dos -> "+inputPasswd2.value)
        if (inputPasswd.value != inputPasswd2.value) {
            inputPasswd2.className = "form-control is-invalid";
            fbackPasswd2.innerHTML = "Las contraseñas no coinciden"
        } else {
            inputPasswd2.className = "form-control is-valid";
            fbackPasswd2.innerHTML = ""
        }

        return inputPasswd.value == inputPasswd2.value
    }


    botonRegister.addEventListener("click", function() {
        checkNombre();
        checkApe();
        checkMail();
        checkUser();
        checkPasswd();
        let fbackPasswd2 = document.getElementById("feedbackPasswd2");

        if (checkNombre() && checkApe() && checkMail() && checkUser() && checkPasswd() && inputPasswd2.className == "form-control is-valid") {
            formularioRegister.submit();
        }
    })

    botonRegister.addEventListener("keypress", function(e) {
        if (e.key == "Enter") {
            checkNombre();
            checkApe();
            checkMail();
            checkUser();
            checkPasswd();

            if (checkNombre() && checkApe() && checkMail() && checkUser() && checkPasswd() && checkPasswd2()) {
                formularioRegister.submit();
            }
        }
    })
</script>

</html>