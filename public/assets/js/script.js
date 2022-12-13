// fonntion pour faire clignoter les annonces importantes pour les parents
var clignotement = function(){ 
  // on verifie si la div retourne une valeur
  if(document.getElementById('clignotement') != null) {
    // On récupère le paragraphe
    if (document.getElementById('clignotement').style.visibility=='visible'){ 
      // Si la visibilité est visible, on la passe à hidden
      document.getElementById('clignotement').style.visibility='hidden'; 
    } 
    // Sinon, on la passe à visible
    else{ 
      document.getElementById('clignotement').style.visibility='visible'; 
    } 
  } 
  else
  {
    // On arrête le clignotement si le paragraphe n'existe pas
    clearInterval(clignotement);
   
  }
}
// mise en place de l appel de la fonction toutes les 1,4 secondes 
// Pour arrêter le clignotement : clearInterval(periode);
  var periode = setInterval(clignotement,1400); 
 // fin de la fonction 



 
 function randomBackground(){
  // je creer une variable qui prend un nombre aleatoire entre 1 et 4
  var num=Math.floor(Math.random()*4)+1;
  // je creer une variable qui prend le chemin de l'image
  if(num.toString().length==1) num='0'+num;
  document.body.style.background="url('/assets/img/"+num+".jpeg')";
  document.body.style.backgroundSize = "cover"
  document.body.style.backgroundRepeat = "no-repeat";
  document.body.style.backgroundPosition = "center";
  document.body.style.backgroundAttachment = "fixed";
}