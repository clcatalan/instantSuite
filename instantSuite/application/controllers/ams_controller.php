<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ams_controller extends CI_Controller {
	
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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() //loads the welcome page
	{
		//welcome page is the log in and registration part
		$this->load->view('welcome');
	}
	public function login_page(){
		
		$this->load->view('welcome');
		
	}
	public function restricted(){ 
	
		$this->load->view('restricted');
	}
	
	public function home(){
			
			if($this->session->userdata('is_logged_in')){ //if user is logged in, user is able to access home page

					$classCode = $this->session->userdata('classCode');
					$this->load->model('model_users');

					$data['class'] = $this->model_users->loadClass($classCode);
					$data['students'] = $this->model_users->loadStudents($classCode);
					$data['seatplan'] = $this->model_users->viewSeatPlan($classCode);
					$this->load->view('classActions', $data);
					return true;
				

				
				
			}
			else{ //if user tries to manually access the home page through url but is not logged in, he is taken to the restricted page
				$this->load->view('restricted');
				return true;
			}
		
	}
	


	
	public function login(){ //called when the user logs in
		//echo "log in success";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('classCode', 'Password', 'required|trim');

		if($this->form_validation->run()){ //if form is validated correctly
			echo "log in success";
			$this->load->helper('array');
			$classCode = $this->input->post('classCode');
			$this->load->model('model_users');
			$fields=$this->model_users->loadData($classCode);

			
			
			$data = array( //the session data
				'email' => $fields->email_address,
				'is_logged_in' => 1,
				'classCode' => $fields->classCode
			);
			$this->session->set_userdata($data); //session is given the session data
			redirect('index.php/ams_controller/home');
			
			
		
			//echo "worked";
		}
		
		else{ // if login is unssuccessful (incomplete fields, etc) he is taken back to the login page
			//$this->load->view('welcome');
			echo "didnt log in";
		//	redirect('index.php/main/login_page');
		}
		
	}
	
	public function signup_validation(){ //function called when user signs up
	
		$this->load->model('model_users');
		$key = md5(uniqid());
		if($this->model_users->add_user()){
			//$this->load->view('home');
			$this->login('email_address_signup', 'password_signup');
		}
		else{
			echo "not added";
		}
	}
	

	

	
	public function validate_credentials(){
		$this->load->model('model_users');
		
		if($this->model_users->can_log_in()){ //check database with the email and password entered
			
			
			return true;
		}
		else{
			$this->form_validation->set_message('validate_credentials', 'Incorrect Username/Password');
			return false;
		}
	}
	
	
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('index.php/ams_controller/index');
		
	}


	public function recordAbsence(){

		 $temp=getdate(date("U"));
		 $date = $temp[month] ." ". $temp[mday] ." ". $temp[year];

		 $classCode = $this->input->post('classCode');
		 $students = $this->input->post('students');
		 //$students = $students.split(",");
		

		 $this->load->model('model_users');


		 if($this->model_users->recordAbsence($classCode, $students, $date)){
		 	return true;
		 }
		 else{
		 	return false;
		 }

		 

		 
	}

	public function undoAbsence(){
		$classCode = $this->input->post('classCode');
		$stdNo = $this->input->post('stdNo');

		$this->load->model('model_users');
		 $this->model_users->undoAbsence($classCode, $stdNo);

		 return true;

	}

	public function saveAbsences(){
		$classCode = $this->session->userdata('classCode');

		$this->load->model('model_users');
		$this->model_users->saveAbsences($classCode);

		redirect('index.php/ams_controller/home');
			
	}

	public function allPresent(){
		$classCode = $this->session->userdata('classCode');
		$allPresentDate = $this->input->post('allPresent');

		$data = array(
				'classCode' => $classCode,
				'allPresentDate' => $allPresentDate
			);

		$this->load->model('model_users');
		if($this->model_users->saveAllPresentDate($data)){
			return true;
		}
		else{
			return false;
		}	
	}

	public function viewAbsences(){
		$stdNo = $this->uri->segment(3);
		$classCode = $this->session->userdata('classCode');

		$this->load->model('model_users');
		$data['absences'] = $this->model_users->viewAbsences($classCode, $stdNo);
		$data['student'] = $this->model_users->viewStudent($stdNo);

		$this->load->view('student_absences', $data);
	}
	
	public function register_user($key){ //called when user confirms his account in the email
		
		$this->load->model('model_users');
	
		if($this->model_users->is_key_valid($key)){
			//echo "valid key";
			if($newemail = $this->model_users->add_user($key)){
				$fields=$this->model_users->loadData($newemail);
				$data = array(
					'email' => $newemail,
					'is_logged_in' => 1,
					'firstName' => $fields->firstName,
					'lastName' => $fields->lastName
				);
				
			$this->session->set_userdata($data);
			redirect('index.php/main/home');
			}else "failed to add user, try again";
		}else echo "invalid key";
	}
	
	public function editProfile(){ //called when user clicks edit profile in the navbar
		$this->load->view('edit_profile'); //loads the fields
	}
	
	public function changeProfileFields(){ //called after the user inputs the fields and submits the data
			$email = $this->session->userdata('email');
			//echo $email;
			$this->load->library('form_validation');
			//$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');
			$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');

			if($this->form_validation->run()){ //if form is validated correctly
				$data = array( //the new data
					'email' => $email,
					'lastName' => $this->input->post('lastName'),
					'firstName' => $this->input->post('firstName'),
					'dept' => $this->input->post('dept'),
					'college' => $this->input->post('college'),
					'password' => $this->input->post('password')
				);
				$this->load->model('model_users');
				if($this->model_users->edit_user($email, $data)){
					echo "data changed";
				}
				else{
					echo "data change failed";
				}
				$this->session->set_userdata($data); //session is given the session data
				redirect('index.php/main/home');
		
				
				echo "worked";
			}
			else{
				echo "not working";
			}
		
		
	}
	
	public function createClass(){ //loads the view to create the class
		$this->load->view('createClass');
	}

	public function classActions(){
		$this->load->view('classActions');
	}
	
	public function createClassDetails(){ //function is called once the user fills out the fields for create class

		$email = $this->session->userdata('email');
		$courseCode = $this->input->post('course_code');
		$courseTitle = $this->input->post('course_title');
		$section = $this->input->post('section');
		$classCode = '';

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength = strlen($characters);
				$classCode = '';
				for ($i = 0; $i < 5; $i++) {
					$classCode .= $characters[rand(0, $charactersLength - 1)];
		}


		
		

		$this->load->model('model_users');
		$this->model_users->create_class($email, $courseCode, $courseTitle, $section, $classCode);
		//redirect('index.php/ams_controller/home');
		$data['classes'] = $this->displayClasses();
		return $data;

			
	}
	
	public function displayClasses(){ //loads the classes of a user by using his email
		$this->load->model('model_users');
		$email = $this->session->userdata('email');
		if($this->model_users->loadClasses($email)){
			$query=$this->model_users->loadClasses($email);
			return $query;
		}
		else{
			return false;
		}
	}
	
	
	
	/*public function archiveClasses(){
		
		$data['classes'] = $this->displayClasses();
		$this->load->view('archiveClass', $data);
	}*/
	
	public function deleteClasses(){ //deletes class from the database
		$id = $this->uri->segment(3);

		$this->load->model('model_users');
		if($this->model_users->deleteClass($id)){ //deletes class from the database
			$data['classes'] = $this->displayClasses(); //loads the remaining classes
			$this->load->view('home', $data); //redirects to homepage
		}
		else{
			echo "failed to delete";
		}
	}
	
	public function loadEditClasses(){ //loads view to edit classes
		$id = $this->uri->segment(3);
		/*$temp = array(
			'id' => $id
		);*/
		$this->load->model('model_users');
		$data['class'] = $this->model_users->loadClass($id); //gets the current class details
		$this->load->view('editClass', $data); //and shows it in the view
		//echo $id;
	}
	
	public function editClassDetails(){ //function called when user edits the details of the class
		$id = $this->uri->segment(3);
		//echo $id;
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('courseNo', 'Course Number', 'required');
		$this->form_validation->set_rules('courseTitle', 'Course Title', 'required');
		$this->form_validation->set_rules('section', 'Section', 'required');
		
		$data = array( //the data for the class
			'courseNo' => $this->input->post('courseNo'),
			'courseTitle' => $this->input->post('courseTitle'),
			'section' => $this->input->post('section')			
		);
		
		$this->load->model('model_users');
		if($this->model_users->editClass($id, $data)){ //puts the new data into the database
			$this->home();
		}
		else{
			echo "failed to edit class";
		}
	}
	
	public function removeFromList(){ //removes class from user's list of classes, but not in the database
		$id = $this->uri->segment(3);
		echo $id;
		
		$this->load->model('model_users');
		if($this->model_users->removeFromList($id)){
			$this->archiveClasses();
		}
		else{
			echo "failed to remove class from list";
		}
		
	}
	
	public function loadAddStudents(){ //loads the view for adding students
		$id = $this->uri->segment(3);
		$this->load->model('model_users');
		$data['class']=$this->model_users->loadClass($id); //loads the class details
		$data['students'] = $this->model_users->loadStudents($id); //loads the students, if there are existing
		$this->load->view('addStudents', $data);
	}
	
	public function addStudents(){ //function that adds the students to a database one at a time
		$id = $this->uri->segment(3);
		//echo $id;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('firstName', 'First Name', 'required');
		$this->form_validation->set_rules('middleName', 'Middle Name', 'required');
		$this->form_validation->set_rules('stdNo', 'Student Number', 'required');
		
		
		if($this->form_validation->run()){
				$data = array( //the data for the class
					'class_id' => $id,
					'lastName' => $this->input->post('lastName'),
					'firstName' => $this->input->post('firstName'),	
					'middleName' => $this->input->post('middleName'),
					'stdNo' => $this->input->post('stdNo')	
				);
				
				$this->load->model('model_users');
				if($this->model_users->addStudent( $data)){
					
					//$this->load->view('home');
					$this->loadAddStudents();
				}
				else{
					echo "student failed to add";
				}
		}
		else{
			$this->load->view('addStudents');
		}
	}
	
    public function uploadStudents() { //function to add multiple students
		$this->load->helper('form');
		$id = $this->uri->segment(3);
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = '*';
		$config['max_size'] = '100';
		$this->load->library('upload', $config); 
		
		if(!$this->upload->do_upload()){
			echo "nonono";
		}
		else{
			
			 $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
 
            if ($this->csvimport->get_array($file_path)) { //downloaded a plugin called csvimport
                $csv_array = $this->csvimport->get_array($file_path);
				$this->load->model('model_users');
                foreach ($csv_array as $row) { //gets data for each row
                    $insert_data = array(
						'class_id' => $id,
						'lastName'=>$row['Last Name'],
                        'firstName'=>$row['First Name'],
                        'middleName'=>$row['Middle Name'],
                        'stdNo'=>$row['Student Number']
                    );
                    $this->model_users->addStudent($insert_data); //and adds it to the database
                }
					$this->loadAddStudents();
            } else {
				echo "no again";
			}
               
		}
    } 
	
	
	public function loadClass(){ //when user clicks on the row of the class, it displays the details
		$id = $this->uri->segment(3);
		//echo $id;
		
		$this->load->model('model_users');
		$data['class'] = $this->model_users->loadClass($id); //class details
		$data['students']=$this->model_users->loadStudents($id); //student list (if there is any)
		$this->load->view('classDetails', $data);
	}
	
	public function createSeatPlan(){ 
		$id = $this->uri->segment(3);
		$this->load->model('model_users');
		
		
		$table = "seatplan";
		if($this->model_users->getOccupiedSeats($id, $table)){ //if there is an existing seat plan already, it deletes it
			$this->model_users->deleteSeatPlan($id);
		}
		
		$data['class']=$this->model_users->loadClass($id);
		$data['id'] = array(
			'class_id' => $id
		);
		$this->load->view('seatPlan', $data); //loads the view for creating the seat plan (the one with the circles)
	}
	
	public function getSeatDetails(){
	   $class_id = $this->uri->segment(3);
	   $circle_id = $this->uri->segment(4);
	   $x = $this->uri->segment(5);
	   $y = $this->uri->segment(6);
	  
	  
	   
	   
		$this->load->model('model_users');
		$this->model_users->addSeatDetails($class_id, $circle_id, $x, $y);
		if($this->model_users->loadStudents($class_id)){
			//$data['students'] = "There are no students in this class";
			//$this->load->view('addStudentToSeat', $data);
			$data['students']=$this->model_users->loadUnseatedStudents($class_id);
			/*$data['seatDetails'] = array(
				'circle_id' => $circle_id
			);*/
			$data['seatDetails'] = $circle_id;
			$data['class_id'] = $class_id;
			$this->load->view('addStudentToSeat', $data);
		}
		else{
			echo "didn't work";
		}
	}
	
	public function saveStudentToSeat(){ //once the circle is clicked, this function is called via ajax

		
		$seat_id = $this->input->post('seat_id'); //gets the seat id
		$x = $this->input->post('position_x'); //position of the seat along the x axis
		$y = $this->input->post('position_y'); //position of the seat along y axis
		$class_id = $this->input->post('class_id'); // and which class it belongs to
		$this->load->model('model_users');
		if($this->model_users->createSeatPlan($seat_id, $class_id, $x, $y)){ //adds the seat to the temp_seatplan database
			return true;
		}
		else{
			return false;
		}
	}
	
	public function finalizeSeatPlan(){ //seat plan is finalized
		$class_id = $this->uri->segment(3);
		$this->load->model('model_users');
		if($this->model_users->finalizeSeatPlan($class_id)){ //takes from the temp_seatplan and adds it to seatplan
			echo "seatplan finalized";
			//$this->home();
			$this->arrangeStudents();
		}
		else{
			echo "seatplan not finalized";
		}
	}
	
	public function viewSeatPlan(){ //views the seat plan
		$class_id = $this->uri->segment(3);
		$this->load->model('model_users');
		if($this->model_users->viewSeatPlan($class_id)){
			$data['finalSeatPlan'] = $this->model_users->viewSeatPlan($class_id);
			$data['class'] = $this->model_users->loadClass($class_id);
			$data['students'] = $this->model_users->loadStudents($class_id);
			$this->load->view('finalSeatPlan', $data);
		}
		else{
			echo "There is no seat plan";
		}
	}
	
	public function arrangeStudents(){ //loads the current seat plan 
		$class_id = $this->uri->segment(3);
		$this->load->model('model_users');
		$data['class']=$this->model_users->loadClass($class_id);
		$table = "seatplan";
		$data['occupiedSeats'] = $this->model_users->getOccupiedSeats($class_id, $table);
		$this->load->view('arrangeStudents', $data); //loads the view which prompts the user to choose what kind of arrangement for the students
	}
	
	public function addStudentsAlphabetically(){ //adds students alphabetically left to right
		$class_id = $this->uri->segment(3);
		echo $class_id;
		$this->load->model('model_users');
		while($this->model_users->loadUnseatedStudents($class_id)){ //looks for the minimum last name that is not seated and seats it
			$student=$this->model_users->getMinimum('lastName', 'students', 'seated', $class_id);
			//echo $student->dataName; //gets first student alphabetically
			
			$seat=$this->model_users->getMinimum('circle_id', 'seatplan', 'stdNo', $class_id);
			//echo $seat->dataName;
			
			$this->model_users->assignStudentAlphabetically($student->dataName, $seat->dataName, $class_id);
		
		}
		
		$this->home();
	}
	


	

	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */