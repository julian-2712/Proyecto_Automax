// This event listener is triggered when the DOM content is fully loaded.
document.addEventListener('DOMContentLoaded', function() {
    // Call the function to initialize car selection when the DOM is ready.
    initializeCarSelection();
});

// Function to initialize car selection dropdowns.
function initializeCarSelection() {
    // Define a collection of car makes and their models.
    var cars = {
        'Audi': ['A1', 'A3', 'A4', 'Q3', 'Q5'],
        'BMW': ['1-Series', '3-Series', '4-Series', '5-Series', 'X5'],
        'SEAT': ['Ateca', 'Exeo ST', 'Ibiza', 'Leon', 'Toledo'],
        'Toyota': ['C-HR', 'Corolla', 'Prius', 'RAV4', 'Yaris'],
        'Volkswagen': ['Golf', 'Polo', 'Passat', 'Tiguan', 'T-Roc']
    };

    // Get references to the 'make' and 'model' dropdowns by their IDs.
    var make_select = document.querySelector('#make');
    var model_select = document.querySelector('#model');

    // Check if the dropdowns exist in the DOM.
    if (make_select && model_select) {
        // Set options for the 'make' and 'model' dropdowns on page load.
        setOptions(make_select, Object.keys(cars));
        setOptions(model_select, cars[make_select.value]);

        // Add an event listener to the 'make' dropdown to update the 'model' dropdown when 'make' is changed.
        make_select.addEventListener('change', function () {
            // Enable the 'model' dropdown.
            model_select.disabled = false;
            // Set options for the 'model' dropdown based on the selected 'make'.
            setOptions(model_select, cars[make_select.value]);
        });
    }

    // Function to set options for a dropdown based on an array of values.
    function setOptions(dropDown, options) {
        if (dropDown) {
            // Clear existing options in the dropdown.
            dropDown.innerHTML = '';
            // Populate the dropdown with options based on the provided array of values.
            options.forEach(function (value) {
                dropDown.innerHTML += '<option name="' + value + '">' + value + '</option>';
            });
        }
    }
}



// DELETE CAR

function deleteConfirm(carId) {
    let text = "Are you sure you want to delete this record?";
    if (confirm(text) == true) {
        location.replace("./delete-car.php?carId=" + carId);
    } else {
        location.replace("./listing.php");
    }
}


// UPDATE CAR

function updateConfirm(carId) {
    let text = "Are you sure you want to update this record?";
    if (confirm(text) == true) {
        location.replace("./edit-car.php?carId=" + carId);
    } else {
        location.replace("./listing.php");
    }
}