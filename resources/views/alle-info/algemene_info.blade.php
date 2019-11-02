@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'images' => [
            [
                'image' => asset('/img/banner.jpg'),
                'alt' => 'Banner',
            ],
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

                        <a href="/alle-info/lid-worden">Meer info></a>
                    </div>
                </div>

                <div class="col-12 section">
                    <div class="algemene-info">
                        <h2>Uniform & Fosshop</h2>
                        <p>
                            Uniform in orde brengen? hier vindt je alles die je moet weten!
                        </p>

                        <a href="/alle-info/uniform-shop">Meer info></a>
                        <img src="{{ asset('/img/uniform.jpg') }}" alt="Uniform">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-5 justify-content-center">
            <div class="card cs-grey-extra-light">
                <h3>Documenten</h3>

                <p>
                    Hier vindt u alle tegemoetkomingen.
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
                        <a href="https://scoutsoostkamp.be/sites/scoutsoostkamp.fossite.be/files/wysiwyg/fiscaal-attest-fos207-2019.pdf" class="hierarchielijst__link"  target="_blank">Fiscaal attest</a>
                    </li>

                    <li class="hierarchielijst__item">
                        <a href="https://scoutsoostkamp.be/sites/scoutsoostkamp.fossite.be/files/wysiwyg/medische-fiche_18-19_1.pdf" class="hierarchielijst__link"  target="_blank">Medische fiche</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection