document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".call-button").forEach(button => {
        button.addEventListener("click", function () {
            let phoneNumber = this.textContent.trim().replace(/\s+/g, ""); // Supprime les espaces

            if (/^\+?\d+$/.test(phoneNumber)) { // Vérifie que c'est bien un numéro
                let callLink = "tel:" + phoneNumber;

                // Crée un lien temporaire et simule un clic
                let tempLink = document.createElement("a");
                tempLink.href = callLink;
                tempLink.style.display = "none";
                document.body.appendChild(tempLink);
                tempLink.click();
                document.body.removeChild(tempLink);

                // Vérifie si l’appel a bien été lancé, sinon copie le numéro
                setTimeout(() => {
                    if (!document.hasFocus()) {
                        console.log("Appel lancé.");
                    } else {
                        navigator.clipboard.writeText(phoneNumber).then(() => {
                            alert("Numéro copié !");
                        }).catch(err => {
                            console.error("Erreur de copie : ", err);
                        });
                    }
                }, 500);
            } else {
                console.error("Numéro de téléphone invalide :", phoneNumber);
            }
        });
    });
});
