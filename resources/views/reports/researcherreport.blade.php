@include('panel.static.header')
@include('panel.static.main')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">

            <h1 class="text-center text-dark my-4">الباحثون</h1>

            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="background: #f9f9f9;">
                    <thead style="background-color: #e0e0e0; color: white;">
                        <tr>
                            <th>الاسم</th>
                            <th>البريد الالكتروني</th>
                            <th>النقاط</th>
                            <th>التقييم</th>
                            <th>التقارير</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($researchers as $researcher)
                        <tr style="background-color: rgba(255, 255, 255, 0.9);">
                            <td>{{ $researcher->name ?? 'لا توجد بيانات' }}</td>
                            <td>{{ $researcher->email ?? 'لا توجد بيانات' }}</td>
                            <td>{{ $researcher->points ?? 'لا توجد بيانات' }}</td>
                            <td>{{ number_format($researcher->rating, 2) }}</td>
                            <td>
                                <button class="btn btn-outline-dark btn-sm" data-toggle="collapse" data-target="#reports-{{ $researcher->id }}" 
                                        style="border-radius: 20px;">
                                    اظهار التقارير
                                </button>
                                <div id="reports-{{ $researcher->id }}" class="collapse mt-2">
                                    <ul class="list-group">
                                        @foreach($researcher->reports as $report)
                                        <li class="list-group-item" style="background-color: #e9ecef;">
                                            {{ $report->user?->name }} شاهد التقرير
                                            <a href="{{ $report->file }}" target="_blank" class="text-primary">
                                                {{ $report->title }}
                                            </a>
                                            - {{ $report->status }} ({{ $report->created_at }})
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

        </div>
    </div>
</div>

@include('panel.static.footer')