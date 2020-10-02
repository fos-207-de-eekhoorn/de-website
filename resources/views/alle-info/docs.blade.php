@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'green',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Alle documenten',
    ])
    @endcomponent

    <div class="row justify-content-center section">
        <div class="col-12 col-md-4 section section--small-spacing">
            <div class="card cs-grey-extra-light">
                <h2>Documenten</h2>

                <ul class="hierarchielijst">
                    <li class="hierarchielijst__item">
                        Tegemoetkomingen

                        <ul class="hierarchielijst__sublist">
                            <li class="hierarchielijst__item">
                                CM

                                <ul class="hierarchielijst__sublist">
                                    <li class="hierarchielijst__item">
                                        <a href="https://www.cm.be/media/Tegemoetkoming_tcm47-24960.pdf" class="hierarchielijst__link"  target="_blank">Kamp</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="hierarchielijst__item">
                                OZ

                                <ul class="hierarchielijst__sublist">
                                    <li class="hierarchielijst__item">
                                        <a href="{{ asset('/docs/OZ501_Jeugdbeweging.pdf') }}"  target="_blank">Lidgeld</a>
                                    </li>

                                    <li class="hierarchielijst__item">
                                        <a href="{{ asset('/docs/OZ501_Tegemoetkoming_Jeugdactiviteiten.pdf') }}" target="_blank">Kamp</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="hierarchielijst__item">
                                LM
                                <ul>
                                    <li class="hierarchielijst__sublist">
                                        <a href="https://www.lm.be/LMPlus/Rubrieken/Voordelen-en-diensten/Kinderen-en-jongeren/SpeelpleinenEnSportvakantiesMetOvernachting/Documents/jeugdvakanties.pdf" class="hierarchielijst__link"  target="_blank">Kamp</a>
                                    </li>
                                </ul> 
                            </li>

                            <li class="hierarchielijst__item">
                                Neutraal ziekenfonds
                                <ul>
                                    <li class="hierarchielijst__sublist">
                                        <a href="https://www.vnz.be/wp-content/uploads/2014/11/kampvergoeding.pdf" class="hierarchielijst__link"  target="_blank">Kamp</a>
                                    </li>
                                </ul> 
                            </li>

                            <li class="hierarchielijst__item">
                                Bond Moyson
                                <ul>
                                    <li class="hierarchielijst__sublist">
                                        <a href="https://www.bondmoyson.be/SiteCollectionDocuments/Formulieren/309/Opstapformulier_admin_SOCMUT.pdf" class="hierarchielijst__link"  target="_blank">Kamp</a>
                                    </li>
                                </ul> 
                            </li>
                        </ul>
                    </li>

                    <li class="hierarchielijst__item">
                        Medische fiches

                        <ul class="hierarchielijst__sublist">
                            <li class="hierarchielijst__item">
                                <a href="https://fosopenscouting.be/sites/default/files/inline-files/MEDISCHE-FICHE_2018_16min.pdf" class="hierarchielijst__link"  target="_blank">Medische fiche (-16jarigen)</a>
                            </li>

                            <li class="hierarchielijst__item">
                                <a href="https://fosopenscouting.be/sites/default/files/inline-files/MEDISCHE-FICHE_2018_16plus.pdf" class="hierarchielijst__link"  target="_blank">Medische fiche (+16jarigen)</a>
                            </li>
                        </ul>
                    </li>

                    <li class="hierarchielijst__item">
                        <a href="{{ asset('/docs/FiscaalAttest-FOS207.pdf') }}" class="hierarchielijst__link"  target="_blank">Fiscaal attest</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-4 section section--small-spacing">
            <div class="section section--small-spacing">
                <h3>Uitleg</h3>

                <p>
                    Hier vindt u alle tegemoetkomingen.
                    U dient uw gegevens in te vullen en daarna af te geven aan de eenheidsleiding (de leiding kan helpen om ervoor zorgen dat het papier bij de juiste personen terechtkomen). De eenheidsleiding zal daarna het nodige aanvullen en u het papier zo snel mogelijk terugbezorgen.
                </p>
            </div>

            <div class="section section--small-spacing">
                <h3>Contact</h3>

                <p>
                    Vind je een document niet of heb je een vraag? Contacteer dan één van onze verandwoordelijke.
                </p>

                <div class="leiding-card-list">
                    @component('components.leiding_card', [
                        'leider' => $el,
                    ])
                    @endcomponent

                    @component('components.leiding_card', [
                        'leider' => $ael_leden,
                    ])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection