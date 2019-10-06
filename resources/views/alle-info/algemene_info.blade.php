@extends('layouts.main')

@section('content')
    @component('components.carousel', [
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

        {{--
        <div class="col-12 col-md-6 col-lg-5 cs-grey-extra-light justify-content-center">
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
                                    <a href="https://scoutsoostkamp.be/sites/scoutsoostkamp.fossite.be/files/wysiwyg/tegemoetkoming-cm-inschrijvingsgeld.pdf" class="hierarchielijst__link"  target="_blank">Lidgeld</a>
                                </li>

                                <li class="hierarchielijst__item">
                                    <a href="https://scoutsoostkamp.be/sites/scoutsoostkamp.fossite.be/files/wysiwyg/tegemoetkoming-cm-kamp.pdf" class="hierarchielijst__link"  target="_blank">Kamp</a>
                                </li>
                            </ul>
                        </li>

                        <li class="hierarchielijst__item">
                            LM
                            <ul>
                                <li class="hierarchielijst__sublist">
                                    <a href="https://scoutsoostkamp.be/sites/scoutsoostkamp.fossite.be/files/wysiwyg/tegemoetkoming-lm-kamp.pdf" class="hierarchielijst__link"  target="_blank">Kamp</a>
                                </li>
                            </ul> 
                        </li>

                        <li class="hierarchielijst__item">
                            Neutraal ziekenfonds
                            <ul>
                                <li class="hierarchielijst__sublist">
                                    <a href="https://scoutsoostkamp.be/sites/scoutsoostkamp.fossite.be/files/wysiwyg/tegemoetkoming-neutraal-ziekenfonds-kamp-en-lidgeld.pdf" class="hierarchielijst__link"  target="_blank">Lidgeld en kamp</a>
                                </li>
                            </ul> 
                        </li>

                        <li class="hierarchielijst__item">
                            OZ

                            <ul class="hierarchielijst__sublist">
                                <li class="hierarchielijst__item">
                                    <a href="file:///C:/Users/vdbne/Downloads/OZ501_Jeugdbeweging.pdf"  target="_blank">Lidgeld</a>
                                </li>

                                <li class="hierarchielijst__item">
                                    <a href="file:///C:/Users/vdbne/Downloads/OZ501_Tegemoetkoming_Jeugdactiviteiten.pdf" target="_blank">Kamp</a>
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
        --}}
    </div>
@endsection