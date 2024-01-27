import { js } from "laravel-mix";

js("resources/js/app.js", "public/js").sass(
    "resources/sass/app.scss",
    "public/css"
);
mix.copy('node_modules/flatpickr/dist/flatpickr.css', 'public/css/flatpickr.css');
