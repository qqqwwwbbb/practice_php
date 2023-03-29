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
        h3 {
            position: center;
        }
        * {
            text-align: center;
        }
    </style>
</head>
<hr>

<h3><?= $message ?? ''; ?></h3>
<h3><b><?= app()->auth->user()->name ?? ''; ?></b> - Your name</h3>
<h3><b><?= app()->auth->user()->login ?? ''; ?></b> - ID of this user</h3>
<h3><b><?= app()->auth->user()->avatar ?? ''; ?></b></h3>
<div class="col-md-6">
    <img src="/public/uploads/{{ Auth::user()->avatar }}" alt="Image">
</div>
<?php
if (!app()->auth::check()):
    ?>

    <body class="text-center">
    <table>
        <tr>
            <th>Admins</th>
        </tr>
    </table>
    <table>
        <tr>
            <th>Readers</th>
        </tr>
    </table>
    <table>
        <tr>
            <th>Authors</th>
        </tr>
    </table>
    </body>

    <footer>My Project</footer>

<?php endif;
