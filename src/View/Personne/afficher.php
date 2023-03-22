<?php

$html = '<table border="1">';
foreach ($personnes as $personne){
    $html.='<tr><td>'.$personne->getId().'</td>
    <td>'.$personne->getNom().'</td>
    <td>'.$personne->getPrenom().'</td>
    <td>'.$personne->getEmail().'</td>
    <td><a href="?action=modifier_personne&id='.$personne->getId().'">modifier</a></td>
    <td><a href="?action=supprimer_personne&id='.$personne->getId().'">supprimer</a></td>
    </tr>';
}
$html .='</table>';
$html .= '<a href="?action=ajouter_personne">Créer personne</a>';
echo $html;