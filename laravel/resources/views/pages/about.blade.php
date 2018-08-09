@extends('app')

@section('content')
    <h1>About the Volunteer Database</h1>

    <h4>
        This website is a scheduling system where users can sign up for volunteer shifts.
    </h4>

    <hr>

    <h2><ins>Instructions are coming soon</ins></h2>

    <hr>

    <h2><ins>Features</ins></h2>

    <h3>Mobile friendly</h3>

    <p>
        This website was developed using the mobile first methodology; all parts of the site are designed to work on phones, tablets, and desktop computers.
    </p>

    <h3>User roles</h3>

    <p>
        Every user has specific roles that allow them to take certain shifts.
        This allows administrators to create medical or fire fighting shifts that only allow approved users.
    </p>

    <h3>User uploads</h3>

    <p>
        Users can upload files into their profile to be approved by administrators.
        This allows users to upload their EMT or fire fighting certification documents.
    </p>

    <h3>History from previous events</h3>

    <p>
        This website supports creating multiple events, allowing use by many festivals, or allowing a festival to keep a record of who volunteered in the past.
    </p>

    <h3>Customizable shifts</h3>

    <p>
        Event shifts can start and end at any time of day and can be any duration.
        Instead of being locked into a rigid table, this lets administrators create longer shifts for leads and shorter shifts for miscellaneous jobs.
    </p>


    <hr>

    <h2><ins>History</ins></h2>

    <p>
        Back between late 2014 and early 2015, volunteers from Apogaea were working on making updates to their existing volunteer database.
        <a href="https://github.com/itsrachelfish">Rachel Fish</a> is friends with a couple of the developers and was present at a weekend-long hackathon where lots of ideas were shared and code was written aplenty.
        Unfortunately, when Apogaea was postponed in 2015, development of their volunteer database was postponed as well.
    </p>

    <p>
        This project was started in November of 2015 as an experiment in learning the <a href="http://laravel.com/">Laravel framework</a>.
        Over time, what started as a learning exercise turned into a fully featured system that might actually be useful to someone.
        Rachel's previous experience with the old Apogaea database gave her insight into some of the problems the team was facing and inspired her to try something new.
    </p>

    <p>
        Writing in the third person is weird.
    </p>
@endsection
