    // $("#example1").DataTable({
    //   "pageLength": 100,
    //     "language": {
    //         "paginate": {
    //             "next": "بعد",
    //             "previous" : "قبل"
    //         }
    //     },
    //     "info" : false,
    // });
    $("#example1").DataTable({
      "pageLength": 10,
        "language": {
            "url": "/js/admin/datatable-arabic.json"
        },
        "info" : false,
    });
    $('#example2').DataTable({
        "language": {
            "paginate": {
              "next": "بعد",
              "previous" : "قبل",
            }
        },
      "info" : false,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "autoWidth": false
    });
