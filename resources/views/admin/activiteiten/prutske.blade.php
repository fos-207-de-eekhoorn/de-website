@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'brown',
            'pattern' => '1',
            'strength' => 'dark',
        ],
        'page_title' => 'Prutske',
    ])
    @endcomponent

    {{-- Contact formulier --}}
    {{-- EL & AEL --}}
    <div class="row section section--small-spacing">
        <div class="col-12 medium-margin-bottom">
            <a href="{{ url('/admin/activiteiten') }}">
                <span class="fa--before"><i class="fas fa-angle-left"></i></span>Ga terug naar overzicht
            </a>
        </div>

        <div class="col-12">
            <h2>Export voor het prutske</h2>

            <form class="form" action="{{ url('/admin/activiteiten/prutske') }}" method="GET">
                {{-- Input --}}
                <div class="row">
                    {{-- Tak --}}
                    <div class="col-12 col-md-5">
                        <div class="form__section">
                            <label for="tak" class="form__label">Tak</label>

                            <select
                                id="tak"
                                name="tak"
                                class="form__select form__select--full-width">
                                <option value="bevers">Bevers</option>
                                <option value="welpen">Welpen</option>
                                <option value="jonge">JG/V's</option>
                                <option value="oude">OG/V's</option>
                            </select>

                            @if ($errors->has('tak'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('tak') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Month --}}
                    <div class="col-12 col-md-4">
                        <div class="form__section">
                            <label for="month" class="form__label">Maand</label>

                            <select
                                id="month"
                                name="month"
                                class="form__select form__select--full-width">
                                <option value="01">Januari - februari</option>
                                <option value="03">Maart - april</option>
                                <option value="05">Mei - juni</option>
                                <option value="07">Juli - augustus</option>
                                <option value="09">September - oktober</option>
                                <option value="11">November - december</option>
                            </select>

                            @if ($errors->has('month'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('month') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Year --}}
                    <div class="col-12 col-md-3">
                        <div class="form__section">
                            <label for="year" class="form__label">Jaar</label>

                            <select
                                id="year"
                                name="year"
                                class="form__select form__select--full-width">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>

                            @if ($errors->has('year'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('year') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="wrapper__btn">
                    <button class="btn btn--primary">Geef activiteiten</button>
                </div>
            </form>
        </div>
    </div>

    @if(isset($export))
        <div class="row section">
            <div class="col-12">
                <h4>Activiteiten @if(isset($tak)) voor de {{ $tak }} @endif</h4>

                <div class="copy-paste copy-paste--prutske" contenteditable="true">
                    {!! $export !!}
                </div>
            </div>
        </div>
    @endif

    <script>
        (function($){
            @if(isset($tak)) document.getElementById('tak').value = '{{ $tak }}'; @endif
            document.getElementById('month').value = '{{ $month }}';
            document.getElementById('year').value = '{{ $year }}';

            /* Get the text field */
            var copyText = document.getElementById("prutske");

            /* Select the text field */
            copyText.select();

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            alert("Copied the text: " + copyText.value);
        })(jQuery);
    </script>
@endsection