<?php require_once('assets/config.php'); ?>

<?php 

if(isset($_GET['action']) && $_GET['action'] == 'modifier'){
    $r = $pdo->query("SELECT * FROM employes WHERE id_employes='$_GET[id_employes]' ");
    $employe_actuel = $r->fetch(PDO::FETCH_ASSOC);
}

if($_POST){
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $sexe = $_POST['sexe'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $salaire = $_POST['salaire'];
    $id = $_GET['id_employes'];

    // var_dump($sexe);
    // die();

    if(preg_match('/^[a-zA-Zèàçé-]+$/', $_POST['prenom']) && preg_match('/^[a-zA-Zèàçé\-\ ]+$/', $_POST['nom']) && preg_match('/^[a-zA-Zèàçé\-\ ]+$/', $_POST['service'])){

        if(strlen($prenom)<15 && strlen($nom)<15){
            $rq = $pdo->prepare("UPDATE employes SET prenom=?, nom=?, sexe=?, service=?, date_embauche=?, salaire=? WHERE id_employes = ? ");
            $rq->execute(array(htmlentities($prenom), htmlentities($nom), htmlentities($sexe), htmlentities($service), htmlentities($date), htmlentities($salaire), $id));
        }else{
            $error = 'Le prenom ou le nom est trop long';
        }
    }else{
        $error = 'Pas de caractère spéciaux';
    }

    header('location:afficher_employes.php');
}

?>


<?php require_once('assets/header.php'); ?>

<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" id="prenom" name="prenom" class="form-control" value='<?= $employe_actuel['prenom']; ?>'>
        </div>

        <div class="form-group">
            <label for="prenom">Nom</label>
            <input type="text" id="nom" name="nom" class="form-control" value='<?= $employe_actuel['nom']; ?>'>
        </div>

        <div class="form-group">
            <label for="sexe">Sexe</label>
            <select class="form-control" id="sexe" name="sexe">
                <option value="<?= $employe_actuel['sexe'];?>" selected><?php if($employe_actuel['sexe'] == 'm'){echo 'Homme';}else{echo 'Femme';}; ?></option>
                <option value="<?php if($employe_actuel['sexe'] == 'm'){echo 'f';}else{echo 'm';}; ?>"><?php if($employe_actuel['sexe'] == 'm'){echo 'Femme';}else{echo 'Homme';}; ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for="prenom">Service</label>
            <input type="text" id="service" name="service" class="form-control" value='<?= $employe_actuel['service']; ?>'>
        </div>

        <div class="form-group">
            <label for="date">Date d'embauche</label>
            <input type="date" name="date" class="form-control" value='<?= $employe_actuel['date_embauche']; ?>'>
        </div>

        <div class="form-group">
            <label for="salaire">Salaire Net</label>
            <input type="number" min="0" name="salaire" class="form-control" value='<?= $employe_actuel['salaire']; ?>'>
        </div>

        
        <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
</div>

<?php require_once('assets/footer.php'); ?>