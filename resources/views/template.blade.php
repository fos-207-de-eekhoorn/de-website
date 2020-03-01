@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'salmon',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Template',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
            <h2>Titel begint altijd met h2, nooit met h1</h2>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio id natus quasi itaque, nihil eius hic. Voluptatibus dignissimos obcaecati, ab perspiciatis necessitatibus inventore labore animi eum enim consequuntur maiores voluptates!
            </p>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore perspiciatis beatae vitae aliquid, ratione maxime laborum, aliquam quis itaque quos veniam accusantium nostrum suscipit rem eligendi saepe. Sint fuga, vel.
            </p>
        </div>
    </div>

    <div class="row section justify-content-center">
        <div class="col-8">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima minus reiciendis, corporis harum, est id omnis sint, et recusandae consequatur ea ratione alias totam obcaecati vitae consequuntur excepturi. Exercitationem, harum!
            </p>
        </div>
    </div>
@endsection