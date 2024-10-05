@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Specializations - Companies</h1>

    @if ($specialization->companies->isEmpty())
        <div class="alert alert-warning">
            لا توجد شركات مرتبطة بهذا الاختصاص.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>لوغو</th>
                    <th>اسم</th>
                    <th>ايميل</th>
                    <th>موبايل</th>
                    <th>نوع</th>
                    <th>عدد الموظفين</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specialization->companies as $company)
                    <tr>
                        <td>
                            @if ($company->logo)
                                <img src="{{ asset('images/companies/' . $company->logo) }}" width="50" height="50" alt="Company Logo">
                            @else
                                <span>No logo</span>
                            @endif
                        </td>
                        <td>{{ $company->name ?? 'لا توجد بيانات'  }}</td>
                        <td>{{ $company->email ?? 'لا توجد بيانات'  }}</td>
                        <td>{{ $company->phone ?? 'لا توجد بيانات'  }}</td>
                        <td>{{ $company->type ?? 'لا توجد بيانات'  }}</td>
                        <td>{{ $company->employees_count ?? 'لا توجد بيانات'  }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection