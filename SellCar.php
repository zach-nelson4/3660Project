<?php
	include 'connectdb.php';
	$conn = connect_sql();
?>

<html>

<center><h2>Sell Car</h2></center>
<br>
<h2>
<p>Purchase Date: <input type="date" name="date_sold" required></p>

	<?php
		$sql = "SELECT carID FROM cars";
		$results = mysqli_query($conn, $sql);
		echo "Car ID <select name='CarID' onchange= \"showCarInfo(this.value)\" required>";
		echo "<option value=''>Select Car</option>";
		while($row = mysqli_fetch_assoc($results))
		{
			echo "<option value=" .$row['CarID'] . ">" . $row ['CarID'] . "</option>";
		}
		echo "</select>";
		?>

<p>Total Due: <input type="number" name="total_due" required>  
Tax: Variable that changes here
<p>Down Payment: <input type="number" name="down_pay" required>
Finance Amount: <input type="number" name="Fin_Amt" required></p>

<br>
<h2> Employee Info </h2> <br>
	<?php
		$sql = "SELECT EmpID, FN, LN
			FROM EMPLOYEE";
		$results = $conn->query($sql);
		echo "Employee ID <select name='EmpID' onchange= \"showEmployeeInfo(this.value)\" required>";
		echo "<option value=''>Select Employee</option>";
		while($row = $results->fetch_assoc())
		{
			echo "<option value=" .$row['EmpID'] . ">" . $row ['EmpID'] . "</option>";
		}
		echo "</select>";
		?>
	<br>
	Comission Percentage (%): <input type='number' name="employee_commission" required>

<br>
<h2> Customer Info </h2> <br>

	<?php
		$sql = "SELECT CustID, FN, LN
			FROM CUSTOMER";
		$results = $conn->query($sql);
		echo "Customer ID <select name='CustID' onchange= \"showCustomerInfo(this.value)\" required>";
		echo "<option value=''>Select Customer</option>";
		while($row = $results->fetch_assoc())
		{
			echo "<option value=" .$row['CustID'] . ">" . $row ['CustID'] . "</option>";
		}
		echo "</select>";
		?>

	<br>
	New Customer? <a href="addCustomer.html">Click Here</a>

<br>
<input type="submit" name="sale_submit">
<br><br>
<input type="button" value="Return Home" onclick="window.location.href='Index.html'" />
</html>
