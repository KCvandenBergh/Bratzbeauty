@extends('layouts.app')

@section('page-title', 'Bratzbeauty')

@section('content')
    <h1>
       Bratzbeauty
    </h1>
    <body>
    <div>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda consequuntur corporis deserunt ea esse est et explicabo incidunt ipsum iure, labore molestias nemo neque nihil non qui quos recusandae, rem sint, unde vitae voluptate. Accusamus aspernatur cum debitis distinctio eaque enim, eveniet excepturi facilis fugit maiores molestias natus nobis nostrum officiis quasi quis sit velit. Autem delectus dicta quibusdam reiciendis rem rerum veritatis. Deserunt dolore esse eveniet, nam odio placeat ratione tempore veritatis. Adipisci alias amet cum cupiditate dolores dolorum, eos eveniet excepturi labore maxime, minus modi nemo nobis quidem quos recusandae reiciendis reprehenderit sequi suscipit unde! Accusantium, explicabo!
    </div>

    <div>
        <h2>
            Policy
        </h2>
        <div>
            Lees de policy eerst door voor dat je een afspraak maakt.

            Voor een afspraak is een aanbetaling van 40% vereist.
            De aanbetaling wordt in mindering gebracht op het totale bedrag.
            Het restant bedrag dient contant betaald te worden anders worden hiervoor extra kosten voor in rekening gebracht.
            De afspraak dient 48uur van te voren verplaatst/geannuleerd te worden anders wordt de aanbetaling ingehouden.
            Na 15 minuten te laat wordt er 10 euro in rekening gebracht.
            Na 30 minuten te laat wordt de afspraak geannuleerd en wordt de aanbetaling ingehouden.
            Je dient alleen naar de afspraak te komen.
            Reparatie is binnen 3 dagen gratis. Je moet in dezelfde week een repair afspraak maken.
            Je vervolgafspraak moet binnen 5 weken zijn anders worden er extra kosten in rekening gebracht.
            Als er verdere vragen zijn. Stuur gerust een bericht.

            Xx Bratzbeauty
        </div>

        <div>
            <button onclick="window.location='{{ route("reservations.create") }}'">
                Maak Afspraak
            </button>
        </div>

    </div>
    </body>




@endsection


