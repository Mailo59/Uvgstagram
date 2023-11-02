const rutaActual = window.location.pathname;

const divParaEliminar = document.getElementById("destruir");
const divParaEliminar2 = document.getElementById("destruir2");
const agregar = document.getElementById("agregar");
if (rutaActual === "/login") {
    divParaEliminar.remove();
    divParaEliminar2.remove();
}
if (rutaActual === "/register") {
    divParaEliminar.remove();
    divParaEliminar2.remove();
    agregar.classList.add("ml-16");
}

const words = ["Bienvenidos a Uvgstagram"];
let i = 0;
let j = 0;
let currentWord = "";
let isDeleting = false;

function type() {
    currentWord = words[i];
    if (isDeleting) {
        document.getElementById("typewriter").textContent =
            currentWord.substring(0, j - 1);
        j--;
        if (j == 0) {
            isDeleting = false;
            i++;
            if (i == words.length) {
                i = 0;
            }
        }
    } else {
        document.getElementById("typewriter").textContent =
            currentWord.substring(0, j + 1);
        j++;
        if (j == currentWord.length) {
            isDeleting = true;
        }
    }
    setTimeout(type, 150);
}

type();
