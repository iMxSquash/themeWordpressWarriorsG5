document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".copy-button").forEach(button => {
        button.addEventListener("click", function () {
            navigator.clipboard.writeText(this.innerText).then(() => {
                alert("Texte copié !");
            }).catch(err => {
                console.error("Erreur de copie : ", err);
            });
        });
    });
});
