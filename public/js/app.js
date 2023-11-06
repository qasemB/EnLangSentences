

document.addEventListener("DOMContentLoaded", (event) => {

    // tooltip initializing------------------------
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


});
// toastify firing--------------------------

var handleToastify = (message, type)=>{
    Toastify({
        text: message,
        className: "alert-success",
        gravity: "bottom", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        style: {
            background:
                type == "success"
                ? "linear-gradient(to right, #00b09b, #96c93d)"
                :type == "warning"
                ? "linear-gradient(to right, #FF9800, #c4a808)"
                : "linear-gradient(to right, #ff0000, #E91E63)",
        },
    }).showToast();
}

document.addEventListener('livewire:initialized', () => {
    Livewire.on('fire-toastify', ([message, type]) => {
        handleToastify(message, type)
    });
});



