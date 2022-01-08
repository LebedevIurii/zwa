<?php
    include 'connectioncheck.php';
    include 'authorization.php';
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meow-itel Login page</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" href="favicon.ico">
</head>
<body>
    <div class="main-container">
        <div class="header">
            <nav class="nav">
                <a href="index.php">
                  <div class="logo">
                      <h1>Meow-itel</h1>
                  </div>
                </a>
                <div>
                    <ul class="nav-links">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="profile-content">
            <div class="profile-field">
               <div class="title-text">
                    <div class="title login">
                       Login Form
                    </div>
               </div>
               <div class="form-container">  
                    <div class="form-inner">
                       <form action="login.php" class="login" method="post">
                            <div class="field">
                               <label for="email">E-mailová adresa</label>
                               <input id="email" name="email" type="text" placeholder="E-mailová adresa" required>
                            </div>
                            <div class="field">
                               <label for="password">Heslo</label>
                               <input id="password" name="password" type="password" placeholder="Heslo" required>
                            </div>
                            <?php
                                if($error != null){
                                    echo "<span>$error</span></br>";
                                }
                            ?>   
                            <div class="field btn">
                               <div class="btn-layer"></div>
                               <input name="submit" type="submit" value="Login">
                            </div>
                            <div>
                               Ještě nemáte účet? <a href="signup.php">Zaregestrujte se teď</a>
                            </div>
                       </form>
                    </div>
               </div>
            </div>
        </div>
    </div>
</body>
</html>