<?php
    $db = mysqli_connect('remotemysql.com', 'XEgCxHe4mC', 'ON0JjIMn1k', 'XEgCxHe4mC');
    $user_info = mysqli_query($db, "SELECT * FROM `Users` WHERE `login`");

?>

<div class="profile-info">
<div class="name">
<span class="manual">Jmeno: </span>
<span class="nickname">Louis Le Prince</span>
</div>
<div class="contact">
<span class="manual">E-mailová Adresa:</span>
<a href="mailto:">louice.le.prince@gmail.com</a>
</div>
<div class="users-posts">
<div>
<div class="manual">
<p>Poslední inzeráty:</p>
</div>
<div class="history-links">
<ul>
<li>
<a href="post.html">Canon 400D + příslušenství</a>
</li>
</ul>
</div>
</div>
</div>
</div>