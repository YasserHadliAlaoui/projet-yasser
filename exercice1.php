<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Révision PHP</title>
</head>
<body>
    <h1>Révision PHP</h1>

    <?php
    $employes = [
        ["nom" => "Ali", "poste" => "Développeur", "salaire" => 4000],
        ["nom" => "Sara", "poste" => "Designer", "salaire" => 3500],
        ["nom" => "Yassine", "poste" => "Manager", "salaire" => 5000],
        ["nom" => "Noha", "poste" => "Analyste", "salaire" => 4500],
        ["nom" => "Rania", "poste" => "Consultante", "salaire" => 4200],
    ];

    $salaireMoyen = array_sum(array_column($employes, "salaire")) / count($employes);
    echo "<p>Salaire moyen : $salaireMoyen MAD</p>";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom'])) {
        $nomRecherche = $_POST['nom'];
        $employeTrouve = array_filter($employes, fn($e) => $e['nom'] === $nomRecherche);
        if ($employeTrouve) {
            foreach ($employeTrouve as $e) {
                echo "<p>Nom : {$e['nom']}, Poste : {$e['poste']}, Salaire : {$e['salaire']} MAD</p>";
            }
        } else {
            echo "<p>Employé introuvable</p>";
        }
    }

    $utilisateurs = [
        ["email" => "ali@example.com", "password" => "1234"],
        ["email" => "sara@example.com", "password" => "abcd"]
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $auth = array_filter($utilisateurs, fn($u) => $u['email'] === $email && $u['password'] === $password);
        echo $auth ? "<p>Connexion réussie</p>" : "<p>Échec de connexion</p>";
    }

    $produits = [
        ["nom" => "Produit A", "quantite" => 2, "prix" => 50],
        ["nom" => "Produit B", "quantite" => 1, "prix" => 100],
    ];

    $totalPanier = array_reduce($produits, fn($total, $p) => $total + $p['quantite'] * $p['prix'], 0);
    echo "<p>Total panier : $totalPanier MAD</p>";

    $commentaires = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['commentaire'])) {
        $commentaires[] = ["texte" => $_POST['commentaire'], "date" => date("Y-m-d H:i:s")];
    }
    foreach ($commentaires as $c) {
        echo "<p>{$c['texte']} - {$c['date']}</p>";
    }

    $villes = [
        ["nom" => "Casablanca", "temperature" => 28],
        ["nom" => "Rabat", "temperature" => 25],
        ["nom" => "Marrakech", "temperature" => 32],
    ];

    $villeChaud = array_reduce($villes, function ($max, $ville) {
        return $max === null || $ville['temperature'] > $max['temperature'] ? $ville : $max;
    });

    echo "<p>Ville la plus chaude : {$villeChaud['nom']} avec {$villeChaud['temperature']}°C</p>";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['csv'])) {
        $fichier = $_FILES['csv']['tmp_name'];
        if (($handle = fopen($fichier, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                echo "<p>Produit : $data[0], Prix : $data[1], Quantité : $data[2]</p>";
            }
            fclose($handle);
        }
    }
    ?>

    <form method="post">
        <input type="text" name="nom" placeholder="Nom de l'employé">
        <button type="submit">Rechercher</button>
    </form>

    <form method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Mot de passe">
        <button type="submit">Connexion</button>
    </form>

    <form method="post">
        <input type="text" name="commentaire" placeholder="Ajouter un commentaire">
        <button type="submit">Envoyer</button>
    </form>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="csv">
        <button type="submit">Importer CSV</button>
    </form>
</body>
</html>
