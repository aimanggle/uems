<?php $this->session = \Config\Services::session(); ?>

<nav class="navbar navbar-expand-lg sticky-top px-5 py-3 bg-nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="/dashboard"><b>UEMS</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  " id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link text-dark" aria-current="page" href="/dashboard">Dashboard</a>
                </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Event
                        </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">                    
                                <li><a class="dropdown-item" href="/event">Manage Event</a></li>
                            </ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Registrant
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">                    
                                <li><a class="dropdown-item" href="/registrant">Manage Registrant</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                User
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">                    
                                <li><a class="dropdown-item" href="/user">Manage User</a></li>
                            </ul>
                        </li>
                    </li>
            </ul>
        <ul class="nav navbar-nav ms-auto">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle nav-link text-dark" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="bi bi-person-circle pr-1"></i> <?= $this->session->get('user_name');?> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" role="menu">  
                    <li class="nav-item">
                        <a class="dropdown-item" href="/logout">
                            <i class="bi bi-sliders"></i> Setting
                        </a>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        <a class="dropdown-item" href="/logout">
                            <i class="bi bi-box-arrow-right pr-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>

              

      

 
