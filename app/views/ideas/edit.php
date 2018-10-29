<?php require APPROOT . '/views/inc/header.php' ?>
<main class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card bg-light mb-3">
        <form action="<?php echo url_for("ideas/edit/{$data['id']}"); ?>" method="post"> 
          <div class="card-body">
            <h2 class="mb-4">Edit Idea</h2>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" value="<?php echo $data['name']; ?>" class="form-control<?php echo !empty($data['name_err']) ? ' is-invalid' : '' ?>" id="name" placeholder="What are you gonna call it?">
              <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
            </div>
        
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control<?php echo !empty($data['name_err']) ? ' is-invalid' : '' ?>" name="description" id="description" rows="3" placeholder="Let's Brian Storm"><?php echo $data['description']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success" >Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<?php require APPROOT . '/views/inc/footer.php' ?>