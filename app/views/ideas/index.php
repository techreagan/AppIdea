<?php require APPROOT . '/views/inc/header.php' ?>
<main class="container">
  <div class="row mb-3">
    <div class="col-md-6">
      <h1 class="text-white">Ideas</h1>
    </div>
    <div class="col-md-6">
      <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addIdeaModal">Add Idea</button> -->
      <a href="<?php echo url_for('ideas/add') ?>" class="btn btn-primary float-right"><i class="fa fa-pencil-alt"></i> Add Idea</a>
     
    </div>
  </div>
  <?php flash('idea'); ?>
  <div class="row">
    <?php if(empty($data['idea'])): ?>
    <div class="col text-center">
      <p class="text-white">No Idea Yet</p>
    </div>
    <?php else:?>
    <?php foreach($data['idea'] as $idea): ?>
    <div class="col-md-3">
      <div class="card bg-light mb-3">
        <div class="card-body">
          <h5 class="card-title"><?php echo $idea->title ?></h5>
          <p class="card-text"><?php echo $idea->description; ?></p>
          <p class="text-muted mb-0"><small><?php echo $idea->created_at; ?></small></p>
        </div>
        <div class="card-footer">
          <a href="<?php echo url_for("ideas/show/{$idea->id}") ?>" class="btn btn-dark">More</a>
          <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target=".deleteModal"><i class="fa fa-trash-alt"></i></button>

          <div class="modal fade deleteModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div> -->
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
    <?php endforeach;endif; ?>
  </div>
</main>
<?php require APPROOT . '/views/inc/footer.php' ?>