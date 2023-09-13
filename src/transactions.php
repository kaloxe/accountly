<?php
require('./../server/db/db.php');
require('./../server/models/class_rest.php');
require('./views/header.php');

?>

<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <?php require('./views/spinner.php'); ?>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <?php require('./views/menu.php');

    $dataAccounts = Rest::readAccounts($id_user);
    $dataBadges = Rest::readBadges();
    $dataReasons = Rest::readReasons();
    ?>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">

        <!-- Navbar Start -->
        <?php require('./views/nav-bar.php'); ?>
        <!-- Navbar End -->

        <div class="d-flex align-items-center justify-content-center pt-4 px-4">

            <div class="bg-light rounded py-2 col-12">

                <div class="px-2 h-100">
                    <div class="d-flex align-items-center justify-content-between m-n2">
                        <div class="row">
                            <a href="./create-transaction.php" class="col-2 btn btn-primary m-2 ms-4"><i class="fa fa-plus"></i></a>
                            <input class="col form-control m-2 ms-2 w-25" name="campo" id="campo" type="text" placeholder="Buscar">
                        </div>
                        <div class="me-2">
                            <!-- <label for=" num_registros" class="form-label">Mostrar: </label> -->
                            <select class="form-select pe-4" name="num_registros" id="num_registros">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="100">100</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-center pt-3">
            <div class="g-4 col-12 px-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Transacciones</h6>
                    <div class="table-responsive">

                        <table class="table text-center align-middle">
                            <thead>
                                <!-- <th class="sort asc">Num. Deposito</th>
                            <th class="sort asc">Usuario</th> -->
                                <th class="sort asc">Divisa</th>
                                <th class="sort asc">Monto</th>
                                <th class="sort asc">Descripcion</th>
                                <th class="sort asc">Razon</th>
                                <th class="sort asc">Cuenta</th>
                                <th class="sort asc">Referencia</th>
                                <th class="sort asc">Fecha</th>
                                <th class="sort asc"></th>
                                <th></th>
                            </thead>

                            <!-- El id del cuerpo de la tabla. -->
                            <tbody id="content">
                            </tbody>
                        </table>

                        <label class="col-12 text-center" id="lbl-total"></label>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center m-2" id="nav-paginacion"></div>
                <input type="hidden" id="pagina" value="1">
                <input type="hidden" id="orderCol" value="0">
                <input type="hidden" id="orderType" value="asc">
            </div>
        </div>
    </div>
    <!-- Content End -->

    <div class="modal fade text-start" id="editAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="col-12">
                <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
                </div>

                <div class="modal-content">
                    <div class="bg-light rounded h-100 p-4">
                        <div class="d-flex">
                            <a class="ps-5 pe-3" href="./transactions.php"><i class="fa fa-arrow-left"></i></a>
                            <h6 class="mb-4">Actualizar Transaccion</h6>
                        </div>

                        <form class="px-3" id="formulario">

                            <div class="mb-2" id="grupo__movimiento">
                                <div class="formulario__grupo-input">
                                    <select class="form-select formulario__input" name="movimiento" id="movimiento" aria-label="Default select example">
                                        <option selected>Seleccione tipo de movimiento</option>
                                        <option value="1">Ingreso</option>
                                        <option value="0">Egreso</option>
                                    </select>
                                    <p class="formulario__input-error">Seleccione una movimiento a registrar la transaccion.</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__cuenta">
                                <div class="formulario__grupo-input">
                                    <label for="cuenta">Cuenta</label>
                                    <select class="form-select formulario__input" name="cuenta" id="cuenta" aria-label="Default select example">
                                        <option selected>Seleccione cuenta</option>
                                        <?php foreach ($dataAccounts as $account) {   ?>
                                            <option value="<?php echo $account['id_account'] ?>"><?php echo $account['name_account'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <p class="formulario__input-error">Seleccione un deposito al que se se registrara el la transaccion.</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__divisa">
                                <div class="formulario__grupo-input">
                                    <label for="divisa">Divisa</label>
                                    <select class="form-select formulario__input" name="divisa" id="divisa" aria-label="Default select example">
                                        <option selected>Seleccione divisa</option>
                                        <?php foreach ($dataBadges as $badge) {   ?>
                                            <option value="<?php echo $badge['id_badge'] ?>"><?php echo $badge['name_badge'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <p class="formulario__input-error">Seleccione un deposito al que se se registrara el la transaccion.</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__razon">
                                <div class="formulario__grupo-input">
                                    <label for="razon">Razon</label>
                                    <select class="form-select formulario__input" name="razon" id="razon" aria-label="Default select example">
                                        <option selected>Seleccione razon</option>
                                        <?php foreach($dataReasons as $reason) {   ?>
                                            <option value="<?php echo $reason['id_reason'] ?>"><?php echo $reason['name_reason'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <p class="formulario__input-error">Seleccione un deposito al que se se registrara el la transaccion.</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__monto">
                                <div class="formulario__grupo-input">
                                    <label for="monto">Monto</label>
                                    <input type="text" class="form-control formulario__input" name="monto" id="monto" placeholder="">
                                    <p class="formulario__input-error">Solo puede escribir numeros separados por punto o coma decimal.</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__descripcion">
                                <div class="formulario__grupo-input">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" class="form-control formulario__input" name="descripcion" id="descripcion" placeholder="">
                                    <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__referencia">
                                <div class="formulario__grupo-input">
                                    <label for="descripcion">Referencia</label>
                                    <input type="text" class="form-control formulario__input" name="referencia" id="referencia" placeholder="">
                                    <p class="formulario__input-error">Solo puede ingresarse numeros y solo desde 4 a 16 caracteres.</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__fecha">
                                <div class="formulario__grupo-input">
                                    <label for="descripcion">Fecha</label>
                                    <input type="date" class="form-control formulario__input" name="fecha" id="fecha" placeholder="">
                                    <p class="formulario__input-error">La fecha no puede superar a la fecha actual.</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center formulario__grupo formulario__grupo-btn-enviar">
                                <input type="button" class="btn btn-primary mt-2 py-2 w-50" id="submit" value="Registrar">
                            </div>
                            <p class="formulario__mensaje-exito pt-2" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade text-start" id="mensajed" tabindex="-1" aria-labelledby="mensajed" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="col-12">
                <div class="modal-content">
                    <div class="bg-light rounded h-80 p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <i class="fa fa-check fa-3x text-primary"></i>
                            <!-- <i class="fa-solid fa-couch"></i> -->
                            <div class="ms-3 mx-auto">
                                <h1>Registro eliminado</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<script>
    function eliminar(id) {
        let data = {
            action: "delete_transaction",
            id: id
        }
        fetch('/accountly/server/controllers/controllerTransaction.php', {
                "method": 'POST',
                "headers": {
                    "Content-Type": "application/json; charset=utf-8"
                },
                "body": JSON.stringify(data)
            }).then(res => res.text())
            .then(dat => {
                setTimeout(() => {
                    window.location.href = "/accountly/src/transactions.php";
                }, 1500);
                console.log(dat)
            })
    }

    /* Llamando a la función getData() */
    getData()

    /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
    document.getElementById("campo").addEventListener("keyup", function() {
        getData()
    }, false)
    document.getElementById("num_registros").addEventListener("change", function() {
        getData()
    }, false)

    /* Peticion AJAX */
    function getData() {
        let input = document.getElementById("campo").value
        let num_registros = document.getElementById("num_registros").value
        let content = document.getElementById("content")
        let pagina = document.getElementById("pagina").value
        let orderCol = document.getElementById("orderCol").value
        let orderType = document.getElementById("orderType").value

        if (pagina == null) {
            pagina = 1
        }

        let url = "tables/loadTransaction.php"
        let formaData = new FormData()
        formaData.append('campo', input)
        formaData.append('registros', num_registros)
        formaData.append('pagina', pagina)
        formaData.append('orderCol', orderCol)
        formaData.append('orderType', orderType)

        fetch(url, {
                method: "POST",
                body: formaData
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data.data
                document.getElementById("lbl-total").innerHTML = 'Mostrando ' + data.totalFiltro +
                    ' de ' + data.totalRegistros + ' registros'
                document.getElementById("nav-paginacion").innerHTML = data.paginacion
            }).catch(err => console.log(err))
    }

    function nextPage(pagina) {
        document.getElementById('pagina').value = pagina
        getData()
    }

    let columns = document.getElementsByClassName("sort")
    let tamanio = columns.length
    for (let i = 0; i < tamanio; i++) {
        columns[i].addEventListener("click", ordenar)
    }

    function ordenar(e) {
        let elemento = e.target

        document.getElementById('orderCol').value = elemento.cellIndex

        if (elemento.classList.contains("asc")) {
            document.getElementById("orderType").value = "asc"
            elemento.classList.remove("asc")
            elemento.classList.add("desc")
        } else {
            document.getElementById("orderType").value = "desc"
            elemento.classList.remove("desc")
            elemento.classList.add("asc")
        }

        getData()
    }
</script>
<script src="./assets/js/validate-edit-transaction.js"></script>

<?php
require('./views/footer.php');
?>