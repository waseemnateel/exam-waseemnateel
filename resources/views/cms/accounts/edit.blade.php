@extends('cms.parent')

@section('title' , 'accounts')

@section('main-title' , 'Edit accounts')

@section('sub-title' , 'edit accounts')


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
              <h3 class="card-title">Edit accounts</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
              @csrf

              <div class="card-body">
                <div class="form-group">
                  <label for="name">Edit accounts Name</label>
                  <input type="text" class="form-control" name="name" id="name"
                  value="{{ $accounts->name }}" placeholder="Enter accounts Name">
                </div>
                <div class="form-group">
                  <label for="code">Edit Code</label>
                  <input type="text" class="form-control" name="code" id="code"
                  value="{{ $accounts->code }}" placeholder="Enter code">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{$accounts->id}})" class="btn btn-primary">Update</button>
                <a href="{{ route('accounts.index') }}" type="submit" class="btn btn-secondary">Go To Index</a>

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
    formData.append('name',document.getElementById('name').value);
    formData.append('code',document.getElementById('code').value);
    storeRoute('/cms/waseem/accounts_update/'+id , formData);
   }
</script>
@endsection
