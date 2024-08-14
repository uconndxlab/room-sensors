<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Sensors</title>
</head>
<body>
    <main>
        <h1>Room Sensors</h1>
<?php
try {
    require_once('connection.php');
    $stmt = $conn->prepare("SELECT * FROM ping");
    $stmt->execute();
    $pings = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

?>
        <table>
            <thead>
                <tr>
                    <th>Room</th>
                    <th>Motion</th>
                    <th>Humidity</th>
                    <th>Temperature</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pings as $ping) { ?>
                <tr>
                    <td><?php echo $ping['room']; ?></td>
                    <td><?php echo $ping['motion']; ?></td>
                    <td><?php echo $ping['humid']; ?></td>
                    <td><?php echo $ping['temp']; ?></td>
                    <td><?php echo $ping['created_at']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>