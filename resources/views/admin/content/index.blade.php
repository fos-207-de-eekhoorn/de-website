@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'red',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Content',
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
                'current' => 'Content',
            ])@endcomponent    
        </div>

        <div class="col-12">
            <h2>Keys</h2>
        </div>

        <div class="col-12">
            <table class="table">
                <thead class="table__head">
                    <tr class="table__row">
                        <td class="table__cell">Naam</td>
                        <td class="table__cell">key</td>
                        <td class="table__cell">Laatste update</td>
                        <td class="table__cell">Door</td>
                        <td class="table__cell"></td>
                    </tr>
                </thead>

                <tbody class="table__body">
                    @foreach($contents as $content)
                        <tr class="table__row">
                            <td class="table__cell">
                                {{ $content->name }}
                            </td>

                            <td class="table__cell">
                                {{ $content->key }}
                            </td>

                            @if ($content->content_text->last())
                                <td class="table__cell">
                                    {{ Carbon\Carbon::parse($content->content_text->last()->created_at)->format('d-m-Y H:i') }}
                                </td>

                                <td class="table__cell">
                                    @if (strlen($content->content_text->last()->leider->totem) > 0)
                                        {{ $content->content_text->last()->leider->totem }}
                                    @else
                                        {{ $content->content_text->last()->leider->voornaam }}
                                    @endif
                                </td>
                            @else
                                <td class="table__cell">-</td>
                                <td class="table__cell">-</td>
                            @endif

                            <td class="table__cell no-wrap">
                                <a href="{{ url('/admin/contents/' . $content->key) }}">
                                    <span class="fa--before"><i class="fas fa-eye"></i></span>Bekijk
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection