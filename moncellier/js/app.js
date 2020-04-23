function deleteWine() {
    //Récupérer les données du formulaire et les transférer l'objet wine
    let idWine = document.getElementById('idWine').value;
 
    const options = {
        'method': 'DELETE',
        'mode': 'cors',
        'headers': {
            'content-type': 'application/json; charset=utf-8'
        }
    };
    
    const fetchURL = '/wines/'+idWine;
    
    fetch(apiURL + fetchURL, options).then(function(response) {
        if(response.ok) {
            response.json().then(function(data){
                console.log(data);
                
                //Mettre à jour la liste des vins
                wines = wines.filter(wine => wine.id != idWine);
                
                //Réafficher la liste des vins
                showListe(wines);
                
                //Réinitialiser le formulaire
                newWine();
            });
        }
    });
}

function saveWine() {
    //Création d'un objet wine
    let wine = {};
    
    //Récupérer les données du formulaire et les transférer l'objet wine
    let input = document.getElementById('idWine');
    wine.id = input.value;

    input = document.getElementById('name');
    wine.name = input.value;

    input = document.getElementById('grapes');
    wine.grapes = input.value;

    input = document.getElementById('country');
    wine.country = input.value;

    input = document.getElementById('region');
    wine.region = input.value;

    input = document.getElementById('year');
    wine.year = input.value;

    input = document.getElementById('notes');
    wine.description = input.innerHTML;

    let imgWine = document.getElementById('picture');
    wine.picture = imgWine.src;
    
    //Envoyer l'objet wine à l'API en POST ou en PUT
    let method = (wine.id=='') ?'POST':'PUT';
    
    const options = {
        'method': method,
        'body': JSON.stringify(wine),
        'mode': 'cors',
        'headers': {
            'content-type': 'application/json; charset=utf-8'
        }
    };
    
    const fetchURL = method=='PUT' ? '/wines/'+wine.id : '/wines';
    
    fetch(apiURL + fetchURL, options).then(function(response) {
        if(response.ok) {
            response.json().then(function(data){
                console.log(data);
                
                //Mettre à jour la liste des vins (soit ajouter, soit modifier)
                wines = wines.filter(vin => vin.id != wine.id);
                
                if(method=='POST') {
                    //Récupérer l'id du vin créé
                    wine.id = data.id;

                    //Afficher l'id du nouveau vin dans le formulaire
                    let input = document.getElementById('idWine');
                    input.value = wine.id;
                }
                
                //Ajouter le nouveau vin dans la liste
                wines.push(wine);
                
                //Réafficher la liste des vins
                showListe(wines);
            });
        }
    });
}

function newWine() {
    //Vider le formulaire
    let input = document.getElementById('idWine');
    input.value = '';

    let inputName = document.getElementById('name');
    inputName.value = '';

    input = document.getElementById('grapes');
    input.value = '';

    input = document.getElementById('country');
    input.value = '';

    input = document.getElementById('region');
    input.value = '';

    input = document.getElementById('year');
    input.value = '';

    input = document.getElementById('notes');
    input.innerHTML = '';

    let imgWine = document.getElementById('picture');
    imgWine.src = 'images/pics/generic.jpg';
    
    //Mettre le curseur dans le champ name
    inputName.focus();
}

function showListe(wines) {
    //Sélectionner la liste des vins
    let listeUL = document.getElementById('liste');
    let strLIs = '';

    //Pour chaque vin, créer un LI
    wines.forEach(function(wine) {
        let idWine = wine.id;

        strLIs += '<li data-id="'+idWine+'" class="list-group-item">'+wine.name+'</li>';
    });

    //Insérer tous les LIs dans la liste UL des vins
    listeUL.innerHTML = strLIs;

    //Récupérer tous les LIs
    let nodeLIs = listeUL.getElementsByTagName('li');

    //Ajouter un gestionnaire d'événement sur chaque LI
    for(let li of nodeLIs) {
        li.addEventListener('click',function() { 
            getWine(this.dataset.id, wines);
        });
    }
}

function search() {
    let inputKeyword = document.getElementById('keyword');
    let keyword = inputKeyword.value;   
    
    //Filtrer la liste des vins sur base du keyword
    const regex = new RegExp(keyword, 'i');
    let filteredWines = wines.filter(wine => wine.name && wine.name.search(regex)!=-1);

    //Afficher les vins dans le UL liste
    showListe(filteredWines);
}
    
function getWine(id, wines) {
    let wine = wines.find(wine => wine.id == id);
    
    let input = document.getElementById('idWine');
    input.value = wine.id;

    input = document.getElementById('name');
    input.value = wine.name;

    input = document.getElementById('grapes');
    input.value = wine.grapes;

    input = document.getElementById('country');
    input.value = wine.country;

    input = document.getElementById('region');
    input.value = wine.region;

    input = document.getElementById('year');
    input.value = wine.year;

    input = document.getElementById('notes');
    input.innerHTML = wine.description;

    let imgWine = document.getElementById('picture');
    imgWine.src = wine.picture!='' 
        ? picturesURL + wine.picture
        : 'images/pics/No_picture_available.png';
}

const apiURL = 'http://localhost:8888/api';          //'js/wines.json';  //Mock
const picturesURL = 'http://localhost/caviste2020/caviste/public/pics/';
let wines;

window.onload = function() {
    const options = {
        'method':'GET'
    };
    
    fetch(apiURL + '/wines', options).then(function(response) {
        if(response.ok) {
            response.json().then(function(data){
                wines = data;
                
                //Afficher la liste des vins dans UL liste
                showListe(wines);
            });
        }
    });

    /*  const xhr = new XMLHttpRequest();       //console.log(xhr);
    
    xhr.onreadystatechange = function() {
        if(xhr.readyState==4 && xhr.status==200) {
            let data = xhr.responseText;        //console.log(data);
            
            wines = JSON.parse(data);       console.log(wines);
                        
            //Afficher la liste des vins dans UL liste
            showListe(wines);
        }     
    };
    
    xhr.open('GET','js/wines.json',true);
    xhr.send();
    */

    //Configuration des boutons
    let btSearch = document.getElementById('btSearch');
    btSearch.addEventListener('click', () => search());
    
    let btNewWine = document.getElementById('btNewWine');
    btNewWine.addEventListener('click', () => newWine());
    
    let btSave = document.getElementById('btSave');
    btSave.addEventListener('click', () => saveWine());
    
    let btDelete = document.getElementById('btDelete');
    btDelete.addEventListener('click', () => deleteWine());
};

