
<!DOCTYPE html>
<html class="bg-black">
    <head>
         <meta charset="UTF-8">
        <title>SPM | Bienvenido</title>
       <?php include "view/dist/cabecera.php";?> 
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Iniciar sesión</div>
            <form action="index.php?page=log&accion=login" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="userid" id="userid" class="form-control" placeholder="Usuario"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Recordar contraseña
                    </div>
                </div>
                <div class="footer">
                    <button type="submit" class="btn bg-olive btn-block">Iniciar sesión</button>
                </div>
            </form>

            <div class="margin text-center">
                <span>Siguenos:</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>

            </div>
        </div>

       <?php include "view/dist/footer.php";?> 
    </body>
</html>
