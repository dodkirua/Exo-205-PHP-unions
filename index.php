<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/DB.php";

/**
 * Reproduisez les tables présentes dans le fichier image ( via workbench ou phpmyadmin )
 * Ajoutez des données dans chaque table en vous assurant d'ajouter au moins 1 fois un utilisateur identique dans deux tables.
 * Utilisez UNION pour récupérer les usernames de chaque table, affichez le résultat à l'aide d'un print_r ou d'une boucle.
 * Utilisez UNION ALL pour afficher toutes les données y compris les doublons, affichez le résultat  à l'aide d'une boucle ou d'un print_r.
 * PS: Si vous utilisez un print_r, alors utilisez la balise <pre> pour un résultat plus propre.
 */

$db = DB::getInstance();

$request = $db->prepare("
            SELECT username FROM user
            UNION 
            SELECT username FROM admin
            UNION 
            SELECT username FROM client
");

$request->execute();

echo "<pre>";
print_r($request->fetchAll());
echo "</pre>";


$request = $db->prepare("
            SELECT username FROM user
            UNION ALL
            SELECT username FROM admin
            UNION ALL
            SELECT username FROM client
");

$request->execute();

echo "<pre>";
print_r($request->fetchAll());
echo "</pre>";
