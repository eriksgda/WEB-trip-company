<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Management</title>
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/logout.css">
</head>
<body>
    <aside>
        <div>
            <h1>Welcome!</h1>
        </div>
        <?php
            if (isset($_SESSION["login"]) && $_SESSION["authorized"] == true) {
                echo'
                <div id="profile">
                        <img src="assets/profile_placeholder.jpg" alt="profile picture">
                    <p>'. $_SESSION["login"] .'</p>
                </div>
                <nav>
                    <ul>

                        <hr>
                        <li><a href="index.php">| Home</a></li>
                        <hr>
                        <li><a href="trip/read/view.php">| View my trip</a></li>
                        <hr>
                        <li><a href="trip/create/create.php">| Create a new trip</a></li>
                        <hr>
                    </ul>
                </nav>
               ';
            } else {
                echo'
                <div class="buttons">
                    <button id="login">Login</button>
                    <button id="signup">Sign Up</button>
                </div>
               ';
            }
        
        ?>
    </aside>
    <div class="container">
        <div class="title">
            <h1>TRIP MANAGEMENT</h1>
        </div>
        <div class="content">
            <div class="left">
                <img src="assets/homepage_photo.jpg" alt="petra">
            </div>
            <div class="right">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur commodi cupiditate nostrum voluptates voluptatibus neque ratione inventore sed error asperiores, beatae tempore et delectus in suscipit nulla quaerat rem ut, dolore explicabo doloribus illo! Debitis omnis molestiae tempora incidunt aut illo id quibusdam non quod alias voluptates fugit pariatur unde ullam odit harum corporis maxime hic ex, reiciendis beatae accusamus iste, vitae adipisci. Assumenda quo ut mollitia iusto earum itaque eveniet non vero est aliquam repellat, quos quasi atque qui. Necessitatibus aspernatur maxime quisquam id rerum impedit atque laboriosam rem? Quidem veniam neque, tempore nesciunt, sapiente a architecto alias ex quo molestiae veritatis harum porro obcaecati ullam autem incidunt eligendi tenetur? Eaque, illum laborum. Magni nisi ad, consequatur id doloribus ipsa ab commodi laboriosam voluptatum exercitationem quidem dolore nemo quasi earum nulla possimus qui sequi voluptatem debitis. Neque dolores nihil voluptatibus beatae, blanditiis, hic aliquam consectetur temporibus totam laboriosam recusandae officiis exercitationem architecto cumque vero facere id! Molestias voluptatum consequatur reiciendis debitis esse sunt odio iste ipsum voluptatem inventore hic quos consectetur amet sequi accusantium nesciunt repellat exercitationem soluta suscipit earum rem, sint aut! Modi, distinctio animi? Ipsa commodi odit corrupti accusantium voluptates, velit eaque. Enim recusandae commodi nisi dolores. Recusandae voluptatem provident, molestias aspernatur commodi laboriosam deserunt vero, iste odio, asperiores illo fugiat rerum. Optio officiis nesciunt, nostrum ullam odio assumenda aut magni quia sit nemo vitae aliquid ipsam. Expedita excepturi maxime inventore temporibus ea eum eligendi perferendis natus. Tenetur quisquam perferendis atque eligendi quas dolore. Quos, quaerat molestiae.</p>
            </div>
        </div>
    </div>

    <div id="logout-modal">
        <div class="close">
            <span id="close-logout-modal">x</span>
        </div>
        <h2>Logout</h2>
        <div class="content">
            <p>Are you sure you want to logout?</p>
        </div>
        <div class="actions">
            <a href="user/auth/logout.php" class="logout">Logout</a>
            <a href="#" class="cancel">Cancel</a>
        </div>
    </div>

    <div id="login-modal">
        <div class="close">
            <span id="close-login-modal">x</span>
        </div>
        <h2>Login</h2>
        <form id="loginForm" action="user/auth/login.php" method="post">
            <label for="loginUsername">Username:</label>
            <input 
                type="text" 
                id="loginUsername" 
                name="loginUsername" 
                placeholder="Enter your username" 
                title="Enter your username"
                required 
            >
        
            <label for="loginPassword">Password:</label>
            <input 
                type="password" 
                id="loginPassword" 
                name="loginPassword" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}" 
                title="Password must contain at least one number, one lowercase, one uppercase letter, and be 6-8 characters long."
                placeholder="Enter your password"
                required 
            >
        
            <div>
                <input type="checkbox" id="showPassword">
                <label for="showPassword">Show password</label>
            </div>
            
            <button type="submit">Login</button>
        </form>
    </div>

    <div id="signup-modal">
        <div class="close">
            <span id="close-signup-modal">x</span>
        </div>
        <h2>Sing Up</h2>
        <form id="signupForm" action="user/auth/signup.php" method="post">

            <label for="name">Name:</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                placeholder="Enter your name"
                title="Enter your name"
                required 
            >

            <label for="signupUsername">Username:</label>
            <input 
                type="text" 
                id="signupUsername" 
                name="signupUsername" 
                placeholder="Enter your username"
                title="Enter your username"
                required 
            >

            <label for="email">Email:</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                placeholder="Enter your email"
                title="Enter your email"
                required 
            >

            <label for="signupPassword">Password:</label>
            <input 
                type="password" 
                id="signupPassword" 
                name="signupPassword" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}" 
                title="Password must contain at least one number, one lowercase, one uppercase letter, and be 6-12 characters long."
                placeholder="Enter your password"
                required
            >

            <label for="confirmPassword">Confirm Password:</label>
            <input 
                type="password" 
                id="confirmPassword" 
                name="confirmPassword"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}" 
                placeholder="Confirm your password"
                title="Confirm your password"
                required 
            >

            <div>
                <input type="checkbox" id="showPasswords">
                <label for="showPasswords">Show passwords</label>
            </div>

            <p id="error-message" style="display: none;">Passwords do not match!</p>

            <button type="submit">Sign Up</button>
        </form>
    </div>

    <?php
        $message = "";
        $message_title = "";
        $modal_style = "display:none;";

        if (isset($_SESSION["authorized"]) and isset($_SESSION["message"])) {
            $message = $_SESSION['message'];
            $message_title = $_SESSION['message_title'];
            $modal_style = "display:block;";

            unset($_SESSION["message"]);
        }
    ?>

    <div id="login-or-signup-response-modal" style="<?php echo $modal_style; ?>">
        <div class="close">
            <span id="close-login-or-signup-response-modal">x</span>
        </div>
        <div class="content">
            <h2><?php echo $message_title; ?></h2>
            <p><?php echo $message; ?></p>
        </div>
    </div>

    <script src="scripts/login.js"></script>
    <script src="scripts/loginOrSignupResponse.js"></script>
    <script src="scripts/logout.js"></script>
    <script src="scripts/signup.js"></script>
</body>
</html>