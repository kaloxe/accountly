<?php
require('../header.php');
require('menu.php');
require('nav_bar.php');
?>

<div class="home-content">
    <div class="sales-boxes" id="settings">
        <div class="recent-sales box">
            <div class="title text-center">Cambiar contraseña</div>
            <h6 class="border-bottom pb-2 mb-0 mb-3"></h6>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Actual contraseña</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nueva contraseña</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Repita nueva contraseña</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="button justify-content-center">
                <a href="#">Cambiar</a>
            </div>
        </div>
    </div>
</div>

</section>

<?php
require('../footer.php');
?>