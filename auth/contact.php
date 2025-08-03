<?php
require_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if (!$name || !$email || !$message) {
        echo "Błąd: wszystkie pola są wymagane.";
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$name, $email, $message]);
        echo "success";
    } catch (PDOException $e) {
        echo "Błąd zapisu wiadomości: " . $e->getMessage();
    }
}
?>