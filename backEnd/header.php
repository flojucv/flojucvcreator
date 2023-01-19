<?php
$page = basename($_SERVER['PHP_SELF']);

$liste_pages_unconnect = array(
    array('page' => 'index', 'title' => 'Accueil'),
    array('page' => 'login', 'title' => 'Connection'),
    array('page' => 'register', 'title' => "S'inscrire"),
);

$liste_pages_connect = array(
    array('page' => 'index', 'title' => 'Accueil'),
    array('page' => 'client', 'title' => 'Profil'),
    array('page' => 'disconnect', 'title' => "Déconnection"),
);

$liste_pages_Admin = array(
    array('page' => 'index', 'title' => 'Accueil'),
    array('page' => 'client', 'title' => 'Profil'),
    array('page' => 'disconnect', 'title' => "Déconnection"),
    array('page' => 'admin', 'title' => "DashBoard"),
);

$title_id = array_search($page, array_column($liste_pages_unconnect, 'page'));
$titlePage = $liste_pages_unconnect[$title_id]['title'];
$active = 'active';
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>flojucv Creator | <?php echo $titlePage ?></title>
    <link href="/style/style.css" rel="stylesheet">
    <link rel="icon" href="../img/logo.png">
</head>

<body>
    <div class= "container">
    <nav class="navbar">
        <a class="logo" href="../index.php">FLOJUCV</a>
        <div class="nav-links">
            <ul>
                <?php
                foreach ($liste_pages_unconnect as $item) {
                    $url = $item['page'];
                    $title = $item['title'];
                ?>
                    <li><a href="<?php echo $url; ?>.php" class= "<?php $page == $url?'active':''?>"> <?php echo $title ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <img src="../img/menu-btn.png" alt="Menu hamburger" class="menu-hamburger">
    </nav>