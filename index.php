<?php 
include 'config/db.php'; 
include 'includes/header.php'; 
?>

<div class="container-fluid bg-dark text-white py-5 mb-5" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('unsplash.com'); background-size: cover; background-position: center;">
    <div class="container py-5 text-center text-md-start">
        <div class="row align-items-center">
            <div class="col-md-7">
                <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill text-uppercase fw-bold" style="letter-spacing: 2px;">Tech Season 2026</span>
                <h1 class="display-3 fw-bold mb-3">Next-Gen <br><span class="text-warning">Smart Gadgets</span></h1>
                <p class="lead mb-4 opacity-75">Discover the latest in mobile technology, wearables, and high-fidelity audio gear.</p>
                <a href="#shop" class="btn btn-warning btn-lg rounded-pill px-5 fw-bold shadow">EXPLORE NOW</a>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-3 mb-5 text-center">
        <div class="col-md-3 col-6">
            <div class="p-3 border rounded-4 bg-white shadow-sm h-100">
                <i class="fas fa-shipping-fast text-primary mb-2 fa-lg"></i>
                <h6 class="fw-bold mb-1 small">Free Shipping</h6>
                <p class="text-muted x-small mb-0">On all tech orders</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="p-3 border rounded-4 bg-white shadow-sm h-100">
                <i class="fas fa-shield-alt text-success mb-2 fa-lg"></i>
                <h6 class="fw-bold mb-1 small">1-Year Warranty</h6>
                <p class="text-muted x-small mb-0">Certified Protection</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="p-3 border rounded-4 bg-white shadow-sm h-100">
                <i class="fas fa-undo text-info mb-2 fa-lg"></i>
                <h6 class="fw-bold mb-1 small">Easy Returns</h6>
                <p class="text-muted x-small mb-0">30-day money back</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="p-3 border rounded-4 bg-white shadow-sm h-100">
                <i class="fas fa-headset text-warning mb-2 fa-lg"></i>
                <h6 class="fw-bold mb-1 small">Expert Support</h6>
                <p class="text-muted x-small mb-0">Live tech assistance</p>
            </div>
        </div>
    </div>

    <div class="row mb-4 align-items-center" id="shop">
        <div class="col-6">
            <h4 class="fw-bold mb-0 text-uppercase" style="letter-spacing: 1px;">Featured Products</h4>
        </div>
        <div class="col-6 text-end">
            <a href="#" class="text-decoration-none text-dark fw-bold small">View All Gear <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
    </div>

    <div class="row g-4">
        <?php
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                
                $productId = (int)$row['id'];
                
                // FIXED: Complete direct public image source links mapped directly by product database keys
                $cdnImageMap = [
                    1  => 'unsplash.com', // Smart Watch
                    2  => 'unsplash.com', // iPhone 15 Pro Max
                    3  => 'unsplash.com', // iPhone 15 Pro Max Copy
                    4  => 'unsplash.com', // MacBook Pro M3
                    5  => 'unsplash.com', // Expert Full Stack Bundle
                    6  => 'unsplash.com', // Responsive Design Pro
                    7  => 'unsplash.com', // Backend Logic Masterclass
                    8  => 'unsplash.com', // UI/UX Glassmorphism Kit
                    9  => 'unsplash.com', // Terminal Added Item
                    10 => 'unsplash.com', // Expert Full Stack Bundle Duplicate
                    11 => 'unsplash.com', // Responsive Design Pro Duplicate
                    12 => 'unsplash.com', // Backend Logic Masterclass Duplicate
                    13 => 'unsplash.com'  // UI/UX Glassmorphism Kit Duplicate
                ];

                // Check mapping first, fallback to a reliable general network placeholder if ID is unmapped
                $imgUrl = isset($cdnImageMap[$productId]) ? $cdnImageMap[$productId] : 'unsplash.com';
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100 product-card overflow-hidden">
                        <div class="position-relative bg-light d-flex align-items-center justify-content-center" style="height: 220px;">
                            <img src="<?php echo htmlspecialchars($imgUrl); ?>" 
                                 class="img-fluid p-3" 
                                 style="max-height: 100%; max-width: 100%; object-fit: contain;" 
                                 alt="<?php echo htmlspecialchars($row['name']); ?>"
                                 onerror="this.src='unsplash.com';">
                            
                            <div class="position-absolute top-0 start-0 m-2">
                                <span class="badge bg-dark rounded-pill shadow-sm">New Arrival</span>
                            </div>
                        </div>
                        
                        <div class="card-body p-4 text-center d-flex flex-column">
                            <div class="mb-2">
                                <div class="text-warning small">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                            </div>
                            <h6 class="card-title fw-bold text-dark mb-3 text-truncate" title="<?php echo htmlspecialchars($row['name']); ?>">
                                <?php echo htmlspecialchars($row['name']); ?>
                            </h6>
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <h5 class="text-primary fw-bold mb-0">$<?php echo number_format($row['price'], 2); ?></h5>
                                <form method="POST" action="cart.php">
                                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="add_to_cart" class="btn btn-dark rounded-pill px-3 py-2 shadow-sm small fw-bold transition-btn">
                                        <i class="fas fa-cart-plus me-1"></i> Buy
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<div class='col-12 text-center py-5'><h3 class='text-muted'>No products found.</h3></div>";
        }
        ?>
    </div>
</div>

<style>
    .product-card { 
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); 
        border: 1px solid #f0f0f0 !important; 
        background: #fff; 
    }
    .product-card:hover { 
        transform: translateY(-8px); 
        box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important; 
        border-color: #0d6efd !important; 
    }
    .transition-btn { transition: background 0.3s ease; }
    .transition-btn:hover { background: #0d6efd; border-color: #0d6efd; }
    .x-small { font-size: 0.75rem; }
</style>

<?php include 'includes/footer.php'; ?>
