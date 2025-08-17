<?php
/**
 * @var object $user_info
 * @var array $allowed_modules
 * @var CodeIgniter\HTTP\IncomingRequest $request
 * @var array $config
 */

use Config\Services;

$request = Services::request();
?>

<!doctype html>
<html lang="<?= $request->getLocale() ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="<?= base_url() ?>">
    <title><?= esc($config['company']) . ' | ' . lang('Common.powered_by') . ' OSPOS ' . esc(config('App')->application_version) ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="<?= 'resources/bootswatch/' . (empty($config['theme']) ? 'flatly' : esc($config['theme'])) . '/bootstrap.min.css' ?>">

    <?php if (ENVIRONMENT == 'development' || get_cookie('debug') == 'true' || $request->getGet('debug') == 'true') : ?>
        <!-- inject:debug:css -->
        <link rel="stylesheet" href="resources/css/jquery-ui-fe010342cb.css">
        <link rel="stylesheet" href="resources/css/bootstrap-dialog-1716ef6e7c.css">
        <link rel="stylesheet" href="resources/css/jasny-bootstrap-40bf85f3ed.css">
        <link rel="stylesheet" href="resources/css/bootstrap-datetimepicker-66374fba71.css">
        <link rel="stylesheet" href="resources/css/bootstrap-select-66d5473b84.css">
        <link rel="stylesheet" href="resources/css/bootstrap-table-ed9d1a3360.css">
        <link rel="stylesheet" href="resources/css/bootstrap-table-sticky-header-07d65e7533.css">
        <link rel="stylesheet" href="resources/css/daterangepicker-85523b7dfe.css">
        <link rel="stylesheet" href="resources/css/chartist-c19aedb81a.css">
        <link rel="stylesheet" href="resources/css/chartist-plugin-tooltip-2e0ec92e60.css">
        <link rel="stylesheet" href="resources/css/bootstrap-tagsinput-5a6d46a06c.css">
        <link rel="stylesheet" href="resources/css/bootstrap-toggle-e12db6c1f3.css">
        <link rel="stylesheet" href="resources/css/bootstrap-icons-1f041c8521.css">
        <link rel="stylesheet" href="resources/css/bootstrap-292fc0ad3b.autocomplete.css">
        <link rel="stylesheet" href="resources/css/bootstrap5-compatibility-f26e1cd249.css">
        <link rel="stylesheet" href="resources/css/invoice-1eae5e39b9.css">
        <link rel="stylesheet" href="resources/css/ospos_print-2ba645b044.css">
        <link rel="stylesheet" href="resources/css/ospos-aef2a8c58d.css">
        <link rel="stylesheet" href="resources/css/home-responsive.css">
        <link rel="stylesheet" href="resources/css/responsive-fixes.css">
        <link rel="stylesheet" href="resources/css/responsive-navigation.css">
        <link rel="stylesheet" href="resources/css/mobile-navigation.css">
        <link rel="stylesheet" href="resources/css/popupbox-7b616030b0.css">
        <link rel="stylesheet" href="resources/css/receipt-c17902b8ce.css">
        <link rel="stylesheet" href="resources/css/register-58be93b261.css">
        <link rel="stylesheet" href="resources/css/reports-407b727797.css">
        <!-- endinject -->
        <!-- inject:debug:js -->
        <script src="resources/js/jquery-12e87d2f3a.js"></script>
        <script src="resources/js/jquery-4fa896f615.form.js"></script>
        <script src="resources/js/jquery-a0350e8820.validate.js"></script>
        <script src="resources/js/jquery-ui-cbc65ff85e.js"></script>
        <script src="resources/js/bootstrap-894d79839f.js"></script>
        <script src="resources/js/bootstrap-dialog-27123abb65.js"></script>
        <script src="resources/js/jasny-bootstrap-7c6d7b8adf.js"></script>
        <script src="resources/js/bootstrap-datetimepicker-25e39b7ef8.js"></script>
        <script src="resources/js/bootstrap-select-b01896a67b.js"></script>
        <script src="resources/js/bootstrap-table-bdb06552ea.js"></script>
        <script src="resources/js/bootstrap-table-export-6389dc2aa5.js"></script>
        <script src="resources/js/bootstrap-table-mobile-fc655b68ab.js"></script>
        <script src="resources/js/bootstrap-table-sticky-header-cb4d83d172.js"></script>
        <script src="resources/js/moment-d65dc6d2e6.min.js"></script>
        <script src="resources/js/daterangepicker-048c56a690.js"></script>
        <script src="resources/js/es6-promise-855125e6f5.js"></script>
        <script src="resources/js/FileSaver-e73b1946e8.js"></script>
        <script src="resources/js/html2canvas-e1d3a8d7cd.js"></script>
        <script src="resources/js/jspdf-6eb90bf5a3.umd.js"></script>
        <script src="resources/js/jspdf-4f52bd767f.plugin.autotable.js"></script>
        <script src="resources/js/tableExport-0df60917ca.min.js"></script>
        <script src="resources/js/chartist-8a7ecb4445.js"></script>
        <script src="resources/js/chartist-plugin-pointlabels-0a1ab6aa4e.js"></script>
        <script src="resources/js/chartist-plugin-tooltip-116cb48831.js"></script>
        <script src="resources/js/chartist-plugin-axistitle-80a1198058.js"></script>
        <script src="resources/js/chartist-plugin-barlabels-4165273742.js"></script>
        <script src="resources/js/bootstrap-notify-376bc6eb87.js"></script>
        <script src="resources/js/js-fa93e8894e.cookie.js"></script>
        <script src="resources/js/bootstrap-tagsinput-855a7c7670.js"></script>
        <script src="resources/js/bootstrap-toggle-1c7a19a049.js"></script>
        <script src="resources/js/clipboard-908af414ab.js"></script>
        <script src="resources/js/imgpreview-62e42c15a0.full.jquery.js"></script>
        <script src="resources/js/manage_tables-7a86e208b7.js"></script>
        <script src="resources/js/nominatim-599d9d6f9c.autocomplete.js"></script>
        <!-- endinject -->
    <?php else : ?>
        <!--inject:prod:css -->
        <link rel="stylesheet" href="resources/opensourcepos-a8163f537a.min.css">
        <!-- endinject -->

        <!-- Tweaks to the UI for a particular theme should drop here  -->
        <?php if ($config['theme'] != 'flatly' && file_exists($_SERVER['DOCUMENT_ROOT'] . '/public/css/' . esc($config['theme']) . '.css')) { ?>
            <link rel="stylesheet" href="<?= 'css/' . esc($config['theme']) . '.css' ?>">
        <?php } ?>
        <!-- inject:prod:js -->
        <script src="resources/jquery-2c872dbe60.min.js"></script>
        <script src="resources/opensourcepos-5c6bbbfd5d.min.js"></script>
        <!-- endinject -->
    <?php endif; ?>

    <?= view('partial/header_js') ?>
    <?= view('partial/lang_lines') ?>

