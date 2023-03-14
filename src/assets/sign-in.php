<?php
require('./views/header.php');
?>

<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <?php require('./views/spinner.php'); ?>
    <!-- Spinner End -->


    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="./dashboard.php" class="">
                            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Iniciar sesion</h3>
                        </a>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Correo</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                    <a href="./dashboard.php"><button type="submit" class="btn btn-primary py-3 w-100 mb-4">Ingresar</button></a>

                    <p class="text-center mb-0">No tienes una cuenta? <a href="./sign-up.php">Registrarse</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
</div>

<?php
require('./views/footer.php');
?>