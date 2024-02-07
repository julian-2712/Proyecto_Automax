// LOGIN PAGE

// Declare variables in the broader scope
const userName = document.getElementById("username");
const password = document.getElementById("password");
const signUpButton = document.getElementById("signUpButton");

// Wrap the login-related code in a function and call it on DOMContentLoaded
document.addEventListener('DOMContentLoaded', function () {
    login();
});

function login() {
    // Flags to track the validity of user inputs
    let userNameValid = false;
    let passwordValid = false;

    // Function to enable or disable the sign-up button based on input validity
    function validateButton() {
        if (userNameValid && passwordValid) {
            // Enable the sign-up button
            signUpButton.removeAttribute("disabled");
            signUpButton.classList.add('mousepointer');
        } else {
            // Disable the sign-up button
            signUpButton.setAttribute("disabled", "");
            signUpButton.classList.remove('mousepointer');
        }
    }

    // Check if the elements exist before adding event listeners
    if (userName && password && signUpButton) {
        // Event listener for the blur event on the username input
        userName.addEventListener('blur', function () {
            // Get the current value of the username input
            let currentValue = userName.value;
            // Check the number of characters in the username
            let numberOfCharacters = currentValue.length;

            if (numberOfCharacters >= 5) {
                // If the username is valid, remove the 'error' class
                userName.classList.remove('error');
                // Set the userNameValid flag to true
                userNameValid = true;
            } else {
                // If the username is invalid, add the 'error' class
                userName.classList.add('error');
                // Set the userNameValid flag to false
                userNameValid = false;
            }
            // Validate the overall form status
            validateButton();
        });

        // Event listener for the blur event on the password input
        password.addEventListener('blur', function () {
            // Check the length of the password
            if (password.value.length >= 6) {
                // If the password is valid, remove the 'error' class
                password.classList.remove('error');
                // Set the passwordValid flag to true
                passwordValid = true;
            } else {
                // If the password is invalid, add the 'error' class
                password.classList.add('error');
                // Set the passwordValid flag to false
                passwordValid = false;
            }
            // Validate the overall form status
            validateButton();
        });
    }
}

// Flags to track the validity of user inputs
let userNameValid = false;
let passwordValid = false;

function validateUsername() {
    const userName = document.getElementById("username");

    userName.addEventListener('blur', () => {
        // Get the current value of the username input
        let currentValue = userName.value;
        // Check the number of characters in the username
        let numberOfCharacters = currentValue.length;

        if (numberOfCharacters >= 5) {
            // If the username is valid, remove the 'error' class
            userName.classList.remove('error');
            // Set the userNameValid flag to true
            userNameValid = true;
        } else {
            // If the username is invalid, add the 'error' class
            userName.classList.add('error');
            // Set the userNameValid flag to false
            userNameValid = false;
        }
        // Validate the overall form status
        validateButton();
    });
}

function validatePassword() {
    const password = document.getElementById("password");

    // Event listener for the blur event on the password input
    password.addEventListener('blur', () => {
        // Check the length of the password
        if (password.value.length >= 6) {
            // If the password is valid, remove the 'error' class
            password.classList.remove('error');
            // Set the passwordValid flag to true
            passwordValid = true;
        } else {
            // If the password is invalid, add the 'error' class
            password.classList.add('error');
            // Set the passwordValid flag to false
            passwordValid = false;
        }
        // Validate the overall form status
        validateButton();
    });
}

// Function to enable or disable the sign-up button based on input validity
function validateButton() {
    if (userNameValid && passwordValid && signUpButton) {
        // Enable the sign-up button
        signUpButton.removeAttribute("disabled");
        signUpButton.classList.add('mousepointer');
    } else if (signUpButton) {
        // Disable the sign-up button
        signUpButton.setAttribute("disabled", "");
        signUpButton.classList.remove('mousepointer');
    }
}

// END LOGIN PAGE

// START HAMBURGER BUTTON NAV BAR

// Function to toggle the menu icon's appearance and the visibility of the menu
function myFunction(x) {
    // Toggle the 'change' class on the menu icon to change its appearance
    x.classList.toggle("change");

    // Toggle the visibility of the menu by adding/removing the 'show' class on the '.header-right' element
    var headerRight = document.querySelector('.header-right');
    headerRight.classList.toggle('show', x.classList.contains('change'));
}

// Add JavaScript to close the menu when the close button is clicked
document.addEventListener('DOMContentLoaded', function () {
    // Get a reference to the close button element
    var closeButton = document.querySelector('.close-btn');

    // Check if the close button element exists in the DOM
    if (closeButton) {
        // Add an event listener to the close button to handle the click event
        closeButton.addEventListener('click', function () {
            // Get a reference to the '.header-right' element
            var headerRight = document.querySelector('.header-right');
            // Remove the 'show' class to hide the menu when the close button is clicked
            headerRight.classList.remove('show');
        });
    }
});

// END HAMBURGER BUTTON NAV BAR