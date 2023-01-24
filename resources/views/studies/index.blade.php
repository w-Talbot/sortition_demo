
@extends('layouts.app', [
    'title' => __('Study Management'),
    'parentSection' => 'laravel',
    'navClass' => 'navbar bg-default',
    'elementName' => 'study-management'
])

@section('content')
    @component('studies.headers.default')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Studies') }}
            @endslot

                {{--item-to-check--}}
{{--            <li class="breadcrumb-item"><a href="{{ route('studies.index') }}">{{ __('Study Management') }}</a></li>--}}
            <li class="breadcrumb-item"><a href="/studies/index">{{ __('Study Management') }}</a></li>

            <li class="breadcrumb-item active" aria-current="page">{{ __('List') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Studies') }}</h3>
{{--                                <p class="text-sm mb-0">--}}
{{--                                    {{ __('This is an example of item management. This is a minimal setup in order to get started fast.') }}--}}
{{--                                </p>--}}
                            </div>
                            @if (auth()->user()->can('create', App\Item::class))
                                <div class="col-4 text-right">
{{--                                   item-to-check--}}
{{--                                    <a href="{{ route('studies.create') }}" class="btn btn-sm btn-primary">{{ __('Add item') }}</a>--}}
                                    <a href="/studies/create" class="btn btn-sm btn-primary">{{ __('Build Study') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>

                    <div class="table-responsive py-4" id="items-table">
                        <table class="table align-items-center table-flush table-hover"  id="datatable-basic">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Logo') }}</th>
                                <th scope="col">{{ __('Study') }}</th>
                                <th scope="col">{{ __('Type') }}</th>
                                <th scope="col">{{ __('Description') }}</th>
                                @can('manage-items', App\User::class)
                                    <th scope="col"></th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($studies as $study)

                                @if($study->study_type == 'demo')
                                    <tr class="bg-success" onclick="location.href='/studies/{{$study->id}}';">
                                @endif
                                @if($study->study_type == 'live')
                                    <tr class="bg-warning" onclick="location.href='/studies/{{$study->id}}';">
                                @endif

                                    <td>

                                        @if ($study->logo)
{{--                                            <img src="asset(storage/sortition/ . $study->logo )" alt="" style="max-width: 150px;">--}}
                                            <img src="{{ asset('sortition') }}/img/no-image.png"  alt="img not found">
                                        @else
                                            <img src="{{ asset('sortition') }}/img/no-image.png"  alt="img not found">
                                        @endif
                                    </td>
                                    <td>{{ $study->study_name }}</td>
                                    <td>{{ $study->study_type }}</td>
                                    <td>{{ $study->study_description }}</td>
{{--                                    item-to-check--}}
{{--                                    <td>--}}
{{--                                        @foreach ($item->tags as $tag)--}}
{{--                                            <span class="badge badge-default" style="background-color:{{ $tag->color }}">{{ $tag->name }}</span>--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}
{{--                                    <td>{{ $study->created_at->format('d/m/Y H:i') }}</td>--}}
                                    @can('manage-items', App\User::class)
                                        <td class="text-right">
                                            @if (auth()->user()->can('update', $study) || auth()->user()->can('delete', $study))
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @can('update', $study)
                                                            <a class="dropdown-item" href="/studies/{{$study->id}}/edit">{{ __('Edit') }}</a>
                                                        @endcan
                                                        @can('delete', $study)
                                                            <form action="/studies/{{$study->id}}/delete" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this item?") }}') ? this.parentElement.submit() : ''">
                                                                    {{ __('Delete') }}
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    @endcan
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
@endpush
