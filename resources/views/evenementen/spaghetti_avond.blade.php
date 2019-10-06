@extends('layouts.main')

@section('content')
    @component('components.carousel', [
        'images' => [
            [
                'image' => asset('/img/evenementen/Banner-evenementen-achtergrond.png'),
                'alt' => 'Spaghetti avond',
            ],
        ],
        'page_title' => 'Spaghetti avond',
        'page_sub_title' => '19 oktober',
    ])
    @endcomponent

    <div class="row justify-content-center section">
        <div class="col-12 col-md-8">
            <div class="evenement">
                <div class="card__content">
                    <p class="text--align-center">
                        Geen zin om te koken? Of zin in heerlijke spaghetti?
                    </p>
                    <p class="text--align-center">
                         Kom dan zeker genieten van de zelfgemaakte spaghetti van de jonge! Dit evenement vindt plaats op zaterdag 19 oktober vanaf 19u in onze lokalen.
                    </p>
                    <br>
                    <br>
                    
                    <h3 class="text--align-center">Wat schaft de pot?</h3>
                    <p class="text--align-center">
                        Spaghetti! Je kunt kiezen voor de bolognaise saus met vlees of voor de veganistische bolognaise saus. 
                    </p>
                    <br>
                    <h3 class="text--align-center">Wat kost dat?</h3>
                    <p class="text--align-center">
                        Voor €10 krijg je van ons één aperitief drankje en kan je à volonté genieten van onze spaghetti!
                    </p>
                    <p class="text--align-center">
                        Kinderen krijgen voor €7 één drankje en één bord spaghetti.
                    </p>
                    <br>
                    <h3 class="text--align-center">Inschrijven maar!</h3>
                    <p class="text--align-center">
                        Om er zeker van te zijn dat we niet te weinig of teveel spaghetti voorzien is inschrijven vereist! Je kan inschrijven door een mailtje te sturen naar <a href="mailto:fos207.jonge@gmail.com">fos207.jonge@gmail.com</a>.
                    </p>
                    <br>
                    <br>
                    <p class="text--align-center">
                        Hopelijk tot dan!
                    </p>
                    <p class="text--align-center">
                        De jonge
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection