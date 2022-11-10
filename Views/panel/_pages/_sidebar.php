<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?= url("dashboard") ?>">
                        <img src="<?= url_views("assets/_images/logo_escola_teste.png") ?>" alt="Logo" srcset="">
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="fal fa-times-circle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item" id="dashboard">
                    <a href="<?= url("dashboard") ?>" class='sidebar-link'>
                        <i class="fal fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item" id="menu_classes">
                    <a href="<?= url("turmas") ?>" class='sidebar-link'>
                        <i class="fal fa-users-class"></i>
                        <span>Turmas</span>
                    </a>
                </li>
                <li class="sidebar-item" id="menu_students">
                    <a href="<?= url("alunos") ?>" class='sidebar-link'>
                        <i class="fal fa-user"></i>
                        <span>Alunos</span>
                    </a>
                </li>
                <li class="sidebar-item" id="menu_enrollment">
                    <a href="<?= url("matriculas") ?>" class='sidebar-link'>
                        <i class="fal fa-address-card"></i>
                        <span>Matriculas</span>
                    </a>
                </li>
                <li class="sidebar-item" id="menu_calls">
                    <a href="<?= url("chamadas") ?>" class='sidebar-link'>
                        <i class="fal fa-list-alt"></i>
                        <span>Chamadas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="<?= url("sair") ?>" class='sidebar-link'>
                        <i class="fal fa-door-open"></i>
                        <span>Sair</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>