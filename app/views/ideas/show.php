<?php require APPROOT . '/views/inc/header.php' ?>
<main class="container">
  <div class="row mb-3">
    <div class="col-md-6">
      <h1 class="text-white">Ideas</h1>
    </div>
  </div>
  <?php flash('deleted_success'); $idea = $data['idea']?>
  <div class="row">
    <div class="col">
      <div class="card bg-light mb-3">
        <div class="card-body">
          <h5 class="card-title"><?php echo $idea->title ?></h5>
          <p class="card-text"><?php echo $idea->description; ?></p>
          <p class="text-muted mb-0"><small><?php echo $idea->created_at; ?></small></p>
        </div>
        <div class="card-footer">
          <a href="<?php echo url_for("ideas/edit/{$idea->id}") ?>" class="btn btn-dark">Edit</a>
          <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target=".deleteModal">Delete</button>

          <div class="modal fade deleteModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">

              <div class="modal-content">
                <div class="modal-body">
                  <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                  <form action="<?php echo url_for("ideas/delete/{$idea->id}") ?>" method="post">
                    <button type="submit" class="btn btn-danger">Yes</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php require APPROOT . '/views/inc/footer.php' ?>