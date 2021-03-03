<?php
/*
Plugin Name:  Llista de tasques projecte GLPI
Version    :  1.0
Description:  Llista de tasques del projecte a mostrar per pantalla amb opció d'afegir i borrar tasques des del propi plugin.
Author     :  Jordi Gonzalez
Author URI :  http://glpi-project.bigmacbrothers.cat/
License    :  GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  projecte glpi - llista tasques
*/


add_action('admin_menu', 'afegir_menu_llista');

function afegir_menu_llista(){
    add_menu_page( 'Llista Tasques Projecte', 'Llista Tasques Projecte', 'manage_options', 'llista_tasques', 'pagina_principal' );
}


function pagina_principal(){

    echo "<h1>Llista de Tasques del Projecte GLPI</h1>";
    echo "<p>Aquí apareixen totes les tasques pendents del projecte.<br></p>";
    echo "<p>Fes servir el formulari de l'esquerra si vols afegir una nova tasca o el de la dreta per borrar-la.</p><br>";
    require( plugin_dir_path( __FILE__ ) . 'llista_tasques.php');

}

#Connexió a la base de dades
$db_host = "localhost";
$db_nom = "tasques";
$db_usuari = "user";
$db_password = "aplicacions";

try {
    $connexio = new PDO("mysql:host=$db_host;dbname=$db_nom", $db_usuari, $db_password);
    $consulta = "SELECT * FROM tasques";
    $query = $connexio->query($consulta);
    $dades = [];
    while ($rows = $query->fetch(PDO::FETCH_ASSOC)) {
        $dades[] = $rows;
    }
} catch (PDOException $exception) {
    echo $exception->getMessage();
}


#FUNCIO IMPRIMIR LLISTA DE TASQUES
function infoLlista($array)
{
    echo "<ul>";
    echo "<p>Tasques pendents de completar:<br></p>";
    foreach ($array as $clau => $valor) {
        if (isset($valor)) {
            foreach ($valor as $clau2 => $valor2) {
                echo "<li>$clau2  :  $valor2</li>";
            }
            echo "<br>";
        }
    }
    echo "</ul>";
}


# FUNCIO BORRAR TASCA
if (isset($_POST["delete"])) {
    $codi = $_POST["codi"];
    $update = $connexio->prepare("DELETE FROM tasques WHERE Codi = '$codi'");
    $update->execute();
}

# FUNCIO INSERTAR TASCA
if (isset($_POST["enviar"])){
    $tasca = $_POST["tasca"];

        $insertar= $connexio -> prepare ("INSERT INTO tasques (Texte)
                  VALUES (?)");
        $insertar -> execute(array($tasca));

}





?>