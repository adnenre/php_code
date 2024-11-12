<!-- /views/layout.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link to the external CSS file -->


    <meta charset="UTF-8">
    <title><?php echo $title ?? 'My Website'; ?></title>
    <link rel="stylesheet" href="../public/css/style.css">

</head>

<body>
    <div class="main">
        <!-- Centered Navbar -->
        <nav class="navbar">
            <ul>
                <?php foreach ($navbarItems as $item): ?>
                    <li><a href="<?php echo htmlspecialchars($item['url']); ?>"><?php echo htmlspecialchars($item['title']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="wrapper">
            <!-- Main Content Area -->
            <div class="container">
                <?php echo $content ?? ''; ?>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer">
            <p>&copy; 2024 My Website. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>