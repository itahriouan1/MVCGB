<?php

$html = '<form method="post" action="?action=modifier_personne">
<label for="">nom:</label>
<input type="text" name="nom" value="'.$personne->getNom().'">
<br>
<label for="">prenom:</label>
<input type="text" name="prenom" value="'.$personne->getPrenom().'">
<br>
<label for="">email:</label>
<input type="text" name="email" value="'.$personne->getEmail().'">
<br>
<input type="hidden" name="id" value="'.$personne->getId().'" />
<input type="submit" value="enregistrer">
</form>
';

echo $html;
