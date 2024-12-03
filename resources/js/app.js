import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    // Verwijderingsknop klikgebeurtenis designs
    document.getElementById('deleteButton').addEventListener('click', function () {
        var confirmation = confirm('Weet je zeker dat je deze foto(s) wilt verwijderen?');

        if (confirmation) {
            document.getElementById('deleteForm').submit();
        }
    });

    // Streepje onder de items in de navbar wanneer deze geselecteerd zijn
    var currentUrl = window.location.href;

    document.querySelectorAll('.navbar-nav .nav-item').forEach(function(item) {
        var link = item.querySelector('.nav-link').getAttribute('href');

        if (currentUrl.includes(link)) {
            item.classList.add('active');
        }
    });
});


function fetchTimes(dateId) {
    const url = `/api/available-times/${dateId}`; // Zorg ervoor dat dit overeenkomt met je API-route
    fetch(url)
        .then(response => response.json())
        .then(data => {
            const timeSelect = document.getElementById('time');
            timeSelect.innerHTML = ''; // Maak de selectie leeg voor nieuwe tijden

            if (data.length === 0) {
                const option = new Option('Geen tijden beschikbaar', '');
                timeSelect.appendChild(option);
            } else {
                data.forEach(time => {
                    const option = new Option(time.time, time.id); // Pas aan op basis van je datastructuur
                    timeSelect.appendChild(option);
                });
            }
        })
        .catch(error => console.error('Error:', error));
}

// Event listener toevoegen aan de datum-selectie als de pagina geladen is
document.addEventListener('DOMContentLoaded', function() {
    const dateSelect = document.getElementById('date');
    if (dateSelect) {
        dateSelect.addEventListener('change', function() {
            fetchTimes(this.value);
        });
    }
});
