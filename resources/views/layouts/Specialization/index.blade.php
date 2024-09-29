@extends('layouts.app')

@section('content')
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Specializations</h1>
<<<<<<< HEAD
    <a href="{{ route('specializations.create') }}" class="btn btn-primary">Add New Specialization</a>
=======
    <a href="{{ route('specializations.createe') }}" class="btn btn-primary">Add New Specialization</a>
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7

    <table class="table mt-2">
        <thead>
            <tr>
                <th>Title</th>
               
                
                <th>comoanies</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($specializations as $specialization)
                <tr>
                    <td>{{ $specialization->title }}</td>
                    
                    <td> <a href="{{ route('specialization.companies', $specialization->id) }}" class="btn btn-primary">show </a>
                    <td>
<<<<<<< HEAD
                        <a href="{{ route('specializations.edit', $specialization->id) }}" class="btn btn-warning">Edit</a>
=======
                        <a href="{{ route('specializations.edite', $specialization->id) }}" class="btn btn-warning">Edit</a>
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
                        <form action="{{ route('specializations.destroy', $specialization->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this specialization?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection