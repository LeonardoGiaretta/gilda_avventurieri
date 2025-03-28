<?php
require 'vendor/autoload.php'; 

try {

    $client = new MongoDB\Client("mongodb://localhost:27017");
    
    $db = $client->gilda_avventurieri;
    $collection = $db->personaggi;

}catch(Exception $e){
    echo "Errore nella connessione: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>personaggi</title>
</head>
<body>
    
<p>
<?php
 // 3.1 Trova tutti i Guerrieri e mostra i loro nomi
 $filter = ['classe' => 'Guerriero'];
 $result = $collection->find($filter);

 echo "Guerrieri:";
 foreach ($result as $document) {
     echo $document['nome'] . " "; 
 }

?>
</p>
<p><?php
// 3.2 Trova gli eroi di livello superiore a 3 e mostra i loro nomi
    $filter = ['livello' => ['$gt' => 3]];
    $result = $collection->find($filter);

    echo "\nEroi di livello superiore a 3:";
    foreach ($result as $document) {
        echo $document['nome'] . " "; 
    }
?></p>
<p><?php
 // 3.3 Trova chi possiede una "Pozione di cura" nel proprio inventario e mostra i loro nomi
 $filter = ['inventario' => 'Pozione curative'];
 $result = $collection->find($filter);

 echo "Chi possiede una Pozione di cura:\n";
 foreach ($result as $document) {
     echo $document['nome'] . " ";
 }

?></p>


</body>
</html>

