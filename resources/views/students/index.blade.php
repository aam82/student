@extends('students.layout')
 
@section('content')
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Students CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create New Student</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<br>
   <div>
        <div class="mx-auto pull-right">
            <div class="">
                <form action="{{ route('students.index') }}" method="GET" role="search">

                    <div class="input-group">
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search by Name " id="term">
                        <span class="input-group-btn mr-4 mt-1">
                            <button class="btn btn-info" type="submit" title="Search projects">Refresh Search
                                <span class="btn btn-search"></span>
                            </button>
                        </span>
                        <a href="{{ route('students.index') }}" class=" mt-1">
                            <span class="input-group-btn">

                            </span>

                        </a>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
<br>
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->detail }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $students->links() !!}
      
@endsection