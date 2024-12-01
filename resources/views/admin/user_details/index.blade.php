
@extends('admin.layouts.app')

@section('content')

<div class="container">

    <h1>Users</h1>

    <a class="btn btn-success float-right my-4" href="javascript:void(0)" id="createNewProduct">Add User</a>

    <table class="table table-bordered data-table">

        <thead>

            <tr>

                <th>S No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Role</th>
                <th>Created Date</th>
                <th>Updated Date</th>

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

                <form id="productForm" name="productForm" class="form-horizontal">

                   <input type="hidden" name="product_id" id="product_id">

                    <div class="form-group">

                        <label for="name" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="email" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-12">

                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="" maxlength="50" required="">

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="role" class="col-sm-2 control-label">Role</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="role" name="role" placeholder="Enter role" value="" maxlength="50" required="">

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

        ajax: "{{ route('user_crud.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},

            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
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
            {data: 'role', name: 'role'},
            {
            data: 'created_at',
            name: 'created_at',
            render: function(data) {
                return moment(data).format('YYYY-MM-DD'); // Format the date
            }
        },
        {
            data: 'updated_at',
            name: 'updated_at',
            render: function(data) {
                return moment(data).format('YYYY-MM-DD'); // Format the date
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

      $.get("{{ route('user_crud.index') }}" +'/' + product_id +'/edit', function (data) {

          $('#modelHeading').html("Edit Product");

          $('#saveBtn').val("edit-user");

          $('#ajaxModel').modal('show');

          $('#product_id').val(data.id);
          $('#name').val(data.name);
          $('#email').val(data.email);
          $('#status').val(data.status);
          $('#role').val(data.role);
            

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

      

        $.ajax({

          data: $('#productForm').serialize(),

          url: "{{ route('user_crud.store') }}",

          type: "POST",

          dataType: 'json',

          success: function (data) {

       

              $('#productForm').trigger("reset");

              $('#ajaxModel').modal('hide');

              table.draw();

           

          },

          error: function (data) {

              console.log('Error:', data);

              $('#saveBtn').html('Save Changes');

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

            url: "{{ route('user_crud.store') }}"+'/'+product_id,

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