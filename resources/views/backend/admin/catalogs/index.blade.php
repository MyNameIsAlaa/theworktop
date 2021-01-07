@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Manage Catalogs</strong>
                </div><!--card-header-->
                <script>
                  $(".alert").alert();
                </script>
                <div class="card-body">
                      <table class="table">
                       <thead>
                           <tr>
                               <th>ID</th>
                               <th>Name</th>
                               <th>Options</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($catalogs as $catalog)
                           <tr>
                                <td scope="row">#{{$catalog->id}}</td>
                                <td>{{$catalog->catalog_name}}</td>
                           <td>
                               <a class="btn btn-primary" href="{{url('admin/slobs/'.$catalog->id )}}" role="button">Manage Slobs</a>
                               <a class="btn btn-primary" href="{{url('admin/catalogs/edit/'.$catalog->id )}}" role="button">Update</a>
                               <a class="btn btn-danger" href="{{url('admin/catalogs/delete/'.$catalog->id )}}" role="button">Delete</a>
                            </td>
                           </tr>
                           @endforeach
                       </tbody>
                       <tfoot>
                          <tr>
                              <td colspan="3">
                                {{$catalogs->links()}}
                              </td>
                          </tr>
                       </tfoot>
                   </table>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection