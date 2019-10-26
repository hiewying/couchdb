<!-- Modal -->
<div class="modal fade" id="create-modal" aria-labelledby="create-modal-label" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header" style='background-color: #007bff; color: white;'>
                <h4 class="modal-title" id="create-modal-label">Create Movie</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style='color: white;'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 

            <!-- Form Start -->
            <form method='post' action='index.php' class="form-horizontal" id='movies-form'>

                <!-- Modal Body -->
                <div class="modal-body" style='text-align:left;'>
                    <!-- Name -->
                    <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name='title' placeholder="eg. Terminator" required>
                            </div>
                        </div>
                    </div>

                    <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="date">Date:</label>
                                <input type="text" class="form-control" id="date" name='date' placeholder="eg. 2018" required>
                            </div>
                        </div>
                    </div>

                    <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="genre">Genre:</label>
                                <input type="text" class="form-control" id="genre" name='genre' placeholder="eg. Fantasy, Sci-Fi" required>
                            </div>
                        </div>
                    </div>

                    <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="director">Director:</label>
                                <input type="text" class="form-control" id="director" name='director' placeholder="eg. Tim Miller" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" name='create' value='Create'>Create</button>
                </div>
            
            </form>
            <!-- Form Ends -->

        </div>
    </div>
</div>