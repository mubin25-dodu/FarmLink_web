<?php
session_start();
require_once '../models/db.php';
$data = json_decode(file_get_contents('php://input'), true);

if(isset($_SESSION['user_data']) && isset($data["status"])) {
    $seller_id = $_SESSION['user_data']['uid'];
    
    // Base query
    $baseQuery = "SELECT 
        o.odr_id,
        o.quantity,
        o.product_id,
        o.total_price,
        o.name AS customer_name,
        o.status,
        p.name AS product_name,
        p.unit_price,
        p.seller_id,
        p.unit
    FROM orders o
    JOIN product p ON o.product_id = p.product_id
    WHERE p.seller_id = '{$seller_id}'";
    
    // Add status filter based on request
    switch($data["status"]) {
        case "no":
            $query = $baseQuery . " AND o.status = 'Pending';";
            break;
        case "requested":
            $query = $baseQuery . " AND o.status = 'Pickup Requested';";
            break;
        case "accepted":
            $query = $baseQuery . " AND o.status = 'Accepted';";
            break;
        case "delivered":
            $query = $baseQuery . " AND o.status = 'Delivered';";
            break;
        case "process":
            $query = $baseQuery . " AND o.status = 'Processing';";
            break;
        case "history":
            $query = $baseQuery . ";";
            break;
        default:
            echo json_encode(["error" => "Invalid status"]);
            exit;
    }
    
    $result = read($query);
    echo json_encode($result);
}
?>