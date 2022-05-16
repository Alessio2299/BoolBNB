
let delete_btn = document.getElementById("delete-btn");

delete_btn.addEventListener("click", (event) => {
    if(confirm('Are you sure you want to delete this apartment?')) {
        return true;
    } else {
        event.preventDefault();
    }
})