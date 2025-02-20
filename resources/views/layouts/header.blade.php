<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>MINI BANK | Admin</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet" />
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="/">MINI BANK</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Customers">
                    <a class="nav-link" href="{{ route('customers.index') }}">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text">Customers</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Customers">
                    <a class="nav-link" href="{{ route('import') }}">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text">Import Customers</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
