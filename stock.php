<?php
declare(strict_types=1);

include "Cortez_Charlesheader.php";


$products = [
    "Mik-Mik Powder" => ["price" => 5.00, "stock" => 12],
    "Coke Mismo" => ["price" => 20.00, "stock" => 8],
    "Piattos" => ["price" => 25.00, "stock" => 4],
    "Choco Mucho" => ["price" => 15.00, "stock" => 15],
    "Nova" => ["price" => 23.00, "stock" => 6],
    "Mentos Mint" => ["price" => 10.00, "stock" => 30],
    "Cloud 9" => ["price" => 12.00, "stock" => 5]
];


$tax_rate = 12;


function get_reorder_message(int $stock): string {
    return ($stock < 10) ? "Yes" : "No";
}

function get_total_value(float $price, int $qty): float {
    return $price * $qty;
}


function get_tax_due(float $price, int $qty, int $tax_rate = 0): float {
    $totalValue = $price * $qty;
    return $totalValue * ($tax_rate / 100);
}
?>

<h1 style="text-align:center; margin-top:20px;">Store Stock Monitor</h1>

<table>
    <tr>
        <th>Product Name</th>
        <th>Stock</th>
        <th>Reorder?</th>
        <th>Total Value (₱)</th>
        <th>Tax Due (₱)</th>
    </tr>

    <?php foreach ($products as $product_name => $data): ?>
        <tr>
            <td><?= $product_name ?></td>
            <td><?= $data["stock"] ?></td>
            <td><?= get_reorder_message($data["stock"]) ?></td>
            <td><?= number_format(get_total_value($data["price"], $data["stock"]), 2) ?></td>
            <td><?= number_format(get_tax_due($data["price"], $data["stock"], $tax_rate), 2) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
include "Cortez_Charlesfooter.php";
?>
