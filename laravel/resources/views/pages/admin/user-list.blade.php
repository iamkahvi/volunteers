@extends('app')

@section('content')

    <h1>Registered Users</h1>
    <hr>

<div class="row">
    <div class="col col-lg-2">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
    </div>
    <div class="col">
        <a type="button" class="btn btn-primary" id="download">Export HTML table to CSV file</a>
        <a type="button" class="btn btn-success" href="/register" role="button">Register an Account</a>
    </div>
</div>

<hr>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Public Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Date Registered</th>
            </tr>
        </thead>

        <tbody id="myTable">
            @foreach($users as $user)
                <tr>
                    <td><a href="/user/{{ $user->id }}">{{ $user->name }}</a></td>
                    <td>{{ $user->data->full_name or '' }}</td>
                    <td>{{ $user->data->burner_name or '' }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ implode("; ", $user->getRoleNames()) }}</a></td>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

<select class="form-control filter-user-roles">
    <option value="all">Show All Roles</option>
    @foreach($roles as $role)
        <option value="{{ $role->id }}">{{ $role->name }}</option>
    @endforeach
</select>

<hr>


<b>Email List</b> (copy and paste this list)
<div class="email-block">
    <blockquote>
        @foreach($users as $user)
            <span class="user-block" data-id="{{ $user->id }}" data-role="{{ $userroles->where('user_id', $user->id)->pluck('role_id') }}">
                {{ $user->email }}
            </span>
        @endforeach
    </blockquote>
</div>

<script>


$(document).ready(function(){

    $('.filter-user-roles').on('change', function () {
       
        // define the role
        var role = $(".filter-user-roles").val();

        // define all the spans of the users
        var users = document.querySelectorAll('.email-block .user-block');

        // hide all the users
        users.forEach(function(element) {
            element.style.display = "none";
        });

        if (role == "all") {
            
            // show all users
            users.forEach(function(element) {
                element.style.display = "inline";
            });
        
        } else {

            // show user if they have that role
            users.forEach(function(user) {

                var userRoles = user.getAttribute('data-role').slice(1,-1).split(",");

                if (userRoles.includes(role)) {
                    user.style.display = "inline";
                }
            })

        }
    });

    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    function download_csv(csv, filename) {
        var csvFile;
        var downloadLink;

        // CSV FILE
        csvFile = new Blob([csv], {type: "text/csv"});

        // Download link
        downloadLink = document.createElement("a");

        // File name
        downloadLink.download = filename;

        // We have to create a link to the file
        downloadLink.href = window.URL.createObjectURL(csvFile);

        // Make sure that the link is not displayed
        downloadLink.style.display = "none";

        // Add the link to your DOM
        document.body.appendChild(downloadLink);

        // Lanzamos
        downloadLink.click();
    }

    function export_table_to_csv(html, filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");

        for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");

            for (var j = 0; j < cols.length; j++)
                row.push(cols[j].innerText);

        csv.push(row.join(","));
    }

        // Download CSV
        download_csv(csv.join("\n"), filename);
    }

    document.querySelector("#download").addEventListener("click", function () {
        var html = document.querySelector("table").outerHTML;
    export_table_to_csv(html, "table.csv");
    });

});
</script>


@endsection