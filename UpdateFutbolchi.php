<?php
	include_once 'dbconfig.php';
	
	if(isset($_GET['f_i']))
	{ 
		$Id=$_GET['f_i'];
	}
?>


<?php
	if(isset($_POST['ozgartir']))
	{ 
		$name = $_POST['IsmSharifi'];
		$shirtNum = $_POST['FutbolkaRaqami'];
		$position = $_POST['Pozitsiyasi']; 
		$yoshi = $_POST['Yoshi'];
		$millati = $_POST['Millati'];
		$sql = "UPDATE futbolchilar SET IsmSharifi='$name', FutbolkaRaqami='$shirtNum', Pozitsiyasi='$position', 
		Yoshi='$yoshi', Millati='$millati' WHERE Id=".$Id;

		if (mysqli_query($host, $sql)) 
		{
		?>
			<script type="text/javascript">
			alert("Ma'lumotlar o`zgartirildi ");
			window.location.href="Futbolchi.php";
			</script>
		<?php
		} else {
		?>
			<script type="text/javascript">
			alert("Xatolik yuz berdi");
			</script>
		<?php
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Futbolchilar</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="FutbolchiStyle.css" type="text/css" />
<link href="BoshMenyuStyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
</head>

<body>
<div class="main">
  <div class="header">
    
    <div class="header_resize">
      
      <div class="logo">
        <h1><a href="BoshMenyu.php">Futbol <span>klubi </span></a><span>boshqaruvi</span></h1>
      </div>
      
      <div class="clr"></div>
      
      <div class="menu_nav">
        <ul>
          <li><a href="BoshMenyu.php">Asosiy</a></li>
          <li class="active"><a href="Futbolchi.php">Futbolchilar</a></li>
          <li><a href="zakaz.php">Sovrinlar</a></li>
        </ul>
      </div>
      
      <div class="clr"></div>
    </div>
  </div>

  <form method="post">
    <div class="content">
        <div id="body">
            <div id="content">
                <table align="center" style="margin-left: 150px;">    
                    <tr>
                        <th style="">Ism sharifi</th>
                        <th>Futbolka raqami</th>
                        <th>Pozitsiyasi</th>
                        <th>Yoshi</th>
                        <th>Millati</th>
                    </tr>
                
                    <?php
                    $sql_query="SELECT * FROM futbolchilar WHERE Id='$Id'";
                    $result_set=mysqli_query($host,$sql_query); 
                    
                    while($row=mysqli_fetch_assoc($result_set))
                    {
                    ?>
                        <tr>
                            <td><input type="text" name="IsmSharifi" value="<?php echo $row['IsmSharifi']; ?>"/></td>
                            <td><input type="text" name="FutbolkaRaqami" value="<?php echo $row['FutbolkaRaqami']; ?>"/></td>
                            <td><input type="text" name="Pozitsiyasi" value="<?php echo $row['Pozitsiyasi']; ?>"/></td>        
                            <td><input type="text" name="Yoshi" value="<?php echo $row['Yoshi']; ?>"/></td>
                            <td>
                                <input type="text" name="Millati" value="<?php echo $row['Millati']; ?>"/>
                            </td>
                            <td><input type="submit" style="width: 120px;" name="ozgartir" value="o`zgartirish"  /></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table> <br />
            </div>
        </div>
    </div>
  </form>
</div>
</body>
</html>