<?php
session_start();
include 'dbconnect.php';  // Your connection script

if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] !== 'admin') {
    http_response_code(403);
    exit("Forbidden");
}

$sql = "SELECT description, created_at FROM activity_log ORDER BY created_at DESC LIMIT 5";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="list-group-item">';
        echo '<div class="d-flex w-100 justify-content-between">';
        echo '<h6 class="mb-1">' . htmlspecialchars($row['description']) . '</h6>';
        echo '<small>' . date("H:i:s", strtotime($row['created_at'])) . '</small>';
        echo '</div></div>';
    }
} else {
    echo '<div class="list-group-item">No recent activity</div>';
}
?>
