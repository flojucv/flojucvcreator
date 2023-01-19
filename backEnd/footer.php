</div>
<script>
    const menuHamburger = document.querySelector(".menu-hamburger")
    const navLinks = document.querySelector(".nav-links")
    const container = document.querySelector(".container")

    menuHamburger.addEventListener('click', async () => {
        await navLinks.classList.toggle('mobile-menu');
        await container.classList.toggle("mobile-menu-desable");
    })
</script>
</div>
</body>

</html>