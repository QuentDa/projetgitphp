<?php
  require_once "assets/config.php";
 
  if (isset($_POST['query'])) {
      $r1 = $pdo->query("SELECT * FROM employes WHERE prenom LIKE '%{$_POST['query']}%' LIMIT 10");
      $result = $r1->fetchAll(PDO::FETCH_ASSOC);  

    if (!empty($result)) {
        foreach ($result as $key => $value) {
        echo $value['prenom']. "<br/>";
      }
    } else {
      echo "
      <div class='alert alert-danger mt-3 text-center' role='alert'>
          Aucun résultat
      </div>
      ";
    }
  }
?>
