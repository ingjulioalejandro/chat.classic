<html>
<title>PLUG (Sharing Files)</title>

<?php
$conn=new PDO('mysql:host=localhost; dbname=myweb', 'root', '') or die(mysqli_error($conn));
if(isset($_POST['submit'])!=""){
  $name=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  $date = date('Y-m-d H:i:s');
  $caption1=$_POST['caption'];
  $link=$_POST['link'];
  
  move_uploaded_file($temp,"files/".$name);

$query=$conn->query("INSERT INTO upload (name,date) VALUES ('$name','$date')");
if($query){
header("location:index.php");
}
else{
die(mysqli_error($conn));
}
}
?>


<html>
<body>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
</head>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
<?php include('dbcon.php'); ?>
<style>


body{


background-image: url("2089149.jpg");
background-repeat: no-repeat;
background-size: cover;

}

.table tr th{
	
	border:#eee 1px solid;
	
	position:relative;
	#font-family:"Times New Roman", Times, serif;
	font-size:12px;
	text-transform:uppercase;
	}
	table tr td{
	
	border:#eee 1px solid;
	color:#000;
	position:relative;
	#font-family:"Times New Roman", Times, serif;
	font-size:12px;
	
	text-transform:uppercase;
	}
	
#wb_Form1
{
   background-color: rgba(255,255,255,0.4);
   border: 0px #000 solid;
  
}
#photo
{
   background-color: rgba(255,255,255,0);
   color: #fff;
   font-family:Arial;
   font-size: 20px;
}
	</style>
	
	<div style="text-align:center;color:rgba(0,0,0)">                     
	<font size="+2"><b>PLUG</b>
    </div>
	<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
		<tr>
			<td>
				<form enctype="multipart/form-data"  action="" id="wb_Form1" name="form" method="post">
				<input type="file" name="photo" id="photo"  required="required" >
			</td>
			<td>
				<input type="submit" class="btn btn-danger" style="background-color:rgba(51,51,51);color: white;border: 1px" value="Upload File" name="submit">
				</form>
		</tr></td>
	</table>
	<div class="col-md-18">
	<div class="container-fluid" style="margin-top:0px;" >
   <div class = "row">
		<div class="panel panel-default" style="background-color:rgba(255,255,255,0.4)">
			<div class="panel-body">
				<div class="table-responsive">


							<form method="post" action="delete.php" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-condensed" id="example">
                            
                            <thead>
						
                                <tr>
                                    
                                    <th>ID</th>
                                    <th>FILE NAME</th>
                                   <th>Date</th>
				<th>Download</th>
				<th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$query=mysqli_query($conn,"select * from upload ORDER BY id DESC")or die(mysqli_error($conn));
							while($row=mysqli_fetch_array($query)){
							$id=$row['id'];
							$name=$row['name'];
							$date=$row['date'];
							?>
                              
										<tr>
										
                                         <td><?php echo $row['id'] ?></td>
                                         <td><?php echo $row['name'] ?></td>
                                         <td><?php echo $row['date'] ?></td>
										<td>
				<a href="download.php?filename=<?php echo $name;?>" title="click to download"><span class="glyphicon glyphicon-paperclip" style="font-size:20px; color:blue"></span></a>
				</td>
				<td>
				<a href="delete.php?del=<?php echo $row['id']?>"><span class="glyphicon glyphicon-trash" style="font-size:20px; color:red"></span></a>
				</td>
                                </tr>
                         
						          <?php } ?>
                            </tbody>
                        </table>
						
                              
                               
								
                            </div>
          
</form>
<a href="../login.php" class="btn btn-danger" style="background-color:rgba(51,51,51);color: white;border: 1px" >Go To Chat App</a>
        </div>
        </div>
        </div>
    </div>



</body>
</html>