<style>
    html {
        overflow: auto;
    }
    
    /* Ultra-specific CSS reset for navigation dots */
    nav.navbar ul.navbar-nav,
    nav.navbar ul.navbar-nav li,
    .navbar ul.navbar-nav,
    .navbar ul.navbar-nav li,
    ul.navbar-nav,
    ul.navbar-nav li,
    .navbar-nav,
    .navbar-nav li,
    .nav-item {
        list-style: none !important;
        list-style-type: none !important;
        list-style-image: none !important;
        list-style-position: outside !important;
        margin-left: 0 !important;
        padding-left: 0 !important;
    }
    
    /* Remove all pseudo-element content */
    nav.navbar ul.navbar-nav li::before,
    nav.navbar ul.navbar-nav li::after,
    .navbar ul.navbar-nav li::before,
    .navbar ul.navbar-nav li::after,
    ul.navbar-nav li::before,
    ul.navbar-nav li::after,
    .navbar-nav li::before,
    .navbar-nav li::after,
    .nav-item::before,
    .nav-item::after,
    nav.navbar ul.navbar-nav li::marker,
    .navbar ul.navbar-nav li::marker,
    ul.navbar-nav li::marker,
    .navbar-nav li::marker,
    .nav-item::marker {
        content: none !important;
        display: none !important;
    }

    /* Base navbar styling */
    .navbar {
        background-color: #f8f9fa !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        position: relative;
        z-index: 1030;
        min-height: 56px !important;
    }

    .navbar .container-fluid {
        min-height: 56px !important;
        padding-left: 1rem !important;
        padding-right: 1rem !important;
    }

    /* Base navigation styling */
    .navbar-nav {
        list-style: none !important;
        padding-left: 0 !important;
        margin: 0 !important;
    }

    .navbar-nav .nav-item {
        list-style: none !important;
        margin: 0;
    }

    .navbar-nav .nav-link {
        text-decoration: none !important;
        transition: all 0.2s ease-in-out;
        border-radius: 0.375rem;
        position: relative;
    }

    .menu-icon-img {
        transition: transform 0.2s ease-in-out;
        max-width: 100%;
        height: auto;
    }

    .nav-link:hover .menu-icon-img {
        transform: scale(1.05);
    }

    .navbar-nav .nav-item.active .nav-link {
        background-color: #007bff !important;
        color: white !important;
    }

    .navbar-nav .nav-link:hover {
        background-color: #e9ecef !important;
        color: #212529 !important;
        text-decoration: none !important;
    }

    /* Hamburger menu styling */
    .navbar-toggler {
        border: 1px solid rgba(0,0,0,.125) !important;
        padding: 0.375rem 0.75rem !important;
        background: transparent !important;
        position: relative !important;
        z-index: 1040 !important;
        cursor: pointer !important;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25) !important;
        outline: none !important;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2833, 37, 41, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-size: 100% !important;
        width: 1.5em !important;
        height: 1.5em !important;
    }

    /* Desktop Navigation (1200px and up) */
    @media (min-width: 1200px) {
        .navbar-toggler {
            display: none !important;
        }

        .navbar-collapse {
            display: block !important;
        }

        .navbar-nav {
            display: flex !important;
            flex-direction: row !important;
            gap: 0.75rem !important;
            align-items: center !important;
            justify-content: flex-end !important;
        }

        .navbar-nav .nav-item {
            min-width: 85px;
            max-width: 100px;
        }

        .navbar-nav .nav-link {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            text-align: center !important;
            padding: 0.75rem 0.5rem !important;
            color: #495057 !important;
        }

        .menu-icon-wrapper {
            margin-bottom: 0.375rem !important;
            margin-right: 0 !important;
        }

        .menu-icon-img {
            width: 32px !important;
            height: 32px !important;
        }

        .menu-text {
            font-size: 0.75rem !important;
            font-weight: 500 !important;
            line-height: 1.2 !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
        }
    }

    /* Large Desktop Navigation (992px to 1199px) */
    @media (min-width: 992px) and (max-width: 1199.98px) {
        .navbar-toggler {
            display: none !important;
        }

        .navbar-collapse {
            display: block !important;
        }

        .navbar-nav {
            display: flex !important;
            flex-direction: row !important;
            gap: 0.5rem !important;
            align-items: center !important;
            justify-content: flex-end !important;
        }

        .navbar-nav .nav-item {
            min-width: 75px;
            max-width: 90px;
        }

        .navbar-nav .nav-link {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            text-align: center !important;
            padding: 0.5rem 0.25rem !important;
            color: #495057 !important;
        }

        .menu-icon-wrapper {
            margin-bottom: 0.25rem !important;
            margin-right: 0 !important;
        }

        .menu-icon-img {
            width: 28px !important;
            height: 28px !important;
        }

        .menu-text {
            font-size: 0.7rem !important;
            font-weight: 500 !important;
            line-height: 1.1 !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
        }
    }

    /* Tablet Navigation (768px to 991px) */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .navbar-toggler {
            display: none !important;
        }

        .navbar-collapse {
            display: block !important;
        }

        .navbar-nav {
            display: flex !important;
            flex-direction: row !important;
            flex-wrap: wrap !important;
            gap: 0.75rem !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 1rem 0 !important;
        }

        .navbar-nav .nav-item {
            flex: 0 0 calc(25% - 0.75rem);
            min-width: 120px;
            max-width: 140px;
        }

        .navbar-nav .nav-link {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            text-align: center !important;
            padding: 0.75rem 0.5rem !important;
            color: #495057 !important;
            background-color: rgba(248, 249, 250, 0.8) !important;
            border: 1px solid rgba(0, 0, 0, 0.1) !important;
            border-radius: 0.5rem !important;
        }

        .navbar-nav .nav-link:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1) !important;
        }

        .menu-icon-wrapper {
            margin-bottom: 0.5rem !important;
            margin-right: 0 !important;
        }

        .menu-icon-img {
            width: 40px !important;
            height: 40px !important;
        }

        .menu-text {
            font-size: 0.8rem !important;
            font-weight: 500 !important;
            line-height: 1.2 !important;
        }
    }

    /* HAMBURGER MENU FIX - Mobile Navigation (up to 767px) */
    @media (max-width: 767.98px) {
        /* Ensure navbar layout is correct */
        .navbar > .container-fluid {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            padding: 0.5rem 1rem !important;
            position: relative !important;
        }
        
        .navbar-brand {
            order: 1 !important;
            flex: 1 1 auto !important;
            margin-right: 1rem !important;
            font-size: 1.25rem !important;
            font-weight: bold !important;
            color: #007bff !important;
            text-decoration: none !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
        }
        
        /* Force hamburger menu to show on mobile */
        .navbar-toggler {
            order: 2 !important;
            flex: 0 0 auto !important;
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
            position: relative !important;
            z-index: 1050 !important;
            background: #ffffff !important;
            border: 2px solid #007bff !important;
            border-radius: 0.375rem !important;
            padding: 0.5rem !important;
            margin-left: 0.5rem !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
            cursor: pointer !important;
            min-width: 44px !important;
            min-height: 44px !important;
        }
        
        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(0,123,255,.25) !important;
            outline: none !important;
        }
        
        .navbar-toggler-icon {
            display: inline-block !important;
            width: 1.5em !important;
            height: 1.5em !important;
            vertical-align: middle !important;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2813, 110, 253, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='3' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            background-size: 100% !important;
        }
        
        .navbar-collapse {
            order: 3 !important;
            width: 100% !important;
            flex-basis: 100% !important;
            margin-top: 0.5rem;
            position: absolute !important;
            top: 100% !important;
            left: 0 !important;
            right: 0 !important;
            background-color: #ffffff !important;
            border-top: 1px solid rgba(0,0,0,0.1) !important;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }

        .navbar-collapse:not(.show) {
            display: none !important;
        }

        .navbar-collapse.show {
            display: block !important;
        }

        .navbar-nav {
            display: flex !important;
            flex-direction: column !important;
            gap: 0 !important;
            background-color: #f8f9fa !important;
            border-radius: 0.5rem !important;
            padding: 0.5rem 0 !important;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }

        .navbar-nav .nav-item {
            width: 100% !important;
        }

        .navbar-nav .nav-link {
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important;
            text-align: left !important;
            padding: 0.75rem 1rem !important;
            margin: 0.125rem 0.5rem !important;
            color: #495057 !important;
            border-radius: 0.375rem !important;
        }

        .navbar-nav .nav-link:hover {
            background-color: #e9ecef !important;
        }

        .navbar-nav .nav-item.active .nav-link {
            background-color: #007bff !important;
            color: white !important;
        }

        .menu-icon-wrapper {
            margin-right: 0.75rem !important;
            margin-bottom: 0 !important;
            flex-shrink: 0 !important;
        }

        .menu-icon-img {
            width: 24px !important;
            height: 24px !important;
        }

        .menu-text {
            font-size: 0.9rem !important;
            font-weight: 500 !important;
        }
    }

    /* Hide hamburger on larger screens */
    @media (min-width: 768px) {
        .navbar-toggler {
            display: none !important;
        }
    }

    /* Loading state */
    .nav-item.loading .nav-link {
        opacity: 0.7;
        pointer-events: none;
    }

    .nav-item.loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 16px;
        height: 16px;
        margin: -8px 0 0 -8px;
        border: 2px solid #f3f3f3;
        border-top: 2px solid #007bff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Mobile overlay */
    body.navbar-open::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.2);
        z-index: 1020;
        backdrop-filter: blur(2px);
    }

    @media (min-width: 768px) {
        body.navbar-open::before {
            display: none;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('#navbarNav');
    const navLinks = document.querySelectorAll('.nav-link');
    const body = document.body;

    console.log('Navigation script loaded');
    console.log('Hamburger found:', !!navbarToggler);
    console.log('Navigation found:', !!navbarCollapse);

    if (navbarToggler && navbarCollapse) {
        // HAMBURGER MENU FIX - Force hamburger to be visible on mobile
        function forceHamburgerVisible() {
            if (window.innerWidth <= 767) {
                navbarToggler.style.display = 'block';
                navbarToggler.style.visibility = 'visible';
                navbarToggler.style.opacity = '1';
                navbarToggler.style.position = 'relative';
                navbarToggler.style.zIndex = '1050';
                console.log('Hamburger forced visible');
            } else {
                // Hide on larger screens
                navbarToggler.style.display = 'none';
            }
        }
        
        // Call immediately and on resize
        forceHamburgerVisible();
        window.addEventListener('resize', forceHamburgerVisible);

        // Enhanced hamburger menu toggle
        navbarToggler.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            console.log('Hamburger clicked!');
            
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            if (isExpanded) {
                closeNavbar();
            } else {
                openNavbar();
            }
        });

        // Close navbar when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInsideNav = navbarCollapse.contains(event.target) || 
                                   navbarToggler.contains(event.target);
            
            if (!isClickInsideNav && navbarCollapse.classList.contains('show')) {
                closeNavbar();
            }
        });

        // Close navbar when clicking on nav links (mobile only)
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                if (window.innerWidth < 768) {
                    setTimeout(closeNavbar, 150);
                }
            });
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                closeNavbar();
            }
        });

        // Handle escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && navbarCollapse.classList.contains('show')) {
                closeNavbar();
                navbarToggler.focus();
            }
        });

        function openNavbar() {
            navbarCollapse.classList.add('show');
            navbarToggler.setAttribute('aria-expanded', 'true');
            navbarToggler.classList.add('collapsed');
            body.classList.add('navbar-open');
            console.log('Navigation opened');
        }

        function closeNavbar() {
            navbarCollapse.classList.remove('show');
            navbarToggler.setAttribute('aria-expanded', 'false');
            navbarToggler.classList.remove('collapsed');
            body.classList.remove('navbar-open');
            console.log('Navigation closed');
        }

        // Add smooth transitions
        if (navbarCollapse) {
            navbarCollapse.style.transition = 'all 0.3s ease-in-out';
        }

        // Keyboard navigation
        navLinks.forEach(function(link, index) {
            link.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                    e.preventDefault();
                    const nextLink = navLinks[index + 1] || navLinks[0];
                    nextLink.focus();
                } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                    e.preventDefault();
                    const prevLink = navLinks[index - 1] || navLinks[navLinks.length - 1];
                    prevLink.focus();
                }
            });
        });
    } else {
        console.error('Navigation elements not found!');
    }
});
</script>

