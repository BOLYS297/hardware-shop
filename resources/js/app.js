import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
$(".password").on("click", () => {
     const input = $('#password');
     input.attr("type", input.attr("type") === "password" ? "text" : "password");
}   )
