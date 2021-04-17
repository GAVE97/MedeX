<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>MedeX - @yield('title')</title>

    <style>
        .text-right {
            text-align: right;
        }

        .table {
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.25);
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .thead {
            display: table-header-group;
        }

        .table tbody {
            border-top: 2px solid #dee2e6;
        }

        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .col {
            flex-basis: 0;
            flex-grow: 1;
            min-width: 0;
            max-width: 100%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .justify-conten-between {
            display: flex;
            justify-content: space-between !important;
        }

        .align-items-start {
            align-items: flex-start !important;
        }

        .align-items-end {
            align-items: flex-end !important;
        }
    </style>    

</head>
<body class="login-page" style="background: white" >
    <div>
            @yield('content')
    </div>
    
</body>
</html>