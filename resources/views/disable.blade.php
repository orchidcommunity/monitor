@extends('dashboard::layouts.dashboard')


@section('title',trans('orchid/monitor::monitor.Monitor'))
@section('description',trans('orchid/monitor::monitor.description'))

@section('content')

<!-- main content  -->
<section class="wrapper-lg bg-white col-md-6">

    <div class="jumbotron text-center bg-white not-found">
        <div>
            <h3 class="font-thin">{{trans("orchid/monitor::monitor.disabled")}}</h3>
        </div>
    </div>

</section>

@endsection
