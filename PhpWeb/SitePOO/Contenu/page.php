<section id="contenu">
    <div class="Contour Colonne">
        <div>
            <div class="EspaceVertical"></div>
            <div class="Colonne Paragraphe">
                
                <?php
                    $personne[]= new Personne(array("Prenom"=>"Toto","Nom"=>"Tata","Age"=>18));
                    $personne[]= new Personne(array("Prenom"=>"Tutu","Nom"=>"Toto","Age"=>32));
                    $personne[]= new Personne(array("Prenom"=>"Didier","Nom"=>"Tata","Age"=>45));
                    $personne[]= new Personne(array("Prenom"=>"Pascal","Nom"=>"Tata","Age"=>8));
                    $personne[]=new Personne(array("Prenom"=>"TEst","Nom"=>"TEST","Age"=>10));
                    for ($i=0; $i < count($personne); $i++) { 
                        echo '<div class = "Titre">
                                <h1>Personne n° '.$i.'</h1></div>
                        <div></div>
                        <a href="detail.php?id='.$i.'">
                            <div class="Texte">
                                <div></div>
                                    '.$personne[$i]->toString().'
                                <div></div>
                            </div>
                        </a>
                            <div></div>
                        ';
                    }
                ?>
            </div>
            <div class="EspaceVertical"></div>
        </div>
    </div>
</section>