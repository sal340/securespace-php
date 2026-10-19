document.querySelectorAll("[data-toggle-password]").forEach((button) => {
    button.addEventListener("click", () => {
        const input = document.getElementById(
            button.dataset.togglePassword
        );

        if (!input) return;

        const showing = input.type === "password";
        input.type = showing ? "text" : "password";
        button.textContent = showing ? "Masquer" : "Afficher";
        button.setAttribute("aria-pressed", String(showing));
        button.setAttribute(
            "aria-label",
            showing ? "Masquer le mot de passe" : "Afficher le mot de passe"
        );
    });
});
