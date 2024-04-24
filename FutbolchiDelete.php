<?php
	include_once 'dbconfig.php';
	if(isset($_GET['f_i']))
	{ 
		$Id=$_GET['f_i'];
		$sql="DELETE FROM futbolchilar WHERE Id = ".$Id;
		
		if (mysqli_query($host, $sql)) 
		{
		?>
			<script type="text/javascript">
				alert("Ma\'lumot o`chirildi ");
				window.location.href="Futbolchi.php";
			</script>
		<?php
		}

	}
?>