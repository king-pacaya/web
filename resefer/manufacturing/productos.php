<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.svg"> <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.1/iconify.min.js"></script>
    <title>Productos - Resefer Manufacturing</title>
    <style>
        * {
            font-family: 'Montserrat', sans-serif;
            box-sizing: border-box;
        }
        :root {
            --blue: #0100FE;
            --black: #0D0D0D;
            --white: #F2F2F2;
            --orange: #E4410A;
            --light-gray: #F8F9FA;
            --medium-gray: #E9ECEF;
            --dark-gray: #DEE2E6;
        }
        body {
            background-color: var(--white);
            color: var(--black);
            scroll-behavior: smooth;
        }
        .bg-blue-custom { background-color: var(--blue); }
        .text-blue-custom { color: var(--blue); }
        .bg-black-custom { background-color: var(--black); }
        .text-black-custom { color: var(--black); }
        .bg-white-custom { background-color: var(--white); }
        .text-white-custom { color: var(--white); }
        .text-orange-custom { color: var(--orange); }
        .bg-light-gray { background-color: var(--light-gray); }
        .bg-medium-gray { background-color: var(--medium-gray); }

        /* Top Navigation */
        .top-nav {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            z-index: 1000;
            top: 0;
            transition: top 0.3s ease-in-out; /* Smooth transition for hiding/showing */
        }
        .top-nav.hidden-nav {
            top: -100px; /* Hide completely */
        }
        .top-nav a {
            color: var(--black);
            position: relative;
        }
        .top-nav a:hover {
            color: var(--blue);
        }
        .top-nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: var(--blue);
            transition: width 0.3s ease;
        }
        .top-nav a:hover::after {
            width: 100%;
        }

        /* Dropdown specific styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: var(--white);
            min-width: 180px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 0.375rem;
            overflow: hidden;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            border: 1px solid var(--medium-gray);
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content a {
            color: var(--black);
            padding: 0.75rem 1rem;
            text-decoration: none;
            display: block;
            white-space: nowrap;
            position: relative;
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .dropdown-content a:hover {
            background-color: var(--light-gray);
            color: var(--blue);
        }
        .dropdown-content a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--blue);
            transition: width 0.3s ease;
        }
        .dropdown-content a:hover::after {
            width: 100%;
        }

        /* Mobile Dropdown */
        .mobile-dropdown-content {
            display: none;
            flex-direction: column;
            padding-left: 1rem;
            border-left: 2px solid var(--medium-gray);
            margin-top: 0.5rem;
        }
        .mobile-dropdown-content.open {
            display: flex;
        }
        .mobile-dropdown-content a {
            padding: 0.5rem 0;
            color: var(--black);
            font-size: 0.95rem;
            transition: color 0.2s ease;
        }
        .mobile-dropdown-content a:hover {
            color: var(--blue);
        }

        /* Section Titles */
        .section-title {
            position: relative;
            display: inline-block;
            padding-bottom: 12px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 4px;
            bottom: 0;
            left: 0;
            background: linear-gradient(90deg, var(--blue), transparent);
            border-radius: 2px;
        }

        /* Hero section for products page */
        .products-hero {
            background-color: var(--light-gray);
            padding-top: 6rem;
            padding-bottom: 4rem;
            text-align: center;
            border-bottom: 1px solid var(--medium-gray);
        }
        .products-hero h1 {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1rem;
        }
        .products-hero p {
            font-size: 1.25rem;
            color: #5a678d;
            font-weight: 500;
        }

        /* Main content */
        .products-container {
            padding: 4rem 0;
        }

        /* Category filter */
        .category-filter {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 2rem;
            justify-content: center;
        }
        .category-btn {
            padding: 0.5rem 1.25rem;
            border-radius: 0; /* No border-radius */
            background-color: var(--white);
            border: 1px solid var(--medium-gray);
            color: var(--black);
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .category-btn:hover, .category-btn.active {
            background-color: var(--blue);
            color: var(--white);
            border-color: var(--blue);
        }

        /* Product Card Styles - HORIZONTAL LAYOUT */
        .product-card {
            background-color: var(--white);
            border-radius: 0.75rem; /* Keep card border radius */
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            display: flex; /* Make cards horizontal */
            flex-direction: row; /* Make cards horizontal */
            height: auto;
            min-height: 250px; /* Minimum height for horizontal cards */
            border: 1px solid var(--medium-gray);
            align-items: stretch; /* Stretch content to fill height */
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-color: var(--blue);
        }
        
        .product-content {
            padding: 1.5rem;
            flex-grow: 1; /* Allows content to take remaining space */
            display: flex;
            flex-direction: column;
            overflow: auto; /* Allow scrolling if content is too long */
        }
        .product-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--blue);
            margin-bottom: 0.75rem;
        }
        .product-description {
            color: #364057;
            line-height: 1.6;
            margin-bottom: 1.25rem;
            flex-grow: 1; /* Pushes the download button to the bottom */
        }
        
        /* Image display below description */
        .product-images-display {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
            margin-bottom: 1.5rem;
            justify-content: center;
            padding: 0.5rem;
            background-color: var(--light-gray);
            border: 1px solid var(--medium-gray);
            border-radius: 0.5rem; /* Small radius for the image container */
        }
        .product-images-display.no-images {
            background-color: var(--medium-gray);
            color: #6c757d;
            height: 120px;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            font-weight: 500;
            text-align: center;
            border-style: dashed;
            border-color: var(--dark-gray);
        }
        .product-images-display.no-images .iconify {
            font-size: 3rem;
            color: #adb5bd;
            margin-bottom: 0.5rem;
        }

        .product-thumbnail-grid {
            width: auto;
            height: 160px;
            object-fit: cover;
            border: 1px solid var(--dark-gray);
            border-radius: 0; /* No border-radius for images */
            transition: transform 0.2s ease, border-color 0.2s ease;
        }
        .product-thumbnail-grid:hover {
            transform: scale(1.05);
            border-color: var(--blue);
        }

        /* Style for single image card */
        .product-images-display.single-image .product-thumbnail-grid {
            width: 80%; /* Make single image larger */
            max-width: 250px;
            height: 180px;
            object-fit: contain; /* Contain for single large image */
            background-color: var(--white); /* White background for image */
        }

        /* Styles for Download Button */
        .download-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background-color: var(--blue);
            color: var(--white);
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
            border: 1px solid var(--blue); /* Defined border */
            border-radius: 0; /* No border-radius */
        }
        .download-button:hover {
            background-color: #0000CC; /* Darker blue on hover */
        }
        .product-actions {
            margin-top: auto; /* Pushes actions to the bottom */
            padding-top: 1rem;
            border-top: 1px solid var(--medium-gray);
            display: flex;
            justify-content: center;
        }

        /* Specifications section */
        .specs-section {
            margin-top: 1.5rem;
        }
        .specs-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--black);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
        }
        .specs-title .iconify {
            margin-right: 0.5rem;
            color: var(--blue);
        }
        
        /* Tables */
        .spec-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 0 0 1px var(--medium-gray);
        }
        .spec-table th {
            background-color: var(--light-gray);
            color: var(--black);
            font-weight: 600;
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid var(--medium-gray);
        }
        .spec-table td {
            padding: 0.75rem;
            border-bottom: 1px solid var(--medium-gray);
            background-color: var(--white);
        }
        .spec-table tr:last-child td {
            border-bottom: none;
        }
        .spec-table tr:hover td {
            background-color: var(--light-gray);
        }
        
        /* Repuestos list */
        .repuestos-list {
            list-style: none;
            padding-left: 0;
            margin-top: 0.5rem;
        }
        .repuestos-list li {
            padding: 0.5rem 0;
            border-bottom: 1px dashed var(--medium-gray);
            display: flex;
            justify-content: space-between;
        }
        .repuestos-list li:last-child {
            border-bottom: none;
        }
        .repuesto-empresa {
            color: var(--blue);
            font-weight: 500;
        }

        /* Mobile Menu */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 80%;
            max-width: 320px;
            height: 100vh;
            background-color: var(--white);
            z-index: 1100;
            transition: right 0.3s ease;
            padding: 2rem;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }
        .mobile-menu.open {
            right: 0;
        }
        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1099;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }
        .mobile-menu-overlay.open {
            opacity: 1;
            pointer-events: all;
        }

        /* WhatsApp Button */
        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--blue); /* Using --blue variable */
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 999;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        .whatsapp-button:hover {
            transform: scale(1.1);
            background-color: #0000CC; /* Darker blue on hover */
        }


        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .product-card {
                flex-direction: column; /* Stack vertically on smaller screens */
                min-height: auto;
            }
        }

        @media (max-width: 768px) {
            .products-hero h1 {
                font-size: 2.25rem;
            }
            .products-hero p {
                font-size: 1.1rem;
            }
            .product-title {
                font-size: 1.3rem;
            }
            .product-images-display {
                padding: 0.5rem;
            }
            .product-thumbnail-grid {
                width: 180px;
                height: auto;
            }
            .product-images-display.single-image .product-thumbnail-grid {
                width: 100%;
                max-width: 200px;
                height: 150px;
            }
        }

        /* Animation */
        .animate-fade-in {
            opacity: 0;
            animation: fadeIn 0.8s forwards;
        }
        @keyframes fadeIn {
            to { opacity: 1; }
        }
    </style>
