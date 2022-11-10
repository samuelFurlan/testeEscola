<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= url_views("assets/_images/logo_escola_teste_ico.ico") ?>"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= url_views("auth/_assets/vendor/bootstrap/css/bootstrap.css") ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="<?= url_views("auth/_assets/fonts/iconic/css/material-design-iconic-font.min.css") ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= url_views("auth/_assets/vendor/animate/animate.css") ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="<?= url_views("auth/_assets/vendor/animsition/css/animsition.min.css") ?>">
    <link rel="stylesheet" href="<?= url_views("assets/vendors/toastify/toastify.css") ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= url_views("auth/_assets/css/util.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?= url_views("auth/_assets/css/main.css") ?>">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100"
         style="background-image: url(<?= url_views("auth/_assets/images/background-auth.jpg") ?>);">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form method="post" enctype="multipart/form-data" action="<?= url("validar-acesso") ?>"
                  class="login100-form validate-form">
					<span class="login100-form-title p-b-30">
						<img src="<?= url_views("assets/_images/logo_escola_teste.png") ?>" width="140px">
					</span>

                <div class="wrap-input100 validate-input m-b-23" data-validate="Usuário é obrigatorio">
                    <span class="label-input100">Usuário</span>
                    <input class="input100" type="text" name="username" placeholder="Digite seu usuário" required>
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Senha é obrigatorio">
                    <span class="label-input100">Senha</span>
                    <input class="input100" type="password" name="pass" placeholder="Digite sua senha" required>
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="container-login100-form-btn" style="margin-top: 10px;">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Acessar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="<?= url_views("assets/_js/jquery.min.js") ?>"></script>
<!--===============================================================================================-->
<script src="<?= url_views("auth/_assets/vendor/animsition/js/animsition.min.js") ?>"></script>
<!--===============================================================================================-->
<script src="<?= url_views("auth/_assets/vendor/bootstrap/js/popper.js") ?>"></script>
<script src="<?= url_views("auth/_assets/vendor/bootstrap/js/bootstrap.js") ?>"></script>
<script src="<?= url_views("assets/vendors/toastify/toastify.js") ?>"></script>
<!--===============================================================================================-->
<script src="<?= url_views("panel/_js/shared.js") ?>"></script>
<script src="<?= url_views("auth/_assets/js/main.js") ?>"></script>

</body>
</html>