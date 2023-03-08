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
    <form action="./add_game.php" method="post" >
        <div class="container d-flex justify-content-center" style="height: calc(100vh - 10.627vh - 5.313vh); margin-top: 5.313vh; font-size: 36px; color: 'white';">
            <div class="d-flex flex-column justify-content-around">
                <div>
                    <div class='text-white'>Game Title</div>
                    <input name="game"/>
                </div>
                
                <div>
                    <div class='text-white'>Image URL</div>
                    <input name="pictureURL"/>
                </div>
                
                <div>
                    <div class='text-white'>Quantity Available</div>
                    <input name="quantity"/>
                </div>
                

                <div>
                    <div class='text-white'>Price</div>
                    <input name="price"/>
                </div>

                <div>
                    <div class='text-white'>Description</div>
                    <input name="description"/>
                    <button type="submit" class="bg-primary d-block text-white">Submit</button>
                </div>
            </div>
        </div>
    </form>

    <?php
        include 'connection.php';
        include 'tools.php';
        if (submitted($_POST)) {
            $game = $_POST['game'];
            if (!duplicates($db, $game)) {
                $pictureURL = $_POST['pictureURL'];
                $quantity = $_POST['quantity'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $priceDollars = $price * 100;
                $query = "INSERT INTO games (game, pictureURL, quantity, price, description) VALUES (?, ?, ?, ?, ?);";
                $stmnt = $conn->prepare($query);
                $stmnt->bind_param("ssiis", $game, $pictureURL, $quantity, $priceDollars, $description);
                $stmnt->execute();
                header("Location: ". './');
            }
        }

        $conn = null;
    ?>
</body>
</html>