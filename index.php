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
        <?php
            include 'connection.php';
            include 'game.php';
            foreach($db as $data) {
                $game = new Game($data);
                echo '<div class="container" style="height: calc(100vh - 10.627vh - 5.313vh); margin-top: 5.313vh; font-size: 18px;">';
                    echo '<div>';
                        echo '<div class="d-flex flex-column justify-content-center align-items-center">';
                            echo "<div class='text-white'>Game</div>";
                            echo "<div class='text-white'> {$game->getGame()} </div>";
                            echo "<div class='text-white'> <img src='{$game->getURL()}' width=400px/> </div>";
                        echo '</div>';
                        echo '<div class="d-flex flex-column justify-content-center align-items-center">';
                            echo "<div class='text-white'>Quantity Available</div>";
                            echo "<div class='text-white'> {$game->getQuantity()} </div>";
                            echo "<div class='text-white'>Price</div>";
                            echo "<div class='text-white'> \${$game->getPrice()} </div>";
                            echo "<div class='text-white'>Description</div>";
                            echo "<div class='text-white'> {$game->getDescription()} </div>";
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            $conn = null;
        ?>
    </div>
</body>
</html>