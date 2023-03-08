<?php 
    function submitted($data) {
        return array_key_exists('game', $data)
                    && array_key_exists('pictureURL', $data)
                    && array_key_exists('quantity', $data)
                    && array_key_exists('price', $data)
                    && array_key_exists('description', $data);
    }

    function game_submitted($data) {
        return array_key_exists('game', $data);
    }

    function duplicates($db, $game) {
        foreach($db as $data) {
            if (preg_replace('/\s+/', '', $game) == preg_replace('/\s+/', '', $data['game'])) {
                return true;
            } 
        }
        return false;
    }

    function update_game($conn, $type, $data, $id) {
        if (preg_replace('/\s+/', '', $_POST[$type]) == '') {
            return;
        }
        $num_types = array('quantity', 'price');
        if (in_array($type, $num_types)) {
            $query = "UPDATE games SET {$type} = (?) WHERE gameID = {$id};";
            $stmnt = $conn->prepare($query);
            $stmnt->bind_param("i", $data);
            $stmnt->execute();
        } else {
            $query = "UPDATE games SET {$type} = (?) WHERE gameID = {$id};";
            $stmnt = $conn->prepare($query);
            $stmnt->bind_param("s", $data);
            $stmnt->execute();
        }
    }

    function remove_game($conn, $id) {
        $query = "DELETE FROM games WHERE gameID = (?)";
        $stmnt = $conn->prepare($query);
        $stmnt->bind_param("i", $id);
        $stmnt->execute();
    }

    function getId($db, $game) {
        foreach($db as $type=>$data) {
            if ($game == $data['game']) {
                return $data['gameID'];
            }
        }
    }
?>