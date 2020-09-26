
function arcAdd(){
    
    let bttn = document.querySelector("#arcEdit [type='submit']");
    
    if ( bttn != null ){

        bttn.addEventListener('click', (e)=>{
            
            e.preventDefault();
        
            let number = document.querySelector("#arcEdit [name='number']").value;
            let name = document.querySelector("#arcEdit [name='name']").value;
            let text = document.querySelector("#arcEdit [name='text']").value;
            
            let form = new FormData();
            
            form.append('number', number);
            form.append('name', name);
            form.append('text', text);
            
            fetch( getUrlBase() + '/arcs/add', {method: "POST", body: form }).then( response => {
                document.location.reload();
            });
            
        });
    }
}


function arcEdit(){
    let targets = document.querySelectorAll('.target');
    for ( let target of targets ){
        
        let category = target.dataset.category;
        let targetId = target.dataset.id;
        
        let bttn = target.querySelector('.targetEdit');
        
        bttn.addEventListener('click', ()=>{
            
            let number = parseInt( target.querySelector('h3 span').innerHTML );
            let name = target.querySelector('h2').innerHTML;
            let text = target.querySelector('p').innerHTML;
            
            document.querySelector("#arcEdit [name='number']").value = number;
            document.querySelector("#arcEdit [name='name']").value = name;
            document.querySelector("#arcEdit [name='text']").value = text;
            
            window.scrollTo({ top: 0, behavior: 'smooth' });
            
        });
    }
}

function arcRemove(){
    
    let targets = document.querySelectorAll('.target');
    for ( let target of targets ){
        
        let category = target.dataset.category;
        let targetId = target.dataset.id;
        
        let bttn = target.querySelector('.targetRemove');
        
        bttn.addEventListener('click', ()=>{
            
            console.log('pass');
        
            let form = new FormData();
            
            form.append('arcId', targetId);
            
            fetch( getUrlBase() + '/arcs/remove', {method: "POST", body: form }).then( response => {
                document.location.reload();
            });
            
        });
    }
    
}

/*----------------------------------------------------------------------------*/

arcAdd();
arcEdit();
arcRemove();

