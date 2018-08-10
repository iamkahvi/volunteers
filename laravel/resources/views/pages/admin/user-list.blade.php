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

    <?php
    $adminemails = array();
    $volunteeremails = array();
    $GROWemails = array();
    $CKemails = array();
    $GARemails = array();

        foreach ($users as $user) {
            foreach($userroles as $role) {
                if($role->user_id == $user->id) {
                    if($role->role_id == 1) {
                        $adminemails[] = $user->email;
                    }
                    if($role->role_id == 2) {
                        $volunteeremails[] = $user->email;
                    }
                    if($role->role_id == 4) {
                        $GROWemails[] = $user->email;
                    }
                    if($role->role_id == 5) {
                        $CKemails[] = $user->email;
                    }
                    if($role->role_id == 6) {
                        $GARemails[] = $user->email;
                    }
                }
            }
        }
    ?>

    <!--


    <form class="form-inline event-filter">
        <div class="form-group">
            <select class="form-control filter-roles">
                <option value="all">Show All Roles</option>

                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <hr>

<div class="roles">
    <b>Email List</b> (copy and paste this list)

    <blockquote>
    <div class="role" data-role="admin">
        @foreach($adminemails as $email)
            {{ $email }}
        @endforeach
    </div>

    <div class="role" data-role="volunteer">
        @foreach($volunteeremails as $email)
            {{ $email }}
        @endforeach
    </div>

    <div class="role" data-role="GROW">
        @foreach($GROWemails as $email)
            {{ $email }}
        @endforeach
    </div>

    <div class="role" data-role="CK">
        @foreach($CKemails as $email)
            {{ $email }}
        @endforeach
    </div>

    <div class="role" data-role="GAR">
        @foreach($GARemails as $email)
            {{ $email }}
        @endforeach
    </div>

    </blockquote>
</div>

-->

<b>Email List</b> (copy and paste this list)

<blockquote>
    @foreach($users as $user)
        {{ $user->email }}
    @endforeach
</blockquote>

    <script>
    $(document).ready(function(){
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
