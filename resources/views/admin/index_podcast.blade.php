@extends('layout.master_main')
@section('name_fitur', 'All Podcasts Panel')

@push('styling')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            <table id="podcasts_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>User</th>
                        <th>Description</th>
                        <th>Audio</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($podcasts as $podcast)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $podcast->title_podcast }}</td>
                        <td>{{ $podcast->user->name }}</td>
                        <td>
                            {{ Str::limit($podcast->description, 50, '...') }}
                        </td>
                        <td>
                            <audio controls>
                                <source src="{{ asset('storage/' . $podcast->recording) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        <td>
                            <button class="btn btn-sm btn-danger delete-button"
                                data-url="{{ route('recording.deletePodcastUser', $podcast->slug) }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#podcasts_table').DataTable({
            "paging": true, // Menampilkan pagination
            "searching": true // Menampilkan fitur pencarian
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const url = this.dataset.url;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    });
</script>
@endpush