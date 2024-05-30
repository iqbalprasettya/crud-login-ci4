<!doctype html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="">Crud CI 4</a>
            <div class="d-flex">
                <ul class="navbar-nav">
                    <?php if (session()->get('isLoggedIn')) {
                        echo '<li class="nav-item">
                        <a class="nav-link " aria-current="page" href="' . base_url('logout') . '">Logout</a>
                    </li>';
                    } ?>

                </ul>
            </div>
        </div>
    </nav>