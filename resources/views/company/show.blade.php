@include('panel.static.header')
@include('panel.static.main')

@extends('layouts.app')

@section('content')

<div class="text-center">
    @if(session('success')) 
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif 
</div>

<div class="container mt-4" dir="rtl">
      <div class="card">
        <div class="card-header text-white" style="background-color: #0a0a0a;">
          <h1 class="mb-0">{{ $company->name ?? 'لا يوجد اسم شركة' }}</h1>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-md-6">
              <h3 class="mb-3">معلومات الشركة</h3>
              <ul class="list-unstyled">
                <li class="mb-2">
                  <strong>البريد الإلكتروني:</strong> {{ $company->email ?? 'لا يوجد بريد الكتروني' }}
                </li>
                <li class="mb-2">
                  <strong>الهاتف:</strong> {{ $company->phone ?? 'لا يوجد رقم ' }}
                </li>
                <li>
                  <strong>التخصصات:</strong>
                  <ul class="list-inline d-inline mb-0">
                  @foreach($company->specializations as $spe)
                    <li class="list-inline-item">
                        <i class="fas fa-check-circle text-success me-1"></i>
                        <span class="fs-6">{{ $spe->title }}
                        @if(!$loop->last)
                            <span class="mx-1">-
                        @endif
                    </li>
                  @endforeach
                  </ul>
                </li>
              </ul>
            </div>
            @if($company->products->count() > 0)
            <div class="col-md-6">
                    <h3 class="mb-3">المنتجات</h3>
                    <ul class="list-group">
                        @foreach($company->products as $product)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $product?->title ?? 'لا يوجد منتج' }}
                                @if($product->status == 0)
                                    <span class="badge bg-danger">غير مسموح به
                                @elseif($product->status == 1)
                                    <span class="badge bg-success">مسموح به
                                @endif
                            </li>
                            @if($product->status == 1 && $product->trems)
                                <li class="list-group-item">
                                    <small>{{ $product->trems ?? 'لا توجد بيانات' }}</small>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            </div>
            @endif
            @if($company->products->count() > 0)
            <h3 class="mt-4 mb-3">الثغرات</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>المنتج</th>
                            <th>الثغرة</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($company->products as $pr)
                            @foreach($pr->reports as $report)
                                <tr>
                                    <td>{{ $report->product->title }}</td>
                                    <td>{{ $report->title }}</td>
                                    <td>
                                        @if($report->status == 'pending')
                                            <span class="badge bg-primary">قيد الإنتظار
                                        @elseif($report->status == 'done')
                                            <span class="badge bg-warning">تم الإصلاح
                                        @elseif($report->status == 'reject')
                                            <span class="badge bg-danger">تم الرفض
                                        @elseif($report->status == 'accept')
                                            <span class="badge bg-success">تم القبول
                                        @endif
                                    </td>
                                </tr>@endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            <div class="mt-4" style="margin: 1rem;">
              <a href="{{ route('admin.company') }}" class="btn btn-outline-secondary btn-sm"style="background-color: ;">عودة</a>

            <form action="{{ route('company.destroy', $company->id) }}"method="POST" class="d-inline-block" onsubmit="return confirmDelete();">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm">حذف الشركة</button>
            </form>  
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <script>
                function confirmDelete() {
                    return Swal.fire({
                        title: "هل أنت متأكد؟",
                        text: "لن تتمكن من استعادة هذا!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "نعم، احذفه!"
                    }).then((result) => {
                        return result.isConfirmed;
                    });
                }
            </script>
@endsection
@include('panel.static.footer')
