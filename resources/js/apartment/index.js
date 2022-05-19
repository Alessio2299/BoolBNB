
let delete_buttons = document.getElementsByClassName("delete-btn");

for(let i = 0; i < delete_buttons.length; i++){
    delete_buttons[i].addEventListener("click", function(event){
        if(!confirm('Are you sure you want to delete this apartment?')){
            event.preventDefault();
        }
    })
}
