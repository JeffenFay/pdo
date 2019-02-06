<div id="alertMsg" class="alert alert-warning alert-dismissible fade show" role="alert">
    <form name="form_delete" method="post">
        <div>
            <strong>Êtes-vous sûr de vouloir supprimer <?= $_SESSION['text'] ?> ?</strong>
            <input type="submit" name="btn_delete" class="btn btn-danger btn-md" value="Supprimer" />
            <input type="submit" name="btn_abort" class="btn btn-info btn-md" value="Annuler" />
        </div>
    </form>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
