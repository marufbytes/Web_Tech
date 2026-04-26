<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>

<h2>Student Registration Form</h2>

<form method="post" action="process.php">
    <fieldset>
        <legend>Registration</legend>
        <table>
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="name"></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type="email" name="email"></td>
            </tr>

            <tr>
                <td>Username:</td>
                <td><input type="text" name="username"></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
            </tr>

            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirm_password"></td>
            </tr>

            <tr>
                <td>Age:</td>
                <td><input type="number" name="age"></td>
            </tr>

            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female"> Female
                </td>
            </tr>

            <tr>
                <td>Course:</td>
                <td>
                    <select name="course">
                        <option value="CSE">CSE</option>
                        <option value="EEE">EEE</option>
                        <option value="BBA">BBA</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><input type="checkbox" name="terms"> I agree with terms and conditions</td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Register"></td>
            </tr>
        </table>

    </fieldset>
</form>

</body>
</html>