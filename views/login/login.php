<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>ASAHI</title>

    <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../template/css/AdminLTE.min.css">
    <link rel="icon" href="../../misc/img/sistema/favicon.png" type="image/png">

</head>
<body class="login-page">
    <div class="login-box">

    <div class="login-box-body">
        <div class="login-logo">
            <img src="../../misc/img/sistema/1.png" alt="logo" title="Asahi" width="180px">
        </div>

        <h3 class="login-box-msg"><b>Iniciar sesión</b></h3><p class="login-box-msg">Utilice su cuenta Asahi.</p>

        <form id="loginform" autocomplete="off" >
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Correo" name="correo" autofocus required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" required autocomplete="false">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <button type="submit" class="btn btn-block btn-default" name="Iniciar" id="Iniciar">Iniciar</button>
        </form>
    </div>


    <script src="../../plugins/jQuery/jquery-3.2.1.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#loginform').on("submit", function(e) {
                var form = new FormData($("#loginform")[0]);
                form.append('login', '');
                $.ajax({
                    type: 'POST',
                    url: '../../controllers/login_controller.php',
                    data: form,
                    dataType: 'script',
                    processData: false,
                    contentType: false,
                    success: function(x) {
                        x;
                    }
                })
                event.preventDefault();
            }); 
        })
    </script>
</body>
</html>