<?php
define( 'ROOT_DIR', dirname(__FILE__) );
require_once(ROOT_DIR . '/AES.php');

	class DbConn {
		public $conn;
		function __construct() {
			$this->conn = mysqli_connect("localhost", "root", "", "sncpdpu");
		}
		function selectQry($qry) {
			$result = mysqli_query($this->conn, $qry);
			if(!$result) echo "Error: ".mysqli_error($this->conn);
			else return $result;
		}
		function nonSelectQry($qry) {
			$result = mysqli_query($this->conn, $qry);
			if(!$result) echo "Error: ".mysqli_error($this->conn);
			else return true;
		}
		function multiNonSelectQry($qry) {
			$result = mysqli_multi_query($this->conn, $qry);
			if(!$result) echo "Error: ".mysqli_error($this->conn);
			else return true;
		}
		function selectcount($qry) {
			$result = mysqli_num_rows($qry);
			return $result;
		}
		function __destruct() {
			mysqli_close($this->conn);
		}
	}

	function makeSafe($txt, $mode = false) {
		if($txt !== "") {
			$conn = mysqli_connect("localhost", "root", "", "sncpdpu");
			$txt = mysqli_real_escape_string($conn, $txt);
			if($mode == false) return $txt;
			else {
				if($mode == "encrypt") {
					$aes = new AES($txt);
					return base64_encode($aes->encrypt());
				}
				else if($mode == "decrypt") {
					$aes = new AES(base64_decode($txt));
					return $aes->decrypt();
				}
				else return $txt;
			}
		}
	}

?>