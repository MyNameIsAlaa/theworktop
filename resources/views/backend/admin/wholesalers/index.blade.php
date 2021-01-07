@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Manage wholesalers</strong>
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
                           @foreach($wholesalers as $wholesaler)
                           <tr>
                                <td scope="row">#{{$wholesaler->id}}</td>
                                <td>{{$wholesaler->wholesaler_name}}</td>
                           <td>
                               <a class="btn btn-primary" href="{{url('admin/wholesalers/edit/'.$wholesaler->id )}}" role="button">Update</a>
                               <a class="btn btn-danger" href="{{url('admin/wholesalers/delete/'.$wholesaler->id )}}" role="button">Delete</a>
                            </td>
                           </tr>
                           @endforeach
                       </tbody>
                       <tfoot>
                          <tr>
                              <td colspan="3">
                                {{$wholesalers->links()}}
                              </td>
                          </tr>
                       </tfoot>
                   </table>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection