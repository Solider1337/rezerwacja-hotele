<?php
require_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $hotel = trim($_POST["hotel"]);
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $guests = intval($_POST["guests"]);

    if (!$name || !$hotel || !$checkin || !$checkout || $guests < 1) {
        echo "Błąd: nieprawidłowe dane.";
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO bookings (name, hotel, checkin_date, checkout_date, guests) VALUES (?, ?, ?, ?, ?)");
    try {
        $stmt->execute([$name, $hotel, $checkin, $checkout, $guests]);
        echo "success";
    } catch (PDOException $e) {
        echo "Błąd rezerwacji: " . $e->getMessage();
    }
}
?>