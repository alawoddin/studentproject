<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Info</title>

    {{-- ✅ Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- ✅ FontAwesome (for icons) --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    {{-- ✅ DataTables CSS --}}
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <h4 class="card-title">View Student Info</h4>
                {{-- Example Button --}}
            </div>

            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Program Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th class="all">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pending as $key => $pend)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pend->name }}</td>
                        <td>{{ $pend->lastname }}</td>
                        <td>{{ $pend->father_name }}</td>
                        <td>{{ $pend->phone_number }}</td>
                        <td>{{ $pend->email }}</td>
                        <td>{{ $pend->time }}</td>
                        <td>
                            @if($pend->status === 'done')
                                <span class="badge bg-success">done</span>
                            @elseif($pend->status === 'wait')
                                <span class="badge bg-warning">wait</span>
                            @elseif($pend->status === 'reject')
                                <span class="badge bg-danger">reject</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('student.pending', $pend->id) }}">
                                @if($pend->status === 'wait')
                                    <i class="fas fa-spinner btn btn-warning" title="Mark as Done"></i>
                                @elseif($pend->status === 'done')
                                    <i class="fas fa-check btn btn-success" title="Already Done"></i>
                                @elseif($pend->status === 'reject')
                                    <i class="fas fa-times btn btn-danger" title="Rejected"></i>
                                @endif
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

{{-- ✅ jQuery (needed for Bootstrap + DataTables) --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

{{-- ✅ Bootstrap 5 JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

{{-- ✅ DataTables JS --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

{{-- ✅ Initialize DataTable --}}
<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        responsive: true
    });
});
</script>

</body>
</html>
