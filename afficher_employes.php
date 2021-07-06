<?php 
//Afficher un formulaire de recherche pour chercher les employés avec leur prénom
<<<<<<< HEAD
include("assets/header.php");
include("./config/database.php");
=======

require_once('assets/config.php');
>>>>>>> master
?>
<?php
$fetchUsers = $pdo->query('SELECT * FROM employes');
$users = $fetchUsers->fetchAll(PDO::FETCH_ASSOC);
$recup = $pdo->query('SELECT * FROM employes');

if(isset($_GET['action']) && $_GET['action'] == 'suppression'){
    $pdo->query("DELETE FROM employes WHERE id_employes = '$_GET[id_employes]' ");
    header('location: afficher_employes.php');
}
if(isset($_POST['nom'])){

    $rechercheTerm = $_POST['nom'];

    

    // raffrechir automatiquement aprés un post 
    //echo "<meta http-equiv='refresh' content='0'>";
}
?>
<?php require_once('assets/header.php'); ?>
<?= "<h3>Affichage de " . $recup->rowCount() . " Employes</h3>"; ?>
<form method="post">
    <div class="form-row">
        <div class="col-sm-8">
            <input class="form-control" type="text" placeholder="tapez un nom" name="nom" />
        </div>
        <button type="submit" class="btn btn-primary">recherche</button>
    </div>
</form><br>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <?php    
            for($i=0; $i < $recup->columnCount();$i++){
                $colonne = $recup->getColumnMeta($i);
                echo "<th scope='col'>". $colonne['name'] ."</th>";
            }
            ?>
            <th scope="col">supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach( $users as $key => $value) : 
        ?>
        <tr>     
            <?php
                echo "<th scope='col'>" . $value['id_employes'] ."</th>";
                for($i=1; $i < count($value); $i++){
                    echo "<td>" . $value[array_keys($value)[$i]] . "</td>";
                }
                echo "<td>";
                        echo "<a class='btn btn-danger' href=\"?action=suppression&id_employes=$value[id_employes]\">Supprimer</a>";
                echo "</td>";
            ?>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?php
<<<<<<< HEAD
    include("assets/footer.php");
=======
    require_once("assets/footer.php");
>>>>>>> master
?>