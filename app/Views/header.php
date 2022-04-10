<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gestión Cafeteria☕</title>
        
        <link href="<?php echo base_url();?>/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>/css/datatables.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>/css/styles.css" rel="stylesheet" />
        <script src="<?php echo base_url();?>/js/all.min.js" ></script>
        <script src="<?php echo base_url();?>/js/jquery-3.6.0.js" ></script>
      
        
    </head>

    <body class="sb-nav-fixed">
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3" href="index.html">Cafetería</a>
                <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
               
                <ul class="navbar-nav ms-auto  me-md-3 my-2 my-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Settings</a></li>
                            <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="#!">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                            <div class="sb-sidenav-menu-heading">Inventario</div>  
                            <a class="nav-link" href="<?php echo base_url();?>/productos"><div class="sb-nav-link-icon"><i class="fas fa-shopping-basket"></i></div>Productos</a>
                            <a class="nav-link" href="<?php echo base_url();?>/unidades"  ><div class="sb-nav-link-icon"><i class="fas fa-balance-scale-right"></i></div>Unidades</a>
                            <a class="nav-link" href="<?php echo base_url();?>/categorias"><div class="sb-nav-link-icon"><i class="fas fa-align-left"></i></div>Categorias</a>
                                
                               
                        <div> 
                        <div class="sb-sidenav-menu-heading">Compras</div>
                        <a class="nav-link" href="<?php echo base_url();?>/compras/nuevo"><div class="sb-nav-link-icon"><i class="fas fa-cart-arrow-down"></i></div> Nueva Compra</a>
                        <a class="nav-link" href="<?php echo base_url();?>/compras"><div class="sb-nav-link-icon"><i class=" fas fa-clock"></i></div> Compras</a>
                        </div>   
                    </nav>
                </div>
