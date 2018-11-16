@extends('app')

@section('content')
<div class="col-sm-2"></div>
<div class="col-sm-8">
    <h1>About the Volunteer Database</h1>

    <h4>
        This website is a scheduling system where users can sign up for volunteer shifts.
    </h4>

    <hr>

    <h2>Navigation Bar:</h2>
    <br>
    <ul>
    <li><strong>Resources</strong>: These pages are where you will find reading material to educate you on programming and the Love Bug!</li>
    </ul>
    <p style="padding-left: 60px;"><strong>Volunteer Handbook</strong></p>
    <p style="padding-left: 60px;"><strong>Fresh Food Delivery</strong></p>
    <p style="padding-left: 60px;"><strong>GAR Market Booths</strong></p>
    <p style="padding-left: 60px;"><strong>Community Kitchens</strong></p>
    <p style="padding-left: 60px;"><strong>GROW Project</strong></p>
    <p style="padding-left: 60px;"><strong>Gleaning</strong></p>
    <p style="padding-left: 60px;"><strong>Events</strong></p>
    <p style="padding-left: 60px;"><strong>Instructions</strong></p>
    <ul>
    <li><strong>Your Shifts</strong>: This page is where you will find all the shifts you have signed up for; past, present and future.</li>
    </ul>
    <ul>
    <li><strong>Programs</strong>: This page is where you will find all upcoming, ongoing and past programs.</li>
    </ul>
    <ul>
    <li><strong>[User]</strong>: This page is where will find all your personal details.</li>
    </ul>
    <ul>
    <li><strong>Logout</strong>: Clicking this button logs you out of the Robot.</li>
    </ul>
    <br>
    <h2>Viewing a Program</h2>
    <br>
    <p><strong>Description</strong>: This is a description of the program in question.</p>
    <p><strong>Legend</strong>: This is a colour-coded legend to let you know what shift are available, taken or yours.</p>
    <p><strong>Filters</strong>: You have the option to filter by Activity, Week and Day.</p>
    <p><strong>All Shifts</strong>:</p>
    <ul>
    <li>Rows are separated by <strong>days</strong> then <strong>activities </strong>and then <strong>shifts</strong></li>
    <li>Columns are separated by the hour</li>
    <li>Click on a shift bubble to view the shift</li>
    </ul>
    <br>
    <h2>How To Take a Shift</h2>
    <br>
    <ol>
    <li>From the &ldquo;Programs&rdquo; page, click on a program</li>
    <li><em>Use the </em><strong>Filters</strong> to specify the date-range you are able to volunteer</li>
    <li><em>Use the </em><strong>Filters</strong> to specify the Activity you are able to volunteer for</li>
    <li>Scroll through the days listed</li>
    <li>Click on a green bubble to view a shift</li>
    <ul>
    <li>Click <em>Take Shift</em> to take a shift (You must perform this action <strong>3 days </strong>in advance of the shift occurrence)</li>
    <li>Click View Event to return to the Event Page</li>
    </ul>
    </ol>
    <br>
    <h2>How To Release a Shift</h2>
    <br>
    <ol>
    <li>From the &ldquo;Your Shifts&rdquo; page, click on the shift you want to release.</li>
    <li>Click Release Shift (You must perform this action<strong> 3 days</strong> in advance of the shift occurrence)</li>
    </ol>
    <p><br /><br /></p>

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
</div>
@endsection
