<?php 

class Ajax 
{
	private  $db;
	function __construct(){
		session_start();
		$this->db = new mysqli("localhost", "root", "", "poll2");
		if (isset($_POST["action"])){
			if($_POST["action"] == "ajax1"){
				$this->save();
			} else if($_POST['action'] == "ajax2"){
				$this->show();
			}  else if($_POST['action'] == "ajax3"){
				$this->activ();
			}
		}	

	}	
	
	function save(){
		$harc = $_POST['harc'];
		$answer = $_POST['answer'];
		$this->db->query("INSERT INTO harc(harc) VALUES($harc)");
		$id = $this->db->insert_id;
		foreach ($answer as $key ) {
			$this->db->query("INSERT INTO patasxan(patasxan, harc_id) VALUES('$key',$id)");

		}
	}


	function show(){
		$data = $this->db->query("SELECT * FROM harc ")->fetch_all(true);
		print json_encode($data);
	}


	function activ(){
		$id = $_POST['id'];
		var_dump($id);
$this->db->query("UPDATE harc set activ = 0 WHERE activ = 1");
$this->db->query("UPDATE harc set activ = 1 WHERE id = $id");

	}
}

$a = new Ajax();
?>