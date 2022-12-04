@extends('cms.parent')

@section('title' , 'Admin')

@section('main-title' , 'Edit Admin')

@section('sub-title' , 'Edit admin')


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
              <h3 class="card-title">Edit Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
                @csrf

             




             <div class="row">

              <div class="form-group col-md-4">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email"
                  value="{{ $admins->email }}" placeholder="Enter Firstname of Admin">
                </div>
                {{-- <div class="form-group col-md-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password"
                  value="{{ $admins->password }}" placeholder="Enter Your Password">
                </div> --}}



              <div class="row">



              <!-- /.card-body -->

              <div class="card-footer">

                <button type="button" onclick="performUpdate({{ $admins->id}})" class="btn btn-primary">Store</button>
                <a href="{{ route('admins.index') }}" type="submit" class="btn btn-secondary">Go To Index</a>

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

<script>
   function performUpdate(id){

    let formData = new FormData();

    formData.append('email',document.getElementById('email').value);


    storeRoute('/cms/admin/admins_update/'+id , formData);

   }

</script>
@endsection
