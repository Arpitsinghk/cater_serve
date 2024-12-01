
@extends('admin.layouts.app')

@section('content')

<div class="container">

    <h1>Setting</h1>

    <a class="btn btn-success float-right my-4" href="javascript:void(0)" id="createNewProduct">Add Setting</a>

    <table class="table table-bordered data-table">

        <thead>

            <tr>

                <th>S No.</th>
                <th>Key</th>
                <th>Value</th>
                <th>type</th>
                <th>Status</th>
                <th width="280px">Action</th>

            </tr>

        </thead>

        <tbody>

        </tbody>

    </table>

</div>

     

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <div id="errorContainer"></div>
                <form id="productForm" name="productForm" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="" id="product_id">

                    <div class="form-group">
                        <label for="key" class="col-sm-2 control-label">Key</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="key" name="key" placeholder="Enter key" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="value" class="col-sm-2 control-label">Value</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="value" name="value" placeholder="Enter value" value="" required>
                            <small class="form-text text-muted">For image, please upload the file using the input below.</small>
                            <input type="file" class="form-control mt-2" id="valueFile" name="value" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="status" name="status" required>
                                <option value="" disabled selected>Select status</option>
                                <option value="1">Active</option>
                                <option value="0">Pending</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="type" name="type" required>
                                <option value="" disabled selected>Select type</option>
                                <option value="text">Text</option>
                                <option value="image">Image</option>
                                <option value="url">URL</option>
                                <option value="email">Email</option>
                                <option value="color">Color</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


      

</body>

      

<script type="text/javascript">

  $(function () {

      

    /*------------------------------------------

     --------------------------------------------

     Pass Header Token

     --------------------------------------------

     --------------------------------------------*/ 

    $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

    });

      

    /*------------------------------------------

    --------------------------------------------

    Render DataTable

    --------------------------------------------

    --------------------------------------------*/

    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('setting_crud.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           
            {data: 'key', name: 'key'},
            {data: 'value', name: 'value'},
            {data: 'type', name: 'type'},
             {
            data: 'status',
            name: 'status',
            render: function(data, type, row) {
                if (data == 1) {
                    return '<span class="badge bg-success">Active</span>';
                } else {
                    return '<span class="badge bg-danger">Pending</span>';
                }
            }
        },
        

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

      

    /*------------------------------------------

    --------------------------------------------

    Click to Button

    --------------------------------------------

    --------------------------------------------*/

    $('#createNewProduct').click(function () {

        $('#saveBtn').val("create-product");

        $('#product_id').val('');

        $('#productForm').trigger("reset");

        $('#modelHeading').html("Create New Product");

        $('#ajaxModel').modal('show');

    });

      

    /*------------------------------------------

    --------------------------------------------

    Click to Edit Button

    --------------------------------------------

    --------------------------------------------*/

    $('body').on('click', '.editProduct', function () {

      var product_id = $(this).data('id');

      $.get("{{ route('setting_crud.index') }}" +'/' + product_id +'/edit', function (data) {

          $('#modelHeading').html("Edit Product");

          $('#saveBtn').val("edit-user");

          $('#ajaxModel').modal('show');

          $('#product_id').val(data.id);
          $('#key').val(data.key);
          $('#value').val(data.value);
          $('#type').val(data.type);
          $('#status').val(data.status);
          

      })

    });

      

    /*------------------------------------------

    --------------------------------------------

    Create Product Code

    --------------------------------------------

    --------------------------------------------*/
    $('#saveBtn').click(function (e) {
    e.preventDefault();
    $(this).html('Sending..');

    // Create a FormData object
    var formData = new FormData($('#productForm')[0]);

    $.ajax({
        data: formData,
        url: "{{ route('setting_crud.store') }}",
        type: "POST",
        dataType: 'json',
        contentType: false, // Important for file uploads
        processData: false, // Important for file uploads
        success: function (data) {
            $('#productForm').trigger("reset");
            $('#ajaxModel').modal('hide');
            table.draw();
        },
        error: function (data) {
            console.log('Error:', data);
            $('#saveBtn').html('Save Changes');

            // Clear previous errors
            $('#errorContainer').html('');

            // Show errors if any
            if (data.responseJSON && data.responseJSON.errors) {
                $.each(data.responseJSON.errors, function (key, value) {
                    $('#errorContainer').append('<div class="alert alert-danger">' + value[0] + '</div>');
                });
            } else {
                $('#errorContainer').append('<div class="alert alert-danger">An error occurred. Please try again.</div>');
            }
        }
    });
});



    /*------------------------------------------

    --------------------------------------------

    Delete Product Code

    --------------------------------------------

    --------------------------------------------*/

    $('body').on('click', '.deleteProduct', function () {

     

        var product_id = $(this).data("id");

        confirm("Are You sure want to delete !");

        

        $.ajax({

            type: "DELETE",

            url: "{{ route('setting_crud.store') }}"+'/'+product_id,

            success: function (data) {

                table.draw();

            },

            error: function (data) {

                console.log('Error:', data);

            }

        });

    });

       

  });

</script>

@endsection