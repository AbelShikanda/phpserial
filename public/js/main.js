
///////////////////////////////////////////////////////////////
//********************  COUNTDOWN  ***************************/
///////////////////////////////////////////////////////////////
//select the date from the admin section
var countdownElement = document.getElementById("datecount").value;
console.log("Countdown value:", countdownElement);
// Set the date we're counting down to
var countDownDate = new Date(countdownElement).getTime();
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
    updateStatusWhenTimerOver();
  }
}, 1000);

let hasExecuted = false;

function updateStatusWhenTimerOver() {
    if (hasExecuted) {
        return; // Stop the function execution if it has already been executed
    }
    // select the user details from the clients end
    const selectedIdElement = document.getElementById('set_id');
    if (!selectedIdElement) {
        console.error('Element with id "set_id" not found');
        return;
    }

    const selectedid = selectedIdElement.value;
    if (!selectedid) {
        console.warn('Value of selectedid is null or empty');
        return;
    }

    // Make an AJAX request to the backend endpoint
    fetch('/update_timer_stop', {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Add CSRF token header
            },
            body: JSON.stringify({
                selectedid
            }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to update database');
            }
            return response.json();
        })
        .then(data => {
            console.log(data.message); // Log success message
            // Perform further actions if needed
        })
        .catch(error => {
            console.error('Error:', error);
        });

    hasExecuted = true;
}
