<?php 
	session_start();
	if(!isset($_SESSION["login"]) && $_SESSION["authorized"] == true){                           
        header("location: /tripCompany/index.php");   
		exit();
    }
?>

<aside>
    <div>
        <h1>Trip Management</h1>
    </div>
    <div id="profile">
        <img src="../../assets/profile_placeholder.jpg" alt="profile picture">
        <p><?php echo $_SESSION["login"];?></p>
    </div>
    <nav>
        <ul>
            <hr>
            <li><a href="../../index.php">| Home</a></li>
            <hr>
            <li><a href="../../trip/read/view.php">| View my trip</a></li>
            <hr>
            <li><a href="../../trip/create/create.php">| Create a new trip</a></li>
            <hr>
        </ul>
    </nav>
</aside>

<div id="logout-modal">
    <div class="close">
        <span id="close-logout-modal">x</span>
    </div>
    <div class="content">
        <h2>Logout</h2>
        <p>Are you sure you want to logout?</p>
    </div>
    <div class="actions">
        <a href="../../user/auth/logout.php" class="logout">Logout</a>
        <a href="#" class="cancel">Cancel</a>
    </div>
</div>

<script src="../../scripts/logout.js"></script>