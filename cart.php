<?php
include 'config/db.php';
include 'includes/header.php';

// --- 1. REMOVE ITEM LOGIC ---
if (isset($_GET['remove'])) {
    $id_to_remove = $_GET['remove'];
    if (($key = array_search($id_to_remove, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
    header("Location: cart.php");
    exit();
}

// --- 2. ADD TO CART LOGIC ---
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id']; 
    if (!isset($_SESSION['cart'])) { $_SESSION['cart'] = array(); }
    array_push($_SESSION['cart'], $product_id);
    header("Location: cart.php");
    exit();
}

// --- 3. FINAL CHECKOUT LOGIC ---
$order_success = false;
if (isset($_POST['complete_checkout'])) {
    if (!empty($_SESSION['cart'])) {
        $cart_items = array_filter($_SESSION['cart']);
        $ids = implode(',', $cart_items);
        $result = mysqli_query($conn, "SELECT name, price FROM products WHERE id IN ($ids)");
        
        $product_names = [];
        $subtotal = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $product_names[] = $row['name'];
            $subtotal += $row['price'];
        }
        
        // Calculate Shipping
        $ship_type = $_POST['shipping_method'];
        $ship_cost = ($ship_type == 'Express') ? 15.00 : 0.00;
        $final_total = $subtotal + $ship_cost;
        
        $final_products = mysqli_real_escape_string($conn, implode(', ', $product_names));
        $sql = "INSERT INTO orders (product_names, total_price, shipping_method) 
                VALUES ('$final_products', '$final_total', '$ship_type')";
        
        if (mysqli_query($conn, $sql)) {
            unset($_SESSION['cart']);
            $order_success = true;
        }
    }
}
?>

<div class="container py-5">
    <div class="row g-4 justify-content-center">
        <?php if ($order_success): ?>
            <div class="col-md-7 text-center py-5">
                <div class="card border-0 shadow-lg p-5 rounded-4">
                    <i class="fas fa-truck-fast fa-4x text-success mb-4"></i>
                    <h2 class="fw-bold">Order Confirmed!</h2>
                    <p class="text-muted">Your shipment details have been recorded in the system.</p>
                    <a href="index.php" class="btn btn-dark rounded-pill px-5 mt-3">Continue Shopping</a>
                </div>
            </div>
        <?php elseif (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            
            <div class="col-lg-7">
                <h4 class="fw-bold mb-4">1. Review Your Items</h4>
                <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">
                    <table class="table align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-end pe-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $subtotal = 0;
                            $ids = implode(',', array_filter($_SESSION['cart']));
                            $res = mysqli_query($conn, "SELECT * FROM products WHERE id IN ($ids)");
                            while ($item = mysqli_fetch_assoc($res)):
                                $subtotal += $item['price'];
                            ?>
                            <tr>
                                <td class="ps-4 py-3">
                                    <div class="fw-bold"><?php echo $item['name']; ?></div>
                                    <small class="text-muted">Premium Digital Delivery</small>
                                </td>
                                <td class="text-center fw-bold">$<?php echo number_format($item['price'], 2); ?></td>
                                <td class="text-end pe-4">
                                    <a href="cart.php?remove=<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-danger border-0">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <h4 class="fw-bold mb-4">2. Shipment Method</h4>
                <form method="POST">
                    <div class="card border-0 shadow-sm rounded-4 p-3 mb-4">
                        <div class="form-check p-3 border rounded-3 mb-2">
                            <input class="form-check-input ms-0 me-3" type="radio" name="shipping_method" value="Standard" id="ship1" checked>
                            <label class="form-check-label d-flex justify-content-between w-100" for="ship1">
                                <span>Standard Shipping (3-5 Business Days)</span>
                                <span class="fw-bold text-success">FREE</span>
                            </label>
                        </div>
                        <div class="form-check p-3 border rounded-3">
                            <input class="form-check-input ms-0 me-3" type="radio" name="shipping_method" value="Express" id="ship2">
                            <label class="form-check-label d-flex justify-content-between w-100" for="ship2">
                                <span>Express Delivery (Next Day)</span>
                                <span class="fw-bold">+$15.00</span>
                            </label>
                        </div>
                    </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-lg rounded-4 p-4 sticky-top" style="top: 100px;">
                    <h5 class="fw-bold mb-4">Summary</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal</span>
                        <span class="fw-bold">$<?php echo number_format($subtotal, 2); ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Processing Fee</span>
                        <span class="fw-bold">$0.00</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0">Total Amount</h5>
                        <h4 class="text-primary fw-bold mb-0">$<?php echo number_format($subtotal, 2); ?>*</h4>
                    </div>
                    <button type="submit" name="complete_checkout" class="btn btn-primary w-100 rounded-pill py-3 fw-bold shadow">
                        Confirm & Pay <i class="fas fa-lock ms-2"></i>
                    </button>
                    <p class="text-center mt-3 x-small text-muted">*Total excludes optional Express shipping fees.</p>
                </div>
                </form>
            </div>

        <?php else: ?>
            <div class="col-md-6 text-center py-5">
                <i class="fas fa-shopping-basket fa-4x text-muted mb-4 opacity-25"></i>
                <h3 class="fw-bold">Your summary is empty</h3>
                <a href="index.php" class="btn btn-dark rounded-pill px-5 mt-3">Explore Store</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>