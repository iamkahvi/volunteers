@extends('app')

@section('content')
    <h1>
        Your Dashboard

        <div class="pull-right" style="font-size:0.4em; margin-top: 1.4em;">
            User Permissions:

            <b>{{ implode(", ", Auth::user()->getRoleNames(['format' => 'ucwords'])) }}</b>
        </div>
    </h1>
    <hr>

    <a href="/profile" class="btn btn-primary">View Your Profile</a>
    <a href="/profile/shifts" class="btn btn-primary">View Your Shifts</a>

    @can('create-event')
        <a href="/event" class="btn btn-primary">Create an Event</a>
    @endcan

    @if(count($present))
        <h2>Programs:</h2>

        <div class="list-group">
            @foreach($present as $event)

            <a href='/event/{{ $event->id }}' class="list-group-item"><h4>
                <b style="font-size:1.3em;color:#337AB7">
                    @if($event->featured)
                        <span class="burn glyphicon glyphicon-fire"></span>
                    @endif
                    {{ $event->name }}
                </b>
                <i style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;">
                    <!--(from {{ $event->start_date }} until {{ $event->end_date }})-->
                    {{ date("M jS", strtotime($event->start_date)) }} to {{ date("M jS, Y", strtotime($event->end_date)) }}
                </i>
            </h4></a>

            @endforeach

            @if(count($future))
                @foreach($future as $event)

                <a href='/event/{{ $event->id }}' class="list-group-item"><h4>
                    <b style="font-size:1.3em;color:#337AB7">
                        @if($event->featured)
                            <span class="burn glyphicon glyphicon-fire"></span>
                        @endif
                        {{ $event->name }}
                    </b>
                    <i style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;">
                        <!--(from {{ $event->start_date }} until {{ $event->end_date }})-->
                        {{ date("M jS", strtotime($event->start_date)) }} to {{ date("M jS, Y", strtotime($event->end_date)) }}
                    </i>
                </h4></a>

                @endforeach
            @endif
        </div>
    @endif

    @can('create-event')
    @if(count($past))
        <h2>Past Programs:</h2>

        <div class="list-group">
            @foreach($past as $event)

            <a href='/event/{{ $event->id }}' class="list-group-item"><h4>
                <b style="font-size:1.3em;color:#337AB7">
                    @if($event->featured)
                        <span class="burn glyphicon glyphicon-fire"></span>
                    @endif
                    {{ $event->name }}
                </b>
                <i style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden;">
                    {{ date("M jS", strtotime($event->start_date)) }} to {{ date("M jS, Y", strtotime($event->end_date)) }}
                </i>
            </h4></a>

            @endforeach
        </div>
    @endif
    @endcan
@endsection
