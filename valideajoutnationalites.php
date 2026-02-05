<?php include "header.php";
include "connexionbdd.php";
$libelle=$_POST['libelle'];

$req=$monPdo->prepare("insert into nationalite(libelle) values(:libelle)");
$req->bindParam(':libelle',$libelle);
$nb=$req->execute();

echo '<div class="container mt-5">';
echo'<div class="row">
    <div class="col mt-3 ">';
if($nb==1) {
    echo'<div class="alert alert-success" role="alert">
    La nationalité a bien été ajoutée
    </div>';
}else{
    echo'<div class="alert alert-warning" role="alert">
    La nationalité n\'a pas été ajoutée !
    </div>';
}
?>
</div>
</div>
<a href="listenationalites.php" class="btn btn-primary">Revenir à la liste des nationalités</a>

    
</div>



<?php include "footer.php";

?> 