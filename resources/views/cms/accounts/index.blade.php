@extends('cms.parent')

@section('title' , 'account')

@section('main-title' , 'Index account')

@section('sub-title' , 'index account')


@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        {{-- <div class="card-header">

          <a href="{{ route('countries.create') }}" type="submit" class="btn btn-primary">Add New account</a>

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
        </div> --}}

        <form>
            @csrf
            <div class="row ">
                <div class="input-icon col-md-2">
                    <input type="text" class="form-control me-5" placeholder="Search By Name"
                       name='name' @if( request()->name) value={{request()->name}} @endif/>
                      <span>
                          <i class="flaticon2-search-1 text-muted"></i>
                      </span>
                    </div>

                    <div class="input-icon col-md-2">
                        <input type="text" class="form-control" placeholder="Search By code"
                           name='code' @if( request()->code) value={{request()->code}} @endif/>
                          <span>
                              <i class="flaticon2-search-1 text-muted"></i>
                          </span>
                        </div>

                    <div class="input-icon col-md-2">
                    <input type="date" class="form-control" placeholder="Search By Date"
                       name='created_at' @if( request()->created_at) value={{request()->created_at}} @endif/>
                      <span>
                          <i class="flaticon2-search-1 text-muted"></i>
                      </span>
                    </div>

            <div class="col-md-4">
                  <button class="btn btn-success btn-md" type="submit">فلتر البحث</button>
                  <a href="{{route('accounts.index')}}"  class="btn btn-danger">إنهاء البحث</a>
                  {{-- @can('Create-City') --}}

                  <a href="{{route('accounts.create')}}"><button type="button" class="btn btn-md btn-primary"> get account </button></a>
                  {{-- @endcan --}}
            </div>

                 </div>
        </form>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>account Name</th>
                <th>Code of account</th>
                <th>Number of City</th>
                <th>Created AT</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($accounts as $account )
                <tr>
                    <td>{{ $account->id }}</td>
                    <td>{{ $account->name }}</td>
                    <td>{{$account->code}}</td>
                    {{-- <td>{{$account->cities_count}}</td> --}}
                    {{-- <td> <span class="badge bg-success">({{$account->cities_count}}) Cities </span> </td> --}}

                    <td>{{$account->created_at}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('accounts.edit' , $account->id  )}}" type="button" class="btn btn-info">Edit</a>
                              <a href="#" onclick="performDestroy({{$account->id}} , this)"  class="btn btn-danger">Delete</a>
                            <a href="{{route('accounts.show' , $account->id  )}}" type="button" class="btn btn-success">Show</a>
                          </div>

                    </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
        </div>
    </div>
    </div>
    <!-- /.card-body -->
        {{$accounts->links()}}
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        let url ='/cms/waseem/accounts/'+id;
        confirmDestroy(url , referance);
    }
  </script>
@endsection
