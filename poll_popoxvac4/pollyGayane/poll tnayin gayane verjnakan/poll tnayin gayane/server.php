<?php 

class Ajax{
	private $db;
	function __construct(){
		$this->db = new mysqli('localhost','root','','poll2');
		if(isset($_POST["action"])){
			if($_POST["action"]=="ajax1"){
				$this->A1();
			}
			if($_POST["action"]=="ajax2"){
				$this->A2();
			}
			if($_POST["action"]=="ajax3"){
				$this->A3();
			}
			if($_POST["action"]=="active_harc"){
				$this->A4();
			}
			if($_POST["action"]=="miavor"){
				$this->A5();
			}

		}
	}


		function A1(){
			$harc = $_POST['harc'];
			$answer = $_POST['answer'];
			$this->db->query("INSERT INTO Harc(harc) values('$harc')");
			$id = $this->db->insert_id;
			foreach ($answer as $key) {
				$this->db->query("INSERT INTO Patasxan(patasxan, harc_id) values('$key','$id')");
			}
			var_dump($answer);
		}
		function A2(){
			$h = $this->db->query("SELECT * from Harc")->fetch_all(true);
			print json_encode($h);
		}

		function A3(){
			$id = $_POST['id'];
			$h = $this->db->query("UPDATE Harc SET activ = 0");
			$h = $this->db->query("UPDATE Harc SET activ = 1 WHERE id = $id ");
			
		}
		function A4(){
			$h = $this->db->query("SELECT * from Harc join Patasxan on Harc.ID = Patasxan.harc_ID WHERE harc.activ = 1 ")->fetch_all(true);
			print json_encode($h);
		}
		function A5(){
			$id = $_POST['id'];
			$h = $this->db->query("UPDATE Patasxan SET miavor = miavor+1 WHERE ID = $id ");
			
			$series = $this->db->query("SELECT * from Harc join Patasxan on Harc.ID = Patasxan.harc_ID WHERE harc.activ = 1 ")->fetch_all(true);
			print json_encode($series);
		}





	}


	$a = new Ajax();














	?>