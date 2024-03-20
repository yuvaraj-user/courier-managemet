<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<nav id="sidebar" class="sidebar js-sidebar sidebar-bg">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
            <span class="align-middle">
                <img class="brand-title" src="./img/company_logo.png" alt="">
            </span>
        </a>

        <ul class="sidebar-nav">
            <li <?php if($activePage == 'index') { ?> class="sidebar-item active" <?php } ?>>
                <a class="sidebar-link" href="index.php">
                    <i class="fa-solid fa-house"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Pages
            </li>

            <li <?php if($activePage == 'Outgoing_parcels_list' || $activePage == 'Add_outgoing_parcels') { ?> class="sidebar-item active" <?php } ?>>
                <a class="sidebar-link" href="Outgoing_parcels_list.php">
                    <i class="fa-solid fa-layer-group"></i>
                    <span class="align-middle">Outgoing Parcels</span>
                </a>
            </li>

            <li <?php if($activePage == 'Incoming_parcels_list' || $activePage == 'Add_incoming_parcels') { ?> class="sidebar-item active" <?php } ?>>
                <a class="sidebar-link" href="Incoming_parcels_list.php">
                    <i class="fa-solid fa-outdent"></i>
                    <span class="align-middle">Incoming Parcels</span>
                </a>
            </li>
        </ul>
    </div>
</nav>