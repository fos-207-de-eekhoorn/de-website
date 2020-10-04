@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Activiteit',
        'page_sub_title' => 'toevoegen',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
            @component('components.breadcrumbs', [
                'childs' => [
                    (object)[
                        'link' => '/admin',
                        'name' => 'Admin',
                    ],
                    (object)[
                        'link' => '/admin/evenementen',
                        'name' => 'Evenementen',
                    ],
                ],
                'current' => 'Evenement toevoegen',
            ])@endcomponent
        </div>

        <div class="col-12 section section--extra-small-spacing">
            <h2>Evenement toevoegen</h2>
        </div>

        <div class="section col-12">
            Hello world!
        </div>
    </div>

    <script>
        var $is_activiteit = $('#is_activiteit');

        (function($){
            // Disable fields when there's no activity
            $is_activiteit.on('change',function() {
                toggleBlockableElements();
            });
            $(document).ready(function() {
                toggleBlockableElements();
            });

            // Fill in date
            var d = new Date();

            document.getElementById('day').value = doubleDigits(d.getDate());
            document.getElementById('month').value = doubleDigits(d.getMonth() + 1);
            document.getElementById('year').value = d.getFullYear();

            function doubleDigits(n) {
                if (n < 10) return "0" + n;
                else return n;
            }
        })(jQuery);

        function toggleBlockableElements() {
            console.log('toggleBlockableElements');
            var isChecked = $is_activiteit.prop('checked');
            console.log(isChecked);
            var elementsToBlock = [
                $('#start_uur'),
                $('#eind_uur'),
                $('#prijs'),
                $('#locatie'),
                $('#omschrijving')
            ]

            if (isChecked) elementsToBlock.forEach(function(e) {
                e.removeAttr('disabled');
            });
            else elementsToBlock.forEach(function(e) {
                e.attr('disabled', 'true');
            });
        }
    </script>
@endsection
