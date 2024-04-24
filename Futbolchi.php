<?php 
include_once 'dbconfig.php';

$sql_query="SELECT futbolchilar.Id, futbolchilar.IsmSharifi, futbolchilar.FutbolkaRaqami, futbolchilar.Pozitsiyasi, futbolchilar.Yoshi, davlatlar.Millat FROM futbolchilar 
            INNER JOIN davlatlar ON futbolchilar.Millati = davlatlar.Id";

if (isset($_GET['search'])) 
{
    $futbolka_raqami = $_GET['futbolka_raqami'];

    $sql_query .= " WHERE 1=1";

    if (!empty($futbolka_raqami)) {
        $sql_query .= " AND futbolchilar.FutbolkaRaqami LIKE '%$futbolka_raqami%'";
    }
}

$result_set=mysqli_query($host,$sql_query);
?>

<script type="text/javascript">
    function edt_id(id)
    {
        if(confirm('Rostdan ma`lumotlarni o`zgartirasizmi ?'))
        {
            window.location.href="UpdateFutbolchi.php?f_i=" + id;
        }
    }
    function delete_id(id)
    {
        if(confirm('Rostdan ma`lumotlarni o`chirasizmi ?'))
        {
            window.location.href="FutbolchiDelete.php?f_i=" + id;
        }
    }
</script>

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

  <div class="content">
    <div id="body">
        <div id="content">
            <form method="get" action="" style="font">
                <input type="text" name="futbolka_raqami" placeholder="Futbolka raqami" />       
                <input type="submit" name="search" value="Search" />
            </form> <br />

            <table align="center" style="margin-left: 150px;">    
                <th style="">Ism sharifi</th>
                <th>Futbolka raqami</th>
                <th>Pozitsiyasi</th>
                <th>Yoshi</th>
                <th>Millati</th>
                <th colspan="3">Amallar</th>
            
                <?php
                //$sql_query="SELECT futbolchilar.Id, futbolchilar.IsmSharifi, futbolchilar.FutbolkaRaqami, futbolchilar.Pozitsiyasi, futbolchilar.Yoshi, davlatlar.Millat FROM futbolchilar 
                            //INNER JOIN davlatlar ON futbolchilar.Millati = davlatlar.Id";
                //$result_set=mysqli_query($host,$sql_query);
                while($row=mysqli_fetch_row($result_set))
                {
                ?>
                    <tr>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[5]; ?></td>
        
		                <td align="center">
                            <a href="javascript:edt_id('<?php echo $row[0]; ?>')">
                                <button name="Uzgartir"style="width: 100px;" >Yangilash</button>
                            </a>
                        </td>
                    
                        <td align="center">
                            <a href="javascript:delete_id('<?php echo $row[0]; ?>')">
                            <button name="Uchir"style="width: 100px;">O`chirish</button>
                            </a>
                        </td>
                        <!--<td align="center">
                            <?echo "<a href=\"taxi_sql.php?t_i=$row[0]\">Malumotlar izlash</a>";?>
                        </td>
                        -->
                    </tr>
                <?php
                }
                ?>
            </table>
            
            <div style="background-color: aqua;width: 200px;height: 30px;margin-left: 45%;margin-top: -30px; border-style: double;border-color: black;">
                <a href="FutbolchiAdd.php">
                    <font color="black"style="padding-left: 7px;padding-top: 15px;">Yangi futbolchi qo`shish</font>
                </a>
            </div> <br />
        </div>
    </div>
  </div>
</div>
</body>
</html>
