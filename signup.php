<?php
    include 'connectioncheck.php';
    include 'check.php';
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
                    <div class="title signup">
                       Signup Form
                    </div>
               </div>
               <div class="form-container">
                    <div class="form-inner">
                       <form action="signup.php" class="signup" method="post">
                            <div class="field">
                             <label for="e-mail">E-mailová adresa*</label>
                             <input id="e-mail" name="email" type="email" placeholder="E-mailová adresa" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $email; ?>" required>
                            </div>
                            <div class="red" id="txtHint"></div>
                            <div class="field">
                              <label for="name">Jmeno*</label>
                              <input id="name" name="login" type="text" placeholder="Jmeno" maxlength="32" pattern="[A-Za-z]{1,32}" value="<?php echo $login; ?>" required>
                            </div>
                            <div class="field">
                              <label for="password">Heslo*</label>
                              <input id="signup-password" name="password"  type="password" placeholder="Heslo" pattern="[A-Za-z0-9@.]{8,}" required>
                            </div>
                            <div class="field">
                              <label for="confirm-password">Podtvrdit heslo*</label>
                              <input id="confirm-password" name="confirm-password" onchange="compare()" type="password" placeholder="Podtvrdit heslo" pattern="[A-Za-z0-9@.]{8,}" required>
                            </div>
                            <?php
                                foreach($err AS $error){
                                    print $error."<br>";
                                }                                
                            ?>
                            <div class="field btn">
                                <div class="btn-layer"></div>
                                
                                <input name="submit" type="submit" value="Signup">
                            </div>
                            <div>
                                Máte již učet? <a href="login.php">Přihlásit se teď</a>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="script/signup.js"></script>
    </div>
</body>
</html>