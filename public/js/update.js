function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}



// #myTable {
//     border-collapse: collapse; /* Collapse borders */
//     width: 100%; /* Full-width */

//     border: 1px solid #ddd; /* Add a grey border */
//     font-size: 18px; /* Increase font-size */
// }

// #myTable th, #myTable td {
//     text-align: left; /* Left-align text */
//     padding: 12px; /* Add padding */
// }

// #myTable tr {
//     /* Add a bottom border to all table rows */
//     border-bottom: 1px solid #ddd; 
// }

// #myTable tr.header, #myTable tr:hover {
//     /* Add a grey background color to the table header and on hover */
//     background-color: #f1f1f1;
// }
// 
