<?php
$mode = $_GET['mode'];

echo '            <div class="Espace"></div>
<div class="Block Ligne">
    <div class="BlockGauche "></div>
    <div class="Blocktexte Colonne">
        <div class="entete Ligne">
            <div class="Editer Colonne">Profiles : </div>
            <a href="?page=FormUser&mode=ajouter"> <button class="BoutonPlus">+</button> </a>
        </div>  
        <div id="DivSousTitre">';
if (isset($_GET['id']))
{
    $user = UserManager::findById($_GET['id']);
    $idUser = $user->getIdUser();
}
else
{
    $user = new User();
    $idCateg = 1;
}
$listeRole=RolesManager::getList();
//en fonction du mode, on modifie l'entet du form
switch ($mode)
{
    case "ajouter":

            $sousTitre = '<h5>'.texte("titreAjout").'</h5></div>';
            $dis = "";
            $submit = '<div class="ligneDetail"><input type="submit" value="Ajouter" class=" crudBtn crudBtnEdit"/>';
            break;

    case "modifier":

            $sousTitre = '<h5>'.texte("titreModif").'</h5></div>';
            $dis = "";
            $submit = '<div class="ligneDetail"><input type="submit" value="Modifier" class=" crudBtn crudBtnModif"/>';
            break;

    case "supprimer":

            $sousTitre = '<h5>Supprimer un  utilisateur</h5></div>';
            $dis = " disabled ";
            $submit = '<div class="ligneDetail"><input type="submit" value="Supprimer" class=" crudBtn crudBtnSuppr"/>';
            break;

    case "detail":

        $sousTitre = '<h5>Detail de l\'utilisateur</h5></div>';
        $dis = " disabled ";
        $submit = '<div class="ligneDetail"><input type="submit" value="detail" class=" crudBtn crudBtnSuppr"/>';
        break;

}
echo $sousTitre;
echo '<form id="formulaire" method="post" action="index.php?page=ActionUser&mode=' . $mode . '">';

if ($mode != "ajouter")
{
    echo '
            <input type="hidden" name="idUser" value="' . $user->getIdUser() . '">';
}

echo '
            <div class="ligneDetail">
            <div class="libelleInput"> User Name :</div>
            <div class="input"> <input type="text" name="username"
                    value="' . $user->getUsername() . '" ' . $dis . '></div>
            </div>
            <div class="ligneDetail">
                <div class="libelleInput">
                    Password :</div>';
                    if($mode!="detail"){
                        echo '<div class="input"> <input type="password" name="password" value="' . $user->getPassword() . '" ' . $dis . '>';
                    }else{
                        echo '<div class="input"> <input type="text" name="password" value="' . $user->getPassword() . '" ' . $dis . '>';
                    }
                echo'
                </div>
            </div>
            <div class="ligneDetail">
                <div class="libelleInput">
                    Role  :</div>
                <div class="input">
            <select name="idRole" >';

foreach ($listeRole as $role)
{
    if($_GET["mode"]!= "ajouter"){
        $sel = "";
            if ($role->getIdRole() == $user->getIdRole())
            {
                $sel = "selected";
            }    
    }

    echo '<option value="' . $role->getIdRole() . '" ' . $sel .$dis. ' >' . $role->getNomRole() . '</option>';
}

echo '
    </select></div>
    </div>';
echo $submit;
// dans tous les cas, on met le bouton annuler
?>
    <a href="?page=ListeUser" class=" crudBtn crudBtnRetour">Annuler</a>
</div>
<div class="EspaceH"></div> 
    </div> 
        <div class="BlockGauche "></div> 
    </div>

</form>