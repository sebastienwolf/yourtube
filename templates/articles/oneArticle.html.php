<article>


    <?php if ($articles[0]['Type'] == "image") { ?>
        <img src="./upload/<?= $articles[0]['imageArticle'] ?>" class="card__image" alt="" />
    <?php } else { ?>
        <video controls src="upload/<?= $articles[0]['imageArticle'] ?>">La vidéo n'a pas pu ce charger</video>
    <?php } ?>

    <div>
        <h3 class="card__title"><?= $articles[0]['titre'] ?></h3>
        <p><?= $articles[0]['dateE'] ?></p>
        <p>
        <p>auteur : <?= $articles[0]['pseudo'] ?> &#149; catégorie : <?= $articles[0]['theme'] ?></p>
        <p> Description :</p>
        <p><?= $articles[0]['contenu'] ?></p>
        <?php
        if ($_SESSION['id'] == $articles[0]['idUsers']) { ?>
            <a href="index.php?controller=article&task=modifArticle&id=<?= $articles[0]['idArticle'] ?>"> modifier</a>
        <?php } ?>
    </div>

</article>