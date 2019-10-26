<?php

require 'connector.php';
require 'utilities.php';

// Create View by calling function
try {
    // Prevent Conflict Exception when refresh page
    if(empty($client->getView('title', 'byGenre'))) {
        createView();
    }
} catch (Exception $e) {
    echo "<span class='text-danger'>ERROR: Failed to Create View</span><br>".$e;
    exit(1);
}

// Query View
$all_docs = $client->reduce(true)->group(true)->getView('title', 'byGenre');

if(empty($all_docs)) {
    require 'resources/views/error.html';
}

echo "<table class='table table-hover table-advance table-dark'>";

echo "
    <thead>
        <th>Title</th>
        <th>Total Genre(s)</th>
    </thead> 
";

echo "<tbody>";

foreach($all_docs->rows as $row) {
    echo "<tr>";
        populateTotalGenre($row);
    echo "</tr>";
}


echo "</tbody>";

echo "</table>";

?>