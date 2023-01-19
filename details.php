<?php include('./backEnd/header.php'); ?>
<?php
if (!isset($_GET["offre"])) {
    echo '<script type="text/javascript">
       window.onload = function () { alert("Vous n\'avez pas selectionner d\'offre"); location.href = "./index.php" } 
</script>';
} else {
    require_once "backEnd/bd.php";
    $sql = "SELECT * FROM offre WHERE offre = :offreNum";
    $statement = $db->prepare($sql);
    $statement->bindParam("offreNum", $_GET['offre']);
    $statement->execute();
    if ($result = $statement->fetch()) {
?>
<h1>Offre à <?php echo $_GET["offre"]?>€</h1>
<?php
    } else {
        echo '<script type="text/javascript">
       window.onload = function () { alert("Offre invalide"); location.href = "./index.php" } 
</script>';
    }
}
?>
<?php include('./backEnd/footer.php'); ?>