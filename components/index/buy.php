<script src="js/index/buy.js"></script>

<?php
$name = "Оформлення покупки";
$idModal = "buyModal";
$idModalBody = "buyModalBody";
$idModalFooter = "buyModalFooter";
include "base/modal.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['buyButton'], $_POST['idInput'], $_POST['stockInput']) && !empty($_POST['idInput']) && !empty($_POST['stockInput'])) {
        try {
            $sql = "UPDATE store SET stock = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST['stockInput'] - 1, $_POST['idInput']]);
            
            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
