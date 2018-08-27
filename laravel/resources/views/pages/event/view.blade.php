@extends('app')

@section('content')
    <section class="event" data-id="{{ $event->id }}">
        <div class="pull-right relative" style="z-index: 1">
            @can('create-event')
                <a href="/event/{{ $event->id }}/clone" class="btn btn-primary">Clone Event</a>
            @endcan

            @can('edit-event')
                <a href="/event/{{ $event->id }}/edit" class="btn btn-primary">Edit Event</a>
            @endcan

            @can('delete-event')
                <a href="/event/{{ $event->id }}/delete" class="btn btn-danger">Delete Event</a>
            @endcan
        </div>

        <h1 class="relative">
            {{ $event->name }}

            @if($event->featured)
                <span class="burn glyphicon glyphicon-fire"></span>
            @endif
        </h1>

        <div>
            <h4 class="relative">
                {{ date("M jS, Y", strtotime($event->start_date)) }} to {{ date("M jS, Y", strtotime($event->end_date)) }}
            </h4>
        </div>

        <hr>

        @if($event->image)
            <img class="pull-right" src="/files/event/{{ $event->image }}">
        @endif



        @if($event->description)
            <label><h3>Description:</h3></label>
            <p>{!! nl2br(e($event->description)) !!}</p>
            <hr>
        @endif

        <div>
            <label><h3>Legend:</h3></label><br>
                <ul>
                    <h4>
                        <li style="color:#8CC252">
                            <p>Available shifts</p>
                        </li>
                        <li style="color:#337ab7">
                            <p>Taken shifts</p>
                        </li>
                        <li style="color:#d83664">
                            <p>Your shifts</p>
                        </li>
                    </h4>
                </ul>
        </div>
        <br>
        <div class="clearfix"></div>

        @can('read-department')
            <a href="/event/{{ $event->id }}/departments" class="btn btn-primary">View All Departments</a>
        @endcan

        @can('read-shift')
            <a href="/event/{{ $event->id }}/shifts" class="btn btn-primary">View All Shifts</a>
        @endcan
        <br><br>

        @can('create-department')
            <a href="/event/{{ $event->id }}/department/create" class="btn btn-primary">Create Department</a>
        @endcan

        @can('create-shift')
            <a href="/event/{{ $event->id }}/shift/create" class="btn btn-primary">Create Shift</a>
        @endcan

        @can('create-schedule')
            <a href="/event/{{ $event->id }}/schedule/create" class="btn btn-primary">Add a Shift to the Schedule</a>
        @endcan

        <hr>

        @if($event->departments->count())
            <h2>Filters: </h2>

            <form class="form-inline event-filter">

                <div class="form-group" style="padding-right:15px;">
                    <select class="form-control filter-departments">
                        <option value="all">Show All Activities</option>

                        @foreach($event->departments->sortBy('name') as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" style="padding-right:15px;">
                    <select class="form-control filter-weeks">
                        <option value="all">Show All Weeks</option>

                        @foreach($event->days() as $day)
                            @if($day->date->format('D') == "Mon")
                                <option value="{{ $day->date->format('Y-m-d') }}">Week of {{ date("F jS", strtotime($day->date->format('Y-m-d'))) }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group" style="padding-right:15px;">
                    <select class="form-control filter-days">
                        <option value="all">Show All Days</option>
                        <option disabled>──────────</option>


                        @foreach($event->days(true) as $day)
                            @if($day->date->format('D') == "Mon")
                                <option disabled>──────────</option>
                            @endif
                                <option value="{{ $day->date->format('Y-m-d') }}">{{ date("D, F jS", strtotime($day->date->format('Y-m-d'))) }}</option>
                        @endforeach
                    </select>
                </div>

            </form>

            <hr>

            <h2>All Shifts:</h2>

            <div class="days">
                @foreach($event->days(true) as $day)
                    <div class="day" data-date="{{ $day->date->format('Y-m-d') }}">
                        <div class="heading">
                            <h3><ins>{{ date("D, M jS", strtotime($day->date->format('Y-m-d'))) }}</ins></h3>
                            &mdash; <i>{{ $day->date->format('Y-m-d') }}</i>
                        </div>

                        <div class="shift-wrap">
                            @include('partials/event/timegrid')

                            <div class="department-wrap">
                                @foreach($event->departments->sortBy('name') as $department)
                                    <?php

                                    if($department->slots->where('start_date', $day->date->format('Y-m-d'))->isEmpty())
                                        continue;

                                    ?>

                                    <div class="department" data-id="{{ $department->id }}">
                                        <div class="title">
                                            <strong style="color:grey;font-size:150%;">{{ $department->name }}</strong>

                                            @if($department->description)
                                                <span class="description">
                                                    <span class="glyphicon glyphicon-question-sign"></span>

                                                    <div class="tip hidden">
                                                        {!! nl2br(e($department->description)) !!}

                                                        <hr>
                                                        <a class="btn btn-primary">Close</a>
                                                    </div>
                                                </span>
                                            @endif

                                            @can('edit-department')
                                                <span class="edit">
                                                    <a href="/department/{{ $department->id }}/edit">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </a>
                                                </span>
                                            @endcan
                                        </div>

                                        <ul class="shifts">
                                            @foreach($department->schedule as $schedule)
                                                <?php

                                                if($schedule->slots->where('start_date', $day->date->format('Y-m-d'))->isEmpty())
                                                    continue;

                                                ?>

                                                <li class="shift row" data-rows="{{ $schedule->volunteers }}">
                                                    <div class="title col-sm-2">
                                                        <strong style="font-size:120%;">{{ $schedule->shift->name }}</strong>

                                                        @if($schedule->shift->description)
                                                            <span class="description">
                                                                <span class="glyphicon glyphicon-question-sign"></span>

                                                                <div class="tip hidden">
                                                                    {!! nl2br(e($schedule->shift->description)) !!}

                                                                    <hr>
                                                                    <a class="btn btn-primary">Close</a>
                                                                </div>
                                                            </span>
                                                        @endif

                                                        @can('edit-schedule')
                                                            <span class="edit">
                                                                <a href="/schedule/{{ $schedule->id }}/edit">
                                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                                </a>
                                                            </span>
                                                        @endcan
                                                    </div>

                                                    <div class="slots col-sm-10">
                                                        @foreach($schedule->slots->where('start_date', $day->date->format('Y-m-d')) as $slot)
                                                            @include('partials/event/slot')
                                                        @endforeach
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div> <!-- / .department-wrap -->
                        </div> <!-- / .shift-wrap -->
                    </div>
                @endforeach
            </div>

        @endif
    </section>
@endsection
