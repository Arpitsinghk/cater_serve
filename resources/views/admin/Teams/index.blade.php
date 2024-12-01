
@extends('admin.layouts.app')

@section('content')

<div class="container">

    <h1>Teams</h1>

    <a class="btn btn-success float-right my-4" href="javascript:void(0)" id="createNewProduct">Add User</a>

    <table class="table table-bordered data-table table-responsive" width="100%" >

        <thead>

            <tr>

                <th>S No.</th>
                <th>Name</th>
                <th>Post</th>
                <th>Profile</th>
                <th>Facebook</th>
                <th>Twitter</th>
                <th>Instagram</th>
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

                        <label for="name" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="post" class="col-sm-2 control-label">Post</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="post" name="post" placeholder="Enter post" value="" maxlength="50" required="">

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="facebook" class="col-sm-2 control-label">Facebook</label>

                        <div class="col-sm-12">

                            <input type="url" class="form-control" id="facebook" name="facebook" placeholder="Enter facebook" value="" maxlength="50" required="">

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="instagram" class="col-sm-2 control-label">Instagram</label>

                        <div class="col-sm-12">

                            <input type="url" class="form-control" id="instagram" name="instagram" placeholder="Enter instagram" value="" maxlength="50" required="">

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="twitter" class="col-sm-2 control-label">Twitter</label>

                        <div class="col-sm-12">

                            <input type="url" class="form-control" id="twitter" name="twitter" placeholder="Enter twitter" value="" maxlength="50" required="">

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

                        <label for="profile" class="col-sm-2 control-label">Profile</label>

                        <div class="col-sm-12">

                            <input type="file" class="form-control" id="profile" accept="image/*" name="profile"  value="" required="">
                            <!-- <input type="text" class="form-control" id="profile" name="profile"  value="" > -->

                        </div>

                    </div>

                    <div class="col-sm-offset-2 col-sm-10">

                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes

                     </button>

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

        ajax: "{{ route('teams_crud.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           
            {data: 'name', name: 'name'},
            {data: 'post', name: 'post'},
            {data: 'profile', name: 'profile'},
            {data: 'facebook', name: 'facebook'},
            {data: 'twitter', name: 'twitter'},
            {data: 'instagram', name: 'instagram'},
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

      $.get("{{ route('teams_crud.index') }}" +'/' + product_id +'/edit', function (data) {

          $('#modelHeading').html("Edit Product");

          $('#saveBtn').val("edit-user");

          $('#ajaxModel').modal('show');

          $('#product_id').val(data.id);
          $('#name').val(data.name);
          $('#post').val(data.post);
          $('#facebook').val(data.facebook);
          $('#twitter').val(data.twitter);
          $('#instagram').val(data.instagram);
          $('#status').val(data.status);
          $('#profile').val(data.profile);
            

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
        url: "{{ route('teams_crud.store') }}",
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

            url: "{{ route('teams_crud.store') }}"+'/'+product_id,

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