@include('panel.static.header')
@include('panel.static.main')

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">العناصر المحذوفة</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h2 class="section-title">الشركات المحذوفة</h2>
    <div class="table-responsive mb-4">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
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
                            <form action="{{ route('company.restore', $company->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-outline-success btn-sm">إستعادة</button>
                            </form>
                            <form action="{{ route('company.forceDelete', $company->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('هل أنت متأكد من حذف هذا السجل نهائيًا؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> حذف نهائي
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h2 class="section-title">التخصصات المحذوفة</h2>
    <div class="table-responsive mb-4">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
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
                            <form action="{{ route('specializations.restore', $specialization->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-outline-success btn-sm">إستعادة</button>
                            </form>
                            <form action="{{ route('specializations.forceDelete', $specialization->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('هل أنت متأكد من حذف هذا السجل نهائيًا؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> حذف نهائي
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h2 class="section-title">الباحثين المحذوفين</h2>
    <div class="table-responsive mb-4">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>اسم</th><th>وقت الحذف</th>
                    <th>الإجرائات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($researchers as $researcher)
                    <tr>
                        <td>{{ $researcher->name }}</td>
                        <td>{{ $researcher->deleted_at }}</td>
                        <td>
                            <form action="{{ route('restore.researcher', $researcher->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-outline-success btn-sm">إستعادة</button>
                            </form>
                            <form action="{{ route('researcher.forceDelete', $researcher->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('هل أنت متأكد من حذف هذا السجل نهائيًا؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> حذف نهائي
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@include('panel.static.footer')

<style>
    h1, h2 {
        color: #333;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .table {
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .thead-dark {
        background-color: #6c757d;
        color: #fff;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        transition: background-color 0.3s ease;
    }

    .btn-outline-danger {
        border-color: #dc3545;
        color: #dc3545;
        transition: background-color 0.3s ease;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }

    .section-title {
        font-size: 22px;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
        margin-top: 30px;
        margin-bottom: 15px;
    }
</style>