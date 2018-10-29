<?php 

class Ideas extends Controller {
  private $ideaModel; 

  public function __construct() {
    Auth::requireLogin();
    
    $this->ideaModel = $this->model('Idea');
  }

  public function index() {
    $ideas = $this->ideaModel->getAllIdeas();
    $data = [
      'idea' => $ideas
    ];

    $this->view('ideas/index', $data);
  }

  public function add() {
    if(is_post_request()) {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'name' => trim($_POST['name']),
        'description' => trim($_POST['description']),
        'name_err' => '',
        'description_err' => ''
      ];

      if(Validation::isBlank($data['name'])) {
        $data['name_err'] = 'Please enter name';
      } else if(Validation::hasLength($data['name'], ['min' => 3])) {
        $data['name_err'] = 'Name must be atleast three(3) characters long';
      }

      if(Validation::isBlank($data['description'])) {
        $data['description_err'] = 'Please enter description';
      } else if(Validation::hasLength($data['name'], ['min' => 6])) {
        $data['description_err'] = 'Description must be atleast six(6) characters long';
      }

      if(!empty($data['name']) && !empty($data['description'])) {
        if($this->ideaModel->createIdea($data)) {
          flash('idea', 'Idea Added Successfully');
          redirect('ideas/');
        } else {
          die('Something went wrong');
        }
      }

      $this->view('ideas/add', $data);

    } else {
      $data = [
        'name' => '',
        'description' => '',
        'name_err' => '',
        'description_err' => ''
      ];

    }

    $this->view('ideas/add', $data);
  }

  public function edit($id) {
    if(is_post_request()) {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => $id,
        'name' => trim($_POST['name']),
        'description' => trim($_POST['description']),
        'name_err' => '',
        'description_err' => ''
      ];

      if(Validation::isBlank($data['name'])) {
        $data['name_err'] = 'Please enter name';
      } else if(Validation::hasLength($data['name'], ['min' => 3])) {
        $data['name_err'] = 'Name must be atleast three(3) characters long';
      }

      if(Validation::isBlank($data['description'])) {
        $data['description_err'] = 'Please enter description';
      } else if(Validation::hasLength($data['name'], ['min' => 6])) {
        $data['description_err'] = 'Description must be atleast six(6) characters long';
      }

      if(!empty($data['name']) && !empty($data['description'])) {
        if($this->ideaModel->updateIdea($data)) {
          flash('idea', 'Idea Updated Successfully');
          redirect('ideas/');
        } else {
          die('Something went wrong');
        }
      }

      $this->view('ideas/edit', $data);

    } else {
      $idea = $this->ideaModel->getIdeaById($id);

      if(!$idea) {
        redirect('ideas');
      }
   
      $data = [
        'id' => $idea->id,
        'name' => $idea->title,
        'description' => $idea->description,
        'name_err' => '',
        'description_err' => ''
      ];

    }

    $this->view('ideas/edit', $data);
  }

  public function show($id) {
    $idea = $this->ideaModel->getIdeaByid($id);

    if(!$idea) {
      redirect('ideas/');
    }

    $data = [
      'idea' => $idea
    ];

    $this->view('ideas/show', $data);
  }

  public function delete($id) {
    $deleteIdea = $this->ideaModel->deleteIdea($id);
    if($deleteIdea) {
      flash('idea', 'Idea Deleted Successfully');
      redirect('ideas');
    }
  }
}