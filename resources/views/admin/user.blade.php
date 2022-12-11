@vite(['resources/css/app.css'])
@vite(['resources/css/list.css'])
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <main>
            @php
                $user = session('user');
            @endphp
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h3>Administrador - USERS</h3>
                <div class="d-flex justify-content-md-between align-items-center w-75">
                    <a id="btn-create" href="/users/create"
                        class="border border-dark col-2 d-flex justify-content-center">Create</a>
                </div>
            </div>
            <div>
                <table class="m-4">
                    <tr class="tableRow">
                        <td>ID</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Name</td>
                        <td>Surname</td>
                        <td>Created At</td>
                        <td>Updated At</td>
                        <td colspan="2"></td>
                    </tr>
                    @foreach ($allUsers as $user)
                        <tr class="tableRow">
                            <td>{{ $user->id }}</td>
                            <td>
                                <a href="/users/{{ $user->id }}">{{ $user->username }}</a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>
                                <a href="/users/{{ $user->id }}/edit" id="edit"><i
                                        class="bi bi-pencil-square"></i></a>
                            </td>
                            <td>
                                <form action="/users/{{ $user->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button id="destroy" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            @if (session('user')->admin)
                <div class="d-flex justify-content-center">
                    <a href="/admin" class="back-button border border-dark d-flex justify-content-center p-2 w-25">Back</a>
                </div>
            @endif
        </main>
    @endsection
</body>

</html>
