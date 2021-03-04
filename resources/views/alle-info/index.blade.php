@extends('layouts.app')

@section('title', 'Alle info')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Algemene info',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12 col-md-6 col-lg-7">
            <div class="row">
                <div class="col-12 section">
                    <div class="algemene-info">
                        <h2>Lid worden?</h2>
                        <p>
                            Wil je lid worden van onze scouts? Goed idee! Hier vindt je alle nodige info.
                        </p>

                        <a href="{{ route('info.lid-worden') }}">Meer info <span class="icon"><i class="fas fa-angle-right"></i></span></a>
                    </div>
                </div>

                <div class="col-12 section">
                    <div class="algemene-info">
                        <h2>Uniform & Fosshop</h2>
                        <p>
                            Uniform in orde brengen? Hier vind je alles die je moet weten!
                        </p>

                        <a href="{{ route('info.uniform') }}">Meer info <span class="icon"><i class="fas fa-angle-right"></i></span></a>
                        <img src="{{ asset('/img/uniform.jpg') }}" alt="Uniform">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-5 justify-content-center">
            <div class="card cs-grey-extra-light">
                <h3>Documenten</h3>

                <p>
                    Hier vind je alle tegemoetkomingen.
                    U dient uw gegevens in te vullen en daarna af te geven aan de eenheidsleiding (de leiding kan helpen om ervoor zorgen dat het papier bij de juiste personen terechtkomen). De eenheidsleiding zal daarna het nodige aanvullen en u het papier zo snel mogelijk terugbezorgen.
                </p>

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

                <p class="large-margin-top no-margin-bottom text--align-right">
                    <a href="{{ route('info.documenten') }}">Meer info <span class="icon"><i class="fas fa-angle-right"></i></span></a>
                </p>
            </div>
        </div>
    </div>
@endsection