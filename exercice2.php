<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Révision PHP</title>
</head>
<body>
    <?php
    $etudiant = ["nom" => "El Idrissi", "prénom" => "Youssef", "matricule" => "202301"];
    echo "<p>Nom : {$etudiant['nom']}, Prénom : {$etudiant['prénom']}, Matricule : {$etudiant['matricule']}</p>";

    $etudiant['note'] = 15;
    $etudiant['note'] = 17;
    echo "<p>Note de l'étudiant : {$etudiant['note']}</p>";

    $produits = [
        ["nom" => "Pain", "prix" => 2],
        ["nom" => "Lait", "prix" => 5],
        ["nom" => "Huile", "prix" => 20]
    ];
    foreach ($produits as $produit) {
        echo "<p>Produit : {$produit['nom']}, Prix : {$produit['prix']} MAD</p>";
    }

    $scores = [
        "Ahmed" => 15,
        "Fatima" => 18,
        "Khalid" => 12,
        "Zineb" => 16,
        "Hassan" => 14
    ];
    $moyenne = array_sum($scores) / count($scores);
    echo "<p>Moyenne des scores : {$moyenne}</p>";

    $pays = [
        "Maroc" => 37000000,
        "Algérie" => 44000000,
        "Tunisie" => 12000000
    ];
    arsort($pays);
    foreach ($pays as $nom => $population) {
        echo "<p>Pays : {$nom}, Population : {$population}</p>";
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nom'], $_POST['age'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $age = intval($_POST['age']);
        if ($age > 0) {
            echo "<p>Bienvenue, {$nom}, vous avez {$age} ans !</p>";
        } else {
            echo "<p>Erreur : L'âge doit être un entier positif.</p>";
        }
    }
    ?>
    <form method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        <label for="age">Âge :</label>
        <input type="number" id="age" name="age" required>
        <button type="submit">Envoyer</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['couleur'])) {
        $couleur = htmlspecialchars($_POST['couleur']);
        echo "<p>Votre couleur préférée est : {$couleur}</p>";
    }
    ?>
    <form method="post">
        <label for="couleur">Choisissez une couleur :</label>
        <select id="couleur" name="couleur">
            <option value="Rouge">Rouge</option>
            <option value="Vert">Vert</option>
            <option value="Bleu">Bleu</option>
        </select>
        <button type="submit">Envoyer</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['num1'], $_GET['num2'])) {
        $num1 = floatval($_GET['num1']);
        $num2 = floatval($_GET['num2']);
        $somme = $num1 + $num2;
        echo "<p>La somme est : {$somme}</p>";
    }
    ?>
    <form method="get">
        <label for="num1">Nombre 1 :</label>
        <input type="number" id="num1" name="num1" required>
        <label for="num2">Nombre 2 :</label>
        <input type="number" id="num2" name="num2" required>
        <button type="submit">Calculer</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['compte'])) {
        $compte = htmlspecialchars($_POST['compte']);
        if ($compte === "Administrateur") {
            echo "<p>Bienvenue, administrateur !</p>";
        } else {
            echo "<p>Bienvenue, utilisateur simple !</p>";
        }
    }
    ?>
    <form method="post">
        <label for="compte">Type de compte :</label>
        <select id="compte" name="compte">
            <option value="Administrateur">Administrateur</option>
            <option value="Utilisateur">Utilisateur</option>
        </select>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>