<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "1219";
    $dbname = "shop";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    /* Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    */
    if (isset($_POST["item"]))
    {
        $item = $_POST["item"];
        echo $_POST["quantity"]."yes";
        $sql = "SELECT Name FROM product WHERE Product_ID=$item";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                $row["Quantity"] = $_POST["quantity"];
                array_push($_SESSION["cart"], $row);
            }
        }
    }
    $conn->close();
?>