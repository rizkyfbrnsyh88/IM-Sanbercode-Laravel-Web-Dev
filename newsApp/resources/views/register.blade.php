<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Form</title>
  </head>
  <body>
    <a href="/">Kembali ke home</a>
    <h1>Buat Account Baru!</h1>
    <form action="/welcome" method="POST">
        @csrf
      <h3>Sign Up Form</h3>
      <label for="">First Name :</label> <br />
      <br />
      <input type="text" name="firstname" /> <br />
      <br />
      <label for="">Last Name :</label> <br />
      <br />
      <input type="text" name="lastname" /> <br />
      <br />
      <label for="">Gender :</label> <br />
      <br />
      <input type="radio" name="gender" value="Male" />Male <br />
      <input type="radio" name="gender" value="Female" />Female <br />
      <input type="radio" name="gender" value="Other" />Other <br />
      <br />
      <label for="">Nationality :</label> <br />
      <br />
      <select name="nationality" id="">
        <option value="1">Indonesian</option>
        <option value="2">Malaysian</option>
        <option value="3">Singapore</option>
        <option value="4">Australian</option>
      </select>
      <br />
      <br />
      <label for="">Language Spoken :</label> <br />
      <br />
      <input type="checkbox" value="1" name="languagespoken" /> Bahasa Indonesia
      <br />
      <input type="checkbox" value="2" name="languagespoken" /> English <br />
      <input type="checkbox" value="3" name="languagespoken" /> Other <br />
      <br />
      <label for="">Bio</label> <br />
      <textarea name="bio" id="" cols="30" rows="10"></textarea> <br />
      <input type="submit" value="Sign Up" />
    </form>
  </body>
</html>
