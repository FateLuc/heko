<?php

class Map
{
    private $mapSize;

    public function __construct($mapSize)
    {
        $this->mapSize = $mapSize;
    }

    function hasItem($u, $i)
    {
        $db = new mysqli('localhost', 'root', '', 'test');
        $result = $db->query("SELECT x, y FROM items WHERE x = " . $u . " AND y = " . $i)
        or die($db->error);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return true;
            }
        } else {

        }

        return false;
    }

    public function insertItems()
    {
        for ($u = 0; $u < $this->mapSize; $u++) {
            for ($i = 0; $i < $this->mapSize; $i++) {
                $random = rand(1, 11);
                if ($random == 5) {
                    // Create connection
                    $conn = new mysqli("localhost", "root", "", "test");

                    $sql = "INSERT INTO items (x, y, name) VALUES (" . $u . ", " . $i . ",'goat')";

                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    $conn->close();
                }
            }
        }

        return false;
    }


    public function storeItem($u, $i)
    {
        // Remove item from items table
        if ($this->hasItem($u, $i)) {
            $db = new mysqli('localhost', 'root', '', 'test'); // copied by simon
            $delete_item = mysqli_query($db, "DELETE FROM items WHERE x = $u  AND y = $i");
            $db->close();
            // Insert in backpack
            $db = new mysqli('localhost', 'root', '', 'test');
            if ($delete_item == true) {
                 $eaten_goat = "goat";
                $sql = "INSERT INTO back_pack (eaten_goats) VALUES ('" . $eaten_goat . "')";
                if ($db->query($sql) === TRUE) {

                } else {
                    echo "Error: " . $sql . "<br>" . $db->error;
                }
            }
            $db->close();
        }
    }
    public function item_indicator(){
        $conn = new mysqli("localhost", "root", "", "test");
        $sql = "SELECT * FROM back_pack;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $items[$row["id"]] = $row;
            }
        }
        $conn->close();
        return $items;
    }

}