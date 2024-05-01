<?php
    echo "<h2> La liste des clients</h2><br>" ; 
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=tp8_php","root","");
    }
    catch(PDOException $e){
        echo $e->getMessage() ;
    }

    $ins = $pdo->prepare("select * from t_client");
    $ins->execute() ; 
    $tab = $ins->fetchAll() ; 

    echo "<table border='1px solid black'>";
    echo "<tr><th>Nom</th><th>Prenom</th><th>Action</th></tr>" ; 
    for($i=0 ; $i<count($tab) ; $i++){
        echo "<tr>" ; 
        echo "<td>".$tab[$i]['nom']."</td>" ; 
        echo "<td>".$tab[$i]['prenom']."</td>" ; 
        echo "<td><a href='modification2.php?login=" . $tab[$i]['login'] . "'>Modifier client</a></td>";
        echo "</tr>" ; 
    }
    echo "</table>" ; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier clients</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-family: Arial, sans-serif;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    
}
h2{
    text-align: center;
    font-family: Arial, sans-serif;
    color: #0056b3;
}
    table th,
    table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    table th {
        background-color: #f2f2f2;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    table a {
        color: #007bff;
        text-decoration: none;
    }

    table a:hover {
        text-decoration: underline;
    }

    </style>
</head>
<body>
    
</body>
</html>