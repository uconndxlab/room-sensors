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
    $stmt = $conn->prepare("SELECT * FROM ping ORDER BY created_at DESC LIMIT 100");
    $stmt->execute();
    $pings = $stmt->fetchAll();

    $total = $conn->query("SELECT COUNT(*) FROM ping")->fetchColumn();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

?>
        <p>Total Pings: <?php echo $total; ?></p>
        
        <p>Last 100:</p>
        <table>
            <thead>
                <tr>
                    <th>Room</th>
                    <th>Motion</th>
                    <th>Alive</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pings as $ping) { ?>

<?php
$timezone = new DateTimeZone("America/New_York");
$dt = new DateTime($ping['created_at'], new DateTimeZone("UTC"));
$dt->setTimezone($timezone);
?>

                <tr>
                    <td><?php echo $ping['room']; ?></td>
                    <td><?php echo $ping['motion']; ?></td>
                    <td><?php echo $ping['alive']; ?></td>
                    <td><?php echo $dt->format("m/d/Y H:i:s") ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>