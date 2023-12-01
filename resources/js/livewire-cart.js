// resources/js/livewire-cart.js

document.addEventListener("livewire:load", function () {
    Livewire.on("redirect", (data) => {
        window.location = route(data.route, data.params);
    });
});
