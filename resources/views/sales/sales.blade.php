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
            <h2> Halaman <strong>Sales</strong></h2>
        </div>
    </div>
        
        <div class="col-12">
            <a href="{{ url('sales.add') }}" class="btn btn-primary">
                + Tambah Sales
            </a>
                <input class="ml-3" style="width: 250px" type="text" id="myInput" onkeyup="FunctionSearch()" placeholder="Search for Sales Data..">
        </div>

            <div class="card mt-3 table-responsive">
                <table class="table table-striped table-hover" id="myTable1">
                    <thead>
                        <tr>
                            <th>No<i class="fas fa-sort ml-1" onclick="sortNumber(0)"></i></th>
                            <th>ID<i class="fas fa-sort ml-1" onclick="sortTable(1)"></i></th>
                            <th>Nama Lengkap<i class="fas fa-sort ml-3" onclick="sortTable(4)"></i></th>
                            <th>Nomor Handphone</th>
                            <th>Email</th>
                            <th>Nomor Rekening</th>
                            <th>Pendapatan<i class="fas fa-sort ml-2" onclick="sortNumber(6)"></i></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->id_sales }}</td>
                            <td>
                                <img src="images/{{ $item->foto }}" width="48" height="48" class="rounded-circle mr-2" alt="Avatar"> {{ $item->nama_sales }}
                            </td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->norek }}</td>
                            <td>{{ $item->pendapatan }}</td>
                            <td class="table-action">
                              <button class="btn btn-sm">
                                <a href="{{ url('editsales'.$item->id_sales) }}">
                                    <i class="align-middle" data-feather="edit-2"></i>
                                </a>
                              </button>
                              <form action="{{ url('sales'.$item->id_sales) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
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
                <script>
                    $('#table').DataTable();
                </script>
            </div>
        
</div>

<script>
    function sortTable(n) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
      table = document.getElementById("myTable1");
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
    table = document.getElementById("myTable1");
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
var table = document.getElementById("myTable1");
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
