@extends('layouts.app', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Default') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboards') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li>
        @endcomponent
        @include('layouts.headers.cards')
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Your Studies') }}</h3>
                                {{--                                <p class="text-sm mb-0">--}}
                                {{--                                    {{ __('This is an example of item management. This is a minimal setup in order to get started fast.') }}--}}
                                {{--                                </p>--}}
                            </div>
                            @if (auth()->user()->can('create', App\Item::class))
                                <div class="col-4 text-right">
                                    {{--                                   item-to-check--}}
                                    {{--                                    <a href="{{ route('studies.create') }}" class="btn btn-sm btn-primary">{{ __('Add item') }}</a>--}}
                                    <a href="/studies/index" class="btn btn-sm btn-primary">{{ __('See All') }}</a>
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
                                <th scope="col">{{ __('Description') }}</th>
                                <th scope="col">{{ __('Progress') }}</th>
                                @can('manage-items', App\User::class)
                                    <th scope="col"></th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($studies as $study)

                                <tr onclick="location.href='/studies/{{$study->id}}';">
                                    <td>

                                        @if ($study->logo)
                                            {{--                                            <img src="asset(storage/sortition/ . $study->logo )" alt="" style="max-width: 150px;">--}}
                                            <img src="{{ asset('sortition') }}/img/no-image.png"  alt="img not found">
                                        @else
                                            <img src="{{ asset('sortition') }}/img/no-image.png"  alt="img not found">
                                        @endif
                                    </td>
                                    <td>{{ $study->study_name }}</td>
                                    <td>{{ $study->study_description }}</td>
                                    <td>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                            </div>
                                    </td>
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

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Activity History</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">User</th>
                                    <th scope="col">Page</th>
                                    <th scope="col">Activity</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>superuser</td>
                                <td>/studies/ALKALINE/1/randomise</td>
                                <td>Participant Randomised: ALKALINE</td>
                                <td>01-01-2023</td>
                            </tr>
                            <tr>
                                <td>jsmith</td>
                                <td>/studies/build</td>
                                <td>Study Created: ZIGGY</td>
                                <td>02-02-2023</td>
                            </tr>
                            <tr>
                                <td>superuser</td>
                                <td>/calendar/ARCHIE</td>
                                <td>Event Added </td>
                                <td>01-01-2023</td>
                            </tr>
                            <tr>
                                <td>aoehlen</td>
                                <td>/studies/TRIO/5/sites</td>
                                <td>Site Added: John Radcliffe</td>
                                <td>03-03-2023</td>
                            </tr>
                            <tr>
                                <td>superuser</td>
                                <td>/manage/users</td>
                                <td>User Added : awarhol</td>
                                <td>04-04-2023</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
