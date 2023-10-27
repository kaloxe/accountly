<body>
<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar" hidden>
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-notification">
            <div class="dropdown" id="notifications">
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                    <i class="dw dw-user1"></i>
                    </span>
                    <span class="user-name"><?php echo $_SESSION['nickname']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="settings.php"><i class="dw dw-settings2"></i> Configuración</a>
                    <a class="dropdown-item" href="/accountly/server/session/session.php?close_session=true"><i class="dw dw-logout"></i> Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./src/js/notifications.js"></script>