<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <main>
            @php
                $user = session('user');
            @endphp
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h3>CRUD - USERS</h3>
                <div class="d-flex justify-content-md-between align-items-center p-3 w-75">
                    <a href="/users/create" class="border border-dark col-2 d-flex justify-content-center">Create</a>

                </div>
                <div class="d-flex justify-content-center align-items-center ">
                    <table class="m-4">
                        <tr>
                            <td>ID</td>
                            <td>Username</td>
                            <td>Password</td>
                            <td>Email</td>
                            <td>Name</td>
                            <td>Surname</td>
                            <td>Admin</td>
                            <td>Created At</td>
                            <td>Updated At</td>
                            <td colspan="3"></td>
                        </tr>
                        @foreach ($allUsers as $all)
                            <tr>
                                <td>{{ $all->id }}</td>
                                <td>{{ $all->username }}</td>
                                <td>{{ $all->password }}</td>
                                <td>{{ $all->email }}</td>
                                <td>{{ $all->name }}</td>
                                <td>{{ $all->surname }}</td>
                                <td>{{ $all->admin }}</td>
                                <td>{{ $all->created_at }}</td>
                                <td>{{ $all->updated_at }}</td>
                                <td>
                                    <form action="/users/{{ $all->id }}" method="GET">
                                        @csrf
                                        <input type="submit" value="Read">
                                    </form>
                                </td>
                                <td>
                                    <form action="/users/{{ $all->id }}" method="PUT">
                                        @csrf
                                        <input type="submit" value="Update">
                                    </form>
                                </td>
                                <td>
                                    <form action="/users/{{ $user->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <a href="/admin" class="border border-dark col-2 d-flex justify-content-center">Back</a>
            </div>

        </main>
    @endsection
</body>

</html>
