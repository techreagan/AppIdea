<?php 

class Users extends Controller {
  public function __construct() {
    $this->userModel = $this->model('User');
  }

  public function index() {
    redirect('/');
  }

  public function register() {
    if(Auth::isLoggedIn()) {
      redirect('ideas/');
    }

    if(is_post_request()) {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'username' => trim($_POST['username']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'username_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      if(Validation::isBlank($data['username'])) {
        $data['username_err'] = 'Please enter username';
      } else if(!Validation::hasLength($data['username'], ['min' => 3])) {
        $data['username_err'] = 'Username must be at least three(3) characters long';
      } else if(!Validation::hasSpace($data['username'])) {
        $data['username_err'] = 'Username must be characters';
      } else if(!Validation::hasSymbol($data['username'])) {
        $data['username_err'] = 'Username must be characters';
      } 

      if(Validation::isBlank($data['email'])) {
        $data['email_err'] = 'Please enter email';
      } else if(!Validation::validateEmail($data['email'])) {
        $data['email_err'] = 'Email is invalid';
      } else if($this->userModel->findUserByEmail($data['email'])) {
        $data['email_err'] = 'Email taken';
      }

      if(Validation::isBlank($data['password'])) {
        $data['password_err'] = 'Please enter password';
      } else if(Validation::hasLengthLessThan($data['password'], 6)) {
        $data['password_err'] = 'Password must be atleast six(6) characters long';
      } else if(Validation::hasUppercase($data['password'])) {
        $data['password_err'] = 'Password must contain atleast one(1) uppercase';
      } else if(Validation::hasNumber($data['password'])) {
        $data['password_err'] = 'Password must contain atleast one(1) number';
      }

      if(Validation::isBlank($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Please confirm password';
      } else if($data['password'] !== $data['confirm_password']) {
        $data['confirm_password_err'] = 'Password do not match';
      }

      if(empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        if($this->userModel->registerUser($data)) {
          // $_SESSION['message'] = 'Account Created Successfully';
          flash('register_success', 'Account Created Successfully');
          redirect('users/login');
        } else {
          die('Somethin want wrong');
        }
      }

      $this->view('users/register', $data);
    } else {
      $data = [
        'username' => '',
        'email' => '',
        'password' => '',
        'username_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      $this->view('users/register', $data);
    }
  }

  public function login() {
    if(Auth::isLoggedIn()) {
      redirect('ideas/');
    }
    
    if(is_post_request()) {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        'username_err' => '',
        'password_err' => ''
      ];

      if(Validation::isBlank($data['username'])) {
        $data['username_err'] = 'Please enter username/email';
      }

      if(Validation::isBlank($data['password'])) {
        $data['password_err'] = 'Please enter password';
      }

      if(!$this->userModel->findUserByEmailOrUsername($data)) {
        $data['username_err'] = 'Username/email is incorrect';
        $data['password_err'] = 'Password is incorrect';
      }

      if(empty($data['username_err']) && empty($data['password_err'])) {  
        $loggedIn = $this->userModel->loginUser($data);
        if($loggedIn) {
          Auth::logIn($loggedIn);
          redirect('ideas/');
        } else {
          $data['username_err'] = 'Username/email is incorrect';
          $data['password_err'] = 'Password is incorrect';
        }
      }

      $this->view('users/login', $data);
    } else {
      $data = [
        'username' => '',
        'password' => '',
        'username_err' => '',
        'password_err' => '',
      ];

      $this->view('users/login', $data);
    }
  }

  public function logout() {
    Auth::logOut();
    redirect('/');
  }
  
}