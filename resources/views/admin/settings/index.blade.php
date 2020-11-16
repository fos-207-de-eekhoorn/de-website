@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'red',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Settings',
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
                ],
                'current' => 'Settings',
            ])@endcomponent    
        </div>

        <div class="col-12">
            <h2>Keys</h2>
        </div>

        <div class="col-12">
            <table class="table">
                <thead class="table__head">
                    <tr class="table__row">
                        <td class="table__cell">Key</td>
                        <td class="table__cell">Value</td>
                    </tr>
                </thead>

                <tbody class="table__body">
                    @foreach($settings as $setting)
                        <tr class="table__row">
                            <td class="table__cell">
                                {{ $setting->key }}
                            </td>

                            <td class="table__cell">
                                {{ $setting->value }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection