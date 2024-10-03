@include('panel.static.header')
@include('panel.static.main')
@extends('layouts.app')

@section('content')
<div class="container mt-4" dir="rtl">
    <div class="text-center mt-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-light" style="border-radius: 10px; overflow: hidden;">
        <div class="card-header" style="background-color: #e0e0e0;">
            <h3 class="text-center">قائمة الباحثين</h3>
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover" style="font-size: 0.9rem;">
                <thead style="background-color: #b0b0b0; color: white;">
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>الهاتف</th>
                        <th>النقاط</th>
                        <th>المعدل</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($researchers as $researcher)
                        <tr>
                            <td>{{ $researcher->name }}</td>
                            <td>{{ $researcher->email }}</td>
                            <td>{{ $researcher->phone }}</td>
                            <td>{{ $researcher->points }}</td>
                            <td>{{ $researcher->reports_count > 0 ? intval($researcher->points / $researcher->reports_count) : 0 }}</td>
                            <td>
                                <a href="{{ route('edit.researcher', $researcher->uuid) }}" class="btn btn-sm btn-outline-primary">تعديل</a>
                                <a href="{{ route('trashed.researcher', $researcher->uuid) }}" class="btn btn-sm btn-outline-danger">حذف</a>
                                <a href="{{ route('trashed.researcher') }}" class="btn btn-sm btn-outline-warning">البيانات المحذوفة</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('panel.static.footer')
@endsection