var nbColonne=30;
var nbLigne=20;
var cote=20;
var score=document.getElementById("score");
var dessin=document.getElementById("dessin");
var ctx=dessin.getContext("2d");
var snake=[[4,0],[3,0],[2,0],[1,0],[0,0]];
var snakeIncX=1;
var snakeIncY=0;
dessin.width=nbColonne*cote;
dessin.height=nbLigne*cote;
ctx.fillStyle="#0000FF";
var timerJeu=setInterval(boucleJeu,100);
placeBonbon();

window.onkeydown = function(e) {
    var key = e.keyCode;
	switch(key){
		case 37: //Gauche
			if(snakeIncX==0){
				snakeIncX=-1;
				snakeIncY=0
			}
		break;	
    	case 38: //Haut
			if(snakeIncY==0){
				snakeIncX=0;
				snakeIncY=-1
			}
		break;	
    	case 39: //Droite
			if(snakeIncX==0){
				snakeIncX=1;
				snakeIncY=0
			}
		break;
    	case 40: //Bas
			if(snakeIncY==0){
				snakeIncX=0;
				snakeIncY=1;
			}
		break;
	}
}

function majDessin(){
	ctx.clearRect(0,0,dessin.width,dessin.height);
	for(var i=0,l=snake.length;i<l;i++){
		ctx.fillRect(snake[i][0]*cote,snake[i][1]*cote,cote,cote);
	}
	ctx.fillRect(bonbon[0]*cote,bonbon[1]*cote,cote,cote);	
}

function majScore(s){
	score.innerHTML=s;
}

function finPartie(){
	clearInterval(timerJeu);
	alert("Perdu !");
	location.reload();
}

function boucleJeu(){
	if(bougeSnake()){
		majDessin();
	}else{
		finPartie();
	}
}

function placeBonbon(){
	bonbon=[1+Math.floor((nbColonne-2)*Math.random()),1+Math.floor((nbLigne-2)*Math.random())];
}

function bougeSnake(){

	var tete=[snake[0][0]+snakeIncX,snake[0][1]+snakeIncY];

    if((tete[0]==-1||tete[0]==nbColonne)||(tete[1]==-1||tete[1]==nbLigne)){
        return false;
    } 
    for(var i=0,l=snake.length-1;i<l;i++){
		if((tete[0]==snake[i][0])&&(tete[1]==snake[i][1])){
           return false; 
        } 
	}
    if((tete[0]==bonbon[0])&&(tete[1]==bonbon[1])){
		placeBonbon();
		majScore(snake.length-4);
	}else{
		snake.pop();
	}
    snake.unshift(tete);
	return true;
}