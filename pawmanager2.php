<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PawManager - Your favorite pet store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #9fcf26;
            --primary-dark: #85c91a;
            --primary-light: #c5e97b;
            --secondary: #efacf6;
            --accent: #e74c3c;
            --dark: #333;
            --light: #f9f9f9;
            --gray: #777;
            --border-radius: 12px;
            --shadow: 0 4px 12px rgba(0,0,0,0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4efe9 100%);
            color: var(--dark);
            line-height: 1.6;
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
            background: white;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-image {
            height: 60px;
            width: auto;
            transition: var(--transition);
            border-radius: 10px;
            object-fit: cover;
        }

        .logo-image:hover {
            transform: scale(1.05);
        }

        .logo-text {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--dark);
            text-decoration: none;
        }

        .search-bar {
            flex: 1;
            margin: 0 30px;
            position: relative;
        }

        .search-bar input {
            width: 100%;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 30px;
            font-size: 16px;
            outline: none;
            transition: var(--transition);
            background: #f8f9fa;
        }

        .search-bar input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(159, 207, 38, 0.2);
        }

        .search-bar i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .icons {
            display: flex;
            gap: 20px;
        }

        .icon {
            font-size: 1.5rem;
            cursor: pointer;
            position: relative;
            transition: var(--transition);
            padding: 8px;
            border-radius: 50%;
        }

        .icon:hover {
            background: #f0f0f0;
            transform: translateY(-2px);
        }

        .cart-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            background: var(--accent);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: bold;
        }

        /* Navigation */
        nav {
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
            padding: 12px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 5px;
        }

        nav li {
            position: relative;
        }

        nav a {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            text-decoration: none;
            color: var(--dark);
            font-weight: 600;
            border-radius: 30px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        nav a:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--secondary);
            transition: var(--transition);
            z-index: -1;
        }

        nav a:hover:before,
        nav a.active:before {
            left: 0;
        }

        nav a:hover,
        nav a.active {
            color: white;
            transform: translateY(-2px);
        }

        .category-icon {
            font-size: 1.2rem;
        }

        .badge {
            position: absolute;
            top: -5px;
            right: 5px;
            background: var(--accent);
            color: white;
            border-radius: 12px;
            padding: 3px 8px;
            font-size: 0.6rem;
            font-weight: bold;
        }

        /* Breadcrumb */
.breadcrumb {
    padding: 15px 40px;
    background: rgba(255,255,255,0.8);
    backdrop-filter: blur(10px);
    font-size: 0.9rem;
    border-bottom: 1px solid #eee;
}

.breadcrumb a {
    color: var(--primary-dark);
    text-decoration: none;
    transition: var(--transition);
}

.breadcrumb a:hover {
    color: var(--accent);
}

.breadcrumb span {
    color: var(--gray);
}

