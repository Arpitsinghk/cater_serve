
@extends('admin.layouts.app')

@section('content')

<div class="container">

    <h1>Events Image</h1>

    <a class="btn btn-success float-right my-4" href="javascript:void(0)" id="createNewProduct">Add Events Image</a>

    <table class="table table-bordered data-table">

        <thead>

            <tr>

                <th>S No.</th>
                <th>Event</th>
                <th>Image</th>
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

                        <label for="event_id" class="col-sm-12 control-label">Events</label>

                        
                        <div class="col-sm-12">
                            <?php 
                                 $events = App\Models\Event::all();
                            ?>
                            <select class="form-control" id="event_id" name="event_id" required>
                                <option value="" disabled selected>Select Event</option>
                               @foreach($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->event }}</option> 
                                @endforeach 
                            </select>
                            
                        </div>

                    </div>

                    <div class="form-group">

                        <label for="image" class="col-sm-12 control-label">Event Image</label>

                        <div class="col-sm-12">

                            <input type="file" class="form-control" id="image" name="image" placeholder="Enter image" value="" required="">

                        </div>

                    </div>
    

                   

                  

                    <div class="form-group">

                        <label for="status" class="col-sm-12 control-label">Status</label>

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

        ajax: "{{ route('event_image_crud.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           
            {data: 'event_id', name: 'event_id'},
            {data: 'image', name: 'image'},
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

      $.get("{{ route('event_image_crud.index') }}" +'/' + product_id +'/edit', function (data) {

          $('#modelHeading').html("Edit Product");

          $('#saveBtn').val("edit-user");

          $('#ajaxModel').modal('show');

          $('#product_id').val(data.id);
          $('#event_id').val(data.event_id);
          $('#image').val(data.image);
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
        url: "{{ route('event_image_crud.store') }}",
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

            url: "{{ route('event_image_crud.store') }}"+'/'+product_id,

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