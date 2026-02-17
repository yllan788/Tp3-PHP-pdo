<?php include "header.php";
include "connexionbdd.php";
$action=$_GET['action'];
$num=$_POST['num'];//je récupère le libellé dans le formulaire
$libelle=$_POST['libelle'];//je récupère le libellé dans le formulaire
$continent=$_POST['continent'];//je récupère le numéro du continent sélectionné dans le formulaire

if($action == "Modifier"){
$req=$monPdo->prepare("update nationalite set libelle = :libelle, numContinent = :continent where num =:num");
$req->bindParam(':num',$num);
$req->bindParam(':libelle',$libelle);
$req->bindParam(':continent',$continent);

}else{ 
    $req=$monPdo->prepare("insert into nationalite(libelle, numContinent) values(:libelle, :continent)");
    $req->bindParam(':libelle',$libelle);
    $req->bindParam(':continent',$continent);
}
$nb=$req->execute();
$message = $action == "Modifier" ? "modifiée" : "ajoutée";

if($nb == 1) {
    $_SESSION['message'] = ["success" => "La nationalité a bien été " . $message];
} else {
    $_SESSION['message'] = ["danger" => "La nationalité n'a pas été " . $message];
}
header('Location: listenationalites.php');
exit();