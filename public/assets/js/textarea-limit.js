document.addEventListener('DOMContentLoaded', function() {
    let textarea = document.getElementById("nota");
    textarea.addEventListener("input", function () {
        // Capamos el texto a 4000 letras
        textarea.value = textarea.value.substring(0, 4000);

    });
});