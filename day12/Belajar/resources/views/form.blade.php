<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Buat Account Baru!</h1>
        <h3>Sign Up Form</h3>
        <form action="/welcome" method="POST">
            @csrf
            <label for="fsname">First name</label><br>
            <br>
            <input type="text" id="fsname" name="fsname"><br><br>
            <label for="lsname">Last name</label><br><br>
            <input type="text" id="lsname" name="lsname"><br>
            <br>
            <label>Gender:</label><br><br>
            <input type="radio" name="gender">Male
            <br>
            <input type="radio" name="gender">Female
            <br>
            <input type="radio" name="gender">Other
            <br>
            <br>
            <label for="nat">Nationality:</label><br>
            <br>
            <select name="natio" id="nat">
                <option value="1">Indonesian</option><br>
                <option value="2">American</option><br>
                <option value="3">Japanese</option><br>
            </select>
            <br><br>
            <label>Languange Spoken:</label><br><br>
            <input type="checkbox">Bahasa Indonesian
            <br>
            <input type="checkbox">English
            <br>
            <input type="checkbox">Other
            <br>
            <br>
            <label>Bio:</label><br>
            <br>
            <textarea  cols="30" rows="10"></textarea><br>
           <input type="submit" value="Sign Up">
        </form>
    </body>
</html>