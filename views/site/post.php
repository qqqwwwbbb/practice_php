<h1>Список наших статей</h1>
<ol>
    <?php
    foreach ($posts as $post) {
        echo '<li>' . $post->title . '</li>';
    }
    ?>
</ol>
