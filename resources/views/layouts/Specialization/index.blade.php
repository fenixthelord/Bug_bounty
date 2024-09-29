@extends('layouts.app')

@section('content')
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Specializations</h1>
    <a href="{{ route('specializations.createe') }}" class="btn btn-primary">Add New Specialization</a>

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
                        <a href="{{ route('specializations.edite', $specialization->id) }}" class="btn btn-warning">Edit</a>
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