<html>
<style>
    p {
        font-family: Arial;
        font-size: large;
    }
    ul{
        list-style-position: inside;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        width: 600px;
        background: #bfbf00;
        padding: 20px;
        border-radius: 10px;
        color: black;
        float: left;
    }

</style>
<body>

<form id='formulari' method="post"  class="input_form" style="float: left">
        <p style="color: #00bf00">
            <label for="Tasca"> Afegeix una nova tasca:</label> <br>
            <input type="text" size="45" name="tasca" id="Tasca" /> <br>
            <input type="submit" name="enviar" value="Afegir Tasca"> &nbsp;
        </p>
</form>


<form method="post"  class="input_form" style="float: left">
        <p style="color:#FF0000">
            <label for="Codi"> Entra el codi de la tasca a borrar: </label> <br>
            <input type="text" name="codi" id="Codi" /> <br>
            <input type="submit" name="delete" value="Eliminar tasca"> &nbsp;
        </p>
</form>

    <?php
    #Connexió a la base de dades
    $db_host="localhost";
    $db_nom="tasques";
    $db_usuari="user";
    $db_password="aplicacions";

    try{
        $connexio=new PDO("mysql:host=$db_host;dbname=$db_nom",$db_usuari,$db_password);
        $consulta= "SELECT * FROM tasques";
        $query= $connexio -> query($consulta);
        $dades=[];
        while ($rows = $query -> fetch(PDO::FETCH_ASSOC)){
            $dades[]=$rows;
        }
    }

    catch(PDOException $exception){
        echo $exception->getMessage();
    }

    # Carreguem la llista de tasques a la pàgina del plugin
    infoLlista($dades);

    ?>

</body>
</html>