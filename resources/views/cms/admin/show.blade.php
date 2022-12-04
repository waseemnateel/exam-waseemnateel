@extends('cms.parent')

@section('title' , 'Admin')

@section('main-title' , 'show Admin')

@section('sub-title' , 'show admin')


@section('styles')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">show Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
                @csrf






             <div class="row">

              <div class="form-group col-md-4">
                  <label for="email">Email</label>
                  <input
                  value="{{ $admins->email }}" placeholder="Enter Firstname of Admin"
                  class="form-control form-control-slid"
                  disabled>>
                </div>
  






            </form>
          </div>

        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')

{{-- <script>
   function performUpdate(id){

    let formData = new FormData();

    formData.append('email',document.getElementById('email').value);


    storeRoute('/cms/admin/admins_update/'+id , formData);

   }

</script> --}}
@endsection
