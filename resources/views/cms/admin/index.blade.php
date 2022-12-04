@extends('cms.parent')

@section('title' , 'Admin')

@section('main-title' , 'Index Admin')

@section('sub-title' , 'index admin')


@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Data of Country</h3> --}}
          <a href="{{ route('admins.create') }}" type="submit" class="btn btn-primary">Add New Admin</a>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>

                <th>Email</th>
                
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($admins as $admin )
                <tr>
                    <td>{{ $admin->id }}</td>
                    {{-- <td>{{ $admin->user->image }}</td> --}}
                    <td>
                        <img class="img-circle img-bordered-sm" src="{{asset('storage/images/admin/'.$admin->user->image)}}" width="60" height="60" alt="User Image">
                    </td>


                    <td>{{$admin->email}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('admins.edit' , $admin->id  )}}" type="button" class="btn btn-info">Edit</a>
                              <a href="#" onclick="performDestroy({{$admin->id}} , this)"  class="btn btn-danger">Delete</a>
                            <button type="button" class="btn btn-success">Show</button>
                          </div>

                    </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{$admins->links()}}
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        let url ='/cms/admin/admins/'+id;
        confirmDestroy(url , referance);
    }
  </script>
@endsection
