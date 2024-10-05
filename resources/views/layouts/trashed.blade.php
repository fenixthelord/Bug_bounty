

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>العناصر المحذوفة</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h2>الشركات المحذوفة</h2>
    <table class="table">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>وقت الحذف</th>
                <th>الإجرائات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->deleted_at }}</td>
                    <td>
                        <form action="" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">إستعادة</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>التخصصات المحذوفة</h2>
    <table class="table">
        <thead>
            <tr>
                <th>عنوان</th>
                <th>وقت الحذف</th>
                <th>الإجرائات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($specializations as $specialization)
                <tr>
                    <td>{{ $specialization->title }}</td>
                    <td>{{ $specialization->deleted_at }}</td>
                    <td>
                        <form action="{{ route('specializations.restore', $specialization->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">إستعادة</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>الباحثين المحذوفين</h2>
    <table class="table">
        <thead>
            <tr>
                <th>اسم</th>
                <th>وقت الحذف</th>
                <th>الإجرائات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($researchers as $researcher)
                <tr>
                    <td>{{ $researcher->name }}</td>
                    <td>{{ $researcher->deleted_at }}</td>
                    <td>
                        <form action="" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">إستعادة</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
