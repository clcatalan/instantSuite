<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Instant_model extends CI_Model{

		public function __construct(){
        	parent::__construct();
    	}
	
		public function loadData($email_address, $password){ //for login_validation
			
			//echo $email_address;
			//echo $password;

			$query = $this->db->get_where('user', array('email_address' => $email_address));
			 $row = $query->row(); 
			// echo $row->email_address;
			// echo $row->password;

			if ($query->num_rows() > 0)
			{
				

				if((strcmp($password, $row->password)!=0)||(strcmp($email_address, $row->email_address)!=0)){

				//	echo "wrong password or email";
					return false;
				}
				else{
				   $row = $query->row(); 

				   //echo $row->email_address;
				   //echo $row->password;
				   return $row;
				}
			}
			else{
				//echo "false";
				return false;
			}

			
		}
		
		
		
		public function can_log_in(){
			$this->db->where('email_address', $this->input->post('email'));
			$this->db->where('password', ($this->input->post('password')));
			
			
			$query = $this->db->get('user');
			
			if($query->num_rows()==1){ //if it found a user
				return true;
			}
			else{
				return false;
			}
		}
		
				
		public function is_key_valid($key){ //checks if the key is valid when user confirms via email
			$this->db->where('key', $key);
			$query = $this->db->get('temp_users');
			
			if($query->num_rows()==1){
				return true;
			}else return false;
		}
		
		public function add_user(){ //adds the user to the permanent users db and deletes the data in the temp_users
			$userData = array(
				'lastName' => $this->input->post('lastName'),
				'firstName' => $this->input->post('firstName'),
				'middleName' => $this->input->post('middleName'),
				'email_address' => $this->input->post('email_address_signup'),
				'password' => md5($this->input->post('password_signup'))
			);

			$query = $this->db->insert('user', $userData);
			
			$teacherData = array(
				'employee_no' => $this->input->post('empNo'),
				'email_address' => $this->input->post('email_address_signup')
			);
			
			$query = $this->db->insert('teacher', $teacherData);
			
			return true;
			/*$this->db->where('key', $key);
			$temp_user = $this->db->get('temp_users');
			
			if($temp_user){
					$row = $temp_user->row();
					
					$data = array(
						'email' => $row->email,
						'password' => $row->password,
						'lastName' => $row->lastName,
						'firstName' => $row->firstName,
						'dept' => $row->dept,
						'college' => $row->college,
						'user_id' => $row->user_id,
						'key' => $key
					);
					
					$did_add_user = $this->db->insert('users', $data);
			}
			if($did_add_user){
				$this->db->where('key', $key);
				$this->db->delete('temp_users');
				return $data['email'];
			}return false;*/
			
		}
		
		public function edit_user($email, $data){ //updates the user details with the new data
			
			$this->db->where('email', $email);
			$query=$this->db->update('users', $data); 
			
			if($query){			
				return true;
			}
			else{
				return false;
			}
		}
		

		public function create_class($email, $courseCode, $courseTitle, $section, $classCode){
			$classData = array(
				'email_address' => $email,
				'course_code' => $courseCode,
				'course_title' => $courseTitle,
				'section' => $section,
				'classCode' => $classCode,
				'archived' => 0
			);

			$query = $this->db->insert('subject', $classData);

			return true;

		}
		
		public function loadClasses($email, $archived){ //loads classes of the user
			

			$query = $this->db->get_where('subject', array('email_address' => $email, 'archived' => $archived));
			if ($query->num_rows() > 0)
			{
			    
			   return $query->result();
			}
			else{
				return false;
			}
		}
		

		public function loadClass($classCode){ //loads a specific class

			$query = $this->db->get_where('subject', array('classCode' => $classCode));
			if ($query->num_rows() > 0)
			{
			    
			   return $query->result();
			}
			else{
				return false;
			}
		}
		
		public function deleteClass($classCode){ //deletes a class from the database
			$this->db->where('classCode', $classCode);
			$query = $this->db->delete('subject');
			
			if($query){
				return true;
			}
			else{
				return false;
			}
			
		}
		
		public function editClass($classCode, $courseTitle, $courseCode, $section){ //edits class with the new data
			$newData = array(
				'course_title' => $courseTitle,
				'course_code' => $courseCode,
				'section' => $section
			);

			$this->db->where('classCode', $classCode);
			$query=$this->db->update('subject', $newData); 
			
			if($query){			
				return true;
			}
			else{
				return false;
			}
		}
		
		public function archiveClass($classCode){ //removes class from user's list, not in database
			$newData = array(
				'archived' => 1
			);
			$this->db->where('classCode', $classCode);
			$query=$this->db->update('subject', $newData); 
			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		public function restoreClass($classCode){
			$newData = array(
				'archived' => 0
			);
			$this->db->where('classCode', $classCode);
			$query=$this->db->update('subject', $newData); 
			if($query){
				return true;
			}
			else{
				return false;
			}

		}
		
		public function addStudent($data){ //adds student on the database
			$query = $this->db->insert('student', $data);
			
			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		public function editStudent($data, $classCode, $stdNo){
			$this->db->where('classCode', $classCode);
			$this->db->where('student_no', $stdNo);
			
			
			//$this->db->update('temp_seatplan', $data);
			$query=$this->db->update('student', $data); 
			
			if($query){			
				return true;
			}
			else{
				return false;
			}
		}


		public function addMultipleStudents($classCode){
		  $fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");

		  if($fp!=null){

			  $csv_line = fgetcsv($fp,1024);

			  if($csv_line[0]!="Student Number" || $csv_line[1]!="Last Name" || $csv_line[2]!="First Name" || $csv_line[3]!="Middle Name"){
			  		return false;

			  }

			  else{
				   while($csv_line = fgetcsv($fp,1024)) //for each line
				   {

				   	
				 	
				 	for ($i = 1, $j = count($csv_line); $i < $j; $i++) { //for each cell in a line
				 
				 
				 	//data from csv file, put into insert_csv array with respective indices
				    $insert_csv = array();
				    $insert_csv['stdNo'] = $csv_line[0];
				    $insert_csv['lastName'] = $csv_line[1];
				    $insert_csv['firstName'] = $csv_line[2];
				    $insert_csv['middleName'] = $csv_line[3];
				    
				    
				   
				   }

				 
				   $data = array(
				   	//col_name => actual data
				    'student_no' => $insert_csv['stdNo'] ,
				    'firstName' => $insert_csv['firstName'],
				    'lastName' => $insert_csv['lastName'],
				    'middleName' => $insert_csv['middleName'] ,
				    'seated' => null,
				    'classCode' => $classCode,
				    );

				   //insert
				     $query=$this->db->insert('student', $data);
				   }


				        fclose($fp) or die("can't close file");
				        return $query;
				}
			}
			else{
				echo " file must not have been uploaded correctly";
			}

		}


		
		public function loadStudents($classCode){ //loads list of students
			$this->db->order_by("lastName", "asc");
			$query = $this->db->get_where('student', array('classCode' => $classCode));
			//$query = $this->db->query("SELECT * FROM students WHERE class_id='$id' ORDER BY lastName ASC;");
			
			if ($query->num_rows() > 0)
			{
			    
			   return $query->result();
			}
			else{
				return false;
			}
		}
		
		public function viewStudent($stdNo, $classCode){ //gets the student
			
			$query = $this->db->get_where('student', array('student_no' => $stdNo, 'classCode' => $classCode));
			if ($query->num_rows() > 0)
			{
			    
			   return $query->result();
			}
			else{
				return false;
			}
		}

		public function deleteStudent($classCode, $stdNo){
			$this->db->where('classCode', $classCode);
			$this->db->where('student_no', $stdNo);
			$query = $this->db->delete('student');


			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		public function deleteStudents($classCode){
			$this->db->where('classCode', $classCode);
			$query = $this->db->delete('student');


			if($query){
				return true;
			}
			else{
				return false;
			}
		}



		public function addTempSeat($data){
			$query = $this->db->insert('tempSeat', $data);

			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		public function clearAllSeats($classCode){

			$this->db->where('classCode', $classCode);

			$query = $this->db->delete('tempSeat');


			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		public function undoPrevious($data){

			$query = $this->db->get_where('tempSeat', array('classCode' => $data['classCode'], 'location_x' => $data['location_x'], 'location_y' => $data['location_y']));
			foreach ($query->result() as $row) {
			      $this->db->insert('undoneSeat',$row);
			}

			$this->db->where('classCode', $data['classCode']);
			$this->db->where('location_x', $data['location_x']);
			$this->db->where('location_y', $data['location_y']);
			$query = $this->db->delete('tempSeat');


			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		public function redoPrevious($data){
			$query = $this->db->get_where('undoneSeat', array('classCode' => $data['classCode'], 'location_x' => $data['location_x'], 'location_y' => $data['location_y']));
		
			foreach ($query->result() as $row) {
			      $this->db->insert('tempSeat',$row);
			}

			$this->db->where('classCode', $data['classCode']);
			$this->db->where('location_x', $data['location_x']);
			$this->db->where('location_y', $data['location_y']);
			$query = $this->db->delete('undoneSeat');

			if($query){
				return true;
			}
			else{
				return false;
			}

		}
		
		public function saveSeatLayout($classCode){ //saves permanent
			$query = $this->db->get_where('tempSeat', array('classCode' => $classCode));
		
			foreach ($query->result() as $row) {
			      $this->db->insert('seat',$row);
			}

			$this->db->where('classCode', $classCode);
			$query = $this->db->delete('tempSeat');
			
			if($query){
				return true;
			}
			else{
				return false;
			}
		}
		
		public function createSeatPlan($seat_id, $class_id, $x, $y){ //part of ajax functionality, once the circle is clicked, its details are saved to the database
			$data = array(
				'class_id' => $class_id,
				'stdNo' => NULL,
				'circle_id' => $seat_id,
				'position_x' => $x,
				'position_y' => $y
			);
			
			$query = $this->db->insert('temp_seatplan', $data);
			
			if($query){
				return true;
			}
			else{
				return false;
			}
		}
		

		
		public function saveStudentToSeat($location_x, $location_y, $stdNo, $tableName, $class_id){ //saves the student to the seat (arrange students)
			$this->db->where('student_no', $stdNo);
			$this->db->where('classCode', $class_id);
			$seat = array( //the student is now seated
				'seated' => 1
			);
			$this->db->update('student', $seat);
		
			$this->db->where('location_x', $location_x);
			$this->db->where('location_y', $location_y);
			$this->db->where('classCode', $class_id);
			$data = array(
				'stud_no' => $stdNo //the student is seated according the id of the circle
			);
			
			//$this->db->update('temp_seatplan', $data);
			$this->db->update($tableName, $data);
		
		}
		
		public function getOccupiedSeats($id, $table){ //gets seats that are already occupied
			$query = $this->db->query("SELECT * FROM $table WHERE class_id = '$id';");
			
			if ($query->num_rows() > 0)
			{
			    
			   return $query->result();
			}
			else{
				return false;
			}
		}
		
		public function finalizeSeatPlan($class_id){ //seat plan is finalized
			$query = $this->db->query("INSERT INTO seatplan SELECT * FROM temp_seatplan WHERE class_id = '$class_id';");
			
			$this->db->where('class_id', $class_id);
			$this->db->delete('temp_seatplan');
			if($query){
				return true;
			}
			else{
				return false;
			}
		}
		
		public function viewSeatPlan($classCode){ //view the final seat plan, including the arrangements of the students
			
			$query = $this->db->get_where('seat', array('classCode' => $classCode));
			
			if ($query->num_rows() > 0)
			{
			    
			   return $query->result();
			}
			else{
				return false;
			}
		}
		
		public function deleteSeatPlan($class_id){ //deletes seat plan
			$this->db->where('classCode', $class_id);
			$this->db->delete('seat'); 
			
			$data = array(
               'seated' => NULL
            );

			$this->db->where('classCode', $class_id);
			$this->db->update('student', $data);
		}
		
		
		public function getMinimum($value, $table, $col, $classCode){ //gets minimum last name
		
			//$seat=$this->model_users->getMinimum('circle_id','seatplan','stdNo', $class_id);
			$this->db->select_min($value);
			$query = $this->db->get_where($table, array($col => null, 'classCode' => $classCode));
			//$query = $this->db->query("SELECT MIN($value) AS dataName FROM $table WHERE $col is NULL AND classCode='$class_id';");
			
			if ($query->num_rows() > 0)
			{
			    
			   return $query->row();
			}
			else{
				return false;
			}
		
		}

		public function getMaximum($value, $table, $col, $classCode){ //gets minimum last name
		
			//$seat=$this->model_users->getMinimum('circle_id','seatplan','stdNo', $class_id);
			$this->db->select_max($value);
			$query = $this->db->get_where($table, array($col => null, 'classCode' => $classCode));
			//$query = $this->db->query("SELECT MIN($value) AS dataName FROM $table WHERE $col is NULL AND classCode='$class_id';");
			
			if ($query->num_rows() > 0)
			{
			    
			   return $query->row();
			}
			else{
				return false;
			}
		
		}

		public function getOtherValue($value1, $value2, $col_value1, $table, $col, $classCode, $type){
			if(strcmp($type, "min")==0){
				$this->db->select_min($value2);
			}
			else if(strcmp($type, "max")==0){
				$this->db->select_max($value2);
			}
			$query = $this->db->get_where($table, array($col => null, $col_value1 => $value1,  'classCode' => $classCode));

			if ($query->num_rows() > 0)
			{
			    
			   return $query->row();
			}
			else{
				return false;
			}
		}
		

		public function assignStudentAlphabetically($lastName, $location_x, $location_y, $class_id){ //assigns student alphabetically
			$query = $this->db->get_where('student', array('lastName' => $lastName, 'classCode' => $class_id));
			//$query = $this->db->query("SELECT * from student WHERE lastName = '$lastName' AND classCode='$class_id';");
			
			$this->saveStudentToSeat($location_x, $location_y, $query->row()->student_no, 'seat', $class_id);
		}

		public function getRandomStudent($class_id){
			$this->db->order_by("lastName", "RANDOM");
			$query = $this->db->get_where('student', array('classCode' => $class_id, 'seated' => null), 1);

			if ($query->num_rows() > 0)
			{
			    
			   return $query->row();
			}
			else{
				return false;
			}
		}


		public function assignStudentRandomly($stdNo, $location_x, $location_y, $class_id){
			

			$this->saveStudentToSeat($location_x, $location_y, $stdNo, 'seat', $class_id);
		}

		public function deleteArrangement($classCode){
			$newData = array(
				'stud_no' => null
			);
			$this->db->where('classCode', $classCode);
			$query=$this->db->update('seat', $newData); 
			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		public function assignStudentManually($classCode, $stdNo, $location_x, $location_y){
			$data = array(
				'stud_no' => $stdNo,//the student is seated according the id of the circle
			//	'location_x' => $location_x,
			//	'location_y' => $location_y,
			//	'classCode' => $classCode
			);

			$this->db->where('classCode', $classCode);
			$this->db->where('location_x', $location_x);
			$this->db->where('location_y', $location_y);

			$query=$this->db->update('seat', $data);

			$data = array(
				'seated' => 1,//the student is seated according the id of the circle
			//	'location_x' => $location_x,
			//	'location_y' => $location_y,
			//	'classCode' => $classCode
			); 

			$this->db->where('student_no', $stdNo);
			$query=$this->db->update('student', $data);

			if($query){
				return true;
			}
			else{
				return false;
			}

		}

		public function undoStudentAssignment($classCode, $location_x, $location_y){
			$data = array(
				'stud_no' => null,//the student is seated according the id of the circle
			//	'location_x' => $location_x,
			//	'location_y' => $location_y,
			//	'classCode' => $classCode
			);

			$this->db->where('classCode', $classCode);
			$this->db->where('location_x', $location_x);
			$this->db->where('location_y', $location_y);

			$query=$this->db->update('seat', $data); 
			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		public function deleteStudentArrangement($classCode, $stdNo){
			$newData = array(
				'stud_no' => null
			);
			$this->db->where('classCode', $classCode);
			$this->db->where('stud_no', $stdNo);
			$query=$this->db->update('seat', $newData); 
			if($query){
				return true;
			}
			else{
				return false;
			}
		}
		
		public function loadAbsenceDates($classCode){

			$this->db->select('date_of_absence');
			$this->db->distinct();
			$query = $this->db->get_where('absence', array('classCode' => $classCode));
			
			if($query->num_rows() > 0){
				return $query->result();
			}
			else{
				return false;
			}
		}

		public function loadAllPresentDates($classCode){
			$query = $this->db->get_where('allPresent', array('classCode' => $classCode));
			
			if($query->num_rows() > 0){
				return $query->result();
			}
			else{
				return false;
			}
		}

		
		public function viewAbsences($stdNo, $classCode){
			$this->db->order_by("date_of_absence", "asc");
			$query = $this->db->get_where('absence', array('stud_no' => $stdNo, 'classCode' => $classCode));
			
			if($query->num_rows() > 0){
				return $query->result();
			}
			else{
				return false;
			}
		}

		public function editAbsence($data, $stdNo, $classCode){
			$this->db->where('classCode', $classCode);
			$this->db->where('stud_no', $stdNo);
			
			
			//$this->db->update('temp_seatplan', $data);
			$query=$this->db->update('absence', $data); 
			
			if($query){			
				return true;
			}
			else{
				return false;
			}
		}

		public function addAbsence($classCode, $stdNo, $date){
			$data = array(
					'stud_no' => $stdNo,
					'date_of_absence' => $date,
					'classCode' => $classCode,
				);

			$query = $this->db->insert('absence', $data);
			if($query){			
				return true;
			}
			else{
				return false;
			}

		}

		public function editAbsenceDate($classCode, $stdNo, $aDate, $data){
			$this->db->where('classCode', $classCode);
			$this->db->where('stud_no', $stdNo);
			$this->db->where('date_of_absence', $aDate);
			
			
			//$this->db->update('temp_seatplan', $data);
			$query=$this->db->update('absence', $data); 
			
			if($query){			
				return true;
			}
			else{
				return false;
			}
		}

		public function deleteAbsence($classCode, $stdNo, $date){
			$this->db->where('classCode', $classCode);
			$this->db->where('stud_no', $stdNo);
			$this->db->where('date_of_absence', $date);

			$query=$this->db->delete('absence'); 
			
			if($query){			
				return true;
			}
			else{
				return false;
			}

		}

		public function deleteStudentAbsences($classCode, $stdNo){
			$this->db->where('classCode', $classCode);
			$this->db->where('stud_no', $stdNo);
			
			
			//$this->db->update('temp_seatplan', $data);
			$query=$this->db->delete('absence'); 
			
			if($query){			
				return true;
			}
			else{
				return false;
			}
		}


		public function editStudentAbsences($classCode, $stdNo, $data){
			$this->db->where('classCode', $classCode);
			$this->db->where('stud_no', $stdNo);
			
			
			//$this->db->update('temp_seatplan', $data);
			$query=$this->db->update('absence', $data); 
			
			if($query){			
				return true;
			}
			else{
				return false;
			}
		}

		public function deleteAbsences($classCode){
			$this->db->where('classCode', $classCode);
			
			
			
			//$this->db->update('temp_seatplan', $data);
			$query=$this->db->delete('absence'); 
			
			if($query){			
				return true;
			}
			else{
				return false;
			}
		}

		public function loadAbsentStudentsDate($attendanceDate, $classCode){
			$query = $this->db->get_where('absence', array('classCode' => $classCode, 'date_of_absence' => $attendanceDate));
			
			if ($query->num_rows() > 0)
			{
			    
			   return $query->result();
			}
			else{
				return false;
			}
		}

		public function loadPresentStudentsDate($absentStudents, $classCode){
			//					tableName 		array
			$this->db->where_not_in('student_no', $absentStudents);
			$query = $this->db->get_where('student', array('classCode' => $classCode));
			
			if ($query->num_rows() > 0)
			{
			    
			   return $query->result();
			}
			else{
				return false;
			}
		}

		public function loadAbsentStudentsDetails($absentStudents, $classCode){
			$this->db->where_in('student_no', $absentStudents);

			$query = $this->db->get_where('student', array('classCode' => $classCode));
			
			if ($query->num_rows() > 0)
			{
			    
			   return $query->result();
			}
			else{
				return false;
			}
		}

		public function loadUnseatedStudents($classCode){ //loads list of students
			$this->db->order_by("lastName", "asc");
			$query = $this->db->get_where('student', array('classCode' => $classCode, 'seated' => null));
			//$query = $this->db->query("SELECT * FROM students WHERE class_id='$id' ORDER BY lastName ASC;");
			
			if ($query->num_rows() > 0)
			{
			    
			   return $query->result();
			}
			else{
				return false;
			}
		}


		
		
		
	}
