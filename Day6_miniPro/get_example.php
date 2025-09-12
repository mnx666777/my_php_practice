<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GET Example</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Search Products (GET method)</h2>

<!-- Form sends data as URL parameters -->
<form method="get" action="get_example.php">
    <label for="product">Product Name:</label><br>
    <input type="text" name="product" id="product" placeholder="e.g. Phone"><br><br>

    <label for="price">Max Price:</label><br>
    <input type="number" name="price" id="price" placeholder="e.g. 500"><br><br>

    <button type="submit">Search</button>
</form>

<?php
// Only run if the URL actually contains parameters
if (!empty($_GET)) {
    // Sanitize and display
    $product = htmlspecialchars($_GET['product']);
    $price   = htmlspecialchars($_GET['price']);

    if ($product && $price) {
        echo "<h3>Search Results:</h3>";
        echo "You searched for <strong>$product</strong> with a maximum price of <strong>\$$price</strong>.";
    } else {
        echo "<p>Please fill both fields.</p>";
    }

    echo "<hr>";
    // Show raw server/request info for learning
    echo "Query String: " . $_SERVER['QUERY_STRING'] . "<br>";
    echo "Request Method: " . $_SERVER['REQUEST_METHOD'];
}
?>

</body>
</html>
