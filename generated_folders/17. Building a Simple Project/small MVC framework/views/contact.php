<!-- /views/contact.php -->
<h2>Contact Us</h2>
<p>If you have any questions or would like to get in touch, please use the form below:</p>

<form action="/submit-contact" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>

    <button type="submit">Submit</button>
</form>