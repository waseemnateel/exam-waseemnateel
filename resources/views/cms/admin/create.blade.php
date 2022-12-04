@extends('cms.parent')

@section('title' , 'Admin')

@section('main-title' , 'Create Admin')

@section('sub-title' , 'create admin')


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
              <h3 class="card-title">Create Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
                @csrf
                <div class="card-body"></div>
             <div class="row">

                {{-- <div class="form-group col-md-6">
                    <label for="role_id"> Role Name</label>
                    <select class="form-control" name="role_id" style="width: 100%;"
                        id="role_id" aria-label=".form-select-sm example">
                        @foreach ($roles as $role )
                            <option value="{{ $role->id }}" >{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
            </div>
            <div class="row">




             <div class="row">
              <div class="form-group ">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter Firstname of Admin">
                </div>
                <div class="form-group ">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
                </div>
            </div>
            </div>
            </div>


              <!-- /.card-body -->

              <div class="card-footer">

                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
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
   function performStore(){

    let formData = new FormData();

    formData.append('email',document.getElementById('email').value);

    store('/cms/admin/admins' , formData);

   }

</script>
@endsection
