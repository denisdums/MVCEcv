<h1>Ajouter une image</h1>
<form action="/back/image/save" method="post" class="backend-form" enctype="multipart/form-data">
    <fieldset>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
    </fieldset>
    <fieldset>
        <label for="alt">Texte Alternatif</label>
        <input type="text" name="alt" id="alt">
    </fieldset>

    <input type="submit" value="Enregistrer" class="button-blue">
</form>