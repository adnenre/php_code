<!-- /views/services.php -->
<div class="services-container">
    <h2>Our Services</h2>
    <div class="services-list">
        <?php foreach ($services as $service): ?>
            <div class="card">
                <h5><?php echo htmlspecialchars($service['title']); ?></h5>
                <p><?php echo htmlspecialchars($service['description']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>