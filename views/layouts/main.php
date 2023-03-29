<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>My PHP site</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400&display=swap');

        *{
            font-family: Roboto Slab, serif;
            font-weight: 400;
            padding: 0;
            margin: 0;
        }
        header {
            position: absolute;
        }
        table {
            display: inline-block;
        }
    </style>
</head>
<body style="background-color: #ffedd5">
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
    </header>
</div>
<nav>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="<?= app()->route->getUrl('/hello') ?>" class="nav-link px-2 link-secondary">Просмотр книг</a></li>
        <li><a href="<?= app()->route->getUrl('/users') ?>" class="nav-link px-2 link-dark">Просмотр читателей</a></li>
        <li><a href="<?= app()->route->getUrl('/hello') ?>" class="nav-link px-2 link-dark">Выборка (тест)</a></li>
        <?php
        if (!app()->auth::check()):
            ?>
            <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2"><a href="<?= app()->route->getUrl('/login') ?>" style="color: black /*text-decoration: none*/"> Вход </a></button>
            <button type="button" class="btn btn-primary"><a href="<?= app()->route->getUrl('/signup') ?>" style="color: white "> Регистрация </a></button>
        <?php
        else:
            ?>
            <button type="button" class="btn btn-outline-primary me-2"><a href="<?= app()->route->getUrl('/logout') ?>" style="color: black "> Выход (<?= app()->auth::user()->name ?>)</a></button>
            </div>
        <?php
        endif;
        ?>
</nav>


<?= $content ?? '' ?>

</body>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <span class="text-muted">© My PNSS Project Copyright!</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
    </ul>
</footer>
</html>
