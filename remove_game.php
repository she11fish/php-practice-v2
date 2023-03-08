<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="bg-dark" style="font-family: 'Roboto', sans-serif;">
    <?php include 'navbar.php';?>
    <form action="./remove_game.php" method="post" >
        <div class="container d-flex justify-content-center" style="height: calc(100vh - 10.627vh - 5.313vh); margin-top: 5.313vh; font-size: 84px; color: 'white';">
            <div class="d-flex flex-column justify-content-around">
                <div>
                    <div class='text-white'>Game to Remove</div>
                    <input name="game"/>
                </div>
                <div><button type="submit" class="bg-primary d-block text-white">Submit</button></div>
            </div>
        </div>
    </form>
    <?php
        include 'connection.php';
        include 'tools.php';

        if (game_submitted($_POST)) {
            $game = $_POST['game'];
            if (duplicates($db, $game)) {
                $id = getId($db, $game);
                remove_game($conn, $id);
                header("Location: ". './');
            }
        }

        $conn = null;
    ?>
</body>
</html>