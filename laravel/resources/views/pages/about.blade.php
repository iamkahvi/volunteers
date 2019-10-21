@extends('app')

@section('content')
<div class="col-sm-2"></div>
<div class="col-sm-8">
    <h1>About Loving Spoonful's Love Bug</h1>

    <h4>
        This website is a scheduling system where users can sign up for volunteer shifts. It is also where volunteers can find out more about all current volunteer opportunities with Loving Spoonful, including program descriptions, volunteer role descriptions and Program Coordinator contact details. The Volunteer Handbook and other volunteer resources are also found on Love Bug.
    </h4>
    
    <hr>
    
    <h2>Your Dashboard</h2>
    <p>
       Your Dashboard is the first page that you see when you login to Love Bug. It shows all the current volunteer opportunities. Click on the opportunity to find a description of the program, a description of the volunteer role, and a calendar of available shifts that you can sign up for directly. You will also find the contact information of the Program Coordinator here.
    </p>

    <h2>Navigation Bar</h2>
    <br>
    <ul>
    <li><strong>Resources</strong>: These pages are where you will find information about how to use Love Bug, as well as more detailed information about our programs and the volunteer roles. Any volunteer resources for particular opportunities will also be found in this section.</li>
    </ul>
    <p style="padding-left: 60px;"><strong>Love Bug Instructions</strong></p>
    <p style="padding-left: 60px;"><strong>Volunteer Handbook</strong></p>
    <p style="padding-left: 60px;"><strong>Volunteer Code of Conduct</strong></p>
    <p style="padding-left: 60px;"><strong>Fresh Food Delivery</strong></p>
    <p style="padding-left: 60px;"><strong>GAR Market Booths</strong></p>
    <p style="padding-left: 60px;"><strong>Community Kitchens</strong></p>
    <p style="padding-left: 60px;"><strong>GROW Project</strong></p>
    <p style="padding-left: 60px;"><strong>Circles</strong></p>
    <p style="padding-left: 60px;"><strong>Gleaning</strong></p>
    <p style="padding-left: 60px;"><strong>Events</strong></p>
    <p style="padding-left: 60px;"><strong>Office Administration</strong></p>
    <ul>
    <li><strong>Your Shifts</strong>: This page is where you will find all the shifts you have signed up for; past, present and future.</li>
    </ul>
    <ul>
    <li><strong>Programs</strong>: This page is where you will find all current volunteer opportunities.</li>
    </ul>
    <ul>
    <li><strong>[Your Username]</strong>: This page is where you will find all your account details.</li>
    </ul>
    <ul>
    <li><strong>Logout</strong>: Clicking this button logs you out of Love Bug.</li>
    </ul>
    <br>
    <h2>Viewing a Program</h2>
    <br>
    <p><strong>Description</strong>: This is a description of the program.</p>
    <p><strong>Legend</strong>: This is a colour-coded legend to let you know what shifts are available, taken or yours.</p>
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
    <li><em>Use the </em><strong>Filters</strong> to specify the Activity you interested in volunteering for</li>
    <li>Scroll through the days listed</li>
    <li>Click on a green bubble to view a shift</li>
    <ul>
    <li>Click <em>Take Shift</em> to take a shift (You must perform this action <strong>3 days </strong>in advance of the shift occurrence)</li>
    <li>Click <em>View Event</em> to return to the Event Page</li>
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
</div>
@endsection
