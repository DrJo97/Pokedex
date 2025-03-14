<?php
require_once("head.php");

?>
<h1>LISTE DES POKEMONS </h1>
<article>
    <table>
        <thead>
            <tr>
                <th>nom</th>
                <th> PV</th>
                <th>Defense</th>
                <th>Attaque</th>
                <th>Vitesse</th>
                <th>Spé</th>
                <th>ancêtre</th>
                <th>evolution</th>
                <th>image</th>
            </tr>
        </thead>

        
    </table>
</article>           
<?php
require_once("database-connection.php");

    $recherche = $_GET["id"];
    $sql = "SELECT p.idPokemon, p.nomPokemon, p.PV, p.PtsAttaque, p.PtsDefense, p.PtsVitesse, p.PtsSpecial, p.urlPhoto, p3.nomPokemon as ancetre, p.nomPokemon as pokemon, p2.nomPokemon as evolution
        FROM pokemon p
        LEFT JOIN evolutions e on e.idAncetre = p.idPokemon
        LEFT JOIN pokemon p2 on e.idEvolution = p2.idPokemon
        LEFT JOIN evolutions a on a.idEvolution = p.idPokemon
        LEFT JOIN pokemon p3 on p3.idPokemon = a.idAncetre
        WHERE p.idPokemon = ?";



$stmt = $databaseConnection->prepare($sql);

// Lier le paramètre à la requête (ici, c'est l'ID du Pokémon)
$stmt->bind_param("i", $recherche) ;

// Exécuter la requête
$stmt->execute();

// Récupérer les résultats
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row ["nomPokemon"] ."</td>
        <td>" .  $row["PV"] . "
        <td>" . $row ["PtsDefense"] ."</td>
        <td>" . $row["PtsAttaque"] ."</td>
        <td>" . $row["PtsVitesse"] ."</td>
        <td>" . $row["PtsSpecial"] ."</td>
        <td>" . $row["ancetre"] . "</td>
        <td>" . $row["evolution"] . "</td>
        </td><td><img src='" . $row["urlPhoto"] . "'/></td>
        </tr>";
    }
   

    
    $stmt->close();
    ?>
<?php
require_once("footer.php");
?>