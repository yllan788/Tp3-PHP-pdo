<?php include "header.php";
$action=$_GET['action'];
include "connexionbdd.php";
if($action == "Modifier"){
    $num=$_GET['num'];
    $req=$monPdo->prepare("select * from genre where num= :num");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->bindParam(':num',$num);
    $req->execute();
    $leGenre=$req->fetch();
}
$reqContinent=$monPdo->prepare("select * from genre");
    $reqContinent->setFetchMode(PDO::FETCH_OBJ);
    $reqContinent->execute();
    $lesContinents=$reqContinent->fetchAll();

?>

<div class="container mt-5">
    <h2 class='pt-3 text-center'><?php echo $action ?></h2>
    <form action="valideformgenre.php?action=<?php echo $action ?>" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
        <div class="form-group">
            <label for='libelle'><Libellé >Libellé</label>
            <input type="text" class='form-control' id='libelle' placeholder='Saisir le libellé' name='libelle' value="<?php if($action == "Modifier") {echo $leGenre->libelle ;} ?>">
        </div>
        <div class="form-group">
           
            </select>
        </div>
        <input type="hidden" id="num" name="num" value="<?php if($action == "Modifier") echo $leGenre->num; ?>">
        <div class="row">
            <div class="col"><a href="listegenres.php" class='btn btn-warning btn-block'>Revenir à la liste</a></div>
            <div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $action ?></button></div>
        </div>

     
    </form>
    </div>
<br>
<?php include "footer.php";

?>