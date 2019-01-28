@if($disabled)
    <!-- main content  -->
    <section class="wrapper-lg bg-white">

        <div class="jumbotron text-center bg-white not-found w-5x">
            <div>
                <h3 class="font-thin">{{trans("orchid/monitor::monitor.disabled")}}</h3>
            </div>
        </div>

    </section>
@else

<!-- main content  -->
<section class="wrapper bg-white">


    <div class="row padder-v">
        <!-- Hardware  -->
        <div class="col-lg-6">
            <h4 class="text-black font-thin">
                <i class="icon-server m-r-xs"></i> {{trans('orchid/monitor::monitor.Hardware.Title')}}
            </h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td><p>{{trans('orchid/monitor::monitor.Hardware.Uptime')}}: </p></td>
                        <td><p class="text-right">{{ $hardware->uptime }}</p></td>
                    </tr>
                    <tr>
                        <td><p>{{trans('orchid/monitor::monitor.Hardware.Board Temperature')}}: </p>
                        </td>
                        <td><p class="text-right">{{ $hardware->temperature }}</p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Network  -->
        <div class="col-lg-6">
            <h4 class="text-black font-thin">
                <i class="icon-speedometer m-r-xs"></i> {{trans('orchid/monitor::monitor.Network.Title')}}
            </h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td><p>{{trans('orchid/monitor::monitor.Network.Down')}}:</p></td>
                        <td><p class="text-right">{{ $network->down }}</p></td>
                    </tr>
                    <tr>
                        <td><p>{{trans('orchid/monitor::monitor.Network.Up')}}:</p></td>
                        <td><p class="text-right">{{ $network->up }}</p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row padder-v">
        <!-- Load Average  -->
        <div class="col-lg-6">
            <h4 class="font-thin text-black">
                <i class="icon-bar-chart m-r-xs"></i> {{trans('orchid/monitor::monitor.CPU Load Average.Title')}}
            </h4>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <td><p>1 {{trans('orchid/monitor::monitor.CPU Load Average.min')}}:</p></td>
                        <td><p class="text-right"><span
                                        class="text-muted">{{ $loadAverage->oneMin['percent'] }}
                                        %</span>&nbsp;
                                                &nbsp; &nbsp;{{ $loadAverage->oneMin['average'] }}
                            </p></td>
                    </tr>
                    <tr>
                        <td><p>5 {{trans('orchid/monitor::monitor.CPU Load Average.min')}}:</p></td>
                        <td><p class="text-right"><span
                                        class="text-muted">{{ $loadAverage->fiveMins['percent'] }}
                                        %</span>&nbsp;
                                                &nbsp; &nbsp;{{ $loadAverage->fiveMins['average'] }}
                            </p></td>
                    </tr>
                    <tr>
                        <td><p>15 {{trans('orchid/monitor::monitor.CPU Load Average.min')}}:</p></td>
                        <td><p class="text-right"><span
                                        class="text-muted">{{ $loadAverage->oneMin['percent'] }}
                                        %</span>&nbsp;
                                                &nbsp; &nbsp;{{ $loadAverage->fifteenMins['average'] }}
                            </p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Memory  -->
            <h4 class="text-black font-thin">
                <i class="icon-equalizer m-r-xs"></i> {{trans('orchid/monitor::monitor.Memory.Title')}}
            </h4>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <td colspan="3">

                            <div class="progress m-n">
                                <div class="progress-bar progress-bar-danger"
                                     role="progressbar"
                                     style="width: {{$memory->used->percentage}}%">
                                    <span class="sr-only">{{$memory->used->percentage}}% Used</span>
                                </div>
                                <div class="progress-bar progress-bar-warning"
                                     role="progressbar"
                                     style="width: {{$memory->buffers->percentage}}%">
                                                            <span class="sr-only">{{$memory->buffers->percentage}}
                                                                % Buffers</span>
                                </div>
                                <div class="progress-bar progress-bar-info"
                                     role="progressbar"
                                     style="width: {{$memory->cache->percentage}}%">
                                    <span class="sr-only">{{$memory->cache->percentage}}% Cache</span>
                                </div>
                                <div class="progress-bar progress-bar-success"
                                     role="progressbar"
                                     style="width: {{$memory->free->percentage}}%">
                                    <span class="sr-only"> {{$memory->free->percentage}}% Free</span>
                                </div>
                            </div>
                        </td>
                        <td colspan="1">
                            <p class="text-right">{{ $memory->total->pretty  }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="membar-key">
                            <p class="membar-key-used">
                                {{ round ($memory->used->percentage, 2) }}%
                            </p>
                        </td>
                        <td>
                            <p class="text-danger">{{trans('orchid/monitor::monitor.Memory.Used')}}</p>
                        </td>
                        <td class="membar-key">
                            <p class="membar-key-buffers">
                                {{ round ( $memory->buffers->percentage,2) }}%
                            </p>
                        </td>
                        <td>
                            <p class="text-warning">{{trans('orchid/monitor::monitor.Memory.Buffers')}}</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="membar-key">
                            <p class="membar-key-cache">
                                {{ round ( $memory->cache->percentage,2) }}%
                            </p>
                        </td>
                        <td>
                            <p class="text-info">{{trans('orchid/monitor::monitor.Memory.Cache')}}</p>
                        </td>
                        <td class="membar-key">
                            <p class="membar-key-free">
                                {{ round ( $memory->free->percentage,2) }}%
                            </p>
                        </td>
                        <td>
                            <p class="text-success">{{trans('orchid/monitor::monitor.Memory.Free')}}</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="row padder-v">
        <!-- Storage  -->
        <div class="col-lg-12 widget-less-padding">
            <h4 class="font-thin text-black">
                <i class="icon-disc m-r-xs"></i> {{trans('orchid/monitor::monitor.Storage.Title')}}
            </h4>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th><p>{{trans('orchid/monitor::monitor.Storage.FILESYSTEM')}}</p></th>
                        <th>
                            <p class="text-center">{{trans('orchid/monitor::monitor.Storage.Size')}}</p>
                        </th>
                        <th>
                            <p class="text-center">{{trans('orchid/monitor::monitor.Storage.AVAILABLE')}}</p>
                        </th>
                        <th><p class="text-center">
                                %&nbsp;{{trans('orchid/monitor::monitor.Storage.USED')}}</p></th>
                        <th>
                            <p class="text-right">{{trans('orchid/monitor::monitor.Storage.MOUNTED')}}</p>
                        </th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($storage->storage as $item)
                        <tr v-for="storage in systems.storage.storage">
                            <td><p>{{ $item[0] }}</p></td>
                            <td><p class="text-center">{{ $item[1] }}</p></td>
                            <td><p class="text-center">{{ $item[3] }}</p></td>
                            <td>
                                <div class="progress bg-dark dk" title="{{ $item[2] }}">
                                    <div class="progress-bar" role="progressbar"
                                         aria-valuenow="{{$item[4]}}" aria-valuemin="0"
                                         aria-valuemax="100"
                                         style="width: {{$item[4]}};">
                                        {{ $item[4] }}
                                    </div>
                                </div>
                            </td>
                            <td><p class="text-right">{{ $item[5] }}</p></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="row padder-v">
        <div class="col-md-12">
            <h4 class="font-thin text-black">
                <i class="icon-info m-r-xs"></i> {{trans('orchid/monitor::monitor.Info.Title')}}
            </h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td><p>{{trans('orchid/monitor::monitor.Info.Linux')}}:</p></td>
                        <td><p class="text-right small">{{ $info->uname}}</p></td>
                    </tr>
                    <tr>
                        <td><p>{{trans('orchid/monitor::monitor.Info.Web Server')}}:</p></td>
                        <td><p class="text-right small">{{ $info->webserver  }}</p></td>
                    </tr>
                    <tr>
                        <td><p>{{trans('orchid/monitor::monitor.Info.PHP Version')}}:</p></td>
                        <td><p class="text-right small">{{ $info->phpVersion }}</p></td>
                    </tr>
                    <tr>
                        <td><p>{{trans('orchid/monitor::monitor.Info.CPU')}}:</p></td>
                        <td><p class="text-right small">{{ $info->cpu }}</p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</section>

@endif

