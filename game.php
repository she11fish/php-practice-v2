<?php
    class Game {
        private $gameID;
        private $game;
        private $pictureURL;
        private $quantity;
        private $price;
        private $description;
        function __construct($data) {
            $this->gameID = $data['gameID'];
            $this->game = $data['game'];
            $this->pictureURL = $data['pictureURL'];
            $this->quantity = $data['quantity'];
            $this->price = $data['price'];
            $this->description = $data['description'];
        }

        function getId() {
            return $this->gameID;
        }

        function getGame() {
            return $this->game;
        }

        function getURL() {
            return $this->pictureURL;
        }
        
        function getQuantity() {
            return $this->quantity;
        }

        function getPrice() {
            return $this->price / 100;
        }

        function getDescription() {
            return $this->description;
        }
    }
?>