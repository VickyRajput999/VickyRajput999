$(document).ready(function() {
    // Get the current page URL
    var currentUrl = window.location.href;

    // Loop through each anchor tag in the navigation
    $(".nav-link").each(function() {
        // Get the href attribute of the anchor tag
        var href = $(this).attr("href");

        // Check if the current page URL contains the anchor tag's href
        if (currentUrl.indexOf(href) !== -1) {
            // Add the "active" class to the anchor tag
            $(this).addClass("active");
        }
    });
});

////////////////Modal///////////////
// Open the modal

// function openModal() {
//     document.getElementById("modifyModal").style.display = "block";
// }

// function closeModal() {
//     document.getElementById("modifyModal").style.display = "none";
// }

// Close the modal if the overlay is clicked
window.onclick = function(event) {
    var modal = document.getElementById("modifyModal");
    if (event.target == modal) {
        closeModal();
    }
}


function openModals() {
    document.getElementById('contactModal').style.display = 'block';
}

// Close the modal
function closeModals() {
    document.getElementById('contactModal').style.display = 'none';
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
    var modal = document.getElementById('contactModal');
    if (event.target == modal) {
        closeModal();
    }
}


// Function to open the modal
function openModall() {
    document.getElementById('modifyModal').style.display = 'block';
}

// Function to close the modal
function closeModall() {
    document.getElementById('modifyModal').style.display = 'none';
}

// Close the modal if the overlay is clicked
window.onclick = function(event) {
    var modal = document.getElementById('modifyModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

///////////Tabs///////////
function openTab(tabName) {
    // Hide all tab content
    var tabContents = document.getElementsByClassName('tab-content');
    for (var i = 0; i < tabContents.length; i++) {
        tabContents[i].style.display = 'none';
    }

    // Remove 'active' class from all tabs
    var tabs = document.getElementsByClassName('tab');
    for (var i = 0; i < tabs.length; i++) {
        tabs[i].classList.remove('active');
    }

    // Show the selected tab content
    document.getElementById(tabName).style.display = 'block';

    // Add 'active' class to the selected tab
    event.currentTarget.classList.add('active');
}



///////Tabs///////////
//Function to open the selected tab

// function openTab(evt, tabName) {
//     var i, tabcontent, tablinks;

//     // Hide all tab content
//     tabcontent = document.getElementsByClassName("tabcontent");
//     for (i = 0; i < tabcontent.length; i++) {
//         tabcontent[i].style.display = "none";
//     }

//     // Remove the "active" class from all tab buttons
//     tablinks = document.getElementsByClassName("tablinks");
//     for (i = 0; i < tablinks.length; i++) {
//         tablinks[i].className = tablinks[i].className.replace(" active", "");
//     }

//     // Show the selected tab and add an "active" class to the button
//     document.getElementById(tabName).style.display = "block";
//     evt.currentTarget.className += " active";
// }

// // Open the first tab by
// // default
// document.getElementById("defaultOpen").click();



$(document).ready(function() {
    // Get the current page URL
    var currentUrl = window.location.href;

    // Loop through each anchor tag in the navigation
    $(".nav-link").each(function() {
        // Get the href attribute of the anchor tag
        var href = $(this).attr("href");

        // Check if the current page URL contains the anchor tag's href
        if (currentUrl.indexOf(href) !== -1) {
            // Add the "active" class to the anchor tag
            $(this).addClass("active");
        }
    });
});

////////////////Modal///////////////
// Open the modal
function openModal() {
    document.getElementById('contactModal').style.display = 'block';
}

// Close the modal
function closeModal() {
    document.getElementById('contactModal').style.display = 'none';
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
    var modal = document.getElementById('contactModal');
    if (event.target == modal) {
        closeModal();
    }
}


/////////Calander////////
// let date = new Date(); // creates a new date object with the current date and time
// let year = date.getFullYear(); // gets the current year
// let month = date.getMonth(); // gets the current month (index based, 0-11)

// const day = document.querySelector(".calendar-dates"); // selects the element with class "calendar-dates"
// const currdate = document.querySelector(
//     ".calendar-current-date"); // selects the element with class "calendar-current-date"
// const prenexIcons = document.querySelectorAll(
//     ".calendar-navigation span"); // selects all elements with class "calendar-navigation span"

// const months = [
//     "January",
//     "February",
//     "March",
//     "April",
//     "May",
//     "June",
//     "July",
//     "August",
//     "September",
//     "October",
//     "November",
//     "December"
// ]; // array of month names

// // function to generate the calendar
// const manipulate = () => {
//     // get the first day of the month
//     let dayone = new Date(year, month, 1).getDay();

//     // get the last date of the month
//     let lastdate = new Date(year, month + 1, 0).getDate();

//     // get the day of the last date of the month
//     let dayend = new Date(year, month, lastdate).getDay();

//     // get the last date of the previous month
//     let monthlastdate = new Date(year, month, 0).getDate();

//     let lit = ""; // variable to store the generated calendar HTML

//     // loop to add the last dates of the previous month
//     for (let i = dayone; i > 0; i--) {
//         lit += `<li class="inactive">${monthlastdate - i + 1}</li>`;
//     }

//     // loop to add the dates of the current month
//     for (let i = 1; i <= lastdate; i++) {
//         // check if the current date is today
//         let isToday = i === date.getDate() && month === new Date().getMonth() && year === new Date()
//             .getFullYear() ? "active" : "";
//         lit += `<li class="${isToday}">${i}</li>`;
//     }

//     // loop to add the first dates of the next month
//     for (let i = dayend; i < 6; i++) {
//         lit += `<li class="inactive">${i - dayend + 1}</li>`
//     }

//     // update the text of the current date element with the formatted current month and year
//     currdate.innerText = `${months[month]} ${year}`;

//     // update the HTML of the dates element with the generated calendar
//     day.innerHTML = lit;
// }

// manipulate();

// // Attach a click event listener to each icon
// prenexIcons.forEach(icon => {

//     // When an icon is clicked
//     icon.addEventListener("click", () => {
//         // Check if the icon is "calendar-prev" or "calendar-next"
//         month = icon.id === "calendar-prev" ? month - 1 : month + 1;

//         // Check if the month is out of range
//         if (month < 0 || month > 11) {
//             // Set the date to the first day of the month with the new year
//             date = new Date(year, month, new Date().getDate());
//             // Set the year to the new year
//             year = date.getFullYear();
//             // Set the month to the new month
//             month = date.getMonth();
//         } else {
//             // Set the date to the current date
//             date = new Date();
//         }

//         // Call the manipulate function to update the calendar display
//         manipulate();
//     });
// });


// <!-- Your chart initialization code here -->

function validatePhoneNumber() {
    // Get the input element
    var phoneInput = document.getElementById('phone');

    // Remove non-numeric characters
    var phoneNumber = phoneInput.value.replace(/\D/g, '');

    // Set the minimum and maximum length
    var minLength = 10;
    var maxLength = 12;

    // Check if the phone number is within the allowed range
    if (phoneNumber.length < minLength) {
        // If it's less than the minimum length, trim to the minimum length
        phoneInput.value = phoneNumber.slice(0, minLength);
    } else if (phoneNumber.length > maxLength) {
        // If it's more than the maximum length, trim to the maximum length
        phoneInput.value = phoneNumber.slice(0, maxLength);
    } else {
        // If it's within the allowed range, update the input value
        phoneInput.value = phoneNumber;
    }
}


const ctx = document.getElementById('myChart');
new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Male', 'Female'],
        datasets: [{
            label: '# of Votes',
            backgroundColor: ['#2E2E2E', '#48C7FF'],
            data: [12, 19],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});