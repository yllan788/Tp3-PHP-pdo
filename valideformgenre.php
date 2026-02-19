<?php include "header.php";
include "connexionbdd.php";
$action=$_GET['action'];
$num=$_POST['num'];//je récupère le libellé dans le formulaire
$libelle=$_POST['libelle'];//je récupère le libellé dans le formulaire

 
if($action == "Modifier"){
$req=$monPdo->prepare("update genre set libelle = :libelle, num = :num where num =:num");
$req->bindParam(':num',$num);
$req->bindParam(':libelle',$libelle);

}else{ 
    $req=$monPdo->prepare("insert into genre (libelle) VALUES (:libelle)");
    $req->bindParam(':libelle',$libelle);
}
$nb=$req->execute();
$message = $action == "Modifier" ? "modifiée" : "ajoutée";

if($nb == 1) {
    $_SESSION['message'] = ["success" => "Le genre a bien été " . $message];
} else {
    $_SESSION['message'] = ["danger" => "La genre n'a pas été " . $message];
}
header('Location: listegenres.php');
exit();