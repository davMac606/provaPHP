<?php
 include("conexaoBD.php");
 $marca = $_POST['marcaCarro']; 
 if($_SERVER["REQUEST_METHOD"] === "POST") {
     try {
        $sql = "SELECT * FROM carrosPHP WHERE marcaCarro = :marca";
        $smt = $pdo->prepare($sql);
        $smt->bindParam(':marca', $marca);
        $smt->execute();

        echo "<form method='post'>";
        echo "<table border='1'>";
        echo "<tr>
              <th>Placa</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Cor</th>
              <th>Ano</th>
              </tr>";
              
        while ($row = $smt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['placaCarro'] . "</td>";
            echo "<td>" . $row['marcaCarro'] . "</td>";
            echo "<td>" . $row['modelo'] . "</td>";
            echo "<td>" . $row['cor'] . "</td>";
            echo "<td>" . $row['ano'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</form>";


        
        

        
 } catch (PDOException $ex) {
        echo "Erro: ".$ex->getMessage();
 }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação PHP</title>
</head>
<body>
    <form method="post">
        <input type="text" name="marcaCarro" placeholder="Insira a marca do carro a ser buscado">
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>
