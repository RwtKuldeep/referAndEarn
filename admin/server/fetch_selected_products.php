<?php
require '../pack/config.php';
// Assuming you have a database connection established

// Get the selected product IDs from the AJAX request
$selectedIds = $_POST['ids'];

// Fetch the selected products from the database based on the IDs
// Replace 'your_table_name' with your actual table name
$result = db("SELECT * FROM your_table_name WHERE id IN (".implode(',', $selectedIds).")");

if ($result) {
    // Create a PDF document
    $pdf = new PDF(); // Replace 'PDF' with your PDF generation library

    // Generate the catalog content
    while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row['id'];
        $productName = $row['product_name'];
        $size = $row['size'];
        $cbm = $row['cbm'];
        $quantity = $row['quantity'];
        $mrp = $row['mrp'];
        $cost = $row['cost'];

        // Add the product details to the PDF catalog
        $pdf->addProduct($productId, $productName, $size, $cbm, $quantity, $mrp, $cost);
    }

    // Output the PDF content
    $pdfData = $pdf->output(); // Replace 'output()' with the appropriate method from your PDF library

    // Return the PDF data as the response
    echo json_encode([
        'success' => true,
        'data' => base64_encode($pdfData) // Encode the PDF data as base64
    ]);
} else {
    // Return an error message if there's an issue with the database query
    echo json_encode([
        'success' => false,
        'message' => 'Error fetching selected products.'
    ]);
}

// Close the database connection if needed
mysqli_close($connection);
?>
