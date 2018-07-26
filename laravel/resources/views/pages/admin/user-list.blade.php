@extends('app')

@section('content')

    <h1>Registered Users</h1>
    <hr>

<div class="row">
    <div class="col col-lg-2">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
    </div>
    <div class="col col-lg-2">
        <button type="button" class="btn btn-primary">Export HTML table to CSV file</button>
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
                    <td>{{ implode(", ", $user->getRoleNames()) }}</a></td>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

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

      document.querySelector("button").addEventListener("click", function () {
          var html = document.querySelector("table").outerHTML;
      	export_table_to_csv(html, "table.csv");
      });

    });
    </script>


@endsection