.breadcrumb-separator {
    margin: 0 10px;
    color: var(--gray);
}

        /* Dropdown Menu */
        .dropdown {
            position: relative;
        }

        .submenu {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            box-shadow: var(--shadow);
            list-style: none;
            min-width: 220px;
            padding: 10px 0;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: var(--transition);
        }

        .submenu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .submenu li {
            margin: 0;
        }

        .submenu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px !important;
            color: var(--dark) !important;
            text-decoration: none !important;
            font-weight: normal !important;
            background: white !important;
            border-radius: 0 !important;
        }

        .submenu a:before {
            display: none;
        }

        .submenu a:hover {
            background: var(--secondary) !important;
            color: white !important;
            transform: none;
        }

        /* Main Content */
        main {
            padding: 40px;
            background: white;
            border-radius: var(--border-radius);
            margin: 20px 40px;
            box-shadow: var(--shadow);
        }

        .section-title {
            font-size: 2.2rem;
            color: var(--dark);
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        .promo-highlight {
            color: var(--accent);
            font-weight: 800;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        /* Product Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .product-card {
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: var(--transition);
            background: white;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.15);
        }

        .product-image {
            position: relative;
            height: 220px;
            background: linear-gradient(135deg, #f0f0f0, #e0e0e0);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image img {
            max-width: 90%;
            max-height: 180px;
            transition: var(--transition);
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .discount-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: var(--accent);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.85rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .product-info {
            padding: 20px;
        }

        .product-title {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .product-description {
            font-size: 0.85rem;
            color: var(--gray);
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .product-pricing {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .original-price {
            text-decoration: line-through;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .current-price {
            color: var(--accent);
            font-weight: bold;
            font-size: 1.2rem;
        }

        .product-action {
            display: block;
            text-align: center;
            margin-top: 15px;
            padding: 10px;
            background: var(--light);
            border-radius: 6px;
            font-size: 0.9rem;
            text-decoration: none;
            color: var(--dark);
            font-weight: 600;
            transition: var(--transition);
            border: 1px solid #e0e0e0;
        }

        .product-action:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Auth Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s;
        }

        .modal-content {
            background: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: var(--border-radius);
            width: 90%;
            max-width: 480px;
            position: relative;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            animation: slideIn 0.4s;
        }

        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideIn { from { transform: translateY(-30px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }

        .close {
            position: absolute;
            right: 15px;
            top: 15px;
            font-size: 24px;
            font-weight: bold;
            color: var(--gray);
            cursor: pointer;
            background: none;
            border: none;
            transition: var(--transition);
        }

        .close:hover {
            color: var(--dark);
            transform: rotate(90deg);
        }

        .auth-section h2 {
            margin-bottom: 8px;
            color: var(--dark);
            font-size: 1.8rem;
        }

        .auth-section p {
            color: var(--gray);
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-row {
            display: flex;
            gap: 12px;
        }

        .form-row .form-group {
            margin-bottom: 0;
        }

        .half {
            flex: 1;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(159, 207, 38, 0.2);
        }

        /* Password Toggle */
        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
            font-size: 14px;
        }

        /* Checkbox */
        .checkbox-label {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 14px;
            color: var(--gray);
        }

        .checkbox-label input[type="checkbox"] {
            margin-top: 4px;
        }

        /* Links */
        .forgot-password,
        .form-footer a {
            color: var(--primary-dark);
            text-decoration: none;
            font-size: 14px;
            transition: var(--transition);
        }

        .forgot-password:hover,
        .form-footer a:hover {
            color: var(--accent);
            text-decoration: underline;
        }

        /* Primary Button */
        .btn-primary {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin: 20px 0;
            transition: var(--transition);
            box-shadow: 0 4px 10px rgba(159, 207, 38, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(159, 207, 38, 0.4);
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 40px;
            margin-top: 40px;
            text-align: center;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            text-align: left;
        }

        .footer-section h3 {
            margin-bottom: 20px;
            color: var(--primary);
            position: relative;
            display: inline-block;
        }

        .footer-section h3:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--primary);
        }

        .footer-section p, .footer-section a {
            color: #bbb;
            margin-bottom: 10px;
            display: block;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-section a:hover {
            color: var(--primary);
            padding-left: 5px;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            transition: var(--transition);
        }

        .social-icons a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #999;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                padding: 15px;
            }
            
            .logo-container {
                margin-bottom: 15px;
            }
            
            .search-bar {
                margin: 15px 0;
                width: 100%;
            }
            
            nav ul {
                flex-direction: column;
                gap: 5px;
            }
            
            main {
                margin: 10px;
                padding: 20px;
            }
            
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .footer-section h3:after {
                left: 50%;
                transform: translateX(-50%);
            }
        }

        @media (max-width: 600px) {
            .modal-content {
                margin: 10% auto;
                padding: 20px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .form-row select {
                margin-bottom: 12px;
            }
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header>
        <div class="logo-container">
            <img src="animal.jpg" alt="Logo PawManager" class="logo-image">
            <div class="logo-text">PฅwManager</div>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Rechercher un produit pour chien ou chat...">
            <i class="fas fa-search"></i>
        </div>

        <div class="icons">
            <div class="icon" id="userIcon">
                <i class="fas fa-user"></i>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-badge">0</span>
            </div>
        </div>
    </header>

    <!-- NAVIGATION -->
    <nav>
        <ul>
            <li><a href="#" data-path="home" class="active"><i class="fas fa-home category-icon"></i> HOME</a></li>

            <!-- CATS -->
            <li class="dropdown" id="cats-menu">
                <a href="cats.html" data-path="cats" data-label="Chats">
                    <i class="fas fa-cat category-icon"></i> CATS
                </a>
                <ul class="submenu">
                    <li><a href="#" data-path="cats" data-sub="Sleeping"><i class="fas fa-bed"></i> Sleeping</a></li>
                    <li><a href="#" data-path="cats" data-sub="Food"><i class="fas fa-utensils"></i> Food</a></li>
                    <li><a href="#" data-path="cats" data-sub="Litter"><i class="fas fa-toilet"></i> Litter</a></li>
                    <li><a href="#" data-path="cats" data-sub="Grooming &amp; Hygiene"><i class="fas fa-shower"></i> Grooming &amp; Hygiene</a></li>
                    <li><a href="#" data-path="cats" data-sub="Flea collars &amp; Pipettes"><i class="fas fa-bug"></i> Flea collars &amp; Pipettes</a></li>
                    <li><a href="#" data-path="cats" data-sub="Accessories &amp; Toys"><i class="fas fa-baseball-ball"></i> Accessories &amp; Toys</a></li>
                </ul>
            </li>
            
            <!-- DOGS -->
            <li class="dropdown" id="dogs-menu">
                <a href="#" data-path="dogs" data-label="Chiens">
                    <i class="fas fa-dog category-icon"></i> DOGS
                </a>
                <ul class="submenu">
                    <li><a href="#" data-path="dogs" data-sub="Dog Houses"><i class="fas fa-home"></i> Dog Houses</a></li>
                    <li><a href="#" data-path="dogs" data-sub="Food"><i class="fas fa-utensils"></i> Food</a></li>
                    <li><a href="#" data-path="dogs" data-sub="Grooming &amp; Hygiene"><i class="fas fa-shower"></i> Grooming &amp; Hygiene</a></li>
                    <li><a href="#" data-path="dogs" data-sub="Flea collars &amp; Pipettes"><i class="fas fa-bug"></i> Flea collars &amp; Pipettes</a></li>
                    <li><a href="#" data-path="dogs" data-sub="Accessories &amp; Toys"><i class="fas fa-baseball-ball"></i> Accessories &amp; Toys</a></li>
                </ul>
            </li>

            <li><a href="#" data-path="bunnies" data-label="Bunnies">
                <i class="fas fa-paw category-icon"></i> BUNNIES</a></li>
                
            <li>
                <a href="#" data-path="new" data-label="Nouveautés">
                    <i class="fas fa-bullhorn category-icon"></i> NEW
                    <span class="badge">NEW</span>
                </a>
            </li>
            
            <li>
                <a href="#" data-path="bestsellers" data-label="Meilleures ventes">
                    <i class="fas fa-gift category-icon"></i> BESTSELLERS
                    <span class="badge">AT BEST PRICE</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- BREADCRUMB -->
    <!-- BREADCRUMB -->
<div class="breadcrumb" id="breadcrumb">
    <a href="#" data-path="home">Home</a>
</div>

    <!-- MAIN CONTENT -->
    <main>
        <h1 class="section-title">Products <span class="promo-highlight">ON SALE</span></h1>

        <div class="products-grid">
            <!-- Produit 1 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200x200/e0e0e0/6c3415?text=Cage+de+Transport" alt="Cage de Transport">
                    <div class="discount-badge">-22%</div>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Cage de Transport</h3>
                    <p class="product-description">Cage de Transport Skudo 8 IATA pour Chiens et Chats – 118 x 80 x 88 cm</p>
                    <div class="product-pricing">
                        <span class="original-price">1 200,000 TND</span>
                        <span class="current-price">936,000 TND</span>
                    </div>
                    <a href="#" class="product-action">Voir le produit</a>
                </div>
            </div>

            <!-- Produit 2 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200x200/e0e0e0/6c3415?text=Cage+de+Transport" alt="Cage de Transport">
                    <div class="discount-badge">-5%</div>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Cage de Transport</h3>
                    <p class="product-description">Cage de Transport Skudo 6 IATA pour Chiens et Chats – 92 x 63 x 70 cm</p>
                    <div class="product-pricing">
                        <span class="original-price">432,000 TND</span>
                        <span class="current-price">410,400 TND</span>
                    </div>
                    <a href="#" class="product-action">Voir le produit</a>
                </div>
            </div>

            <!-- Produit 3 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200x200/e0e0e0/6c3415?text=Rongeur" alt="Rongeur">
                    <div class="discount-badge">-30%</div>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Rongeur</h3>
                    <p class="product-description">Cage Lapin BALDO MOCHA 140x68x43</p>
                    <div class="product-pricing">
                        <span class="original-price">480,000 TND</span>
                        <span class="current-price">336,000 TND</span>
                    </div>
                    <a href="#" class="product-action">Voir le produit</a>
                </div>
            </div>

            <!-- Produit 4 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200x200/e0e0e0/6c3415?text=Cage+de+Transport" alt="Cage de Transport">
                    <div class="discount-badge">-5%</div>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Cage de Transport</h3>
                    <p class="product-description">Cage de Transport Skudo 8 IATA pour Chiens et Chats – 118 x 80 x 88 cm</p>
                    <div class="product-pricing">
                        <span class="original-price">1 200,000 TND</span>
                        <span class="current-price">936,000 TND</span>
                    </div>
                    <a href="#" class="product-action">Voir le produit</a>
                </div>
            </div>

            <!-- Produit 5 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200x200/e0e0e0/6c3415?text=JOSI+cat" alt="JOSI cat">
                    <div class="discount-badge">-50,000 TND</div>
                </div>
                <div class="product-info">
                    <h3 class="product-title">JOSI cat</h3>
                    <p class="product-description">Croquettes pour chaton</p>
                    <div class="product-pricing">
                        <span class="current-price">450,000 TND</span>
                    </div>
                    <a href="#" class="product-action">Voir le produit</a>
                </div>
            </div>

            <!-- Produit 6 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://via.placeholder.com/200x200/e0e0e0/6c3415?text=Josera" alt="Josera">
                    <div class="discount-badge">-20%</div>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Josera</h3>
                    <p class="product-description">Alimentation pour chaton</p>
                    <div class="product-pricing">
                        <span class="original-price">120,000 TND</span>
                        <span class="current-price">96,000 TND</span>
                    </div>
                    <a href="#" class="product-action">Voir le produit</a>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>About PawManager</h3>
                <p>Your favorite pet store with the best products for your furry friends. We offer high-quality food, accessories, and care products for cats, dogs, and other pets.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="#">Home</a>
                <a href="#">Cats</a>
                <a href="#">Dogs</a>
                <a href="#">Bunnies</a>
                <a href="#">New Arrivals</a>
                <a href="#">Bestsellers</a>
            </div>
            
            <div class="footer-section">
                <h3>Customer Service</h3>
                <a href="#">Contact Us</a>
                <a href="#">Shipping Policy</a>
                <a href="#">Returns & Refunds</a>
                <a href="#">FAQ</a>
                <a href="#">Terms of Service</a>
                <a href="#">Privacy Policy</a>
            </div>
            
            <div class="footer-section">
                <h3>Contact Info</h3>
                <p><i class="fas fa-map-marker-alt"></i> 123 Pet Street, Zaghouan, Tunisia</p>
                <p><i class="fas fa-phone"></i> +216 12 345 678</p>
                <p><i class="fas fa-envelope"></i> info@pawmanager.com</p>
            </div>
        </div>
        
        <div class="copyright">
            &copy; 2025 PawManager. All rights reserved.
        </div>
    </footer>

    <!-- AUTH MODAL -->
    <div id="authModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>

            <!-- Login Form -->
            <div id="loginSection" class="auth-section">
                <div class="section-header">
                    <h2>Connexion</h2>
                    <p>Welcome! Connect to your account please.</p>
                </div>
                <form id="loginForm">
                    <div class="form-group">
                        <label for="loginEmail">Email</label>
                        <input type="email" id="loginEmail" placeholder="votre@email.com" required>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="loginPassword" placeholder="••••••••" required>
                            <button type="button" class="toggle-password" data-target="loginPassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="#" class="forgot-password">Forgotten password?</a>
                    </div>
                    <button type="submit" class="btn-primary">Connect</button>
                    <div class="form-footer">
                        No account? <a href="#" id="showSignup">Create account</a>
                    </div>
                </form>
            </div>

            <!-- Signup Form -->
            <div id="signupSection" class="auth-section" style="display:none;">
                <div class="section-header">
                    <h2>Create account</h2>
                    <p>Join PawManager and manage your favorite items, shopping cart and orders.</p>
                </div>
                <form id="signupForm">
                    <div class="form-row">
                        <div class="form-group half">
                            <label for="signupPrenom">Name</label>
                            <input type="text" id="signupPrenom" placeholder="Jean" required>
                        </div>
                        <div class="form-group half">
                            <label for="signupNom">Last name</label>
                            <input type="text" id="signupNom" placeholder="Dupont" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="signupEmail">Email</label>
                        <input type="email" id="signupEmail" placeholder="votre@email.com" required>
                    </div>
                    <div class="form-group">
                        <label for="signupPassword">Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="signupPassword" placeholder="••••••••" required>
                            <button type="button" class="toggle-password" data-target="signupPassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Date of birth</label>
                        <div class="form-row">
                            <select id="day" required>
                                <option value="">Day</option>
                            </select>
                            <select id="month" required>
                                <option value="">Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">Mai</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <select id="year" required>
                                <option value="">Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" id="signupNewsletter" checked>
                            Receive our newsletter (offers, news)
                        </label>
                    </div>
                    <button type="submit" class="btn-primary">Create my account</button>
                    <div class="form-footer">
                        Vous avez déjà un compte ? <a href="#" id="showLogin">Connect</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        const labels = {
            home: 'Home',
            cats: 'Cats',
            dogs: 'Dogs',
            bunnies: 'Bunnies',
            new: 'New Arrivals',
            bestsellers: 'Bestsellers'
        };

        // Close all submenus
        function closeAllSubmenus() {
            document.querySelectorAll('.submenu').forEach(menu => {
                menu.classList.remove('show');
            });
        }

        // Update breadcrumb
function updateBreadcrumb(path, sub = null) {
    const breadcrumb = document.getElementById('breadcrumb');
    
    if (path === 'home') {
        breadcrumb.innerHTML = '<a href="#" data-path="home">Home</a>';
        return;
    }

    const mainLabel = labels[path] || path;
    let html = `<a href="#" data-path="home">Home</a> <span class="breadcrumb-separator">/</span> <a href="#" data-path="${path}">${mainLabel}</a>`;

    if (sub) {
        html += ` <span class="breadcrumb-separator">/</span> <span>${sub}</span>`;
    }

    breadcrumb.innerHTML = html;

    // Reattach event listeners for breadcrumb
    breadcrumb.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            updateBreadcrumb(this.dataset.path);
        });
    });
}

        // Navigation click handlers
        document.querySelectorAll('nav a[data-path]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Close all submenus after click
                closeAllSubmenus();
                
                // Remove active class from all nav items
                document.querySelectorAll('nav a').forEach(item => {
                    item.classList.remove('active');
                });
                
                // Add active class to clicked item
                this.classList.add('active');
                
                const path = this.dataset.path;
                const sub = this.dataset.sub || null;
                updateBreadcrumb(path, sub);
            });
        });

        // Dropdown menus on hover
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            const submenu = dropdown.querySelector('.submenu');
            let closeTimer = null;

            const show = () => {
                clearTimeout(closeTimer);
                submenu.classList.add('show');
            };

            const hide = () => {
                closeTimer = setTimeout(() => {
                    submenu.classList.remove('show');
                }, 200);
            };

            dropdown.addEventListener('mouseenter', show);
            dropdown.addEventListener('mouseleave', hide);
        });

        // Populate date selectors for signup form
        function populateDateSelectors() {
            const daySelect = document.getElementById('day');
            const yearSelect = document.getElementById('year');

            // Days 1 to 31
            for (let i = 1; i <= 31; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                daySelect.appendChild(option);
            }

            // Years 1920 to 2025
            for (let i = 2025; i >= 1920; i--) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                yearSelect.appendChild(option);
            }
        }

        // Show/hide auth sections
        function showSection(sectionId) {
            document.getElementById('loginSection').style.display = 'none';
            document.getElementById('signupSection').style.display = 'none';
            document.getElementById(sectionId).style.display = 'block';
        }

        // Toggle password visibility
        function setupPasswordToggle() {
            document.querySelectorAll('.toggle-password').forEach(btn => {
                btn.addEventListener('click', function() {
                    const targetId = this.dataset.target;
                    const input = document.getElementById(targetId);
                    const type = input.type === 'password' ? 'text' : 'password';
                    input.type = type;
                    this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
                });
            });
        }

        // Modal functionality
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('authModal');
            const userIcon = document.getElementById('userIcon');
            const closeBtn = document.querySelector('.close');

            // Open modal on user icon click
            userIcon.addEventListener('click', function(e) {
                e.preventDefault();
                modal.style.display = 'block';
                showSection('loginSection'); // Default: login
            });

            // Close modal on X click
            closeBtn.addEventListener('click', () => modal.style.display = 'none');

            // Close modal when clicking outside
            window.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });

            // Switch between login and signup
            document.getElementById('showSignup').addEventListener('click', (e) => {
                e.preventDefault();
                showSection('signupSection');
            });
            
            document.getElementById('showLogin').addEventListener('click', (e) => {
                e.preventDefault();
                showSection('loginSection');
            });

            // Form submission (simulated)
            document.getElementById('loginForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const email = document.getElementById('loginEmail').value;
                alert(`✅ Simulé : connexion de ${email}`);
                modal.style.display = 'none';
            });

            document.getElementById('signupForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const email = document.getElementById('signupEmail').value;
                alert(`✅ Simulé : compte créé pour ${email}`);
                modal.style.display = 'none';
            });

            // Initialize
            populateDateSelectors();
            setupPasswordToggle();
        });
    </script>
</body>
</html>