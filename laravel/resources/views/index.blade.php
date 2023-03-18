<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CRUD Data Table Lowongan for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manajemen <b>Lowongan</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Dekskripsi</th>
                            <th>Tingkat Pendidikan Minimal</th>
                            <th>Tanggal Dibuka</th>
                            <th>Tanggal Ditutup</th>
                            <th>Kuota</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="showData">

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="FormSave">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Lowongan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>Dekskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" required>
                        </div>
                        <div class="form-group">
                            <label>Tingkat Pendidikan</label>
                            <input type="text" class="form-control" name="tingkat_pendidikan" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Buka</label>
                            <input type="date" class="form-control" name="tanggal_buka" required>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Tutup</label>
                            <input type="date" class="form-control" name="tanggal_tutup" required>
                        </div>

                        <div class="form-group">
                            <label>Kuota</label>
                            <input type="number" class="form-control" name="kuota" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-success" onClick="SaveData()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="FormEdit">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Lowongan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Dekskripsi</label>
                            <input type="text" id="deskripsi" name="deskripsi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tingkat Pendidikan</label>
                            <input type="text" id="tingkat_pendidikan" name="tingkat_pendidikan"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Buka</label>
                            <input type="date" id="tanggal_buka" name="tanggal_buka" class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Tutup</label>
                            <input type="date" id="tanggal_tutup" name="tanggal_tutup" class="form-control"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Kuota</label>
                            <input type="number" id="kuota" name="kuota" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">

                        <button type="button" class="btn btn-danger" id="BtnEdit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="DeleteLowongan">
                    {{ method_field('DELETE') }}

                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-danger" id="BtnDelete">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<script>
    LoadData();
    var dataGlobal;

    function LoadData() {
        $.ajax({
            type: 'GET',
            url: 'api/lowongan',
            dataType: 'json',
            success: function(data) {
                dataGlobal = data;
                $.each(data.data, function(i, item) {
                    $('#showData').append('<tr><td class="d-none">' + item.id + '</td><td>' + item
                        .nama +
                        '</td><td>' + item.deskripsi + '</td><td>' + item.tingkat_pendidikan +
                        '</td><td>' + item.tanggal_buka +
                        '</td><td>' +
                        item.tanggal_tutup +
                        '</td><td>' + item.kuota +
                        '</td><td><a href="#editEmployeeModal"  data-toggle="modal" class="delete"  onClick="ShowEdit(' +
                        i +
                        ')"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a><a href="#deleteEmployeeModal" data-toggle="modal" class="delete" onClick="ShowDelete(' +
                        item.id +
                        ')"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td></tr>'
                    );
                });

            },
            error: function() {
                alert('error');
            }
        });
    }

    function ShowDelete(id) {
        $('#BtnDelete').attr('onclick', "DeleteData('" + id + "')");
    }

    function ShowEdit(id) {
        $("#nama").val(dataGlobal.data[id].nama);
        $("#deskripsi").val(dataGlobal.data[id].deskripsi);
        $("#tingkat_pendidikan").val(dataGlobal.data[id].tingkat_pendidikan);
        $("#tanggal_buka").val(dataGlobal.data[id].tanggal_buka);
        $("#tanggal_tutup").val(dataGlobal.data[id].tanggal_tutup);
        $("#kuota").val(dataGlobal.data[id].kuota);
        $('#BtnEdit').attr('onclick', "EditData('" + dataGlobal.data[id].id + "')");
    }

    function DeleteData(id) {
        $.ajax({
            type: 'DELETE',
            url: 'api/lowongan/' + id,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    $('#deleteEmployeeModal').modal('hide');
                    Swal.fire(data.message).then(function(){
                        location.reload();
                    });
                   
                } else {
                    Swal.fire("Data Tidak Valid").then(function(){
                        location.reload();
                    });
                }
            },
            error: function() {
                Swal.fire("error").then(function(){
                        location.reload();
                    });
            }
        });
    }

    function SaveData() {
        var data = $("#FormSave").serialize();

        $.ajax({
            type: 'POST',
            url: 'api/lowongan/',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: data,
            success: function(data) {
                
                if (data.success) {
                    Swal.fire(data.message).then(function(){
                        location.reload();
                    });
                } else {
                    Swal.fire(data.message).then(function(){
                        location.reload();
                    });
                }

            },
            error: function() {
                Swal.fire("error").then(function(){
                        location.reload();
                });
            }
        });
    }

    function EditData(id) {
        var data = $("#FormEdit").serialize();

        $.ajax({
            type: 'PUT',
            url: 'api/lowongan/' + id,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: data,
            success: function(data) {
                if (data.success == true) {
                    Swal.fire("data berhasil di update").then(function(){
                        location.reload();
                    });
                } else {
                    Swal.fire(data.message).then(function(){
                        location.reload();
                    });
                }

            },
            error: function() {
                Swal.fire("error").then(function(){
                        location.reload();
                });
            }
        });
    }
</script>

</html>
