<h1>Welcome to the Volunteer Database!</h1>

<h4>
    This website is a scheduling system where users can sign up for volunteer shifts.
</h4>


<p>
    This email is a confirmation of your newly registered account on <a href="{{ env('SITE_URL') }} ">{{ env('SITE_NAME') }}</a>.
</p>

<p>
    In case you forget, your username is: <b>{{ $user->name }}</b> <br><br>
    The Loving Spoonful Volunteer Handbook is attached below.
</p>


<p>
Instructions on how to use the Volunteer Robot are listed below.<br>
<a href="http://volunteer.lovingspoonful.org/about">Click here to view them on the website!</a>
</p>

<hr>

<h2>Navigation Bar:</h2>
<br>
<ul>
<li><strong>Resources</strong>: These pages are where you will find reading material to educate you on programming and the Volunteer Robot!</li>
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
