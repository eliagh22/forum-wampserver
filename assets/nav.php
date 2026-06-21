

<nav class="">
  <div class="">
    <a class="" href="index.php">Forum</a>
    <div class="" id="">
      <ul class="">
        <li class="">
          <a class="" href="lesSujets.php">Les sujets</a>
        </li>
        <li class="">
          <a class="" aria-current="page" href="publier.php">Publier une question</a>
        </li>
        <li class="">
          <a class="" href="contact.php">Contact</a>
        </li>
        <li class="">
          <a class="" href="regles.php">Les règles</a>
        </li>
        <li class="">
          <a class="" href="mesquestions.php">Mes questions</a>
        </li>
        <?php 
          if(isset($_SESSION['auth_user'])) { ?>
            <li class="">
              <a class="" href="profile.php?id=<?= $_SESSION['auth_id']?> ">Mon profile</a>
            </li>
            <li class="">
              <a class="" href="actions/users/logoutActions.php">Déconnexion</a>
            </li> <?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>