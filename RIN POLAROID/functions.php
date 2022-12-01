<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'rin';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
// Template header, feel free to customize this
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/style3.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1><img src ="imgs/RINPOLAROID.jpeg" height="60">RINPOLAROID</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=products">Products</a>
                    <a href="index.php?page=aboutus">About Us</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
						<i class="fas fa-shopping-cart"></i>
					</a>
                    <a href="index.php?page=cart">
                        <i class="fas solid fa-user"></i>
					</a>
                    
                </div>
            </div>
        </header>
        <main>
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year, RIN POLAROID By Nurin Ainul</p>
            </div>

            <div class="footersocial">
                    <div class="footersociallinks">
                        <br><br>
                        FOLLOW & CONTACT US ON: <br><br>
                        <a href="https://www.facebook.com/rinpolaroidmy"><img src="imgs/facebook.jpg" width="40px"></a>
                        <a href="https://www.instagram.com/rinpolaroid"><img src="imgs/instagram.jpg" width="40px"></a>
                    </div>
            </div>
        </footer>
    </body>
</html>
EOT;
}
?>