<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	function __construct(){
            parent::__construct();
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	//Load the homepage
	public function index()
	{
		$this->load->view('index');
	}
	
	//Load the login_page
	public function login_page(){
		$this->load->view('login');
	}
	
	//Load the signup page
	public function signUp_page(){
		$this->load->view('signup');
	}

	public function home_page(){
			
			if($this->session->userdata('is_logged_in')){ //if user is logged in, user is able to access home page
				
				if($this->displayClasses()!=false){
					$data['classes'] = $this->displayClasses();
					$this->load->view('home_page', $data);
					return true;
				}
				else{
					$data['classes'] = false;
					$this->load->view('home_page', $data);
					return false;
				}
				
				
			}
			else{ //if user tries to manually access the home page through url but is not logged in, he is taken to the restricted page
				$this->load->view('restricted');
				return true;
			}
		
	}

	public function validate_entry_login(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email_address', 'Email', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run()){
			$this->login('email_address', 'password');
		}
		else{
			echo "One of the fields may be missing, please make sure both fields are filled up";
		}

	}



	
	public function login($email, $password){ //called when the user logs in

		$this->load->library('form_validation');
		$this->form_validation->set_rules($email, 'Email', 'required|trim');
		$this->form_validation->set_rules($password, 'Password', 'required|trim');
		
		
		

		if($this->form_validation->run()){ //if form is validated correctly
			
			$this->load->helper('array');
			$email_address = $this->input->post($email);
			$pword = md5($this->input->post($password));
			$this->load->model('instant_model');
			$fields=$this->instant_model->loadData($email_address, $pword);
			

			
			if($fields==false){
				//redirect('/home/index');
				echo "wrong email or password, please try again";
			}
			
			else{
				$data = array( //the session data
					'email' => $email_address,
					'is_logged_in' => 1,
					'firstName' => $fields->firstName,
					'lastName' => $fields->lastName,
					
				);
				$this->session->set_userdata($data); //session is given the session data
				$this->session->set_flashdata('page', 'homePage');
				redirect('/home/home_page');
			}
			
		
			//echo "worked";
		}
		
		else{ // if login is unssuccessful (incomplete fields, etc) he is taken back to the login page
			//$this->load->view('welcome');
			echo "didnt log in";
		//	redirect('index.php/main/login_page');
		}
		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/home/index');
		//$this->index();
	}


	public function signup_validation(){ //function called when user signs up
	
		$this->load->model('instant_model');
		$key = md5(uniqid());
		if($this->instant_model->add_user()){
			//$this->load->view('home');
			//echo "added";
			$this->login('email_address_signup', 'password_signup');
		}
		else{
			echo "not added";
		}
	}

	public function displayClasses(){ //loads the classes of a user by using his email
		$this->load->model('instant_model');
		$email = $this->session->userdata('email');
		if($this->instant_model->loadClasses($email, 0)){
			$query=$this->instant_model->loadClasses($email, 0);
			return $query;
		}
		else{
			return false;
		}
	}

	public function loadProfile(){ //loads the classes of a user by using his email
		$this->load->view('teacher_profile');
		
	}

	public function loadCreateExam(){
		$data['classes'] = $this->displayClasses();
		$this->load->view('teacher_create_exam', $data);
	}

	public function loadManageExam(){
		$this->load->view('teacher_manage_exam');
	}

	public function loadQuestionBank(){
		$this->load->view('teacher_manage_question_bank');
	}

	public function loadLogs(){
		$this->load->view('viewLogs');
	}

	public function loadCreateClass(){
		$this->load->view('teacher_create_class');
	}

	public function loadMainSideBar(){
		$this->load->view('mainSideBar');
	}

	public function loadAddQuestionSidebar(){
		$this->load->view('addQuestionSidebar');
	}

	public function loadClassSideBar(){
		$data['classes'] = $this->displayClasses();
		$this->load->view('classSideBar', $data);
	}

	public function loadViewStudentDetails(){
		$classCode = $this->input->post('class_code');
		$stdNo = $this->input->post('student_no');

		$this->viewStudentDetails($classCode, $stdNo);
	}


	public function loadArchivedSideBar(){
		$email = $this->session->userdata('email');
		$this->load->model('instant_model');
		$data['archivedClasses'] = $this->instant_model->loadClasses($email, 1);
		$this->load->view('archivedSideBar', $data);
	}

	public function createClass(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('courseNo', 'Course No', 'required');
		$this->form_validation->set_rules('courseTitle', 'Course Title', 'required');
		$this->form_validation->set_rules('section', 'section', 'required');


		if($this->form_validation->run()){
			$email = $this->session->userdata('email');
			$courseCode = $this->input->post('courseNo');
			$courseTitle = $this->input->post('courseTitle');
			$section = $this->input->post('section');
			$classCode = '';




			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$charactersLength = strlen($characters);
					$classCode = '';
					for ($i = 0; $i < 5; $i++) {
						$classCode .= $characters[rand(0, $charactersLength - 1)];
			}

			echo $email;
			echo $courseCode;
			echo $courseTitle;
			echo $section;
			echo $classCode;
			
			

			$this->load->model('instant_model');
			$this->instant_model->create_class($email, $courseCode, $courseTitle, $section, $classCode);
			
			redirect('/home/home_page');
		}
		else{
			echo "one of the fields may be missing, please make sure all fields are filled up";
		}	
		//$data['classes'] = $this->displayClasses();
		//return $data;
	}

	public function loadClassActions(){


		$classCode = $this->input->post('courseCode');
		$archived = $this->input->post('archived');
		$this->load->model('instant_model');
		$data['class']=$this->instant_model->loadClass($classCode);
		$data['students'] = $this->instant_model->loadStudents($classCode);
		$data['seatplan'] = $this->instant_model->viewSeatPlan($classCode);
		$data['archived'] = $archived;
		$data['dates'] = $this->instant_model->loadAbsenceDates($classCode);
		$data['allPresent'] = $this->instant_model->loadAllPresentDates($classCode);

		$this->load->view('attendance_module/classActions', $data);
		



	}

	public function addMultipleChoice(){
		$this->load->view('add_question_mcq');

	}

	public function addTrueOrFalse(){
		$this->load->view('add_question_tf');
	}

	public function addMatching(){
		$this->load->view('add_question_matching');
	}
	public function addIdentification(){
		$this->load->view('add_question_ident');
	}

	public function addFillInTheBlanks(){
		$this->load->view('add_question_fnb');
	}

	public function addEssay(){
		$this->load->view('add_question_essay');
	}
	public function addProgramming(){
		$this->load->view('add_question_programming');
	}



	public function archiveClass(){
		$classCode = $this->uri->segment(3);
		$this->load->model('instant_model');
		$this->instant_model->archiveClass($classCode);

		redirect('/home/home_page');
	}

	public function restoreClass(){
		$classCode = $this->uri->segment(3);
		$this->load->model('instant_model');
		$this->instant_model->restoreClass($classCode);

		redirect('/home/home_page');
	}



	public function deleteClass(){
		$classCode = $this->uri->segment(3);
		$this->load->model('instant_model');
		$this->instant_model->deleteClass($classCode);
		$this->instant_model->deleteSeatPlan($classCode);
		$this->instant_model->deleteStudents($classCode);

		redirect('/home/home_page');
	}

	public function editClass(){
		$classCode = $this->uri->segment(3);
		//echo $classCode;
		$this->load->library('form_validation');

		$this->form_validation->set_rules('courseNo', 'Course No', 'required');
		$this->form_validation->set_rules('courseTitle', 'Course Title', 'required');
		$this->form_validation->set_rules('section', 'section', 'required');


		if($this->form_validation->run()){


			$courseTitle = $this->input->post('courseTitle');
			$courseCode = $this->input->post('courseNo');
			$section = $this->input->post('section');

			$this->load->model('instant_model');
			$this->instant_model->editClass($classCode, $courseTitle, $courseCode, $section);

			redirect('/home/home_page');
		}
		else{
			echo "one of the fields may be missing, please make sure all fields are filled up";
		}
	}

	public function addStudent(){
		$classCode = $this->uri->segment(3);
		//echo $classCode;

		$this->load->library('form_validation');

		$this->form_validation->set_rules('stdNo', 'Student No', 'required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('firstName', 'First Name', 'required');
		$this->form_validation->set_rules('middleName', 'Middle Name', 'required');


		if($this->form_validation->run()){

			$stdNo = $this->input->post('stdNo');
			$lastName = $this->input->post('lastName');
			$firstName = $this->input->post('firstName');
			$middleName = $this->input->post('middleName');



			$data = array( //the session data
						'student_no' => $stdNo,
						'firstName' => $firstName,
						'lastName' => $lastName,
						'middleName' => $middleName,
						'seated' => null,
						'classCode' => $classCode,
						
					);

			$this->load->model('instant_model');
			$this->instant_model->addStudent($data);

			redirect('/home/home_page');
		}
		else{
			echo "one of the fields may be missing, please make sure all fields are filled up";
		}	
	}

	public function editStudent(){
		$classCode = $this->uri->segment(3);
		$stdNo = $this->uri->segment(4);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('stdNo', 'Student No', 'required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('firstName', 'First Name', 'required');
		$this->form_validation->set_rules('middleName', 'Middle Name', 'required');


		if($this->form_validation->run()){

			$new_stdNo = $this->input->post('stdNo');
			$new_lastName = $this->input->post('lastName');
			$new_firstName = $this->input->post('firstName');
			$new_middleName = $this->input->post('middleName');



			$data = array( //the session data
						'student_no' => $new_stdNo,
						'firstName' => $new_firstName,
						'lastName' => $new_lastName,
						'middleName' => $new_middleName,
					);

			$this->load->model('instant_model');
			$this->instant_model->editStudent($data, $classCode, $stdNo);

			$data = array(
					'stud_no' => $new_stdNo,
				);

			$this->instant_model->editAbsence($data, $stdNo, $classCode);

			redirect('/home/home_page');
		}
		else{
			echo "one of the fields may be missing, please make sure all fields are filled up";
		}

	}

	public function deleteStudent(){
		$classCode = $this->uri->segment(3);
		$stdNo = $this->uri->segment(4);

		echo $classCode;
		echo $stdNo;
		
		$this->load->model('instant_model');
		$this->instant_model->deleteStudent($classCode, $stdNo);

		$this->instant_model->deleteStudentAbsences($classCode, $stdNo);
		$this->instant_model->deleteStudentArrangement($classCode, $stdNo);

		redirect('/home/home_page');
	}

	public function deleteStudents(){
		$classCode = $this->uri->segment(3);
		$this->load->model('instant_model');
		$this->instant_model->deleteStudents($classCode);

		$this->instant_model->deleteAbsences($classCode);
		$this->instant_model->deleteArrangement($classCode);

		redirect('/home/home_page');
	}

	public function uploadCSV(){
		$classCode = $this->uri->segment(3);
		$this->load->model('instant_model');
		$query = $this->instant_model->addMultipleStudents($classCode);

		if($query==false){
			echo "wrong format";
		}
		else{
			redirect('/home/home_page');
		}
	}

	public function loadCreateSeatPlan(){
		$classCode = $this->uri->segment(3);
		$this->load->model('instant_model');
		$query = $this->instant_model->deleteSeatPlan($classCode);

		$this->load->view('attendance_module/createSeatPlan');
	}

	public function saveTempSeat(){
		$columns = $this->input->post('columns');
		$rows = $this->input->post('rows');
		
		$classCode = $this->input->post('classCode');
		
		$position_x = $this->input->post('position_x');
		$position_y = $this->input->post('position_y');

		$this->load->model('instant_model');
		

		for ($i = 1; $i <= $rows; $i++) {
			for ($j = 1; $j <= $columns; $j++) {

			    $data = array( //the session data
					'classCode' => $classCode,
					'location_x' => $position_x + ($j * 70),
					'location_y' => $position_y + ($i * 70),
					'stud_no' => null,
				);

				$this->instant_model->addTempSeat($data);
			}
		    
		}

		return true;
		
	}

	public function clearAllSeats(){
		$classCode = $this->uri->segment(3);
		$this->load->model('instant_model');
		$this->instant_model->clearAllSeats($classCode);

		redirect('/home/loadCreateSeatPlan');
	}

	public function undoPrevious(){
		$columns = $this->input->post('columns');
		$rows = $this->input->post('rows');
		
		$classCode = $this->input->post('classCode');
		
		$position_x = $this->input->post('position_x');
		$position_y = $this->input->post('position_y');

		$this->load->model('instant_model');
		

		for ($i = 1; $i <= $rows; $i++) {
			for ($j = 1; $j <= $columns; $j++) {

			    $data = array( //the session data
					'classCode' => $classCode,
					'location_x' => $position_x + ($j * 70),
					'location_y' => $position_y + ($i * 70),
					'stud_no' => null,
				);

				$this->instant_model->undoPrevious($data);
			}
		    
		}

		return true;

	}

	public function redoPrevious(){
		$columns = $this->input->post('columns');
		$rows = $this->input->post('rows');
		
		$classCode = $this->input->post('classCode');
		
		$position_x = $this->input->post('position_x');
		$position_y = $this->input->post('position_y');

		$this->load->model('instant_model');
		

		for ($i = 1; $i <= $rows; $i++) {
			for ($j = 1; $j <= $columns; $j++) {

			    $data = array( //the session data
					'classCode' => $classCode,
					'location_x' => $position_x + ($j * 70),
					'location_y' => $position_y + ($i * 70),
					'stud_no' => null,
				);

				$this->instant_model->redoPrevious($data);
			}
		    
		}

		return true;

	}

	public function saveSeatLayout(){
		$classCode = $this->uri->segment(3);

		$this->load->model('instant_model');
		$this->instant_model->saveSeatLayout($classCode);

		redirect('/home/home_page');
	}

	public function arrangeStudents(){ //adds students alphabetically left to right
		$class_id = $this->uri->segment(3);
		//echo $class_id;
		$type = $this->uri->segment(4);
		echo $type;

		$this->load->model('instant_model');
		
		if(strcmp($type, "leftToRight") == 0){
			while($this->instant_model->loadUnseatedStudents($class_id)){ //looks for the minimum last name that is not seated and seats it
					$student=$this->instant_model->getMinimum('lastName', 'student', 'seated', $class_id);
					echo $student->lastName; //gets first student alphabetically
					
					$seat=$this->instant_model->getMinimum('location_y', 'seat', 'stud_no', $class_id);
					$location_y = $seat->location_y;
					echo $location_y;

					//public function getOtherMinimum($value1, $value2, $col_value1, $table, $col, $classCode){
					$seat=$this->instant_model->getOtherValue($location_y, 'location_x', 'location_y', 'seat', 'stud_no', $class_id, 'min');
					$location_x = $seat->location_x;
					echo $location_x;
					//use location y to find minimum x, then assign
					
					$this->instant_model->assignStudentAlphabetically($student->lastName, $location_x, $location_y, $class_id);
					echo "\n";
			}
		}
		else if(strcmp($type, "RightToLeft") == 0){
			while($this->instant_model->loadUnseatedStudents($class_id)){ //looks for the minimum last name that is not seated and seats it
					$student=$this->instant_model->getMinimum('lastName', 'student', 'seated', $class_id);
					echo $student->lastName; //gets first student alphabetically
					
					$seat=$this->instant_model->getMinimum('location_y', 'seat', 'stud_no', $class_id);
					$location_y = $seat->location_y;
					echo $location_y;

					//public function getOtherMinimum($value1, $value2, $col_value1, $table, $col, $classCode){
					$seat=$this->instant_model->getOtherValue($location_y, 'location_x', 'location_y', 'seat', 'stud_no', $class_id, 'max');
					$location_x = $seat->location_x;
					echo $location_x;
					//use location y to find minimum x, then assign
					
					$this->instant_model->assignStudentAlphabetically($student->lastName, $location_x, $location_y, $class_id);
					echo "\n";
			}
		}
		else if(strcmp($type, "DownTop") == 0){
			while($this->instant_model->loadUnseatedStudents($class_id)){ //looks for the minimum last name that is not seated and seats it
					$student=$this->instant_model->getMinimum('lastName', 'student', 'seated', $class_id);
					echo $student->lastName; //gets first student alphabetically
					
					$seat=$this->instant_model->getMinimum('location_x', 'seat', 'stud_no', $class_id);
					$location_x = $seat->location_x;
					echo $location_x;

					//public function getOtherMinimum($value1, $value2, $col_value1, $table, $col, $classCode){
					$seat=$this->instant_model->getOtherValue($location_x, 'location_y', 'location_x', 'seat', 'stud_no', $class_id, 'max');
					$location_y = $seat->location_y;
					echo $location_y;
					//use location y to find minimum x, then assign
					
					$this->instant_model->assignStudentAlphabetically($student->lastName, $location_x, $location_y, $class_id);
					echo "\n";
			}
		}
		else if(strcmp($type, "TopDown") == 0){
			while($this->instant_model->loadUnseatedStudents($class_id)){ //looks for the minimum last name that is not seated and seats it
					$student=$this->instant_model->getMinimum('lastName', 'student', 'seated', $class_id);
					echo $student->lastName; //gets first student alphabetically
					
					$seat=$this->instant_model->getMinimum('location_x', 'seat', 'stud_no', $class_id);
					$location_x = $seat->location_x;
					echo $location_x;

					//public function getOtherMinimum($value1, $value2, $col_value1, $table, $col, $classCode){
					$seat=$this->instant_model->getOtherValue($location_x, 'location_y', 'location_x', 'seat', 'stud_no', $class_id, 'min');
					$location_y = $seat->location_y;
					echo $location_y;
					//use location y to find minimum x, then assign
					
					$this->instant_model->assignStudentAlphabetically($student->lastName, $location_x, $location_y, $class_id);
					echo "\n";
			}
		}
		else if(strcmp($type, "RAleftToRight") == 0){
			while($this->instant_model->loadUnseatedStudents($class_id)){ //looks for the minimum last name that is not seated and seats it
					$student=$this->instant_model->getMaximum('lastName', 'student', 'seated', $class_id);
					echo $student->lastName; //gets first student alphabetically
					
					$seat=$this->instant_model->getMinimum('location_y', 'seat', 'stud_no', $class_id);
					$location_y = $seat->location_y;
					echo $location_y;

					//public function getOtherMinimum($value1, $value2, $col_value1, $table, $col, $classCode){
					$seat=$this->instant_model->getOtherValue($location_y, 'location_x', 'location_y', 'seat', 'stud_no', $class_id, 'min');
					$location_x = $seat->location_x;
					echo $location_x;
					//use location y to find minimum x, then assign
					
					$this->instant_model->assignStudentAlphabetically($student->lastName, $location_x, $location_y, $class_id);
					echo "\n";
			}
		}
		else if(strcmp($type, "RARightToLeft") == 0){
			while($this->instant_model->loadUnseatedStudents($class_id)){ //looks for the minimum last name that is not seated and seats it
					$student=$this->instant_model->getMaximum('lastName', 'student', 'seated', $class_id);
					echo $student->lastName; //gets first student alphabetically
					
					$seat=$this->instant_model->getMinimum('location_y', 'seat', 'stud_no', $class_id);
					$location_y = $seat->location_y;
					echo $location_y;

					//public function getOtherMinimum($value1, $value2, $col_value1, $table, $col, $classCode){
					$seat=$this->instant_model->getOtherValue($location_y, 'location_x', 'location_y', 'seat', 'stud_no', $class_id, 'max');
					$location_x = $seat->location_x;
					echo $location_x;
					//use location y to find minimum x, then assign
					
					$this->instant_model->assignStudentAlphabetically($student->lastName, $location_x, $location_y, $class_id);
					echo "\n";
			}
		}
		else if(strcmp($type, "RADownTop") == 0){
			while($this->instant_model->loadUnseatedStudents($class_id)){ //looks for the minimum last name that is not seated and seats it
					$student=$this->instant_model->getMaximum('lastName', 'student', 'seated', $class_id);
					echo $student->lastName; //gets first student alphabetically
					
					$seat=$this->instant_model->getMinimum('location_x', 'seat', 'stud_no', $class_id);
					$location_x = $seat->location_x;
					echo $location_x;

					//public function getOtherMinimum($value1, $value2, $col_value1, $table, $col, $classCode){
					$seat=$this->instant_model->getOtherValue($location_x, 'location_y', 'location_x', 'seat', 'stud_no', $class_id, 'max');
					$location_y = $seat->location_y;
					echo $location_y;
					//use location y to find minimum x, then assign
					
					$this->instant_model->assignStudentAlphabetically($student->lastName, $location_x, $location_y, $class_id);
					echo "\n";
			}
		}
		else if(strcmp($type, "RATopDown") == 0){
			while($this->instant_model->loadUnseatedStudents($class_id)){ //looks for the minimum last name that is not seated and seats it
					$student=$this->instant_model->getMaximum('lastName', 'student', 'seated', $class_id);
					echo $student->lastName; //gets first student alphabetically
					
					$seat=$this->instant_model->getMinimum('location_x', 'seat', 'stud_no', $class_id);
					$location_x = $seat->location_x;
					echo $location_x;

					//public function getOtherMinimum($value1, $value2, $col_value1, $table, $col, $classCode){
					$seat=$this->instant_model->getOtherValue($location_x, 'location_y', 'location_x', 'seat', 'stud_no', $class_id, 'min');
					$location_y = $seat->location_y;
					echo $location_y;
					//use location y to find minimum x, then assign
					
					$this->instant_model->assignStudentAlphabetically($student->lastName, $location_x, $location_y, $class_id);
					echo "\n";
			}
		}
		else if(strcmp($type, "Random") == 0){
			while($this->instant_model->loadUnseatedStudents($class_id)){ //looks for the minimum last name that is not seated and seats it
					$student=$this->instant_model->getRandomStudent($class_id);
					echo "stdNo =", $student->student_no; //gets first student alphabetically*/
					
					$seat=$this->instant_model->getMinimum('location_x', 'seat', 'stud_no', $class_id);
					$location_x = $seat->location_x;
					echo "x =", $location_x;

					//public function getOtherMinimum($value1, $value2, $col_value1, $table, $col, $classCode){
					$seat=$this->instant_model->getOtherValue($location_x, 'location_y', 'location_x', 'seat', 'stud_no', $class_id, 'min');
					$location_y = $seat->location_y;
					echo "y =", $location_y;
					//use location y to find minimum x, then assign
					
					$this->instant_model->assignStudentRandomly($student->student_no, $location_x, $location_y, $class_id);
					echo "\n";
			}
		}

		redirect('/home/home_page');


	}

	public function loadArrangeStudentsManually(){
		$classCode = $this->uri->segment(3);
		$this->load->model('instant_model');
		$data['students'] = $this->instant_model->loadUnseatedStudents($classCode);
		$data['seatplan'] = $this->instant_model->viewSeatPlan($classCode);
		$data['classCode'] = $classCode;

		$this->load->view('attendance_module/manualSeatPlan', $data);
	}




	public function assignStudentManually(){
		$this->load->model('instant_model');
		$classCode = $this->input->post('classCode');
		$stdNo = $this->input->post('stdNo');
		$location_x = $this->input->post('location_x');
		$location_y = $this->input->post('location_y');

		//$this->instant_model->assignStudentManually($classCode, $stdNo, $location_x, $location_y);

		if($this->instant_model->assignStudentManually($classCode, $stdNo, $location_x, $location_y)){

			return true;
		}
		else{
			return false;
		}
	}

	public function undoStudentAssignment(){
		$this->load->model('instant_model');

		$classCode = $this->input->post('classCode');		
		$location_x = $this->input->post('location_x');
		$location_y = $this->input->post('location_y');

		if($this->instant_model->undoStudentAssignment($classCode, $location_x, $location_y)){

			return true;
		}
		else{
			return false;
		}
	}

	public function viewStudentDetails($classCode, $stdNo){
		/*$stdNo = $this->uri->segment(3);
		$classCode = $this->uri->segment(4);*/




		$this->load->model('instant_model');
		$data['student'] = $this->instant_model->viewStudent($stdNo, $classCode);
		$data['absences'] = $this->instant_model->viewAbsences($stdNo, $classCode);
		$data['subject'] = $this->instant_model->loadClass($classCode);
		$this->load->view('attendance_module/student_absences', $data);
		
	}

	public function loadAttendanceDates(){
		$attendanceDate = $this->input->post('aDate');
		$classCode = $this->input->post('class_code');

		$this->load->model('instant_model');
		$data['absentStudents']=$this->instant_model->loadAbsentStudentsDate($attendanceDate, $classCode);
		$absentStudents = array();

		foreach ($data['absentStudents'] as $row)
		{
		   //$data['stdNo']=$row->stud_no;
		   array_push($absentStudents, $row->stud_no);
		}

		$data['absentStudentDetails'] = $this->instant_model->loadAbsentStudentsDetails($absentStudents, $classCode);

		$data['presentStudents']=$this->instant_model->loadPresentStudentsDate($absentStudents, $classCode);

		//$data['stdNo'] = 
		$this->load->view('attendance_module/attendances', $data);
	}

	public function addAbsence(){
		$this->load->model('instant_model');
		

		$this->instant_model->addAbsence($this->input->post('classCode'), $this->input->post('stdNo'), $this->input->post('absenceDate'));	

		redirect('/home/home_page');
	}

	public function deleteAbsence(){/*
		$classCode = $this->uri->segment(3);
		$stdNo = $this->uri->segment(4);

		echo $classCode;
		echo $stdNo;*/
		
		$this->load->model('instant_model');
		

		$this->instant_model->deleteAbsence($this->input->post('classCode'), $this->input->post('stdNo'), $this->input->post('absenceDate'));	

		redirect('/home/home_page');	
	}

	public function editAbsence(){
		
		
		$newData = array(
				'date_of_absence' => $this->input->post('newAbsence')
			);
		
		$this->load->model('instant_model');
		

		$this->instant_model->editAbsenceDate($this->uri->segment(3), $this->uri->segment(4), $this->input->post('currentAbsence'), $newData);	

		redirect('/home/home_page');	
	}

			public function finalizeArrangement(){
			redirect('home/home_page');
		}

 public function loadUnseatedStudents(){
		/*
		$classCode = $this->input->post('class_code');
		$this->load->model('instant_model');
		$data['students'] = $this->instant_model->loadUnseatedStudents($classCode);*/
		$this->load->view('attendance_module/unseatedStudents');
	}	
			



}
