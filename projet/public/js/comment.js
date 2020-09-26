
function addComment(category, targetId, comment){
    
    let form = new FormData();
    
    form.append('category', category);
    form.append('targetId', targetId);
    form.append('comment', comment);
    
    return fetch( getUrlBase() + '/comment/post', {method: "POST", body: form });
    
}

// A TESTER
function removeComment(category, targetId){
    
    let form = new FormData();
    
    form.append('category', category);
    form.append('targetId', targetId);
    
    return fetch( getUrlBase() + '/comment/remove', {method: "POST", body: form });

}

function getComments(category, targetId){
    
    let form = new FormData();
    
    form.append('category', category);
    form.append('targetId', targetId);
    
    return fetch( getUrlBase() + '/comment/get', {method: "POST", body: form });

}

function countComments(category, targetId){
    
    let form = new FormData();
    
    form.append('category', category);
    form.append('targetId', targetId);
    
    return fetch( getUrlBase() + '/comment/count', {method: "POST", body: form });

}




// RÉACTUALISÉ L'AFFICHAGE DES COMMENTAIRES
function refreshComment(category, targetId){
    getComments(category, targetId).then( response => {
        response.json().then( comments => {
            
            let list = document.querySelector('.comments .list');
            list.innerHTML = "";
            
            for( let comment of comments ){
                
                let container = document.createElement('div');
                list.appendChild(container);
                container.classList.add('comment');
                
                let head = document.createElement('div');
                container.appendChild(head);
                head.classList.add('head');
                
                let time = document.createElement('p');
                head.appendChild(time);
                time.classList.add('box', 'time');
                time.innerHTML = comment['time'];
                
                let pseudo = document.createElement('p');
                head.appendChild(pseudo);
                pseudo.classList.add('box', 'pseudo');
                pseudo.innerHTML = comment['pseudo'];
                
                let text = document.createElement('p');
                container.appendChild(text);
                text.classList.add('box', 'text');
                text.innerHTML = comment['text'];
                
            } 
    	});
    });

}

/*----------------------------------------------------------------------------*/


// CHARGER TOUT LES COMMENTAIRES DE LA CIBLE
function loadComments(){

    let target = document.querySelector('#targetSelected');
    
    if ( target != null ){
        let category = target.dataset.category;
        let targetId = target.dataset.id;
        refreshComment(category, targetId);
    }
}


// AJOUTER UN COMMENTAIRE
function eventAddComment(){

    let addCommentBttn = document.querySelector('#addComment');
    
    if ( addCommentBttn != null ){
        
        addCommentBttn.addEventListener('click', (e)=>{
            e.preventDefault();
            let target = document.querySelector('#targetSelected');
            let textarea = document.querySelector('#textarea'); 
            let category = target.dataset.category;
            let targetId = target.dataset.id;
            
            addComment(category, targetId, textarea.value).then( response =>{
                
                textarea.value = "";
                refreshComment(category, targetId);
                
            });
            
        });
    
    }
}


// AFFICHER LE NOMBRE TOTAL DE COMMENTAIRES
function loadCommentsCount(){
    let targets = document.querySelectorAll('.target');
    
    for ( let target of targets ){
        
        let category = target.dataset.category;
        let targetId = target.dataset.id;
        
        countComments(category, targetId).then( response => {
            response.json().then( number => {
                let span = document.querySelector("[data-id='"+targetId+"'] .countComment span");
                span.innerHTML = number;
            });
        });
    }

}

/*----------------------------------------------------------------------------*/

loadComments();
eventAddComment();
loadCommentsCount();


