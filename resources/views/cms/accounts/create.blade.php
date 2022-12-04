@extends('cms.parent')

@section('title' , 'accounts')

@section('main-title' , 'Create accounts')

@section('sub-title' , 'create accounts')


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
              <h3 class="card-title">Create accounts</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
                @csrf

              <div class="card-body">
                <div class="form-group">
                  <label for="name">accounts Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter accounts Name">
                </div>
                <div class="form-group">
                  <label for="code">accounts Code</label>
                  <input type="text" class="form-control" name="code" id="code" placeholder="Enter Code of accounts">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">

                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
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
   function performStore(){

    let formData = new FormData();
    formData.append('name',document.getElementById('name').value);
    formData.append('code',document.getElementById('code').value);
    store('/cms/waseem/accounts' , formData);

   }

</script>
@endsection
