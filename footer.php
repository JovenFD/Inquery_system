<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<script>
    let showPassword = document.querySelector("#passwordIconId");
    const passwordField = document.querySelector("#inputPassword");

    showPassword.addEventListener("click", function() {
        this.classList.toggle("fa-eye");

        const type =
            passwordField.getAttribute("type") === "password" ?
            "text" :
            "password";
        passwordField.setAttribute("type", type);
    });
</script>
