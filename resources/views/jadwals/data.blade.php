@extends('utama')
@section('content')

<div class="col-12 mt-3 ml-2">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h2> Halaman <strong>Jadwal</strong></h2>
        </div>
    </div>
        
        <div class="col-12">
            <a href="{{ url('jadwals.add') }}" class="btn btn-primary">
                + Tambah Jadwal
            </a>
            <input class="ml-3" style="width: 250px" type="text" id="myInput" onkeyup="FunctionSearch()" placeholder="Search for Jadwal Data..">
        </div>

            <div class="card mt-3 table-responsive">
                <table class="table table-bordered" id="myTable4">
                    <thead>
                        <tr>
                            <th>No.<i class="fas fa-sort ml-3" onclick="sortNumber(0)"></i></th>
                            <th>Nama Sales<i class="fas fa-sort ml-3" onclick="sortTable(1)"></i></th>
                            <th>Nama Prospek<i class="fas fa-sort ml-3" onclick="sortTable(2)"></i></th>
                            <th>Tanggal Kunjungan<i class="fas fa-sort ml-3" onclick="sortTable(3)"></i></th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwals as $item)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $item ->Sales['nama_sales'] }}</td>
                            <td>{{ $item ->Prospek_profile['nama_profile'] }}</td>
                            <td>{{ $item -> tanggal_kunjungan}}</td>
                            <td class="table-action">
                                <button class="btn btn-link btn-sm">
                                    <a href="{{ url('editjadwals'.$item->id_jadwal) }}">
                                        <i class="align-middle" data-feather="edit-2"></i>
                                    </a>
                                </button>
                                <form action="{{ url('jadwals'.$item->id_jadwal) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin akan menghapus data?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm">
                                    <i class="align-middle" data-feather="trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>

<script>
  function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable4");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
      // Start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /* Loop through all table rows (except the
      first, which contains table headers): */
      for (i = 1; i < (rows.length - 1); i++) {
        // Start by saying there should be no switching:
        shouldSwitch = false;
        /* Get the two elements you want to compare,
        one from current row and one from the next: */
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        // Each time a switch is done, increase this count by 1:
        switchcount ++;
      } else {
        /* If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again. */
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }

function sortNumber(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable4");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      
      if (dir == "asc") {
        if (Number(x.innerHTML) > Number(y.innerHTML)) {
        shouldSwitch = true;
        break;
      }
      } else if (dir == "desc") {
        if (Number(x.innerHTML) < Number(y.innerHTML)) {
        shouldSwitch = true;
        break;
      }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

function FunctionSearch() {

// Declare variables 
var input = document.getElementById("myInput");
var filter = input.value.toUpperCase();
var table = document.getElementById("myTable4");
var trs = table.tBodies[0].getElementsByTagName("tr");

// Loop through first tbody's rows
for (var i = 0; i < trs.length; i++) {

  // define the row's cells
  var tds = trs[i].getElementsByTagName("td");

  // hide the row
  trs[i].style.display = "none";

  // loop through row cells
  for (var i2 = 0; i2 < tds.length; i2++) {

    // if there's a match
    if (tds[i2].innerHTML.toUpperCase().indexOf(filter) > -1) {

      // show the row
      trs[i].style.display = "";

      // skip to the next row
      continue;

    }
  }
}
}  
</script>

@endsection