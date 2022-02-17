let anonymousCheckBox = document.getElementById("anonymous");
let remetente = document.getElementById("remetente");
let remetenteAnonimo = document.getElementById("remetente-anonimo");

console.log(remetente);
console.log(remetenteAnonimo);

anonymousCheckBox.addEventListener("change", function() {
    if (this.checked) {
        remetente.selected = false;
        remetente.hidden = true;

        anonymousCheckBox.value = true;

        remetenteAnonimo.selected = true;
        remetenteAnonimo.hidden = false;
    } else {
        remetente.selected = true;
        remetente.hidden = false;

        anonymousCheckBox.value = false;

        remetenteAnonimo.selected = false;
        remetenteAnonimo.hidden = true;
    }
});