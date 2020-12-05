@extends('layouts.app')


@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>To-Do List</h2>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('task.create') }}"> Create New Task</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr class="thead-dark">
            <th>No</th>
            <th>Name</th>
            <th>Done</th>
            <th width="280px">Action</th>
        </tr>
        @php ($i = 0)
	    @foreach ($tasks as $task)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $task->name }}</td>
            @if ($task->done)
            <td>Done</td>
            @else
            <td>In progress</td>
            @endif
	        <td>
                <form action="{{ route('task.destroy',$task->id) }}" method="GET">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{ $i }}">
                  More
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{$task->name}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <h4>Details of the task:</h4>
                      <p>{{$task->detail}}</p>
                      <h4>State:</h4>
                    @if ($task->done)
                            <h5>Done</h5>
                            @else
                            <h5>In progress</h5>
                            @endif
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                    <a class="btn btn-warning" href="{{ route('task.edit',$task->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


@endsection