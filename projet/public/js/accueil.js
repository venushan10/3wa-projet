



function afficheNext(){
    let afficheButtonNext = document.querySelector('.affiche .next');
    
    if ( afficheButtonNext != null ){

        afficheButtonNext.addEventListener('click', (e)=>{
            e.preventDefault();
            let affiche = document.querySelector('.posters');
            let firstElement = document.querySelector('.posters .saison:first-child');
            firstElement.remove();
            affiche.appendChild(firstElement);
        });
    }
}

function affichePrev(){
    let afficheButtonPrev = document.querySelector('.affiche .prev');
    
    if ( afficheButtonPrev != null ){
        afficheButtonPrev.addEventListener('click', (e)=>{
            e.preventDefault();
            let affiche = document.querySelector('.posters');
            let lastElement = document.querySelector('.posters .saison:last-child');
            lastElement.remove();
            affiche.insertBefore(lastElement, document.querySelector('.posters .saison:first-child'));
        });
    }
}

/*--------------------------------------------------*/

afficheNext();
affichePrev();