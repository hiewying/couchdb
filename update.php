<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Custom Import -->
    <link rel="stylesheet" type="text/css" href="resources/assets/css/core.css">

</head>
<body>

    <!-- Check Database Exist and Include Untilities -->
    <?php 
        include 'resources/assets/php/database.php'; 
        include 'resources/assets/php/utilities.php';

        if(isset($_POST['upd'])) {
            $result = get($_POST['upd']);

            // Revision Value
            $id = $result->_id;

            $title = $result->title;
            $date = $result->date;
            $genre = $result->genre;

            $director = $result->director;
        
        }
    ?>

    
    <!-- Form -->
    <div class='update-form' style='width:70%; margin: 2% auto 4% auto; -moz-box-shadow: 3px 11px 55px -16px; -webkit-box-shadow: 3px 11px 55px -16px ; box-shadow: 3px 11px 55px -16px ;'>
        <!-- Header -->
        <div class="modal-header" style='background-color: #007bff; color: white;'>
            <h4 class="modal-title" id="create-modal-label">Update Movie</h4>
        </div> 

            <!-- Form Start -->
            <form method='post' action='index.php' class="form-horizontal" id='movie-form'>

            <!-- Hidden Input for _id -->
            <input type="hidden" name="id" value="<?php echo $id; ?>" />

            <!-- Modal Body -->
            <div class="modal-body" style='text-align:left;'>
            <!-- Name -->
                <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name='title' placeholder="title" required value='<?php echo $title; ?>'>
                            </div>
                        </div>
                    </div>

                    <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="date">Date:</label>
                                <input type="text" class="form-control" id="date" name='date' placeholder="date" required value='<?php echo $date; ?>'>
                            </div>
                        </div>
                    </div>

                    <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="genre">Genre:</label>
                                <input type="text" class="form-control" id="genre" name='genre' placeholder="genre" required value='<?php echo implode(', ', $genre); ?>'>
                            </div>
                        </div>
                    </div>

                    <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="director">Director:</label>
                                <input type="text" class="form-control" id="director" name='director' placeholder="director" required value='<?php echo $director; ?>'>
                            </div>
                        </div>
                    </div>
     
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer" style='margin-bottom:7%;'>
            <button type="button" class="btn btn-danger" onClick="window.location='index.php';">Cancel</button>
            <button type="submit" class="btn btn-warning" name='update' value='Update'>Update</button>
        </div>
                    
        </form>
        <!-- Form Ends -->
    </div>

    <!-- Footer -->
    <footer class="footer">
        <?php include_once 'resources/views/footer.html'; ?>
    </footer> 

    <!-- Bootstrap JS -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <!-- References: https://jsfiddle.net/jdme/3amv9y7y/13/ -->
    <!-- References: http://www.bootstraptoggle.com/ -->

</body>
</html>