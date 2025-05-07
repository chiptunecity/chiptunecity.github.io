<?php
// Sanitize and store username and email
$username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : 'Unknown';
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : 'Unknown';

// Sanitize and dynamically store each message
if (isset($_GET['message']) && is_array($_GET['message'])) {
    $messages = $_GET['message'];

    foreach ($messages as $index => $msg) {
        $varName = 'message' . ($index + 1);
        $$varName = htmlspecialchars($msg); // dynamically create $message1, $message2, ...
    }

    echo "<h2>Received Post</h2>";
    echo "<p><strong>Username:</strong> $username</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<h3>Messages:</h3>";
    for ($i = 1; $i <= count($messages); $i++) {
        $varName = 'message' . $i;
        echo "<p>Message $i: " . $$varName . "</p>";
    }
} else {
    echo "<p>No messages received.</p>";
}
?>
