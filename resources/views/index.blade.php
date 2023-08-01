@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
        <div class="card">
<div class="card-header">
<h4>Laravel Crud
<a href="{{ url('add-student') }}"class="btn btn-danger float-end">Back</a>

</h4>
</div>
<div class="card-body">
<table class="table table-borderd table-striped">

<thead>

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Course</th>
<th>Image</th>
<th>Edit</th>
<th>Delete</th>

</tr>
</thead>
<tbody>
@foreach($student as $item)
<tr>
<td>{{$item->id }}</td>
<td>{{$item->name }}</td>
<td>{{$item->email }}</td>
<td>{{$item->course }}</td>
<td>
   <img src="{{asset('uploads/student/'.$item->image) }}"width="70px"height="70px">  
</td>
<td>
<a href="{{ url('edit-student/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
</td>
<td>
<form action ="{{ url('delete-student/'.$item->id) }}"method="POST">

@csrf
@method('DELETE')

<button type="submit"class="btn btn-danger btn-sm ">Delete</button>

</form>




</td>


</tr>


@endforeach
</tbody>



</table>




</div>


        </div>

        </div>

    </div>
</div>
@endsection