@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'red',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Instellingen',
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
                'current' => 'Instellingen',
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
                        <td class="table__cell"></td>
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

                            <td class="table__cell no-wrap">
                                <p class="no-margin-bottom">
                                    <a href="{{ url('/admin/settings/edit/' . Crypt::encrypt($setting->id)) }}">
                                        <span class="fa--before"><i class="fas fa-pen"></i></span>Pas aan
                                    </a>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection