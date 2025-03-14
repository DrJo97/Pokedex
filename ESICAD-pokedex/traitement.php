<?php
$databaseConnection = mysqli_connect(
    'localhost',
    "root",
    null ,
    "pokemon",
    "3306"
);
?>
<?php
if(isset($_POST["ok"])) {
    $nom = $_POST["nom"];
    $password = $_POST["password"];
$requete = $bdd-> prepare ("INSERT INTO users VALUES (0, :nom, :password, ");
$requete->execute(array("nom="=> $nom,
"password"=> $password));
$result = $requete->fetchAll(PDO::FETCH_ASSOC) [0];
var_dump($result);
echo "inscription réussie !"
}
?>