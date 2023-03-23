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
            <th>books</th>
        </tr>
    </table>

    <table>
        <tr>
            <th>authors</th>
        </tr>
    </table>

    <h5>avg</h5>
    <h5>min</h5>
    <h5>max</h5>
    <h5>all</h5>
    </body>
    <footer>My project</footer>
<?php endif;

