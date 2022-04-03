<article class="oneArticle">


    <?php if ($articles[0]['Type'] == "image") { ?>
        <img class="fichierOne" src="./upload/<?= $articles[0]['imageArticle'] ?>" class="card__image" alt="" />
    <?php } else { ?>
        <video class="fichierOne" controls src="upload/<?= $articles[0]['imageArticle'] ?>">La vidéo n'a pas pu ce charger</video>
    <?php } ?>

    <div>
        <h3 class="card__title"><?= $articles[0]['titre'] ?></h3>
        <hr>
        <p>auteur : <?= $articles[0]['pseudo'] ?> &#149; catégorie : <?= $articles[0]['theme'] ?></p>
        <hr>
        <p id="description"> Description :</p>
        <p><?= $articles[0]['contenu'] ?></p>
        <?php
        if ($_SESSION['id'] == $articles[0]['idUsers']) { ?>
            <button class="bn632-hover bn25"><a href="index.php?controller=article&task=modifArticle&id=<?= $articles[0]['idArticle'] ?>"> modifier</a></button>
        <?php } ?>
    </div>

</article>