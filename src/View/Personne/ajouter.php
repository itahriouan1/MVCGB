<?php

$html = '<form method="post" action="?action=ajouter_personne">
<label for="">nom:</label>
<input type="text" name="nom">
<br>
<label for="">prenom:</label>
<input type="text" name="prenom">
<br>
<label for="">email:</label>
<input type="text" name="email">
<br>
<input type="submit" value="enregistrer">
</form>';

echo $html;