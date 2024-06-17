<script src="js/panel/action.js"></script>

<?php
$name = "Дія";
$idModal = "actionModal";
$idModalBody = "actionModalBody";
$idModalFooter = "actionModalFooter";
include "base/modal.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        if (isset($_POST['nameInput'], $_POST['descriptionInput'], $_POST['priceInput'], $_POST['stockInput'], $_POST['imageInput'])) {
            if (!empty($_POST['nameInput']) && !empty($_POST['descriptionInput']) && !empty($_POST['priceInput']) && !empty($_POST['stockInput']) && !empty($_POST['imageInput'])) {
                
                if (isset($_POST['createButton'])) {
                    $stmt = $conn->query("SELECT MAX(id) AS max_id FROM store");
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $lastId = $row['max_id'];
                    
                    $sql = "INSERT INTO store (id, name, description, price, stock, image) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$lastId + 1, $_POST['nameInput'], $_POST['descriptionInput'], $_POST['priceInput'], $_POST['stockInput'], $_POST['imageInput']]);

                } else if (isset($_POST['editButton'], $_POST['idInput']) && !empty($_POST['idInput'])) {
                    $sql = "UPDATE store SET name = ?, description = ?, price = ?, stock = ?, image = ? WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$_POST['nameInput'], $_POST['descriptionInput'], $_POST['priceInput'], $_POST['stockInput'], $_POST['imageInput'], $_POST['idInput']]);
                }
            }

        } else if (isset($_POST['deleteButton'], $_POST['idInput']) && !empty($_POST['idInput'])) {
            $sql = "DELETE FROM store WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $_POST['idInput'], PDO::PARAM_INT);
            $stmt->execute();
        }

        header("Location: panel.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
