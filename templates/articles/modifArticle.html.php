<section class="" id="">

    <form id="modifierArticle" action="" method="post" enctype="multipart/form-data">
        <h2>Modification</h2>

        <label for=""><b>Type :</b></label>
        </select>
        <label for=""><b>titre :</b></label>
        <input type="text" name="titre" placeholder="<?= $articles[0]['titre'] ?>">
        <label for=""><b>Categorie :</b></label>
        <select type="select" name="categorie">
            <option value="0"><?= $articles[0]['theme'] ?></option>
            <option value="2">Enfant</option>
            <option value="3">Moto</option>
            <option value="4">Sport</option>
            <option value="5">Animé</option>
            <option value="6">Musique</option>
        </select>
        <label for=""><b>Description :</b></label>
        <textarea name="description" id="" cols="30" rows="10" placeholder="<?= $articles[0]['contenu'] ?>"></textarea>
        <label for=""><b>Modifier le fichier :</b></label>
        <input type="file" name="fichier">
        <input type="text" value="<?= $articles[0]['idArticle'] ?>" hidden name="id">
        <input type="text" value="<?= $articles[0]['imageArticle'] ?>" hidden name="deleteFichier">

        <button type="submit" class="creer" name="creer">Valider les modifications</button>

    </form>
    <form id="delete" action="index.php?controller=article&task=delete&id=<?= $articles[0]['idArticle'] ?>" method="post">
        <input hidden type="text" name="fichier" value="<?= $articles[0]['imageArticle'] ?>">
        <button type="submit"> Supprimer</button>
    </form>
    <button id="retour">Retour</button>
    <p id="erreur"></p>
</section>

<script>
    document.getElementById('retour').addEventListener('click', event => {
        document.location.href = "index.php?controller=article&task=myArticles"
    })
    //====================================================================================

    //====================================================================================

    document.getElementById('modifierArticle').addEventListener('submit', event => {
        event.preventDefault();
        //let url = "index.php?controller=users&task=connexion"
        let URL = "index.php?controller=article&task=valideModif"

        let form = document.getElementById('modifierArticle')
        let formData = new FormData(form)
        formData.append('sendMessage', 'retour')

        fetch(URL, {
                body: formData,
                method: "post"
            })
            .then(function(response) {
                return response.json()
            })
            .then(function(data) {
                console.log(data)
                debugger
                let err = data;
                if (data > 0) {


                    switch (err) {
                        case 3:
                            location.reload()
                            document.getElementById('erreur').innerHTML = "<p style='color:red'> Le fichier n'est pas comptabile avec notre site.<br> Utilisé un format : jpg, jpeg, png, bmp, tif, mp4, mov, avi, wmv.</p>";
                            break;
                        case 4:
                            location.reload()
                            document.getElementById('erreur').innerHTML = "<p style='color:red'>Le fichier ne peux dépassé les 5M.</p>";
                            break;
                        case 5:
                            location.reload()
                            document.getElementById('erreur').innerHTML = "<p style='color:red'>Une erreur est survenue avec ce fichier</p>";
                            break;

                    }
                } else {
                    location.reload()
                }
            })


    })
</script>