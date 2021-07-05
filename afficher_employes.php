<?php 
//Afficher un formulaire de recherche pour chercher les employés avec leur prénom
include("./assets/header.html");
include("./config/database.php");
?>
<?php
$fetchUsers = $connexion->query('SELECT * FROM employes');
$users = $fetchUsers->fetchAll(PDO::FETCH_ASSOC);
$recup = $connexion->query('SELECT * FROM employes');
echo "<h3>Affichage de " . $recup->rowCount() . " Employes</h3>";
?>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <?php    
            for($i=0; $i < $recup->columnCount();$i++){
                $colonne = $recup->getColumnMeta($i);
                echo "<th scope='col'>". $colonne['name'] ."</th>";
            }
            ?>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach( $users as $key => $value) : 
        ?>
        <tr>     
            <?php
                echo "<th scope='col'>" . $value['id_employes'] ."</th>";
                for($i=0; $i < count($value); $i++){
                    echo "<td>" . $value[array_keys($value)[$i]] . "</td>";
                }
                echo "<td>";
                        echo "<a href=\"?action=suppression&id_employes=$value[id_employes]\">Supprimer</a>";
                echo "</td>";
            ?>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?php
    include("./assets/footer.html");
?>