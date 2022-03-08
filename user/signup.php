<div id ="signUpForm">
    <h3>Sign Up</h3>
    <form method = "POST" enctype = "multipart/form-data">
        <table>
            <tr>
                <td>Enter Username: </td>
                <td><input type="text" name = "user_username" /></td>
            </tr>
            <tr>
                <td>Enter Password: </td>
                <td><input type="password" name = "user_pass" /></td>
            </tr>
            <tr>
                <td>Repeat Password: </td>
                <td><input type="password" name = "repeat_user_pass" /></td>
            </tr>
            <tr>
                <td>Sign up as: </td>
                <td>
                    <select name = "user_type">
                        <option name = "">Customer</option>
                        <option name = "">Pet Center</option>
                    </select>
                </td>
            </tr>
        </table>
        <button name = "sign_up" id = "sign_up">Sign Up</button>
    </form>
</div>

<?php 
    include("inc/function.php");
    echo signUp();
?>