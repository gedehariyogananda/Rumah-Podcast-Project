@extends('layout.master_main')
@section('name_fitur', 'Dashboard Panel')

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
      <table id="users_table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Level</th>
            <th>Foto</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->username }}</td>
            <td>
              @if($user->level == 1)
              <span class="badge badge-danger"> Admin</span>
              @elseif($user->level == 2)
              <span class="badge badge-primary"> User</span>
              @elseif($user->level == 3)
              <span class="badge badge-success"> Podcaster</span>
              @endif

            </td>
            <td><img src="{{ asset('storage/' . $user->foto) }}" alt="{{ $user->name }}" style="width: 100px;"></td>
            <td>
              <button class="btn btn-sm btn-danger delete-button" data-url="{{ route('deleteUser', $user->id) }}">
                <i class="fa fa-trash"></i>
              </button>
              <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateUser{{ $user->id }}">
                <i class="fa fa-pen"></i>
              </button>

              <div class="modal fade" id="updateUser{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('updateUser', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="mb-3">
                          <label for="username" class="form-label">Username</label>
                          <input type="text" class="form-control" id="username" name="username"
                            value="{{ $user->username }}">
                        </div>
                        <div class="mb-3">
                          <label for="level" class="form-label">Level</label>
                          <select class="form-select" id="level" name="level">
                            <option value="1" @if($user->level == 1) selected @endif>Admin</option>
                            <option value="2" @if($user->level == 2) selected @endif>User</option>
                            <option value="3" @if($user->level == 3) selected @endif>Podcaster</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
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
        $('#users_table').DataTable({
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