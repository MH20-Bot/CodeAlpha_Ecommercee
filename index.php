<?php 
include 'config/db.php'; 
include 'includes/header.php'; 

// Product image map using real Unsplash URLs based on product ID
$cdnImageMap = [
    1  => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&q=80',  // Smart Watch
    2  => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=400&q=80',  // iPhone 15 Pro Max
    3  => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=400&q=80',  // iPhone 15 Pro Max Copy
    4  => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=400&q=80',  // MacBook Pro M3
    5  => 'https://images.unsplash.com/photo-1587831990711-23ca6441447b?w=400&q=80',  // Expert Full Stack Bundle
    6  => 'https://images.unsplash.com/photo-1547658719-da2b51169166?w=400&q=80',     // Responsive Design Pro
    7  => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&q=80',     // Backend Logic Masterclass
    8  => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400&q=80',     // UI/UX Glassmorphism Kit
    9  => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&q=80',  // Headphones
    10 => 'https://images.unsplash.com/photo-1587831990711-23ca6441447b?w=400&q=80',  // Full Stack Duplicate
    11 => 'https://images.unsplash.com/photo-1547658719-da2b51169166?w=400&q=80',     // Responsive Duplicate
    12 => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&q=80',     // Backend Duplicate
    13 => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400&q=80',     // UI/UX Duplicate
];

// Keyword-based fallback image map (matches product name automatically)
function getImageByName($name) {
    $name = strtolower($name);
    if (str_contains($name, 'watch'))      return 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&q=80';
    if (str_contains($name, 'iphone') || str_contains($name, 'phone')) return 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=400&q=80';
    if (str_contains($name, 'macbook') || str_contains($name, 'laptop')) return 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=400&q=80';
    if (str_contains($name, 'headphone') || str_contains($name, 'audio') || str_contains($name, 'earphone')) return 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&q=80';
    if (str_contains($name, 'tablet') || str_contains($name, 'ipad')) return 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=400&q=80';
    if (str_contains($name, 'camera'))    return 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?w=400&q=80';
    if (str_contains($name, 'speaker'))   return 'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=400&q=80';
    if (str_contains($name, 'keyboard'))  return 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=400&q=80';
    if (str_contains($name, 'mouse'))     return 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=400&q=80';
    if (str_contains($name, 'monitor') || str_contains($name, 'screen')) return 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=400&q=80';
    if (str_contains($name, 'ui') || str_contains($name, 'design') || str_contains($name, 'ux')) return 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400&q=80';
    if (str_contains($name, 'backend') || str_contains($name, 'server')) return 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&q=80';
    if (str_contains($name, 'responsive') || str_contains($name, 'web')) return 'https://images.unsplash.com/photo-1547658719-da2b51169166?w=400&q=80';
    if (str_contains($name, 'stack') || str_contains($name, 'full')) return 'https://images.unsplash.com/photo-1587831990711-23ca6441447b?w=400&q=80';
    // Default tech image
    return 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=400&q=80';
}
?>

<!-- Hero Section -->
<div class="container-fluid text-white py-5 mb-5 hero-section">
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

<!-- Features Row -->
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

    <!-- Products Section -->
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

                // Priority 1: Use image_url from database if it exists
                // Priority 2: Use ID-based map
                // Priority 3: Auto-detect by product name
                if (!empty($row['image_url'])) {
                    $imgUrl = $row['image_url'];
                } elseif (isset($cdnImageMap[$productId])) {
                    $imgUrl = $cdnImageMap[$productId];
                } else {
                    $imgUrl = getImageByName($row['name']);
                }
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100 product-card overflow-hidden">
                        <div class="position-relative bg-light d-flex align-items-center justify-content-center" style="height: 220px; overflow: hidden;">
                            <img src="<?php echo htmlspecialchars($imgUrl); ?>" 
                                 class="product-img" 
                                 style="width: 100%; height: 220px; object-fit: cover;" 
                                 alt="<?php echo htmlspecialchars($row['name']); ?>"
                                 onerror="this.src='https://images.unsplash.com/photo-1518770660439-4636190af475?w=400&q=80';">
                            
                            <div class="position-absolute top-0 start-0 m-2">
                                <span class="badge bg-dark rounded-pill shadow-sm">New Arrival</span>
                            </div>

                            <!-- Hover overlay -->
                            <div class="product-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                                <span class="text-white fw-bold small">Quick View</span>
                            </div>
                        </div>
                        
                        <div class="card-body p-4 text-center d-flex flex-column">
                            <div class="mb-2">
                                <div class="text-warning small">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
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
    /* Hero Section */
    .hero-section {
        background: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), 
                    url('https://images.unsplash.com/photo-1518770660439-4636190af475?w=1400&q=80');
        background-size: cover;
        background-position: center;
        min-height: 400px;
    }

    /* Product Cards */
    .product-card { 
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); 
        border: 1px solid #f0f0f0 !important; 
        background: #fff; 
    }
    .product-card:hover { 
        transform: translateY(-8px); 
        box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important; 
        border-color: #0d6efd !important; 
    }

    /* Product Image Zoom on Hover */
    .product-img {
        transition: transform 0.4s ease;
    }
    .product-card:hover .product-img {
        transform: scale(1.08);
    }

    /* Hover Overlay */
    .product-overlay {
        background: rgba(13, 110, 253, 0.0);
        transition: background 0.3s ease;
        cursor: pointer;
    }
    .product-card:hover .product-overlay {
        background: rgba(13, 110, 253, 0.25);
    }
    .product-overlay span {
        opacity: 0;
        transition: opacity 0.3s ease;
        background: rgba(0,0,0,0.6);
        padding: 8px 20px;
        border-radius: 20px;
    }
    .product-card:hover .product-overlay span {
        opacity: 1;
    }

    /* Button */
    .transition-btn { transition: background 0.3s ease; }
    .transition-btn:hover { background: #0d6efd; border-color: #0d6efd; }

    /* Misc */
    .x-small { font-size: 0.75rem; }
</style>

<?php include 'includes/footer.php'; ?>