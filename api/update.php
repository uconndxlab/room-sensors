<?php
try {
    require_once('../connection.php');

    // Retrieve parameters
    $api_key = $_GET['api_key'] ?? null;
    $room = $_GET['room'] ?? null;
    $motion = $_GET['motion'] ?? $_GET['Motion'] ?? null;
    $alive = $_GET['alive'] ?? $_GET['Alive'] ?? null;
    $humid = $_GET['humid'] ?? $_GET['Humid'] ?? null;
    $temp = $_GET['temp'] ?? $_GET['Temp'] ?? null;

    // Validate parameters
    if ($api_key && $room) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO ping (room, motion, alive, humid, temp) VALUES (:room, :motion, :alive, :humid, :temp)");
        $stmt->bindParam(':room', $room);
        $stmt->bindParam(':motion', $motion);
        $stmt->bindParam(':alive', $alive);
        $stmt->bindParam(':humid', $humid);
        $stmt->bindParam(':temp', $temp);

        // Execute the statement
        if ($stmt->execute()) {
            // echo "New record created successfully";
            // echo "Room: " . $room . " Motion: " . $motion . " Humidity: " . $humid . " Temperature: " . $temp;
            $last = $conn->query("select last_insert_rowid()", PDO::FETCH_NUM);
            $last = $last->fetch();
            $last = $last[0];
            echo $last;
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } else {
        header('HTTP/1.1 400 Bad Request');
        echo "Missing parameters";
    }
} catch(PDOException $e) {
    header('HTTP/1.1 500 Internal Server Error');
    echo "Connection failed: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>