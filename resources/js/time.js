// time.js
function fetchRealTimeDate() {
    // Fetch the current date from your backend API
    fetch("/api/date") // Replace with the actual API endpoint to fetch the date
        .then((response) => response.json())
        .then((data) => {
            const realTimeDateElements =
                document.querySelectorAll(".real-time-date");
            realTimeDateElements.forEach((element) => {
                const permissionId = element.dataset.permissionId;
                if (permissionId == data.permissionId) {
                    element.textContent = data.date;
                }
            });
        })
        .catch((error) => {
            console.log("Error fetching real-time date:", error);
        });
}

// Fetch real-time date initially
fetchRealTimeDate();

// Fetch real-time date every 5 seconds (adjust the interval as needed)
setInterval(fetchRealTimeDate, 5000);
