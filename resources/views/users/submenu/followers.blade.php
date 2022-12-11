@vite(['resources/css/list.css'])
<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <h1>Usuarios que siguen a {{ $user->username }}.</h1>
        <div>
            <table>
                <tr class="tableRow">
                    <td>Avatar</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Name</td>
                    <td>Surname</td>
                </tr>
                @foreach ($follower as $user)
                    <tr class="tableRow">
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
        </div>
    @endsection
</body>

</html>
