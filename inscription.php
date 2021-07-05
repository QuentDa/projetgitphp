<?php
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Enregistrement d'employés</title>
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" class="form-control">
            </div>

            <div class="form-group">
                <label for="prenom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control">
            </div>

            <div class="form-group">
                <label for="sexe">Sexe</label>
                <select class="form-control" id="sexe" name="sexe">
                    <option value="m">Homme</option>
                    <option value="f">Femme</option>
                </select>
            </div>

            <div class="form-group">
                <label for="prenom">Service</label>
                <input type="text" id="service" name="service" class="form-control">
            </div>

            <div class="form-group">
                <label for="date">Date d'embauche</label>
                <input type="date" name="date" class="form-control">
            </div>

            <div class="form-group">
                <label for="salaire">Salaire Net</label>
                <input type="number" min="0" name="prix" class="form-control">
            </div>

            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>