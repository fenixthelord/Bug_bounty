@include('panel.static.header')
@include('panel.static.main')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="text-center text-dark">التخصصات</h1>
            
            <div class="text-center my-3">
                <a href="{{ route('specializations.create') }}" class="btn btn-danger">إضافة تخصص جديد</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center" style="background: linear-gradient(135deg, #f0f0f0, #dcdcdc);">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>العنوان</th>
                            <th>الشركات</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specializations as $specialization)
                            <tr style="background-color: rgba(255, 255, 255, 0.8);">
                                <td>{{ $specialization->title }}</td>
                                <td>
                                    <a href="{{ route('specialization.companies', $specialization->id) }}" class="btn btn-outline-danger">عرض</a>
                                </td>
                                <td>
                                    <a href="{{ route('specializations.edit', $specialization->id) }}" class="btn btn-warning">تعديل</a>
                                    <form action="{{ route('specializations.destroy', $specialization->id) }}" method="POST" class="d-inline-block" onsubmit="return confirmDelete();">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
        </div>
    </div>
</div>

@include('panel.static.footer')