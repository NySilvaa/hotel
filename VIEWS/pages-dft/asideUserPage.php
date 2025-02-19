<?php
    use Model\userPageModel;

    if (!isset($_SESSION['id_user'])) {
        header("Location: " . PATH_PAGES . "login/");
        die();
    }

    $userPage = new userPageModel();
    $userPage->logoutUser();
    $dataUser = $userPage->getInfoUser()[0];
    $addressData = $dataUser[5][0];
    $contactData = $dataUser[6][0];

    $nameUser = explode(" ", $dataUser[0])[0];
?>

<main class="d-flex">
    <aside>            
        <div class="logo"><a href="<?php echo PATH_PAGES; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" stroke="#d9b19b" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-origami"><path d="M12 12V4a1 1 0 0 1 1-1h6.297a1 1 0 0 1 .651 1.759l-4.696 4.025"/><path d="m12 21-7.414-7.414A2 2 0 0 1 4 12.172V6.415a1.002 1.002 0 0 1 1.707-.707L20 20.009"/><path d="m12.214 3.381 8.414 14.966a1 1 0 0 1-.167 1.199l-1.168 1.163a1 1 0 0 1-.706.291H6.351a1 1 0 0 1-.625-.219L3.25 18.8a1 1 0 0 1 .631-1.781l4.165.027"/></svg></a></div>
        
        <h2 class="name-user"><?php echo $nameUser; ?></h2>

        <ul class="items-menu-aside">
            <li data-page="userPage"><a href="<?php echo PATH_PAGES; ?>userPage/"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house">
                        <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                        <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    </svg> Home </a></li>
            <li data-page="savedHotels"><a href="<?php echo PATH_PAGES; ?>savedHotels/"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bookmark">
                        <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" />
                    </svg> Hoteis Salvos </a></li>
            <li data-page="books"><a href="<?php echo PATH_PAGES; ?>books/"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hard-hat">
                        <path d="M10 10V5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5" />
                        <path d="M14 6a6 6 0 0 1 6 6v3" />
                        <path d="M4 15v-3a6 6 0 0 1 6-6" />
                        <rect x="2" y="15" width="20" height="4" rx="1" />
                    </svg> Reservas Efetuadas </a></li>
        </ul>

        <a href="?logout" class="menu-aside-below"><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                <polyline points="16 17 21 12 16 7" />
                <line x1="21" x2="9" y1="12" y2="12" />
            </svg> Logout</a>
    </aside>