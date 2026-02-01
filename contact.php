<?php 
include 'includes/config.php'; 
include 'includes/header.php'; 

$statusMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($message)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
            if ($stmt->execute([$name, $email, $message])) {
                $statusMsg = "<p class='status-success'>Message sent successfully! We will get back to you soon.</p>";
            }
        } catch (PDOException $e) {
            $statusMsg = "<p class='status-error'>Oops! Something went wrong. Please try again later.</p>";
        }
    }
}
?>

<section class="contact-section">
    <div class="contact-container">
        <div class="contact-info">
            <h2>Get in Touch</h2>
            <p>We’d love to hear from you! For questions, feedback, or business inquiries, feel free to contact us.</p>
            <p><strong>Email:</strong> support@kapekuripot.com</p>
            <p><strong>Phone:</strong> +63 912 345 6789</p>
            <p><strong>Address:</strong> Pureza, Sta. Mesa, Manila</p>
        </div>

        <div class="contact-form-box">
            <h3>Send Us a Message</h3>
            <?php echo $statusMsg; ?>
            
            <form action="contact.php" method="POST">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                <button type="submit" class="btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>