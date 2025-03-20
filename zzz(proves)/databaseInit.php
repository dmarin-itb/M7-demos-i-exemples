<?php
// Connectar-se a la base de dades (o crear-la si no existeix)
$db = new SQLite3('database.db');

// Crear una taula si no existeix
$db->exec("CREATE TABLE IF NOT EXISTS usuaris (usu_id INTEGER PRIMARY KEY, usu_nom TEXT, usu_email TEXT)");

// Inserir registres
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('Joan', 'joan@itb.cat')");
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('Alícia', 'alicia@itb.cat')");
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('Francesc', 'francesc@itb.cat')");
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('Raquel', 'raquel@itb.cat')");
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('Víctor', 'victor@itb.cat')");
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('Rai', 'rai@itb.cat')");
$db->exec("INSERT INTO usuaris (usu_nom, usu_email) VALUES ('David', 'david@itb.cat')");

// Consulta que recull el resultat de la inserció: true-false. En aquest cas, es força l'error posant malament el nom de la taula (en singular)
if ($db->exec("INSERT INTO usuari (usu_nom, usu_email) VALUES ('Tadej', 'tadej@itb.cat')"))
    echo "S'ha insertat un nou usuari";
else
    echo "Error a l'insertar l'usuari";

// Tancar la connexió
$db->close();
?>
