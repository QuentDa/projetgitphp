<?php
    require_once('assets/config.php');
    //var_dump($_POST);
    $error ='';

    if($_POST){
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $sexe = $_POST['sexe'];
        $service = $_POST['service'];
        $date = $_POST['date'];
        $salaire = $_POST['salaire'];

        if(preg_match('/^[a-zA-Zèàçé-]+$/', $_POST['prenom']) && preg_match('/^[a-zA-Zèàçé\-\ ]+$/', $_POST['nom']) && preg_match('/^[a-zA-Zèàçé\-\ ]+$/', $_POST['service'])){

            if(strlen($prenom)<15 && strlen($nom)<15){
                $rq = $pdo->prepare("INSERT INTO employes VALUES (NULL, ?, ?, ?, ?, ?, ?)");
                $rq->execute(array(htmlentities($prenom), htmlentities($nom), htmlentities($sexe), htmlentities($service), htmlentities($date), htmlentities($salaire)));
            }else{
                $error = 'Le prenom ou le nom est trop long';
            }
        }else{
            $error = 'Pas de caractère spéciaux';
        }
    }
?>

<?php require_once('assets/header.php'); ?>
    <div class="container">
    <span style="color:red;"><?= $error ?></span>
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
                <input type="number" min="0" name="salaire" class="form-control">
            </div>

            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php require_once('assets/footer.php'); ?>