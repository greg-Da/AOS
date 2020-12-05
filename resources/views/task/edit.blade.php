@extends('layouts.app')


@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="text-center">
<h2>Edit task</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('task.index') }}"> Back</a>
</div>
</div>
</div>


@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif


<form action="{{ route('task.update',$task->id) }}" method="POST">
@csrf
@method('POST')


<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
<input type="text" name="name" value="{{ $task->name }}" class="form-control" placeholder="Name">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Details:</strong>
<textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $task->detail }}</textarea>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Task Done:</strong>
<input type="hidden" name="done" value="0"/>
<input checked data-toggle="toggle" data-on="Yes" @if(isset($task->done) && $task->done)checked="checked"@endif 
data-onstyle="primary" data-offstyle="info" type="checkbox" value="1" name="done">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>


</form>


@endsection
