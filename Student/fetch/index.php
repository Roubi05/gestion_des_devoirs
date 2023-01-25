<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Attendance Page</title>
  

</head>
  
<body>
    <div class="container">
        <div class="row">
            <h2>Attendance</h2>
            <table class="table table-hover";>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>Subject</th>
                        <th>message</th>
                      
                    </tr>
                </thead>
  
                <tbody>
                    <?php 
                           include_once('connection.php');
                           $a=1;
                           $stmt = $conn->prepare(
                                "SELECT * FROM contactts");
                           $stmt->execute();
                           $users = $stmt->fetchAll();
                           foreach($users as $user) 
                        {  
                    ?>
                    <tr>
                    <td>
                            <?php echo $user['id']; ?>
                        </td>
                        <td>
                            <?php echo $user['name']; ?>
                        </td>
                        <td>
                            <?php echo $user['subject']; ?>
                        </td>
                        <td>
                            <?php echo $user['message']; ?>
                        </td>
                      
                
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
           
        
</form>

        </div>
    </div>
</body>
  
</html>