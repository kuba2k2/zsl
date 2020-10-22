<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="form_user_data.php" method="POST">
		<table>
			<tr>
				<td>Account Type<span>*</span></td>
				<td>
					<input type="radio" name="accountType" value="personal" id="accountPersonal" checked>
					<label for="accountPersonal">Personal Account</label>
					<input type="radio" name="accountType" value="business" id="accountBusiness">
					<label for="accountBusiness">Business Account</label>
				</td>
			</tr>
			<tr>
				<td>First Name<span>*</span></td>
				<td>
					<input type="text" name="firstName" required pattern="[A-ZŻÓŁĆĘŚĄŹŃ][a-zżółćęśążń]{1,9}">
				</td>
			</tr>
			<tr>
				<td>Last Name<span>*</span></td>
				<td>
					<input type="text" name="lastName" required pattern="[A-ZŻÓŁĆĘŚĄŹŃ][a-zżółćęśążń]{1,19}">
				</td>
			</tr>
			<tr>
				<td>Country/Region<span>*</span></td>
				<td>
					<select name="country" required>
						<option value="Polska">Polska</option>
						<option value="USA" selected>USA</option>
						<option value="Grecja">Grecja</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Street Address<span>*</span></td>
				<td>
					<input type="text" name="address1" required>
				</td>
			</tr>
			<tr>
				<td>Street Address 2</td>
				<td>
					<input type="text" name="address2">
				</td>
			</tr>
			<tr>
				<td>City<span>*</span></td>
				<td>
					<input type="text" name="city" required>
				</td>
			</tr>
			<tr>
				<td>State/Province<span>*</span></td>
				<td>
					<select name="state" required>
						<option disabled hidden selected>Select State or Province</option>
						<option value="Wielkopolskie">Wielkopolskie</option>
						<option value="Zachodniopomorskie">Zachodniopomorskie</option>
						<option value="Małopolskie">Małopolskie</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>ZIP/Postal Code<span>*</span></td>
				<td>
					<input type="text" name="zip" required pattern="[0-9]{5}" maxlength="5">
				</td>
			</tr>
			<tr>
				<td>Phone Number<span>*</span></td>
				<td>
					<input type="text" name="phone" required>
				</td>
			</tr>
		</table>
		<button type="submit">Submit</button>
	</form>
</body>
</html>

