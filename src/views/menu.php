<?php
require("/xampp/htdocs/accountly/server/session/session.php");
?>
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3 bg-light">
    <nav class="navbar navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">ACCOUNTLY</h3>
        </a>
        <!-- <i class="fa fa-hashtag me-2"></i> -->
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="/accountly/src/assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"><?php echo $_SESSION['nickname']; ?></h6>
                <span>Usuario</span>
            </div>
        </div>

        <div class="navbar-nav">
            <a href="./dashboard.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Panel</a>
            <a href="./transactions.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Transacciones</a>
            <!-- <a href="./real-table.php" class="nav-item nav-link"><i class="fa fa-couch me-2"></i>Posesiones</a> -->
            <a href="./accounts.php" class="nav-item nav-link"><i class="fa fa-piggy-bank me-2"></i>Cuentas</a>
            <!-- <a href="./goal.php" class="nav-item nav-link"><i class="fa fa-check me-2"></i>Metas</a>
            <a href="./debt.php" class="nav-item nav-link"><i class="fa fa-check me-2"></i>Deudas</a> -->
            <a href="./dairy.php" class="nav-item nav-link"><i class="fa fa-check me-2"></i>Agenda</a>
            <a href="./settings.php" class="nav-item nav-link"><i class="far bi-gear-wide-connected me-2"></i>Configuracion</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Reportes</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="./report_date_transaction.php" class="dropdown-item">Fechas en transaccines</a>
                    <a href="./report_last_week.php" class="dropdown-item">Gastos ultima semana</a>
                    <a href="./report_total_dolar.php" class="dropdown-item">Saldo en dolar</a>
                    <a href="./report_binnacle.php" class="dropdown-item">Bitacora</a>
                    <a href="./report_total.php" class="dropdown-item">Totales</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->