@extends('cms.parent')

@section('title' , 'account')

@section('main-title' , 'Show account')

@section('sub-title' , 'Show account')


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
              <h3 class="card-title">Show account</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
              @csrf

              <div class="card-body">
                <div class="form-group">
                  <label for="name">Show account Name</label>
                  <input
                  value="{{ $countries->name }}" placeholder="Enter account Name"
                  class="form-control form-control-slid"
                  disabled>
                </div>
                <div class="form-group">
                  <label for="code">Show Code</label>
                  <input
                  value="{{ $countries->code }}" placeholder="Enter code"
                  class="form-control form-control-slid"
                  disabled>
                </div>

              </div>
              <!-- /.card-body -->


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
{{--
<script>
   function performUpdate(id){

  let formData = new FormData();
    formData.append('name',document.getElementById('name').value);
    formData.append('code',document.getElementById('code').value);
    storeRoute('/cms/waseem/countries_update/'+id , formData);
   }
</script> --}}
@endsection
