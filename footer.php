<div  id="modalSuppression" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation de suppression</h5>
        
      </div>
      <div class="modal-body">
        <p>Voulez-vous vraiment supprimer cette nationalité ?</p>
      </div>
      <div class="modal-footer">
        <a href="supprimernationalite.php?num=" class="btn btn-primary" id="btnSuppr">Supprimer</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ne pas supprimer</button>
      </div>
    </div>
  </div>
</div><footer class="container">
  <p>&copy; Yllan Roussel Tp php</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script type="text/javascript">
$("a[data-suppression]").click(function(){
   var lien = $(this).attr("data-suppression");//récupération du lien du bouton poubelle
   var message = $(this).attr("data-message");
   $("#btnSuppr").attr("href", lien); //On écrit ce lien sur le bouton supprimer    
   $(".modal-body p").text(message); 
});




</script>
</body>
</html>