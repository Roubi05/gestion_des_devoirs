<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servname = "localhost:3306"; $dbname = "els"; $username = "root"; $password = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $username, $password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "DELETE FROM contact WHERE id ='126'";
                $sth = $dbco->prepare($sql);
                $sth->execute();
                
                $count = $sth->rowCount();
                print('Effacement de ' .$count. ' entrées.');
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>
 