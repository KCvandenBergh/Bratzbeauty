@extends('layouts.app')

@section('page-title', 'Bratzbeauty')

@section('content')

    <h1>
       Bratzbeauty
    </h1>
    <body>
    <div>
        <h2>
            Hi!
        </h2>

        <p>
            Welkom bij Bratzbeauty, waar nagels worden omgetoverd tot kunstwerken en elke klant wordt verwelkomd met open armen.
        </p>

        <p>
            Kency, de creatieve geest achter Bratzbeauty, is een toegewijde nagelstyliste die gespecialiseerd is in BIAB (Builder in a Bottle) en gel nagels.
            Met haar uitgebreide ervaring en liefde voor het vak creëert ze niet alleen prachtige nagelkunstwerken, maar zorgt ze ook voor een fijne ervaring voor elke klant.
            In de warme en gastvrije sfeer van Bratzbeauty is elke klant meer dan alleen een afspraak. Kency begrijpt dat nagelverzorging niet alleen gaat over het verfraaien van nagels,
            maar ook over het creëren van een ontspannen en plezierige omgeving.
            Haar zorgvuldige aanpak zorgt ervoor dat klanten zich meteen op hun gemak voelen.
        </p>

         <p>
             Of je nu voor een klassieke manicure komt of wilt pronken met de nieuwste nageltrends, Bratzbeauty biedt een scala aan diensten om aan elke behoefte te voldoen.
             Kency is niet alleen een vakvrouw in het perfectioneren van nagels, maar ook in het begrijpen van de unieke stijl en persoonlijkheid van elke klant.
             Nieuwe klanten worden met open armen ontvangen bij Bratzbeauty, waar Kency ervoor zorgt dat elke ervaring persoonlijk en op maat gemaakt is.
             Of je nu een speciale gelegenheid viert of gewoon wat zelfverwennerij nodig hebt, Bratzbeauty staat klaar om jouw nagelverzorgingsdromen tot leven te brengen.

         </p>

        <p>
            Stap binnen in de wereld van Bratzbeauty en ontdek de magie van perfect verzorgde nagels, doordrenkt met passie, precisie en een vleugje glamour.
            Kency en haar team heten je van harte welkom voor een onvergetelijke reis naar nagelpracht en zelfverwennerij.
        </p>

    </div>

    <div>
        <div class="policy-container">
            <h2>Policy</h2>
            <div class="policy-content">
                <p>Lees de policy eerst door voor dat je een afspraak maakt.</p>

                <ul>
                    <li>Voor een afspraak is een aanbetaling van 40% vereist.</li>
                    <li>De aanbetaling wordt in mindering gebracht op het totale bedrag.</li>
                    <li>Het restant bedrag dient contant betaald te worden anders worden hiervoor extra kosten voor in rekening gebracht.</li>
                    <li>De afspraak dient 48uur van te voren verplaatst/geannuleerd te worden anders wordt de aanbetaling ingehouden.</li>
                    <li>Na 15 minuten te laat wordt er 10 euro in rekening gebracht.</li>
                    <li>Na 30 minuten te laat wordt de afspraak geannuleerd en wordt de aanbetaling ingehouden.</li>
                    <li>Je dient alleen naar de afspraak te komen.</li>
                    <li>Reparatie is binnen 3 dagen gratis. Je moet in dezelfde week een repair afspraak maken.</li>
                    <li>Je vervolgafspraak moet binnen 5 weken zijn anders worden er extra kosten in rekening gebracht.</li>
                    <li>Als er verdere vragen zijn. Stuur gerust een bericht.</li>
                </ul>

                <button onclick="window.location='{{ route("reservations.create") }}'">
                    Maak Afspraak
                </button>
            </div>
        </div>
    </div>
    </body>




@endsection