</head>
<body class="overflow-x-hidden">
    <nav class="top-nav py-4">
        <div class="container mx-auto px-4 md:px-8 flex justify-between items-center">
            <a href="index.html" class="text-2xl font-bold">
                <span class="text-black-custom">RESEFER</span> <span class="text-blue-custom">MANUFACTURING</span>
            </a>
            <div class="hidden md:flex space-x-8 items-center">
                <a href="index.html#about" class="font-medium">Nosotros</a>
                <a href="index.html#services" class="font-medium">Servicios</a>
                <div class="dropdown">
                    <a href="productos.php" class="font-medium text-blue-custom">
                        Productos <span class="iconify inline-block ml-1" data-icon="heroicons:chevron-down-20-solid"></span>
                    </a>
                    <div class="dropdown-content">
                        <a href="productos.php?category=Perforacion">Perforación</a>
                        <a href="productos.php?category=Sostenimiento">Sostenimiento</a>
                        <a href="productos.php?category=Desate">Desate</a>
                        <a href="productos.php?category=Utilitario">Utilitario</a>
                        <a href="productos.php?category=Otros">Otros</a>
                    </div>
                </div>
                <a href="index.html#clients" class="font-medium">Clientes</a>
                <a href="index.html#contact" class="font-medium">Contacto</a>
            </div>
            <button id="mobile-menu-button" class="md:hidden text-black-custom">
                <span class="iconify text-3xl" data-icon="heroicons:bars-3"></span>
            </button>
        </div>
    </nav>

    <div id="mobile-menu-overlay" class="mobile-menu-overlay"></div>
    <div id="mobile-menu" class="mobile-menu">
        <div class="flex justify-end mb-8">
            <button id="mobile-menu-close" class="text-black-custom">
                <span class="iconify text-3xl" data-icon="heroicons:x-mark"></span>
            </button>
        </div>
        <div class="flex flex-col space-y-6">
            <a href="index.html#about" class="text-xl font-medium py-2 border-b border-gray-200">Nosotros</a>
            <a href="index.html#services" class="text-xl font-medium py-2 border-b border-gray-200">Servicios</a>
            <div class="relative">
                <button id="mobile-products-button" class="text-xl font-medium py-2 w-full text-left flex justify-between items-center border-b border-gray-200 text-blue-custom">
                    Productos <span class="iconify text-2xl" data-icon="heroicons:chevron-down-20-solid"></span>
                </button>
                <div id="mobile-products-dropdown" class="mobile-dropdown-content">
                    <a href="productos.php?category=Perforacion" class="py-1">Perforación</a>
                    <a href="productos.php?category=Sostenimiento" class="py-1">Sostenimiento</a>
                    <a href="productos.php?category=Desate" class="py-1">Desate</a>
                    <a href="productos.php?category=Utilitario" class="py-1">Utilitario</a>
                    <a href="productos.php?category=Otros" class="py-1">Otros</a>
                </div>
            </div>
            <a href="index.html#clients" class="text-xl font-medium py-2 border-b border-gray-200">Clientes</a>
            <a href="index.html#contact" class="text-xl font-medium py-2 border-b border-gray-200">Contacto</a>
        </div>
    </div>

    <header class="products-hero">
        <div class="container mx-auto px-4 md:px-8">
            <?php
            $category_name = isset($_GET['category']) ? htmlspecialchars($_GET['category']) : 'Todas las Categorías';
            echo '<h1 class="text-black-custom section-title animate-fade-in">';
            echo 'Nuestros <span class="text-blue-custom">Productos</span>';
            echo '</h1>';
            echo '<p class="text-gray-700 animate-fade-in" style="animation-delay: 0.2s;">Explora nuestros equipos para la industria minera</p>';
            ?>
        </div>
    </header>

    <main class="products-container">
        <div class="container mx-auto px-4 md:px-8">
            <div class="category-filter animate-fade-in" style="animation-delay: 0.3s;">
                <a href="productos.php" class="category-btn <?php echo !isset($_GET['category']) ? 'active' : ''; ?>">Todos</a>
                <a href="productos.php?category=Perforacion" class="category-btn <?php echo (isset($_GET['category']) && $_GET['category'] === 'Perforacion') ? 'active' : ''; ?>">Perforación</a>
                <a href="productos.php?category=Sostenimiento" class="category-btn <?php echo (isset($_GET['category']) && $_GET['category'] === 'Sostenimiento') ? 'active' : ''; ?>">Sostenimiento</a>
                <a href="productos.php?category=Desate" class="category-btn <?php echo (isset($_GET['category']) && $_GET['category'] === 'Desate') ? 'active' : ''; ?>">Desate</a>
                <a href="productos.php?category=Utilitario" class="category-btn <?php echo (isset($_GET['category']) && $_GET['category'] === 'Utilitario') ? 'active' : ''; ?>">Utilitario</a>
                <a href="productos.php?category=Otros" class="category-btn <?php echo (isset($_GET['category']) && $_GET['category'] === 'Otros') ? 'active' : ''; ?>">Otros</a>
            </div>

            <div class="grid grid-cols-1 gap-8">
                <?php
                // Ruta al archivo JSON
                $json_file = 'productos.json';

                // Función para formatear el texto, convirtiendo **texto** a <strong>texto</strong>
                function format_bold_text($text) {
                    // Reemplaza **texto** con <strong>texto</strong>
                    $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);
                    // Convierte saltos de línea a <br />
                    return nl2br($text);
                }

                // Verificar si el archivo JSON existe
                if (file_exists($json_file)) {
                    // Leer el contenido del archivo JSON
                    $json_data = file_get_contents($json_file);
                    // Decodificar el JSON a un array asociativo de PHP
                    $productos_data = json_decode($json_data, true);

                    $selected_category = isset($_GET['category']) ? $_GET['category'] : null;
                    $found_products = false;

                    // Iterar sobre las categorías principales (Perforacion, Sostenimiento, etc.)
                    foreach ($productos_data as $categoria_key => $maquinarias) {
                        // Si no se seleccionó una categoría o la categoría coincide
                        if ($selected_category === null || $selected_category === $categoria_key) {
                            foreach ($maquinarias as $maquinaria_key => $maquinaria) {
                                $found_products = true;
                                $nombre = htmlspecialchars($maquinaria['nombre']);
                                $informacion = format_bold_text($maquinaria['informacion']);
                                $modelos = $maquinaria['modelos'] ?? [];
                                $fotos_carpeta = $maquinaria['fotos_carpeta'] ?? '';
                                $ficha_tecnica_path = $maquinaria['ficha_tecnica'] ?? '';

                                // Lógica para obtener TODAS las imágenes para mostrar
                                $product_images = [];
                                $default_image = 'multimedia/default-product.jpg'; // Imagen por defecto

                                if (!empty($fotos_carpeta) && is_dir($fotos_carpeta)) {
                                    $files = glob($fotos_carpeta . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
                                    if (!empty($files)) {
                                        $product_images = array_map('htmlspecialchars', $files);
                                    }
                                }
                                
                                $image_display_class = '';
                                if (empty($product_images)) {
                                    $image_display_class = 'no-images';
                                } elseif (count($product_images) === 1) {
                                    $image_display_class = 'single-image';
                                }
                ?>
                <div class="product-card animate-fade-in" style="animation-delay: 0.4s;">
                    <div class="product-content">
                        <h2 class="product-title"><?php echo $nombre; ?></h2>
                        <p class="product-description"><?php echo $informacion; ?></p>

                        <div class="product-images-display <?php echo $image_display_class; ?>">
                            <?php if (empty($product_images)): ?>
                                <span class="iconify" data-icon="mdi:image-off"></span>
                                <p>Sin imágenes disponibles</p>
                            <?php elseif (count($product_images) === 1): ?>
                                <img src="<?php echo $product_images[0]; ?>" alt="<?php echo $nombre; ?>" class="product-thumbnail-grid">
                            <?php else: ?>
                                <?php foreach ($product_images as $img_src): ?>
                                    <img src="<?php echo $img_src; ?>" alt="<?php echo $nombre; ?>" class="product-thumbnail-grid">
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($modelos)): ?>
                            <div class="specs-section">
                                <h3 class="specs-title">
                                    <span class="iconify" data-icon="mdi:ruler-square"></span>
                                    Modelos disponibles
                                </h3>
                                <div class="overflow-x-auto">
                                    <table class="spec-table">
                                        <thead>
                                            <tr>
                                                <th>Modelo</th>
                                                <?php
                                                // Obtener todas las claves de propiedades para los encabezados de la tabla
                                                $all_model_keys = [];
                                                foreach ($modelos as $model) {
                                                    foreach (array_keys($model) as $key) {
                                                        if ($key !== 'nombre_modelo' && !in_array($key, $all_model_keys)) {
                                                            $all_model_keys[] = $key;
                                                        }
                                                    }
                                                }
                                                // Sort keys for consistent table column order
                                                sort($all_model_keys);
                                                foreach ($all_model_keys as $key) {
                                                    echo '<th>' . ucfirst(str_replace('_', ' ', $key)) . '</th>';
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($modelos as $model): ?>
                                                <tr>
                                                    <td><strong><?php echo htmlspecialchars($model['nombre_modelo'] ?? 'N/A'); ?></strong></td>
                                                    <?php
                                                    foreach ($all_model_keys as $key) {
                                                        echo '<td>' . htmlspecialchars($model[$key] ?? 'N/A') . '</td>';
                                                    }
                                                    ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php
                        // Handle "capacidades_tanque" if it exists (e.g., for Anfo Loader)
                        if (isset($maquinaria['capacidades_tanque']) && !empty($maquinaria['capacidades_tanque'])): ?>
                            <div class="specs-section">
                                <h3 class="specs-title">
                                    <span class="iconify" data-icon="mdi:barrel"></span>
                                    Capacidades de tanque
                                </h3>
                                <div class="overflow-x-auto">
                                    <table class="spec-table">
                                        <thead>
                                            <tr>
                                                <th>Serie</th>
                                                <th>Capacidad (kg)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($maquinaria['capacidades_tanque'] as $capacidad): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($capacidad['serie'] ?? 'N/A'); ?></td>
                                                    <td><?php echo htmlspecialchars($capacidad['capacidad_kg'] ?? 'N/A'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($maquinaria['repuestos']) && !empty($maquinaria['repuestos'])): ?>
                            <div class="specs-section">
                                <h3 class="specs-title">
                                    <span class="iconify" data-icon="mdi:package-variant"></span>
                                    Repuestos disponibles
                                </h3>
                                <ul class="repuestos-list">
                                    <?php foreach ($maquinaria['repuestos'] as $repuesto): ?>
                                        <li>
                                            <span><?php echo htmlspecialchars($repuesto['nombre']); ?></span>
                                            <?php if (!empty($repuesto['empresa'])): ?>
                                                <span class="repuesto-empresa"><?php echo htmlspecialchars($repuesto['empresa']); ?></span>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="product-actions">
                            <a href="<?php echo !empty($ficha_tecnica_path) ? htmlspecialchars($ficha_tecnica_path) : '#'; ?>" <?php echo !empty($ficha_tecnica_path) ? 'download' : ''; ?> class="download-button">
                                <span class="iconify" data-icon="mdi:file-download"></span>
                                Descargar Ficha Técnica
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                            }
                        }
                    }

                    if (!$found_products) {
                        echo '<div class="col-span-full text-center py-12 animate-fade-in">';
                        echo '<div class="bg-light-gray rounded-xl p-8 inline-block">';
                        echo '<span class="iconify text-5xl text-blue-custom mb-4" data-icon="mdi:package-variant-remove"></span>';
                        echo '<h3 class="text-2xl font-semibold text-gray-700 mb-2">No se encontraron productos</h3>';
                        echo '<p class="text-gray-600">No hay productos disponibles para la categoría seleccionada.</p>';
                        echo '</div>';
                        echo '</div>';
                    }

                } else {
                    echo '<div class="col-span-full text-center py-12 animate-fade-in">';
                    echo '<div class="bg-red-100 rounded-xl p-8 inline-block max-w-2xl">';
                    echo '<span class="iconify text-5xl text-red-600 mb-4" data-icon="mdi:alert-circle"></span>';
                    echo '<h3 class="text-2xl font-semibold text-red-600 mb-2">Error al cargar los productos</h3>';
                    echo '<p class="text-gray-700 mb-4">El archivo <code class="font-mono bg-red-200 px-2 py-1 rounded">productos.json</code> no se encuentra en el servidor.</p>';
                    echo '<p class="text-gray-700">Asegúrate de que está en la misma carpeta que <code class="font-mono bg-red-200 px-2 py-1 rounded">productos.php</code>.</p>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </main>

    <a href="https://wa.me/+51975054580?text=Hola,%20estoy%20interesado%20en%20sus%20productos%20y%20me%20gustaría%20obtener%20más%20información." class="whatsapp-button" target="_blank" aria-label="Contactar por WhatsApp">
        <span class="iconify" data-icon="mdi:whatsapp"></span>
    </a>

    <footer class="bg-black-custom py-8 text-white-custom text-center text-sm">
        <div class="container mx-auto px-4">
            <p>&copy; 2024 Resefer Manufacturing. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const topNav = document.querySelector('.top-nav');
            let lastScrollY = window.scrollY;

            // Topnav hide/show on scroll
            window.addEventListener('scroll', () => {
                if (window.scrollY > lastScrollY && window.scrollY > 100) { // Scrolling down and past a threshold
                    topNav.classList.add('hidden-nav');
                } else if (window.scrollY < lastScrollY) { // Scrolling up
                    topNav.classList.remove('hidden-nav');
                }
                lastScrollY = window.scrollY;
            });

            // Mobile Menu Toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenuClose = document.getElementById('mobile-menu-close');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
            const mobileMenuLinks = mobileMenu.querySelectorAll('a');

            function toggleMobileMenu() {
                mobileMenu.classList.toggle('open');
                mobileMenuOverlay.classList.toggle('open');
                document.body.classList.toggle('overflow-hidden');
            }

            mobileMenuButton.addEventListener('click', toggleMobileMenu);
            mobileMenuClose.addEventListener('click', toggleMobileMenu);
            mobileMenuOverlay.addEventListener('click', toggleMobileMenu);

            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', toggleMobileMenu);
            });

            // Mobile Products Dropdown Toggle
            const mobileProductsButton = document.getElementById('mobile-products-button');
            const mobileProductsDropdown = document.getElementById('mobile-products-dropdown');

            mobileProductsButton.addEventListener('click', () => {
                mobileProductsDropdown.classList.toggle('open');
                const icon = mobileProductsButton.querySelector('.iconify');
                if (mobileProductsDropdown.classList.contains('open')) {
                    icon.setAttribute('data-icon', 'heroicons:chevron-up-20-solid');
                } else {
                    icon.setAttribute('data-icon', 'heroicons:chevron-down-20-solid');
                }
            });
        });
    </script>
</body>
</html>