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


