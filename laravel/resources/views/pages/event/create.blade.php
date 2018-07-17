@extends('app')

@section('content')
    <h1>Create an Event</h1>
    <hr>

    {!! Form::open(['files' => true]) !!}
        @include('partials/form/text', ['name' => 'name', 'label' => 'Event Name', 'placeholder' => "What's it called?"])
        @include('partials/form/textarea', ['name' => 'description', 'label' => 'Description', 'placeholder' => 'Tell me as much as you want'])
        <div class="col-sm-4">
            @include('partials/form/date', ['name' => 'start_date', 'label' => 'Start Date', 'help' => 'Start Date should be on a Monday', 'placeholder' => 'Click on arrow'])
            @include('partials/form/date', ['name' => 'end_date', 'label' => 'End Date'])
        </div>
        @include('partials/form/file', ['name' => 'image', 'label' => 'Promotional Image / Logo'])
        @include('partials/form/checkbox', ['name' => 'featured', 'label' => 'Is this a featured event?', 'options' => ['yes' => 'Yes']])
        <button type="submit" class="btn btn-primary">Submit</button>
    {!! Form::close() !!}
@endsection
