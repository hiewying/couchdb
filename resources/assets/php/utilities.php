<?php

// Function to populate title
function populateTitle($title) {
    if(isset($title)) {
        echo "<td>".$title."</td>";
    } else {
        echo "<td>-</td>";
    }
}

function populateDate($date) {
    if(isset($date)) {
        echo "<td>".$date."</td>";
    } else {
        echo "<td>-</td>";
    }
}

function populateGenre($genre) {
    if(isset($genre)) {
        echo "<td>".implode(', ', $genre)."</td>";
        
    } else {
        echo "<td>-</td>";
    }
}

function populateDirector($director) {
    if(isset($director)) {
        echo "<td>".$director."</td>";
    } else {
        echo "<td>-</td>";
    }
}

// Function to populate actions
function populateAction($_id, $_rev) {
    echo "<td>
    
    <form method='post' action=update.php style='margin: 0; padding:0; display: inline-block;'>
        <button type='submit' name='upd' id='upd' value='$_id' class='btn btn-warning btn-sm'>
            <i class='far fa-edit'></i> Edit
        </button>
    </form>

    <form method='post' action='index.php' style='margin: 0; padding: 0; display: inline-block;'>
        <button name='remove' id='remove' value='$_id' class='btn btn-danger btn-sm' type='submit' onclick=\"return confirm('Are you sure you want to delete this movie?')\">
            <i class='far fa-trash-alt'></i> Delete
        </button>
    </form>
    
    </td>";
}

// Create View that counts the total of genres
function createView() {

    require 'connector.php';

    /* Map Function */
    $map = "function(doc) {
        (doc.genre || []).forEach(function(genre){  
          var key = {title: doc.title, genre: doc.genre};
                     emit(key, 1);
       });
       }";

    $view = new stdClass();
    $view->_id = '_design/title';
    $view->language = 'javascript';
    $view->views = array('byGenre' => array('map' => $map, "reduce" => "_count"));

    $client->storeDoc($view);
}

// Populate Total Genre
function populateTotalGenre($row) {
    echo "<td>".$row->key."</td>";
    echo "<td>".$row->value."</td>";
}

// Delete Document with $_id
function delete($_id) {

    require 'connector.php';

    // Get Document
    try {
        $doc = $client->getDoc($_id);
    } catch (Exception $e) {
        echo "<p class='text-danger'>ERROR: Failed to retrieve document!!";
    }

    // Remove Document
    try {
        if($client->deleteDoc($doc)) {
            return true;
        }
    } catch (Exception $e) {
        echo "<p class='text-danger'>ERROR: Failed to delete document!!";
    }
}

// Create document
// References: https://php-on-couch.readthedocs.io/en/latest/api/couchclient/document.html#storedoc
function insert($title,$date,$genre,$director) {
    
    require 'connector.php';

    if(isset($_POST['create'])) {
        $doc = new stdClass();
        $doc->title = $title;
        $doc->date = $date;
        $doc->genre = explode(", ", $genre);
        $doc->director = $director;

        // Store Document
        try {
            if($client->storeDoc($doc)) {
                return true;
            }
        } catch(Exception $e) {
            echo "<p class='text-danger'>ERROR: Failed to create document!!";
            exit(1);
        }
    }
}

// Get Document
// References: https://php-on-couch.readthedocs.io/en/latest/api/couchclient/document.html#getdoc
function get($_id) {
    require 'connector.php';
    
    try {
        return $client->getDoc($_id);
    } catch (Exception $e) {
        echo "<p class='text-danger'>ERROR: Document not found!!";
        exit(1);
    }
}

// Update Function
// References: https://github.com/dready92/PHP-on-Couch/blob/master/doc/couch_client-document.md
function update($_id,$title,$date,$genre,$director) {

    require 'connector.php';

    if($_POST['update']) {
        $doc = get($_id);

        // Make Changes
        $doc->title = $title;
        $doc->date = $date;
        $doc->genre = explode(", ", $genre);
        $doc->director = $director;
        

        // Update Document
        try {
            if($client->storeDoc($doc)) {
                return true;
            }
        } catch(Exception $e) {
            echo "<p class='text-danger'>ERROR: Failed to update document!!";
            exit(1);
        }
    }
}


?>