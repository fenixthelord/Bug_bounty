@include('panel.static.header')
@include('panel.static.main')


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="text-center text-primary my-4" style="font-weight: 700;">التخصصات</h1>

            <div class="text-center mb-4">
                <a href="{{ route('specializations.create') }}" class="btn btn-outline-primary btn-lg btn-sm" 
                   style="border-radius: 30px; padding: 10px 20px;">+ إضافة تخصص جديد</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center" 
                       style="background: linear-gradient(135deg, #e3f2fd, #bbdefb); border-radius: 15px;">
                    <thead class="text-white" style="border-radius: 15px; background-color: #a9a9a9;">
                        <tr>
                            <th>العنوان</th>
                            <th>الشركات</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specializations as $specialization)
                            <tr style="background-color: rgba(255, 255, 255, 0.9);">
                                <td>{{ $specialization->title }}</td>
                                <td>
                                    <a href="{{ route('specialization.companies', $specialization->id) }}" 
                                       class="btn btn-outline-info btn-sm" 
                                       style="border-radius: 20px;">عرض</a>
                                </td>
                                <td>
                                    <a href="{{ route('specializations.edit', $specialization->id) }}" 
                                       class="btn btn-outline-dark btn-sm mb-2" 
                                       style="border-radius: 20px;">تعديل</a>
                                    <form action="{{ route('specializations.destroy', $specialization->id) }}" 
                                          method="POST" class="d-inline-block" 
                                          onsubmit="return confirmDelete();">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" 
                                                style="border-radius: 20px;">حذف</button>
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