@extends('app')

@section('content')
    <h1>Additional Profile Information</h1>
    <hr>

    {!! Form::open(['url' => 'profile/edit']) !!}
        <input type="hidden" name="type" value="data">

        @include('partials/form/text',
        [
            'name' => 'full_name',
            'label' => 'Full Name',
            'placeholder' => 'Your name',
            'help' => "Required. Your full name is used for reporting",
            'value' => (is_null($user->data)) ? '' : $user->data->full_name
        ])

        @include('partials/form/text',
        [
            'name' => 'burner_name',
            'label' => 'Public Name',
            'placeholder' => 'Your public name',
            'help' => "This name will be shown to other users when you sign up for a shift",
            'value' => (is_null($user->data)) ? '' : $user->data->burner_name
        ])

        @include('partials/form/text',
        [
            'name' => 'phone',
            'label' => 'Phone Number',
            'help' => "Optional.",
            'value' => (is_null($user->data)) ? '' : $user->data->phone
        ])

        @include('partials/form/text',
        [
            'name' => 'emergency_name',
            'label' => 'Emergency Contact',
            'help' => "Optional.",
            'value' => (is_null($user->data)) ? '' : $user->data->emergency_name
        ])

        @include('partials/form/text',
        [
            'name' => 'emergency_phone',
            'label' => 'Emergency Phone Number',
            'help' => "Optional.",
            'value' => (is_null($user->data)) ? '' : $user->data->emergency_phone
        ])

        @include('partials/form/date',
        [
            'name' => 'birthday',
            'label' => 'Birthday',
            'placeholder' => 'YYYY-MM-DD',
            'help' => 'This will only be used as a part of the event census',
            'value' => (is_null($user->data)) ? '' : $user->data->birthday
        ])

        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="/profile" class="btn btn-primary">Cancel</a>
    {!! Form::close() !!}
@endsection
