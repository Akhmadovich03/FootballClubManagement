<?php
	include_once 'dbconfig.php';
	if(isset($_POST['btn-save']))
	{
		$ism_sharifi = $_POST['ism_sharifi'];
		$futbolka_raqami = $_POST['futbolka_raqami'];
		$pozitsiyasi = $_POST['pozitsiyasi']; 
		$yoshi = $_POST['yoshi'];
		$millati = $_POST['millat']; 
		$sql_query = "INSERT INTO futbolchilar(IsmSharifi,FutbolkaRaqami,Pozitsiyasi,Yoshi,Millati) VALUES('$ism_sharifi','$futbolka_raqami','$pozitsiyasi','$yoshi','$millati')";
 
		if(mysqli_query($host,$sql_query))
		{
		?>
			<script type="text/javascript">
				alert('Ma\'lumotlar qo\'shildi ');
				window.location.href='Futbolchi.php';
			</script>
		<?php
		}
		else
		{
		?>
			<script type="text/javascript">
				alert('Xatolik yuz berdi');
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

  <div id="body" style="margin-left: 10%;">   
    <div id="content">
        <form method="post">
            <table align="center">
                <tr>
                    <td align="center"><a href="">Yangi futbolchi ma`lumotlarini qo`shish</a></td>
                </tr>
                <tr>
                    <td><input type="text" name="ism_sharifi" placeholder="Ism sharifi" required /></td>
                </tr>
                <tr>
                    <td><input type="text" name="futbolka_raqami" placeholder="Futbolka raqami" required /></td>
                </tr>
                <tr>
                    <td><input type="text" name="pozitsiyasi" placeholder="Pozitsiyasi" required /></td>
                </tr>
                <tr>
                    <td><input type="text" name="yoshi" placeholder="Yoshi" required /></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $sql_courses = "SELECT Id, Millat FROM davlatlar";
                        $result_courses = mysqli_query($host, $sql_courses);
                        ?>
                        
                        <select name="millat" required>
                            <option value="" disabled selected>Millat tanlang</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($result_courses)) {
                                    echo '<option value="' . $row['Id'] . '">' . $row['Millat'] . '</option>';
                                }
                                ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button type="submit" name="btn-save" style="margin-left: 25%;"><strong>SAQLASH</strong></button></td>
                </tr>
            </table>
        </form>
    </div>
  </div>
</div>
</body>
</html>