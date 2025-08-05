@extends('admin.admin_dashboard')
@section('admin')

 <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Paid</th>
                                        <th>Note</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        use App\Models\Expense;
                                        $teacherExpenses = Expense::where('leet',1)->get();
                                        ?>
                                    @foreach ($teacherExpenses as $key => $teachers)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $teachers->title }}</td>
                                            <td>{{ $teachers->amount }}</td>
                                            <th>{{ $teachers->date }}</th>
                                            <th>{{ $teachers->note }}</th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
@endsection