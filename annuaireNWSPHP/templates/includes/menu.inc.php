<div class="container">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info">
            <a href="./?page=home&layout=html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <image xlink:href="./picture/NWS.png" width="40" height="32" />
                </svg>
                <span class="navbar-brand text-primary fs-3 fw-semibold">Annuaire NWS</span>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item px-2"><a href="./?page=home&layout=html" class="nav-link <?php echo (isset( $_GET['page']) ? ($_GET['page'] == "home" ? "active" : "") : "active"); ?>" aria-current="page">Accueil</a></li>
                <li class="nav-item px-2"><a href="./?page=add&layout=html" class="nav-link <?php echo (isset( $_GET['page']) && $_GET['page'] == "add") ? "active" : ""; ?>">Ajouter un profil</a></li>
            </ul>
        </nav>
    </header>
  </div>