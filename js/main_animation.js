class anim_Contenu {
    constructor(elm) {
      this.elm = elm
    }
    
    anim(){
        let elmP = this.elm;
        //Ajoute la class a tous les elements
        elmP.forEach((e)=> {
            e.classList.add('animTextShadow');
        }) 
    }
}

class anim_Img {
    constructor(elm) {
      this.elm = elm
    }
    
    anim(){
        let elmP = this.elm;
        //Ajoute la class a tous les elements
        elmP.forEach((e)=> {
            e.addEventListener("mouseover", function() {
                // console.log("hi");
                e.classList.add('animForme');
            });
            e.addEventListener("mouseout", function() {
                // console.log("hi");
                e.classList.remove('animForme');
            });
        }) 
    }
}

//Va chercher tous les p de infoEvenement
let elmNouvelleText = document.querySelectorAll(".infoEvenement p");
//Donne tous les elements dans la class anim_Contenu
const elmAnimer1 = new anim_Contenu(elmNouvelleText);
//Donne l'animation aux elements 
elmAnimer1.anim();

//Va chercher tous les images d'evenement
let elmEvenementImg = document.querySelectorAll(".imgEvenement");
//Donne tous les elements dans la class anim_Img
const elmAnimer2 = new anim_Img(elmEvenementImg);
//Donne l'animation aux elements 
elmAnimer2.anim();