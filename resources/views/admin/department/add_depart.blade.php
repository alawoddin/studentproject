
@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <h5 class="card-title mb-4">Add Department & Subjects</h5>

            <form action="{{ route('store.depart') }}" method="POST">
                @csrf

             

                <!-- Department Name -->
                <div class="row ">
                    <div class="col-md-6">
                        <label for="depart_name" class="form-label">Department Name</label>
                        <input type="text" name="depart_name" class="form-control" placeholder="Department name" required>


                    </div>

                    <div class="col-md-6">
                            <!-- Subjects Title + Add Button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label mb-0" style="margin-top:-8px">Department Subjects</label>
                            <button type="button" class="btn btn-outline-primary btn-sm mb-2" id="add-subject"  style="margin-top:-8px">
                                + Add Subject
                            </button>
                        </div>

                        <!-- Subjects Container -->
                        <div id="subject-container">
                            <div class="input-group">
                                <input type="text" name="depart_subjects[]" class="form-control" placeholder="Department subject" required>
                                <button type="button" class="btn btn-danger remove-subject">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success px-4">Save Department</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    $('#add-subject').on('click', function () {
        $('#subject-container').append(`
            <div class="input-group mb-2">
                <input type="text" name="depart_subjects[]" class="form-control" placeholder="Department subject" required>
                <button type="button" class="btn btn-danger remove-subject">Remove</button>
            </div>
        `);
    });

    $(document).on('click', '.remove-subject', function () {
        $(this).closest('.input-group').remove();
    });
</script>

@endsection
