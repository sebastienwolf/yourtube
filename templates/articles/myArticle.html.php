<section id="index">
    <?php
    if (isset($articles[0]['Type'])) {
        foreach ($articles as $article) {
    ?>

            <article>
                <?php if ($article['Type'] == "image") { ?>
                    <img src="./upload/<?= $article['imageArticle'] ?>" />
                <?php } else { ?>
                    <video controls src="upload/<?= $article['imageArticle'] ?>">La vidéo n'a pas pu ce charger</video>
                <?php } ?>
                <div>
                    <h3><?= $article['titre'] ?></h3>
                    <p><?= $article['dateE'] ?><br>
                        Auteur : <?= $article['pseudo'] ?> &#149; Catégorie : <?= $article['theme'] ?> <br>
                        <button class="bn632-hover bn25"><a style="color: white;" href="index.php?controller=article&task=showOne&id=<?= $article['idArticle'] ?>">En savoir plus</a></button>
                    </p>
                </div>
            </article>

        <?php }
    } else { ?>
        <h2> Vous n'avez pas mit de vidéo.</h2>
    <?php } ?>





</section>
<!-- =================================================================================================== -->
<!-- =================================================================================================== -->
<!-- =================================================================================================== -->
<!-- <script>
    // animation pop de la bulle modification
    document.getElementById("modify").addEventListener('click', event => {
        // toogle permet de voir si la classe est active alors il l'enlève sinon il le mets
        document.getElementById("formUsers").classList.toggle("active")
    })
    // ==============================================================================
    //retour
    document.getElementById("retour").addEventListener('click', event => {
        // toogle permet de voir si la classe est active alors il l'enlève sinon il le mets
        document.getElementById("formUsers").classList.toggle("active")
    })
    //===============================================================================
    // fetch
    document.getElementById('usersMod').addEventListener('submit', modif => {
        modif.preventDefault();

        let form = document.getElementById('usersMod')
        let formData = new FormData(form)
        let URL = "index.php?controller=article&task=modify"
        fetch(URL, {
                body: formData,
                method: "post"
            })
            .then(function(response) {
                return response.json()
            })
            .then(function(data) {
                // toogle permet de voir si la classe est active alors il l'enlève sinon il le mets
                document.getElementById("formUsers").classList.toggle("active")
                // ".reload" recharge la page
                location.reload()

            })
    })
</script> -->