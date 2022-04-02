<?php


?>

<section class="profil">
    <h2>Votre profil :</h2>
    <article>
        <img src="./upload/profil.webp" alt="">
        <div id="profilUser">
            <p><b>Nom :</b> <?= $_SESSION['nom'] ?></p>
            <p><b>Prenom :</b> <?= $_SESSION['prenom'] ?></p>
            <p><b>Mail :</b> <?= $_SESSION['mail'] ?></p>
            <p><b>Pseudo :</b> <?= $_SESSION['pseudo'] ?></p>
            <p><b>Mot de passe :</b> *******</p>
            <p><b>Votre grade :</b> <?= $_SESSION['userType'] ?></p>
            <button class="bn632-hover bn25" id="modifier">Modifier</button>
        </div>
    </article>

</section>

<!-- section bulle modification -->
<div class="formUsers" id="formUsers">

    <form id="usersMod" action="" method="post">
        <h2>Modification</h2>

        <label for=""><b>Nom :</b></label>
        <input type="text" name="nom" placeholder="<?= $_SESSION['nom'] ?>">
        <label for=""><b>Prénom :</b></label>
        <input type="text" name="prenom" placeholder="<?= $_SESSION['prenom'] ?>">
        <label for=""><b>Email :</b></label>
        <input type="email" name="mail" placeholder="<?= $_SESSION['mail'] ?>">
        <label for=""><b>Pseudo :</b></label>
        <input type="text" name="userPseudo" placeholder="<?= $_SESSION['pseudo'] ?>">
        <label for=""><b>Mot de Passe :</b></label>
        <input type="password" name="password" placeholder="Password">

        <button type="submit" class="creer bn632-hover bn25" name="creer">Valider</button>
        <button class="bn632-hover bn25" id="retour">Retour</button>
    </form>
</div>
<script>
    // animation pop de la bulle modification
    document.getElementById("modifier").addEventListener('click', event => {
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
        let URL = "index.php?controller=users&task=modify"
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
</script>