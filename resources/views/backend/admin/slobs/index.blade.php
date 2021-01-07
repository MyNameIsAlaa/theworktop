@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a  class="btn btn-primary" href="#" role="button">Add New Slob</a>
                </div><!--card-header-->
                <script>
                  $(".alert").alert();
                </script>
                <div class="card-body">
                      <table class="table">
                       <thead>
                           <tr>
                               <th>width</th>
                               <th>length</th>
                               <th>thickness</th>
                               <th>cost</th>
                               <th>Options</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($slobs as $slob)
                           <tr>
                                <td>{{$slob->width}}</td>
                                <td>{{$slob->length}}</td>
                                <td>{{$slob->thickness}}</td>
                                <td>{{$slob->cost}}</td>
                           <td>
                               <a class="btn btn-primary" href="{{url('admin/slobs/edit/'.$slob->id )}}" role="button">Update</a>
                               <a class="btn btn-danger" href="{{url('admin/slobs/delete/'.$slob->id )}}" role="button">Delete</a>
                            </td>
                           </tr>
                           @endforeach
                       </tbody>
                       <tfoot>
                          <tr>
                              <td colspan="5">
                                {{$slobs->links()}}
                              </td>
                          </tr>
                       </tfoot>
                   </table>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection