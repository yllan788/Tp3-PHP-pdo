<?php include "header.php";
include "connexionbdd.php";
$req=$monPdo->prepare("select * from nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchAll();
?>

<div class="container mt-5">

    <div class="row pt-12">
        <div class="col-10"><h2>Liste des nationalités</h2></div>
        <div class="col-2"><a href=""class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer une nationalité </a> </div>
    </div>
            <table class="table table-striped">
                <thead> 
                    <tr>
                    <th scope="col">Numéro</th>
                    <th scope="col">Libellé</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                    foreach($lesNationalites as $nationalite){

                    echo "<tr>";
                    echo "<td>$nationalite->num</td>";
                    echo "<td>$nationalite->libelle</td>";
                    echo "<td></td>";
                    echo "</tr>";
                    }
                    ?>

                </tbody>
        </table>


    </div>

</main>

<?php include "footer.php";

?>