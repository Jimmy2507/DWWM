window.onkeydown = function(e) {
    var key = e.keyCode || e.which;
    switch (key) {
        case 37:
            //-Gauche
            sens = "gauche"
            avancer(sens)
            break;
        case 39:
            //-Droit
            sens = "droite"
            avancer(sens)
            break;
        case 38:
            //-Haut
            sens = "haut"
            avancer(sens)
            break;
        case 40:
            //-Bas
            sens = "bas"
            avancer(sens)
            break;
        default:
            break;
        }
};

dep=10,leftPos=0;topPos=0;

function avancer(sens){
    switch (sens){
        case "droite":
            leftPos+=dep
            document.getElementById("c1").style.left=leftPos+"px" 
            break;
        case "gauche":
            leftPos-=dep
            document.getElementById("c1").style.left=leftPos+"px" 
            break;
        case "haut":
            topPos-=dep
            document.getElementById("c1").style.top=topPos+"px" 
            break;
        case "bas":
            topPos+=dep
            document.getElementById("c1").style.top=topPos+"px" 
            break;     
    }

}