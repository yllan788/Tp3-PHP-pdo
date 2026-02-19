<?php include "header.php";
include "connexionbdd.php";
$texteReq="select * from genre where 1=1";
if(!empty($_GET)){
    if($_GET['libelle']!=""){$texteReq.= " and libelle like '%" .$_GET['libelle']."%'";}
}
$texteReq.=" order by libelle";
$req=$monPdo->prepare($texteReq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
    
$libelle = $_GET['libelle'] ?? '';

$lesGenres = $req->fetchAll();

if(!empty($_SESSION['message'])){
    $mesMessages=$_SESSION['message'];
    foreach($mesMessages as $key=>$message){
    echo'<div class="container pt-5">
                <div class="alert alert-'.$key.' alert-dismissible fade show" role="alert">'.$message.'
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                </div>
        </div>';
    }
    $_SESSION['message']=[];
}
?>


<div class="container mt-5">
 
    <div class="row pt-3">
        <div class="col-9" ><h2>Liste des genres</h2></div>
        <div class="col-3"><a href="formgenre.php?action=Ajouter"class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer un genre </a> </div>
    </div>

    <form action="" method="get" class="border border-primary rounded p-3 ">
         <div class="row">
            <div class="col-9">
                <input type="text" class='form-control' id='libelle' placeholder='Saisir le libellé' name='libelle' value="<?php echo $libelle; ?>">
            </div>
        
            
            <div class="col-3">
                <button type="submit" class="btn btn-success btn-block">Rechercher</button>
            </div>
        </div>
    </form>

    <table class="table table-hover table-striped">
                <thead> 
                    <tr class="d-flex">
                    <th scope="col" class="col-md-2">Numéro</th>
                    <th scope="col" class="col-md-5">Libellé</th>
                    <th scope="col" class="col-md-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                    foreach($lesGenres as $Genre){

                    echo "<tr class='d-flex'>";
                    echo "<td  class='col-md-2' >$Genre->num</td>";
                    echo "<td  class='col-md-5'>$Genre->libelle</td>";
                    echo "<td  class='col-md-2'>
                    <a href='formgenre.php?action=Modifier&num=$Genre->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                     <a href='#modalSuppression' data-toggle='modal' data-message='Voulez-vous vraiment supprimer cette nationalité ?' data-suppression='supprimergenre.php?num=" . $Genre->num . "' class='btn btn-danger'><i class='fas fa-trash'></i></a>
                        </td>";
                    
                    echo "</tr>";
                    }
                    ?>
 
                </tbody>
        </table>


    </div>

</main>

<?php include "footer.php";

?>