<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <h4>Quien me sigue</h4>

        <table>
            <tr class="border-bottom border-dark">
                <td>Avatar</td>
                <td>Username</td>
                <td>Email</td>
                <td>Name</td>
                <td>Surname</td>
            </tr>
            @foreach ($follower as $user)
                <tr>
                    <td>
                        <img src="/storage/{{ $user->profile_pic }}" alt="{{ $user->username }} avatar">
                    </td>
                    <td>
                        <a href="/users/{{ $user->id }}">{{ $user->username }}</a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                </tr>
            @endforeach
        </table>
    @endsection
</body>

</html>
