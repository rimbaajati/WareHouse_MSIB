<?php
session_start();
include 'config.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

  
    $stmt = $conn->prepare("DELETE FROM gudang WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        
        $_SESSION['message'] = "Data berhasil dihapus!";
        $_SESSION['msg_type'] = "success"; 
    } else {
     
        $_SESSION['message'] = "Error: " . $stmt->error;
        $_SESSION['msg_type'] = "danger";
    }

    $stmt->close();
}


header("Location: index.php");
exit();
?>
