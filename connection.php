<?php
// Create connection
$conn = new PDO("sqlite:" . __DIR__ .  "/roomsensors.database");
// Set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);