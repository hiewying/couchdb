<?php

require 'connector.php';
include 'utilities.php';

// Query View to display all movies
$all_docs = $client->getView('all', 'allMovies');

if($all_docs->total_rows == 0) {
    require 'resources/views/error.html';
}

// Remove Document
if(isset($_POST['remove'])) {
    $result = false;
    $result = delete($_POST['remove']);
    if($result) {
        include 'resources/views/notify.html';
        unset($_POST);
        echo '<!-- Reference to refresh content: https://stackoverflow.com/questions/10643626/refresh-page-after-form-submitting -->';
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

// Create Document
if(isset($_POST['create'])) {
    // Variables
    $title=trim($_POST['title']);
    $date=trim($_POST['date']);
    $genre=trim($_POST['genre']);
    $director=trim($_POST['director']);

    // Call to insert function and check if data insert successful
    $result = false;
    $result = insert($title,$date,$genre,$director);
    if($result) {
        include 'resources/views/notify.html';
        unset($_POST);
        echo '<!-- Reference to refresh content: https://stackoverflow.com/questions/10643626/refresh-page-after-form-submitting -->';
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

// Update Document
if(isset($_POST['update'])) {
    // Variables
    $_id=trim($_POST['id']);
    $title=trim($_POST['title']);
    $date=trim($_POST['date']);
    $genre=trim($_POST['genre']);
    $director=trim($_POST['director']);

    $result = false;  
    $result = update($_id,$title,$date,$genre,$director);
    if($result) {
        include 'resources/views/notify.html';
        unset($_POST);
        echo '<!-- Reference to refresh content: https://stackoverflow.com/questions/10643626/refresh-page-after-form-submitting -->';
        echo "<meta http-equiv='refresh' content='0'>";
    }        
}



echo "<table class='table table-hover table-dark'>";

echo "
    <thead>
        <th>Title</th>
        <th>Date</th>
        <th>Genre</th>
        <th>Director</th>
        
        <th>Actions</th>
    </thead> 
";

echo "<tbody>";

foreach ( $all_docs->rows as $row ) {
    echo "<tr>";
  
    populateTitle($row->value->title);

    populateDate($row->value->date);

    populateGenre($row->value->genre);

    populateDirector($row->value->director);

    // Action
    populateAction($row->value->_id, $row->value->_rev);

    echo "</tr>";
}


echo "</tbody>";

echo "</table>";

?>