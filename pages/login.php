<?php
    
?>
<div class="container">
    <h2 class="text-center mt-5">Login</h2>
    <form action="traitement_login.php" method="post" class="mt-4">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type= "email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <a href="modal.php?page=inscription">INSCRIPTION</a>
</div>
