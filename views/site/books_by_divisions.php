<header>
    <a>Просмотр книг</a>
    <a>Просмотр читателей</a>
    <a>Выборка (тест)</a>
</header>
<hr>

<h3><?= $message ?? ''; ?></h3>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
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
