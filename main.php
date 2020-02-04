<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>PHP Testing Project</title>
  <style>
    body {
      padding: 0;
      margin: 0;
      overflow: hidden;
      cursor: default;
    }

    #background {
      background: linear-gradient(123deg, #2E99B0 0%, #2E99B0 40%, #FCD77F calc(40% + 1px), #FCD77F 60%, #FF2E4C calc(60% + 1px), #FF2E4C 75%, #1E1548 calc(75% + 1px), #1E1548 100%);
      width: 100vw;
      height: 100vh;
      filter: contrast(0.9) opacity(0.8);
    }

    form {
      color: #000;
      background-color: rgba(255, 255, 255, .05);
      backdrop-filter: blur(5px);
      width: 300px;
      height: 330px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: flex;
      flex-direction: column;
      justify-content: space-around;
      border-radius: 3px;
      box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2);
      padding: 38px;
    }

    form:before {
      content: "";
      position: absolute;
      background: inherit;
      z-index: -1;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      box-shadow: inset 0 0 2000px rgba(255, 255, 255, .5);
    }

    .hide {
      display: none;
    }

    .form-inputs {
      display: flex;
      flex-direction: column;
      position: relative;
    }

    .form-inputs>input:first-child {
      margin-bottom: 20px;
    }

    h1,
    h2,
    h3,
    h4 {
      color: #fff;
      text-align: center;
    }

    h1 {
      font-size: 4.5em;
      margin: 0;
    }

    h2 {
      font-size: 2em;
      margin: 0;
    }

    h3 {
      margin: 0;
      margin-top: -8px;
    }

    h4 {
      font-size: 2em;
      text-align: left;
      margin: 0;
      margin-bottom: 15px;
    }

    p {
      margin: 0;
      text-align: center;
      font-size: 17px;
      color: white;
    }

    input {
      background-color: transparent;
      border: 2px solid #fff;
      color: #fff;
      padding: 10px 7px;
      border-radius: 3px;
      cursor: text;
    }

    input::placeholder {
      color: #fff;
    }

    .show-error-username {
      position: absolute;
      top: 40px;
      left: 3px;
      font-size: 12px;
    }

    .show-error-password {
      position: absolute;
      bottom: -17px;
      left: 3px;
      font-size: 12px;
    }

    button {
      width: 100%;
      color: #fff;
      background-color: #5aafe7;
      border-radius: 2px;
      border: none;
      text-transform: uppercase;
      padding: 13px 0;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <?php
    $email = $password = "";
    $formClass = "show";
    $modulClass = $emailErr = $passwordErr = "hide";

    if (isset($_POST['submit'])) {
    if(empty($_POST["username"])){
      $emailErr = "show-error-username";
    }else{
      $email = $_POST["username"];
    }   
    if(empty($_POST["password"])){
      $passwordErr = "show-error-password";
    } else {
        $password = $_POST["password"];
    }
      
    if(strlen($email)>0 && strlen($password) >0){
      $formClass = "hide";
      $modulClass = "show";
    }
  }

    if (isset($_POST['reset'])) {
     $email = $password = "";
    }
  ?>

  <div id="background"></div>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class=<?php echo $formClass;?>>
    <div>
      <h1>C</h1>
      <h3>Company Company</h3>
    </div>
    <div class="form-inputs">
      <input type="text" name="username" placeholder="Username or email" />
      <span class=<?php echo $emailErr . " error";?>>* Username or email is required</span>
      <input type="password" name="password" placeholder="Password" />
      <span class=<?php echo $passwordErr . " error";?>>* Password is required</span>
    </div>
    <button type="submit" name="submit">Submit</button>
  </form>
  <form action="" method="POST" class=<?php echo $modulClass;?>>
    <div>
      <h4>Welcome back,</h4>
      <h2><?php echo $email;?></h2>
    </div>
    <p>Your password is <?php echo $password;?></p>
    <button type="submit" name="reset">Reset</button>
  </form>
</body>

</html>