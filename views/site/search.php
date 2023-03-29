<h1>Результаты поиска: </h1>
<ol>
    <?php
    foreach ($subunits as $subunit) {
        echo '<th scope="row">' . $subunit->id . '</th>';
        echo '<li>' . $subunit->title . '</li>';
    }
    ?>
</ol>