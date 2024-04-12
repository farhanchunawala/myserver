<?php
	$dbc = mysqli_connect('localhost', 'root', '', 'myfitness') or die('Error connecting to MySQL server.'.mysqli_error($dbc));
	//$srh = $_REQUEST["srh"];
	
	class cust {
		public $food_id;
		public $name;
		public $quantity;
		public $protein;
		public $calorie;
		
		function set_food_id($food_id)					{ $this->food_id = $food_id; }
		function set_name($name)			{ $this->name = $name; }
		function set_quantity($quantity)	{ $this->quantity = $quantity; }
		function set_protein($protein)	{ $this->protein = $protein; }
		function set_calorie($calorie)	{ $this->calorie = $calorie; }
	}
	
	$query1 = "SELECT * FROM food ORDER BY food_id";
	$result1 = mysqli_query($dbc, $query1) or die('Error querying database query1.');
	$i=0;
	while ($rowq1 = mysqli_fetch_array($result1)) {
		$food_id		 = $rowq1['food_id'];
		$name		 = $rowq1['name'];
		$quantity = $rowq1['quantity'];
		$protein	 = $rowq1['protein'];
		$calorie	 = $rowq1['calorie'];
		
		${'food_id'.$food_id} = new cust();
		$myArr[$i] = ${'food_id'.$food_id};
		
		${'food_id'.$food_id}->set_food_id($food_id);
		${'food_id'.$food_id}->set_name($name);
		${'food_id'.$food_id}->set_quantity($quantity);
		${'food_id'.$food_id}->set_protein($protein);
		${'food_id'.$food_id}->set_calorie($calorie);
		$i=$i+1;
	}
	
	mysqli_close($dbc);
	$myJSON = json_encode($myArr);
	echo $myJSON;
?>