<?php include('./backEnd/header.php'); ?>

<div class="connection">
  <form method="post" action="./backEnd/registerBackEnd.php">
    <p>Bienvenue</p>
    <input class="register" name="email" type="email" id="email" placeholder="Email"><br>
    <input class="register" name="login" type="text" id="login" placeholder="Username"><br>
    <input class="register" name="password" type="password" id="password" placeholder="Mot de passe"><br>
    <div class="progress-bar" style="--width: 0; --background-color: red" data-label=""></div>
    <input class="register" name="verif_password" type="password" id="verif_password" placeholder="Confirmer mot de passe"><br>
    <button class="register" type="submit">S'inscrire<br>
  </form>
</div>


<script>
  const motdepasse = document.getElementById("password");
  const progressBar = document.getElementsByClassName('progress-bar')[0]

  function checkMdp() {
    const mdp = motdepasse.value;
    let score = 0;

    //test de la longueur
    if (mdp.length >= 8) {
      score ++;
      console.log("Longueur OK");
    }

    //test si le mot de passe contient une majuscule
    if (mdp.toLowerCase() !== mdp) {
      score++;
      console.log("majuscule OK");
    }

    //test si le mot de passe contient une minuscule
    if (mdp.toUpperCase() !== mdp) {
      score++;
      console.log("minuscule OK");
    }

    //test si le mot de passe contient un chiffre
    if (/\d/.test(mdp)) {
      score++;
      console.log("chiffre OK");
    }

    switch (score) {
      case 0:

        progressBar.style.setProperty('--width', 0)
        progressBar.style.setProperty('--background-color', "red")
        console.log("Changement 0% effectuer, score : ", score);
        break;
      case 1:
        progressBar.style.setProperty('--width', 25)
        progressBar.style.setProperty('--background-color', "red")
        console.log("Changement 25% effectuer, score : ", score);
        break;
      case 2:
        progressBar.style.setProperty('--width', 50)
        progressBar.style.setProperty('--background-color', "orange")
        console.log("Changement 50% effectuer, score : ", score);
        break;
      case 3:
        progressBar.style.setProperty('--width', 75)
        progressBar.style.setProperty('--background-color', "yellow")
        console.log("Changement 75% effectuer, score : ", score);
        break;
      case 4:
        progressBar.style.setProperty('--width', 100)
        progressBar.style.setProperty('--background-color', "green")
        console.log("Changement 100% effectuer, score : ", score);
        break
      default:
        progressBar.style.setProperty('--width', 0)
        progressBar.style.setProperty('--background-color', "red")
        console.log("Changement default effectuer, score : ", score);
        break;
    }
  }

  motdepasse.addEventListener("keyup", checkMdp)
</script>
<?php include('./backEnd/footer.php'); ?>