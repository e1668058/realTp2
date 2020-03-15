let collectionBtnNouvelle = document.querySelectorAll(".btn");

if (collectionBtnNouvelle)
{
    for (let btn of collectionBtnNouvelle){
            btn.addEventListener('click',Ajax);
    }
}


function Ajax(evt) {

    let maRequete = new XMLHttpRequest();
    // console.log(maRequete) http://localhost/allen_veille2/wp-json/wp/v2/categories/1
    maRequete.open('GET', 'http://localhost/wordpress/wp-json/wp/v2/posts/'+ evt.target.id);
    maRequete.onload = function () {
        // console.log(maRequete)
        if (maRequete.status >= 200 && maRequete.status < 400) {
            let data = JSON.parse(maRequete.responseText);
            //Le bouton
            let contenu = document.getElementById(evt.target.id);

            //le p relier au bouton, le +1 existe pcq sinon il va get le id du bouton
            let idContenu = document.getElementById(evt.target.id+1);
            // le p qui contient le texte de surplus
            let idP = document.getElementById(evt.target.id+'2');

            //Les p qui contiennent le texte
            let allContenu = document.querySelectorAll(".desc");
            //les p qui contient le texte qui se rajoute quand lutilisateur click sur lire plus
            let allP = document.querySelectorAll(".desc2"); 
            // console.log(idContenu.innerHTML.length);
          
            //Si le champ pour montrer le surplus de texte est vide
            if (idP.innerHTML.length <= 0) {
                allP.forEach((e)=> {
                    e.innerHTML = "";
                }) 
                creationHTML(data, idContenu, idP);
            }
            else if (idContenu.innerHTML.length > 0){
                idP.innerHTML = "";
                allP.innerHTML = "";
            }
 
        } else {
            console.log('La connexion est faite mais il y a une erreur')
        }
    }
    maRequete.onerror = function () {
        console.log("erreur de connexion");
    }
    maRequete.send();
    
}

//fonction pour  montrer le reste
function creationHTML(postsData, idContenu, idP){
    let monHtmlString = postsData.content.rendered;
    //Genere le texte de ou que le premier p s'est arreter
    idP.innerHTML = monHtmlString.substring(idContenu.innerHTML.length-31, monHtmlString.length);

}