</head>

<body>
    <div class="wrapper">
        <div class="topbar">
            <div class="container">
                <div class="navbar-left">
                    <div id="liveclock"><?= date($config['dateformat'] . ' ' . $config['timeformat']) ?></div>
                </div>

                <div class="navbar-right" style="margin: 0;">
                    <?= anchor("home/changePassword/$user_info->person_id", "$user_info->first_name $user_info->last_name", ['class' => 'modal-dlg', 'data-btn-submit' => lang('Common.submit'), 'title' => lang('Employees.change_password')]) ?>
                    <span>&nbsp;|&nbsp;</span>
                    <?= anchor('home/logout', lang('Login.logout')) ?>
                </div>

                <div class="navbar-center" style="text-align: center;">
                    <strong><?= esc($config['company']) ?></strong>
                </div>
            </div>
        </div>
        
        <!-- FIXED NAVBAR WITH WORKING HAMBURGER MENU -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm" role="navigation">
            <div class="container-fluid px-3">
                <!-- Brand logo - Fixed with proper constraints -->
                <a class="navbar-brand fw-bold" 
                   href="<?= site_url() ?>" 
                   style="color: #007bff; max-width: calc(100% - 60px); overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    OSPOS
                </a>
                
                <!-- FIXED: Hamburger menu button - Remove ALL Bootstrap classes that hide it -->
                <button class="navbar-toggler" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#navbarNav" 
                        aria-controls="navbarNav" 
                        aria-expanded="false" 
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto w-100 justify-content-end align-items-center">
                    <?php foreach ($allowed_modules as $module): ?>
                    <li class="nav-item <?= $module->module_id == $request->getUri()->getSegment(1) ? 'active' : '' ?>">
                        <a href="<?= base_url($module->module_id) ?>" 
                           title="<?= lang("Module.$module->module_id") ?>" 
                           class="nav-link menu-icon"
                           data-module="<?= $module->module_id ?>">
                            <div class="d-flex align-items-center">
                                <div class="menu-icon-wrapper">
                                    <img src="<?= base_url("images/menubar/$module->module_id.svg") ?>" 
                                         class="menu-icon-img" 
                                         alt="<?= lang('Module.' . $module->module_id) ?> Icon"
                                         loading="lazy"
                                         onerror="this.style.display='none';">
                                </div>
                                <span class="menu-text"><?= lang('Module.' . $module->module_id) ?></span>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <!-- Your page content goes here -->
            </div>
        </div>
    </div>
</body>
</html>