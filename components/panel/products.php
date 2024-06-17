<button id="create" type="button" onclick="setAction(this)" class="btn btn-success m-3" data-bs-toggle="modal" data-bs-target="#actionModal">
    <i class="fa-regular fa-square-plus"></i>
    Create
</button>

<div class="table-responsive">
    <table class="table table-bordered table-striped w-auto m-3">
        <caption>Список товарів</caption>
        <thead>
            <tr>
                <th scope="col">Дія</th>
                <th scope="col">#</th>
                <th scope="col">Назва</th>
                <th scope="col">Опис</th>
                <th scope="col">Ціна</th>
                <th scope="col">Наявність</th>
                <th scope="col">Зображення</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $getStore = $conn->prepare("SELECT * FROM store ORDER BY id ASC");
                $getStore->execute();
                $store = $getStore->fetchAll();
                foreach ($store as $product) { ?>
                    <tr>
                        <td class="text-center">
                            <button id="edit" type="button" onclick="setAction(this)" class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#actionModal" data-id="<?php echo $product["id"]; ?>" data-name="<?php echo $product["name"]; ?>" data-description="<?php echo $product["description"]; ?>" data-price="<?php echo $product["price"]; ?>" data-stock="<?php echo $product["stock"]; ?>" data-image="<?php echo $product["image"]; ?>">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button id="delete" type="button" onclick="setAction(this)" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#actionModal" data-id="<?php echo $product["id"]; ?>">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </td>
                        <th><?php echo $product["id"]; ?></th>
                        <td><?php echo truncateEndOfString($product["name"], 100, strlen($product["name"])); ?></td>
                        <td><?php echo truncateEndOfString($product["description"], 100, strlen($product["description"])); ?></td>
                        <td><?php echo truncateEndOfString($product["price"], 100, strlen($product["price"])); ?></td>
                        <td><?php echo truncateEndOfString($product["stock"], 100, strlen($product["stock"])); ?></td>
                        <td><?php echo truncateEndOfString($product["image"], 100, strlen($product["image"])); ?></td>
                    </tr>
            <?php }
            } catch (PDOException $e) {
                echo "<tr><td colspan='7'>Error: " . $e->getMessage() . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
