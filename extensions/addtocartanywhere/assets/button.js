
function handleBtns() {

    // Get the current domain and URL path
    const domain = window.location.hostname;
    const path = window.location.pathname;

    // Define the specific domain and collection
    const specificDomain = 'friske.com'; // Replace with your domain
    const specificCollection = '/collections/cookies'; // Replace with your collection URL path

    // Select elements
    var plus = document.querySelectorAll(".eosh_up .plus");
    var minus = document.querySelectorAll(".eosh_down .minus");
    var num = document.querySelectorAll(".num");

    for (let count = 0; count < plus.length; count++) {
        // Set initial quantity based on domain and collection
        let a = (domain === specificDomain && path.startsWith(specificCollection)) ? 6 : 1;

        // Set the initial quantity display
        num[count].innerText = a;

        // Increment logic
        plus[count].addEventListener("click", () => {
            if (domain === specificDomain && path.startsWith(specificCollection)) {
                a += 6; // Always increment by 6 for the specific domain and collection
            } else {
                a++; // Default increment by 1 for other domains and collections
            }
            num[count].innerText = a;
        });

        // Decrement logic
        minus[count].addEventListener("click", () => {
            if (domain === specificDomain && path.startsWith(specificCollection)) {
                if (a > 6) { // Ensure it doesn't go below 6 for the specific domain and collection
                    a -= 6;
                }
            } else {
                if (a > 1) { // Default behavior: prevent going below 1 for other domains and collections
                    a--;
                }
            }
            num[count].innerText = a;
        });
    }

}

// $(document).ready(handleBtns);
document.addEventListener("DOMContentLoaded", function () {
handleBtns();
});