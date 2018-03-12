<?php
session_start();
$loginError = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
        
        
    $usernameSuccess = (is_string($username) && strlen($username) > 2);
    $passwordSuccess = (strlen($password) > 7);
    
    if ($usernameSuccess && $passwordSuccess){
        
        try {
            $connection = Service\DBConnector::getConnection();
        } catch (PDOException $exception){
            http_response_code(500);
            echo 'A problem occured, contact support';
            exit (10);
        }
        
        
        
        // check that the username does not already exist.
        
        $mySQLInstruction = "SELECT count(id) AS nbusername FROM user WHERE username = :username and `password` = :password";
        $myStatement = $connection->prepare($mySQLInstruction);
        $myStatement->bindParam('username', $username, PDO::PARAM_STR);
        $myStatement->bindParam('password', $password, PDO::PARAM_STR);

        $myStatement->execute();

        $resultArray = $myStatement->fetch();
        
        if ($resultArray['nbusername']> 0){
            // Login OK => we can open a session
            
            session_start();
            $_SESSION['user'] = $username;
            
        } else {
            $loginError = true;
        }
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Register</title>

	<style>
	form{
    	width : 80%;
    	margin : auto;
    	border : 1px solid blue;
    	border-radius : 10px;
    	padding : 20px 30px;
    	box-shadow: 10px 10px 8px blue;
	}

	form div {
    	display : flex;
    	flex-direction : row;
    	justify-content : center;
    	width : 100%;
    	margin : auto;
    	padding-top : 5px;
    	padding-bottom : 5px;
    	background-color : lightblue;
	}
	form label{
	   text-align : right;
	   display : block;
       width : 40%;

	}
	form button {
	display : block;
	width : 30%;
	border-radius : 10px;
	background-color : orange;
	margin : auto;
	}

	form input {
	   border : 1px solid black;
	   border-radius : 5px;
	   padding-left : 15px;
	   margin : 0px 10px;
	   width : 40%;
	   transition-duration : 1s;
	}

	form input:hover{
	border-color : blue;
	transform : scale(1.04);
	}

	.redBox{
	   color : red;
	}
	</style>


	</head>
	<body>
	<?php 
	if (isset($_SESSION['user'])){
	?>
	<p>User already logged in !</p>
	    
	<?php
     } else {
	
	?>

	<form method="POST">
		<?php if ($loginError){?>
			<div class="redBox">Login Error !</div>
		<?php }?>
		<div class="userData">
    		<label for "username">Your username :</label>
    		<input type="text" name="username" value="<?php echo htmlentities($_POST['username']??'')?>" placeholder="Enter your username here ! ..."/>
		</div>
		<div class="userData">
    		<label for "password">Your password :</label>
    		<input type="password" name="password" placeholder="Enter your password here ! ..."/>
		</div>


		<br/>
		<button type="submit">Login</button>
	</form>
	<?php 
    }
    ?>
	</body>
</html>
