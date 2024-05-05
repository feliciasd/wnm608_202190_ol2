<?php 

include_once "../lib/php/functions.php";

$output = [];

$data = json_decode(file_get_contents("php://input"));

// print_p($data);

switch($data->type) {
	case "products_all":
		$output['result'] = makeQuery(makeConn(),
			"
			SELECT * 
			FROM `products` 
			ORDER BY `price` DESC 
			LIMIT 12");
		break;

	case "product_search":
		$output['result'] = makeQuery(makeConn(),
			"
			SELECT * 
			FROM `products` 
			WHERE 
				`name` LIKE '%$data->search%' OR
				`description` LIKE '%$data->search%' OR
				`colors` LIKE '%$data->search%'
				
			ORDER BY `price` DESC  
			LIMIT 12");
		break;

	case "product_filter":
		$output['result'] = makeQuery(makeConn(),
			"
			SELECT * 
			FROM `products` 
			WHERE 
				`$data->column` LIKE '$data->value'
			ORDER BY `price` DESC  
			LIMIT 12");
		break;

	case "products_sort":
    switch($data->sort) {
        case "price_desc":
            $sql = "SELECT * FROM `products` ORDER BY `price` DESC LIMIT 12";
            break;
        case "price_asc":
            $sql = "SELECT * FROM `products` ORDER BY `price` ASC LIMIT 12";
            break;
        case "newest":
            $sql = "SELECT * FROM `products` ORDER BY `date_added` DESC LIMIT 12";
            break;
        case "oldest":
            $sql = "SELECT * FROM `products` ORDER BY `date_added` ASC LIMIT 12";
            break;
        default:
            $output['error'] = "Invalid sort method";
            echo json_encode($output);
            return;
    }
    $output['result'] = makeQuery(makeConn(), $sql);
    break;


	default: $output['error'] = "No Valid Type";
}

echo json_encode($output,JSON_NUMERIC_CHECK/JSON_UNESCAPED_UNICODE);

