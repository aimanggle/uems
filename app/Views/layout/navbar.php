<nav class="navbar navbar-expand-lg sticky-top px-5 bg-nav">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="/dashboard"><b>UEMS</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link text-white" aria-current="page" href="/dashboard">Dashboard</a>
                </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Event
                        </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">                    
                                <li><a class="dropdown-item" href="<?=url_to('event')?>">Manage Event</a></li>
                            </ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Participant
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">                    
                                <li><a class="dropdown-item" href="/customer">Manage Participant</a></li>
                            </ul>
                        </li>
                    </li>
            </ul>
        <ul class="nav navbar-nav ms-auto">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle nav-link text-white" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="bi bi-person-circle pr-1"></i> aimanggle21@gmail.com <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" role="menu">  
                    <li class="nav-item">
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

              

      

 
