<div class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-sm-2 row-cols-1 m-3">
    <?php
    try {
        $getStore = $conn->prepare("SELECT * FROM store ORDER BY id ASC");
        $getStore->execute();
        $store = $getStore->fetchAll();
        foreach ($store as $product) { ?>
            <div class="col p-2">
                <div class="card h-100">
                    <img src="<?php echo $product["image"]; ?>" class="card-img-top h-100" alt="No image" onerror="this.src='images/dummy.png';">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $product["name"]; ?></h5>
                        <div class="row-cols-1">
                            <button id="buy" type="button" onclick="setConfirmBuy(this)" class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#buyModal" data-id="<?php echo $product["id"]; ?>" data-stock="<?php echo $product["stock"]; ?>" <?php if ($product["stock"] == 0) { ?> disabled <?php } ?>>₴<?php echo $product["price"]; ?></button>
                            <button type="button" onclick="setDetails(this)" class="btn btn-secondary m-1" data-bs-toggle="modal" data-bs-target="#detailsModal" data-description="<?php echo $product["description"]; ?>">Детально</button>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <small class="text-body-secondary"><?php if ($product["stock"] != 0) { echo "В наявності: " . $product["stock"] . "шт."; } else { echo "Немає в наявності"; } ?></small>
                    </div>
                </div>
            </div>
        <?php }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</div>
