@extends('layouts.app')

@section('content')
<h1>Specializations</h1>
    

    <table class="table mt-2">
        <thead>
            <tr>
                <th>logo</th>
                <th>name</th>
                <th>email</th>
                <th>phone</th>
                <th>type</th>
                <th>count of employess</th>
                
               
        </thead>
        <tbody>

            
            @foreach ($specialization->companies as $company)
                <tr>
                    <td>
                        @if ($company->image)
                            <img src="{{ asset('images/companies/' . $company->logo) }}" width="50" height="50">
                        @else
                            No logo
                        @endif
                    </td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->phone }}</td>
                    <td>{{ $company->type }}</td>
                    <td>{{ $company->employess_count }}</td>

                    
                   
            @endforeach
  
        </tbody>
    </table>
@endsection