<?php
require_once("head.php");

?>
<h1>LISTE DES POKEMONS </h1>
<article>
    <table>
        <thead>
            <tr>
                <th>numéro</th>
                <th>nom</th>
                <th>image</th>
            </tr>
        </thead>

        <tbody>
<?php
require_once("database-connection.php");

    $sql = "SELECT * FROM Pokemon";

    $pokemon = $databaseConnection->query($sql)->fetch_all(MYSQLI_ASSOC);
    foreach ($pokemon as $row) {
        echo "<tr><td>" . $row["idPokemon"] . "</td><td>" . $row["nomPokemon"] . "</td><td><img src='" . $row["urlPhoto"] . "'/></td></tr>";
    }

    ?>
        </tbody>
    </table>
</article>
<?php
require_once("footer.php");
?>