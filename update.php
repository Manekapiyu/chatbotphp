<?php
require_once 'dbconfig/config.php';

$rn = $_GET['rn'] ?? '';
$ques = $_GET['ques'] ?? '';
$rep = $_GET['rep'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<style>
		input{
			font-size: 1vw;
		}
		table{
			color: white;
			border-radius: 19px;
			background: linear-gradient(blue,black,blue);
		}
		#button {
			background-color: rgba(0,0,0,0.6);
			color: white;
			height: 32px;
			width: 125px;
			border-radius: 25px;
			font-size: 16px;
		}
		body{
			background: linear-gradient(black,black);
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% 100%;
		}
	</style>
</head>
<body>
<br><br><br><br><br><br>
<form action="" method="GET">
	<table border="0" bgcolor="black" align="center" cellspacing="50">
		<tr>
			<td>Id</td>
			<td><input type="text" value="<?php echo htmlspecialchars($rn); ?>" name="id" required></td>
		</tr>
		<tr>
			<td>Question</td>
			<td><input type="text" value="<?php echo htmlspecialchars($ques); ?>" name="question" required></td>
		</tr>
		<tr>
			<td>Reply</td>
			<td><input type="text" value="<?php echo htmlspecialchars($rep); ?>" name="reply" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" id="button" name="submit" value="Update Details"/>
			</td>
		</tr>
	</table>
</form>

<?php
if(isset($_GET['submit'])) {
	$id = $_GET['id'];
	$question = $_GET['question'];
	$reply = $_GET['reply'];

	$sql = "UPDATE CHATBOT_HINTS SET question=:question, reply=:reply WHERE id=:id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':question', $question);
	$stmt->bindParam(':reply', $reply);
	$stmt->bindParam(':id', $id);

	if($stmt->execute()) {
		echo "<script>alert('Record Updated');</script>";
		echo '<meta http-equiv="refresh" content="0; URL=qna.php">';
	} else {
		echo "Failed To Update Record";
	}
}
?>
</body>
</html>
