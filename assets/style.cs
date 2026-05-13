/* Expert Ecommerce Styling */

:root {
    --primary-blue: #0d6efd;
    --dark-bg: #1a1a1a;
    --light-gray: #f8f9fa;
    --text-muted: #6c757d;
}

body {
    background-color: var(--light-gray);
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    color: #333;
}

/* Navbar Enhancement */
.navbar {
    padding: 1rem 0;
    border-bottom: 2px solid rgba(255,255,255,0.1);
}

.navbar-brand {
    font-size: 1.5rem;
    letter-spacing: 1px;
}

/* Product Card Styling */
.product-card {
    border: none;
    border-radius: 20px;
    background: #ffffff;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    overflow: hidden;
}

/* The "Expert" Hover Effect */
.product-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important;
}

.card-title {
    font-size: 1.1rem;
    margin-bottom: 0.5rem;
    color: var(--dark-bg);
}

/* Price Highlight */
.text-primary {
    color: var(--primary-blue) !important;
    letter-spacing: -0.5px;
}

/* Button Customization */
.btn-buy {
    background-color: var(--dark-bg);
    color: white;
    border: none;
    padding: 12px;
    border-radius: 12px;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    transition: 0.3s;
}

.btn-buy:hover {
    background-color: var(--primary-blue);
    color: white;
    box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);
}

/* Badge Styling */
.badge {
    font-size: 0.7rem;
    padding: 0.4em 0.6em;
}

/* Footer Design */
footer {
    border-top: 1px solid #dee2e6;
    font-size: 0.9rem;
}