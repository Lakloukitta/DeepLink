<?php
require 'database.php';
require 'functions.php';

session_start();

if (!isset($_SESSION['doctor_id'])) {
    header('Location: index.php');
    exit();
}

$stmt = $mysqli->prepare("SELECT * FROM doctors WHERE id = ?");
$stmt->bind_param("s", $_SESSION['doctor_id']);
$stmt->execute();
$result = $stmt->get_result();
$doctor_row = $result->fetch_assoc();

?>

<!doctype html>
<html lang="en" data-bs-theme="blue-theme">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deep Link</title>
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet">
    <script src="assets/js/pace.min.js"></script>

    <!--plugins-->
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/mm-vertical.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/simplebar/css/simplebar.css">
    <!--bootstrap css-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="sass/main.css" rel="stylesheet">
    <link href="sass/dark-theme.css" rel="stylesheet">
    <link href="sass/blue-theme.css" rel="stylesheet">
    <link href="sass/semi-dark.css" rel="stylesheet">
    <link href="sass/bordered-theme.css" rel="stylesheet">
    <link href="sass/responsive.css" rel="stylesheet">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&amp;icon_names=spo2">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=ecg_heart" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!--start header-->
    <header class="top-header">
        <nav class="navbar navbar-expand align-items-center gap-4">
            <div class="btn-toggle">
                <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative">
                    <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text"
                        placeholder="Search">
                    <span
                        class="material-icons-outlined position-absolute d-lg-block d-none ms-3 translate-middle-y start-0 top-50">search</span>
                    <span
                        class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 search-close">close</span>
                    <div class="search-popup p-3">
                        <div class="card rounded-4 overflow-hidden">
                            <div class="card-header d-lg-none">
                                <div class="position-relative">
                                    <input class="form-control rounded-5 px-5 mobile-search-control" type="text"
                                        placeholder="Search">
                                    <span
                                        class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                                    <span
                                        class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 mobile-search-close">close</span>
                                </div>
                            </div>
                            <div class="card-body search-content">
                                
                                <p class="search-title">Members</p>

                                <div class="search-list d-flex flex-column gap-2">
                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="memmber-img">
                                            <img src="assets/images/doctors/<?php echo $doctor_row['id'] ?>.png"
                                                width="32" height="32" class="rounded-circle" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title ">Andrew Stark</h5>
                                        </div>
                                    </div>

                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="memmber-img">
                                            <img src="assets/images/avatars/02.png" width="32" height="32"
                                                class="rounded-circle" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title ">Snetro Jhonia</h5>
                                        </div>
                                    </div>

                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="memmber-img">
                                            <img src="assets/images/avatars/03.png" width="32" height="32"
                                                class="rounded-circle" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title">Michle Clark</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-center bg-transparent">
                                <a href="javascript:;" class="btn w-100">See All Search Results</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav gap-1 nav-right-links align-items-center">
                <li class="nav-item d-lg-none mobile-search-btn">
                    <a class="nav-link" href="javascript:;"><i class="material-icons-outlined">search</i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;"
                        data-bs-toggle="dropdown"><img src="assets/images/county/05.png" width="22" alt="">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="assets/images/county/05.png" width="20" alt=""><span
                                    class="ms-2">English</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                                    src="assets/images/county/03.png" width="20" alt=""><span
                                    class="ms-2">German</span></a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-auto-close="outside"
                        data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">apps</i></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-apps shadow-lg p-3">
                        <div class="border rounded-4 overflow-hidden">
                            <div class="row row-cols-3 g-0 border-bottom">
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="assets/images/apps/01.png" width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Gmail</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="assets/images/apps/02.png" width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Skype</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="assets/images/apps/03.png" width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Slack</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->

                            <div class="row row-cols-3 g-0 border-bottom">
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="assets/images/apps/04.png" width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">YouTube</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="assets/images/apps/05.png" width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Google</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="assets/images/apps/06.png" width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Instagram</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->

                            <div class="row row-cols-3 g-0 border-bottom">
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="assets/images/apps/07.png" width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Spotify</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="assets/images/apps/08.png" width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Yahoo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="assets/images/apps/09.png" width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Facebook</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->

                            <div class="row row-cols-3 g-0">
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="assets/images/apps/10.png" width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Figma</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col border-end">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="assets/images/apps/11.png" width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Paypal</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                        <div class="app-icon">
                                            <img src="assets/images/apps/12.png" width="36" alt="">
                                        </div>
                                        <div class="app-name">
                                            <p class="mb-0">Photo</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                        data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:;"><i
                            class="material-icons-outlined">notifications</i>
                        <span class="badge-notify">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
                        <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
                            <h5 class="notiy-title mb-0">Notifications</h5>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret option"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="material-icons-outlined">
                                        more_vert
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-option dropdown-menu-end shadow">
                                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                            href="javascript:;"><i
                                                class="material-icons-outlined fs-6">inventory_2</i>Archive All</a>
                                    </div>
                                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                            href="javascript:;"><i class="material-icons-outlined fs-6">done_all</i>Mark
                                            all as read</a></div>
                                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                            href="javascript:;"><i
                                                class="material-icons-outlined fs-6">mic_off</i>Disable
                                            Notifications</a></div>
                                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                            href="javascript:;"><i class="material-icons-outlined fs-6">grade</i>What's
                                            new ?</a></div>
                                    <div>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                            href="javascript:;"><i
                                                class="material-icons-outlined fs-6">leaderboard</i>Reports</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="notify-list">
                            <div>
                                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="assets/images/doctors/1.png" class="rounded-circle" width="45"
                                                height="45" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="notify-title">Congratulations Jhon</h5>
                                            <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.</p>
                                            <p class="mb-0 notify-time">Today</p>
                                        </div>
                                        <div class="notify-close position-absolute end-0 me-3">
                                            <i class="material-icons-outlined fs-6">close</i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="user-wrapper bg-primary text-primary bg-opacity-10">
                                            <span>RS</span>
                                        </div>
                                        <div class="">
                                            <h5 class="notify-title">New Account Created</h5>
                                            <p class="mb-0 notify-desc">From USA an user has registered.</p>
                                            <p class="mb-0 notify-time">Yesterday</p>
                                        </div>
                                        <div class="notify-close position-absolute end-0 me-3">
                                            <i class="material-icons-outlined fs-6">close</i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="assets/images/apps/13.png" class="rounded-circle" width="45"
                                                height="45" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="notify-title">Payment Recived</h5>
                                            <p class="mb-0 notify-desc">New payment recived successfully</p>
                                            <p class="mb-0 notify-time">1d ago</p>
                                        </div>
                                        <div class="notify-close position-absolute end-0 me-3">
                                            <i class="material-icons-outlined fs-6">close</i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="assets/images/apps/14.png" class="rounded-circle" width="45"
                                                height="45" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="notify-title">New Order Recived</h5>
                                            <p class="mb-0 notify-desc">Recived new order from michle</p>
                                            <p class="mb-0 notify-time">2:15 AM</p>
                                        </div>
                                        <div class="notify-close position-absolute end-0 me-3">
                                            <i class="material-icons-outlined fs-6">close</i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="assets/images/avatars/06.png" class="rounded-circle" width="45"
                                                height="45" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="notify-title">Congratulations Jhon</h5>
                                            <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.</p>
                                            <p class="mb-0 notify-time">Today</p>
                                        </div>
                                        <div class="notify-close position-absolute end-0 me-3">
                                            <i class="material-icons-outlined fs-6">close</i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a class="dropdown-item py-2" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="user-wrapper bg-danger text-danger bg-opacity-10">
                                            <span>PK</span>
                                        </div>
                                        <div class="">
                                            <h5 class="notify-title">New Account Created</h5>
                                            <p class="mb-0 notify-desc">From USA an user has registered.</p>
                                            <p class="mb-0 notify-time">Yesterday</p>
                                        </div>
                                        <div class="notify-close position-absolute end-0 me-3">
                                            <i class="material-icons-outlined fs-6">close</i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                        <img src="assets/images/doctors/1.png" class="rounded-circle p-1 border" width="45" height="45"
                            alt="">
                    </a>
                    <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                        <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                            <div class="text-center">
                                <img src="assets/images/doctors/1.png" class="rounded-circle p-1 shadow mb-3" width="90"
                                    height="90" alt="">
                                <h5 class="user-name mb-0 fw-bold">Hello, <?php echo $doctor_row['first_name'] ?></h5>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                class="material-icons-outlined">person_outline</i>Profile</a>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                class="material-icons-outlined">settings</i>Setting</a>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                class="material-icons-outlined">dashboard</i>Dashboard</a>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                                class="material-icons-outlined">paid</i>Earning</a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="logout.php"><i
                                class="material-icons-outlined">power_settings_new</i>Logout</a>
                    </div>
                </li>
            </ul>

        </nav>
    </header>
    <!--end top header-->


    <!--start sidebar-->
    <aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div class="logo-icon">
                <img src="assets/images/logo-icon.png" class="logo-img" alt="">
            </div>
            <div class="logo-name flex-grow-1">
                <h5 class="mb-0">Deep Link</h5>
            </div>
            <div class="sidebar-close">
                <span class="material-icons-outlined">close</span>
            </div>
        </div>
        <div class="sidebar-nav">
            <!--navigation-->
            <ul class="metismenu" id="sidenav">
                <li>
                    <a href="dashboard.php">
                        <div class="parent-icon"><i class="material-icons-outlined">home</i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">notifications</i>
                        </div>
                        <div class="menu-title">Notifications</div>
                    </a>
                </li>
                <li class="menu-label">Patients</li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">group</i>
                        </div>
                        <div class="menu-title">Patient List</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">person_add</i>
                        </div>
                        <div class="menu-title">Add Patient</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">badge</i>
                        </div>
                        <div class="menu-title">Patient Details</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">monitor_heart</i>
                        </div>
                        <div class="menu-title">Health Trends</div>
                    </a>
                </li>
                <li class="menu-label">Devices</li>

                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
                        </div>
                        <div class="menu-title">Device Inventory</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">contact_mail</i>
                        </div>
                        <div class="menu-title">Assign Device</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">security_update_good</i>
                        </div>
                        <div class="menu-title">Device Health</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">warning</i>
                        </div>
                        <div class="menu-title">Alerts</div>
                    </a>
                </li>

                <li class="menu-label">Health Data</li>


                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">quiz</i>
                        </div>
                        <div class="menu-title">Vital Signs</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">bar_chart</i>
                        </div>
                        <div class="menu-title">Charts and Reports</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">ios_share</i>
                        </div>
                        <div class="menu-title">Export Data</div>
                    </a>
                </li>

                <li class="menu-label">Appointments </li>

                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">date_range</i>
                        </div>
                        <div class="menu-title">Schedule</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">event_note</i>
                        </div>
                        <div class="menu-title">Create Appointment</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">event_repeat</i>
                        </div>
                        <div class="menu-title">Appointment History</div>
                    </a>
                </li>

                <li class="menu-label">Alerts and Notifications</li>

                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">notifications_active</i>
                        </div>
                        <div class="menu-title">Active Alerts</div>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">sync_problem</i>
                        </div>
                        <div class="menu-title">Alert History</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">settings</i>
                        </div>
                        <div class="menu-title">Settings</div>
                    </a>
                </li>

                <li class="menu-label">Reports</li>

                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">summarize</i>
                        </div>
                        <div class="menu-title">Generate Reports</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">note</i>
                        </div>
                        <div class="menu-title">View Reports</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">upgrade</i>
                        </div>
                        <div class="menu-title">Export Options</div>
                    </a>
                </li>

                <li class="menu-label">Help & Support</li>

                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">live_help</i>
                        </div>
                        <div class="menu-title">Cards</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">assignment</i>
                        </div>
                        <div class="menu-title">Documentation</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="material-icons-outlined">contact_phone</i>
                        </div>
                        <div class="menu-title">Contact Support</div>
                    </a>
                </li>


            </ul>
            <!--end navigation-->
        </div>
    </aside>
    <!--end sidebar-->

    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">