<?php include "./header.php" ?>
    <main>
        <div class="main-container">
            <div class="signup-container">
                <div class="company-logo">
                    <img src="images/automax.png" alt="Automax">
                </div>
                <div class="header-container">
                    <h1>Sign up</h1>
                </div>
                <div class="signup-form-container">
                    <form class="signup-form" name="login" action="./log-me-in.php" method="post">

                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" pattern=".{5,}" required
                               title="5 characters minimum" onchange="validateUsername()">

                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" pattern=".{6,10}" required
                               title="6 to 10 characters" onchange="validatePassword()">
                        <button disabled id="signUpButton" type="submit">Log in</button>

                        <span class="register">Don't have an account?<a href="./register.php" id="registerButton"
                                                                        class="register-button">Register here!</a></span>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php include "./footer.php" ?>