
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
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
                            <button type="submit" class="btn btn-danger" onclick="fireSweetAlert()">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <script>
                function fireSweetAlert() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                  }).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                      });
                    }
                  });
                }
                </script>
        </tbody>
    </table>
    
@endsection