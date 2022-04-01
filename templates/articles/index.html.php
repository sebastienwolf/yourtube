<nav>
    <div id="filtre">
        <form id="search" action="" method="post">
            <input type="search" name="search" id="search">
            <input class="search" type="submit" value="Search">
        </form>
        <!-- &darr;   fleche bas -->
        <!-- &uarr;   fleche haut -->
        <button id="date" class="filtre" data-id="dateUp">Date <span id="fleche">&darr;</span></button>

        <?php foreach ($themes as $theme) {
        ?>
            <button class="filtre" data-id="<?= $theme['idCategorie'] ?>"><?= $theme['theme'] ?></button>
        <?php } ?>

    </div>
</nav>


<section id="index">
    <?php
    foreach ($articles as $article) {
    ?>

        <article>
            <?php if ($article['Type'] == "image") { ?>
                <img src="./upload/<?= $article['imageArticle'] ?>" class="card__image" alt="" />
            <?php } else { ?>
                <video controls src="upload/<?= $article['imageArticle'] ?>">La vidéo n'a pas pu ce charger</video>
            <?php } ?>
            <div>
                <h3 class="card__title"><?= $article['titre'] ?></h3>
                <p><?= $article['dateE'] ?></p>
                <p>auteur : <?= $article['pseudo'] ?> &#149; catégorie : <?= $article['theme'] ?></p>
                <a href="index.php?controller=article&task=showOne&id=<?= $article['idArticle'] ?>">En savoir plus</a>
            </div>
        </article>


        <!-- <article class="cards">

            <a href="" class="card">
                <?php if ($article['Type'] == "image") { ?>
                    <img src="./upload/<?= $article['imageArticle'] ?>" class="card__image" alt="" />
                <?php } else { ?>
                    <video controls src="upload/<?= $article['imageArticle'] ?>">La vidéo n'a pas pu ce charger</video>
                <?php } ?>



                <div class="card__overlay">
                    <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                            <path />
                        </svg>
                        <img class="card__thumb" src="https://i.imgur.com/7D7I6dI.png" alt="" />
                        <div class="card__header-text">
                            <h3 class="card__title"><?= $article['titre'] ?></h3>
                            <span class="card__status"><?= $article['dateE'] ?></span>
                        </div>
                    </div>
                    <p class="card__description"><?= $article['pseudo'] ?> &#149; <?= $article['theme'] ?></p>
                </div>
            </a>
        </article> -->

    <?php } ?>

</section>

<script>
    // ==================== date changement de la fleche ====================================
    document.getElementById('date').addEventListener('click', event => {
        a = document.getElementById('date')
        if (a.dataset.id == "dateUp") {
            let x = "&uarr;"
            document.getElementById('fleche').innerHTML = x
            document.getElementById('date').dataset.id = "dateDown"
        } else {
            let x = "&darr;"
            document.getElementById('fleche').innerHTML = x
            document.getElementById('date').dataset.id = "dateUp"
        }

    })
    //===============================  search ============================================




    document.getElementById('search').addEventListener('submit', event => {
        event.preventDefault();

        // on recurepère les données de data des bouton
        let URL = "index.php?controller=article&task=showFiltre&id=search"

        form = document.getElementById('search')
        formData = new FormData(form)

        fetch(URL, {
                body: formData,
                method: "post"
            })
            .then(function(response) {
                return response.text()
            })
            .then(function(data) {
                console.log(data)
                i = JSON.parse(data)




                let x = document.getElementById('index')
                // on boucle pour suprmier tous les enfant de index
                while (x.firstChild) {
                    x.removeChild(x.firstChild)
                }


                i.forEach(element => {
                    console.log(i);

                    const fichier = "./upload/" + element.imageArticle;
                    const titre = element.titre;
                    const pseudo = element.pseudo;
                    const date = element.dateE;
                    const categori = element.theme;
                    const type = element.Type;
                    const url = "index.php?controller=article&task=showOne&id=" + element.idArticle

                    const contenair = document.createElement('article');
                    const image = document.createElement('img');
                    const Video = document.createElement('video')
                    const minicontenaire = document.createElement('div');
                    const nom = document.createElement('h3');
                    const p1 = document.createElement('p');
                    const p2 = document.createElement('p');
                    const lien = document.createElement('a');

                    if (type == "image") {
                        image.src = fichier
                    } else {
                        Video.src = fichier
                    }
                    nom.textContent = titre
                    p1.textContent = pseudo
                    p2.textContent = date + " &#149; " + categori
                    lien.href = url
                    lien.textContent = "En savoir plus"

                    if (type == "image") {
                        contenair.appendChild(image)
                    } else {
                        contenair.appendChild(Video)
                    }
                    contenair.appendChild(minicontenaire)
                    minicontenaire.appendChild(nom)
                    minicontenaire.appendChild(p1)
                    minicontenaire.appendChild(p2)
                    minicontenaire.appendChild(lien)
                    index.appendChild(contenair)


                    //document.getElementById('search').value = ""


                });






            })


    })


    // ==================== fetch filtre ====================================
    let i = document.getElementsByClassName('filtre')
    for (item of i) {
        console.log(item);

        item.addEventListener('click', event => {
            event.preventDefault();
            // on recurepère les données de data des bouton
            let a = event.target.dataset.id
            let URL = "index.php?controller=article&task=showFiltre&id=" + a



            fetch(URL)
                .then(function(response) {
                    return response.text()
                })
                .then(function(data) {
                    console.log(data)
                    i = JSON.parse(data)




                    let x = document.getElementById('index')
                    // on boucle pour suprmier tous les enfant de index
                    while (x.firstChild) {
                        x.removeChild(x.firstChild)
                    }


                    i.forEach(element => {
                        console.log(i);

                        const fichier = "./upload/" + element.imageArticle;
                        const titre = element.titre;
                        const pseudo = element.pseudo;
                        const date = element.dateE;
                        const categori = element.theme;
                        const type = element.Type;
                        const url = "index.php?controller=article&task=showAllTable&id=" + element.idArticle

                        const contenair = document.createElement('article');
                        const image = document.createElement('img');
                        const Video = document.createElement('video')
                        const minicontenaire = document.createElement('div');
                        const nom = document.createElement('h3');
                        const p1 = document.createElement('p');
                        const p2 = document.createElement('p');
                        const lien = document.createElement('a');

                        if (type == "image") {
                            image.src = fichier
                        } else {
                            Video.src = fichier
                        }
                        nom.textContent = titre
                        p1.textContent = pseudo
                        p2.textContent = date + " &#149; " + categori
                        lien.href = url
                        lien.textContent = "En savoir plus"

                        if (type == "image") {
                            contenair.appendChild(image)
                        } else {
                            contenair.appendChild(Video)
                        }
                        contenair.appendChild(minicontenaire)
                        minicontenaire.appendChild(nom)
                        minicontenaire.appendChild(p1)
                        minicontenaire.appendChild(p2)
                        minicontenaire.appendChild(lien)
                        index.appendChild(contenair)


                    });






                })


        })
    }
</script>