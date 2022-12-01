
<?=template_header('Place Order')?>
<?php include ("config.php");?>
<?php
//This query inserts a record in the user table
			//has form been submitted?
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				//initialize an error array
				$error = array();
				
				//check for a full name
				if (empty($_POST['FullName']))
				{
					$error [] = 'You forgot to enter your Full Name.';
				}
				else
				{
					$n = mysqli_real_escape_string($pdo, trim ($_POST['FullName']));
				}
				
				
				//check for a email
				if (empty($_POST['Email']))
				{
					$error [] = 'You forgot to enter your Email.';
				}
				else
				{
					$e = mysqli_real_escape_string($pdo, trim ($_POST['Email']));
				}
				
        //check for a phone number
				if (empty($_POST['Address']))
				{
					$error [] = 'You forgot to enter your Address.';
				}
				else
				{
					$a = mysqli_real_escape_string($pdo, trim ($_POST['Address']));
				}

                //check for a email
				if (empty($_POST['City']))
				{
					$error [] = 'You forgot to enter your City.';
				}
				else
				{
					$c = mysqli_real_escape_string($pdo, trim ($_POST['City']));
				}

                //check for a email
				if (empty($_POST['State']))
				{
					$error [] = 'You forgot to enter your State.';
				}
				else
				{
					$s = mysqli_real_escape_string($pdo, trim ($_POST['State']));
				}

                if (empty($_POST['PostalCode']))
				{
					$error [] = 'You forgot to enter your Postal Code.';
				}
				else
				{
					$pc = mysqli_real_escape_string($pdo, trim ($_POST['PostalCode']));
				}

                if (empty($_POST['NameCard']))
				{
					$error [] = 'You forgot to enter your Name on Card.';
				}
				else
				{
					$nc = mysqli_real_escape_string($pdo, trim ($_POST['NameCard']));
				}

                if (empty($_POST['Bank']))
				{
					$error [] = 'You forgot to enter your Bank.';
				}
				else
				{
					$b = mysqli_real_escape_string($pdo, trim ($_POST['Bank']));
				}
				
				//if it runs
				if (empty($error)){
				//register the user in the database
				//make the query:
				$q = "Insert INTO sales (ID, FullName, Email, Address, City, State, PostalCode, NameCard, Bank) VALUES (' ', '$n', '$e', '$a', '$c', '$s', '$pc', '$nc', '$b')";
				//run the query
				$result = @mysqli_query ($pdo, $q);
				{
					echo '<h2>Thank you For the Payment</h2>';
					echo '<a href="index.php">Go To Home Page</a>';
					
				}
				}	else{
				echo '<p class ="error"> The following error (s) occured: <br/>';
				foreach ($error as $msg)
				{
					echo " -$msg<br/> \n";
				}
					echo '</p><p>Please try again.</p>';
                    echo '<a href="index.php?page=placeorder">Back To Payment</a>';

				}
				
				
				//close the database pdoion.
				mysqli_close($pdo);
				exit();
			}
            ?>
<div class="placeorder content-wrapper">
<div class="container2">

<form action="index.php?page=placeorder" method="post">

    <div class="row">

        <div class="col">

            <h3 class="title">billing address</h3>

            <div class="inputBox">
                <span>Full Name :</span>
                <input type="text" id="FullName" name="FullName" placeholder="">
            </div>
            <div class="inputBox">
                <span>Email :</span>
                <input type="text" id="Email" name="Email" placeholder="">
            </div>
            <div class="inputBox">
                <span>Address :</span>
                <input type="text" id="Address" name="Address" placeholder="">
            </div>
            <div class="inputBox">
                <span>City :</span>
                <input type="text" id="City" name="City" placeholder="">
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>State :</span>
                    <input type="text" id="State" name="State" placeholder="">
                </div>
                <div class="inputBox">
                    <span>Postal Code :</span>
                    <input type="text" id="PostalCode" name="PostalCode" placeholder="">
                </div>
            </div>

        </div>

        <div class="col">

            <h3 class="title">payment</h3>

            
            <div class="inputBox">
                <span>Name on card :</span>
                <input type="text" id="NameCard" name="NameCard" placeholder="">
            </div>
            <div class="inputBox">
                        <span>Bank :</span>
                        <select id="Bank" name="Bank">
							<option value=""></option>
                            <option value="maybank">MAYBANK</option>
                            <option value="cimb">CIMB Bank</option>
                            <option value="rhb">RHB Bank</option>
                            <option value="hongleong">HONG LEONG Bank</option>
                            <option value="muamalat">Bank Muamalat</option>
                          </select>
                    </div>
        </div>

    </div>

    <input id ="submit" type="submit" name="submit" value="Confirm & Pay">

</form>

</div>
</div>

<?=template_footer()?>