@include('panel.static.header')
@include('panel.static.main')
@extends('layouts.app')

@section('content')
<html lang="ar">

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
            <div class="card-header" style="background-color: #a9a9a9; color: white;">
                <h3 class="text-center">قائمة الباحثين</h3>
            </div>

            <div class="card-body">
                <table class="table table-striped table-hover" style="font-size: 0.9rem; background-color: #f2f2f2; border-radius: 10px;">
                    <thead style="background-color: #a9a9a9; color: white;">
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
                                <td>{{ $researcher->name ?? 'لا توجد بيانات' }}</td>
                                <td>{{ $researcher->email ?? 'لا توجد بيانات' }}</td>
                                <td>{{ $researcher->phone ?? 'لا توجد بيانات' }}</td>
                                <td>{{ $researcher->points ?? 'لا توجد بيانات' }}</td>
                                <td>{{ $researcher->reports_count > 0 ? intval($researcher->points / $researcher->reports_count) : 0 }}</td>
                                <td>
                                    <a href="{{ route('edit.researcher', $researcher->uuid) }}" class="btn btn-sm btn-primary">تعديل</a>
                                    <a href="{{ route('delete.researcher', $researcher->uuid) }}" class="btn btn-sm btn-danger">حذف</a>
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
