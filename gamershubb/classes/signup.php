<?php 

class Signup
{

	private $error = "";

	public function evaluate($data)
	{

		foreach ($data as $key => $value) {
			# code...

			if(empty($value))
			{
				$this->error = $this->error . $key . " is empty!<br>";
			}

			if($key == "email")
			{
				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)) {
        
 					$this->error = $this->error . "invalid email address!<br>";
    			}
			}

			if($key == "first_name")
			{
				if (is_numeric($value)) {
        
 					$this->error = $this->error . "first name cant be a number<br>";
    			}

    			if (strstr($value, " ")) {
        
 					$this->error = $this->error . "first name cant have spaces<br>";
    			}
 
			}

			if($key == "last_name")
			{
				if (is_numeric($value)) {
        
 					$this->error = $this->error . "last name cant be a number<br>";
    			}

    			if (strstr($value, " ")) {
        
 					$this->error = $this->error . "last name cant have spaces<br>";
    			}

			}
			
			if($key == "username")
			{
				if (strlen($value) > 8) {
        
					$this->error = $this->error . "username too long<br>";
			   }
			}
		}

		$DB = new Database();

		//check tag name
		$data['tag_name'] = strtolower($data['username']);

		$sql = "select id from users where tag_name = '$data[tag_name]' limit 1";
		$check = $DB->read($sql);
		while(is_array($check)){

			$data['tag_name'] = strtolower($data['username']) . rand(0,9999);
			$sql = "select id from users where tag_name = '$data[tag_name]' limit 1";
			$check = $DB->read($sql);
		}

		$data['userid'] = $this->create_userid();
		//check userid
		$sql = "select id from users where userid = '$data[userid]' limit 1";
		$check = $DB->read($sql);
		while(is_array($check)){

			$data['userid'] = $this->create_userid();
			$sql = "select id from users where userid = '$data[userid]' limit 1";
			$check = $DB->read($sql);
		}

		//check email
		$sql = "select id from users where email = '$data[email]' limit 1";
		$check = $DB->read($sql);
		if(is_array($check)){

			 $this->error = $this->error . "Another user is already using that email<br>";
		}

		//check username
		$sql = "select id from users where username = '$data[username]' limit 1";
		$check = $DB->read($sql);
		if(is_array($check)){

			 $this->error = $this->error . "Another user is already using that username<br>";
		}

		if($this->error == "")
		{

			//no error
			$this->create_user($data);
		}else
		{
			return $this->error;
		}

		//check username
		$sql = "select id from users where username = '$data[username]' limit 1";
		$check = $DB->read($sql);
		if(is_array($check)){

			 $this->error = $this->error . "Another user is already using that username<br>";
		}
	}

	public function create_user($data)
	{

		$first_name = ucfirst($data['first_name']);
		$last_name = ucfirst($data['last_name']);
		$gender = $data['gender'];
		$email = $data['email'];
		$password = $data['password'];
		$like = "0";
		$userid = $data['userid'];
		$tag_name = $data['tag_name'];
		$username = $data['username'];
		$game = $data['game'];


		$password = hash("sha1", $password);
		
		//create these
		$url_address = strtolower($username);

		$query = "insert into users 
		(userid,first_name,last_name,gender,email,password,url_address,likes,tag_name,username,game) 
		values 
		('$userid','$first_name','$last_name','$gender','$email','$password','$url_address','$like','$tag_name','$username','$game')";


		$DB = new Database();
		$DB->save($query);
	}
 
	private function create_userid()
	{

		$length = rand(4,19);
		$number = "";
		for ($i=0; $i < $length; $i++) { 
			# code...
			$new_rand = rand(0,9);

			$number = $number . $new_rand;
		}

		return $number;
	}
}