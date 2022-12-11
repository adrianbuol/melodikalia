@vite(['resources/css/list.css'])
<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <main>
            @if (session('message'))
                <div id="message" class="p-3">
                    {!! session('message') !!}
                </div>
            @endif
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1>Administrador - Albums</h1>
                <div class="d-flex justify-content-md-between align-items-center p-3 w-75">
                    <a id="btn-create" href="/albums/create"
                        class="border border-dark col-2 d-flex justify-content-center">Create</a>
                </div>
            </div>

            <div>
                <table class="m-4">
                    <tr class="tableRow">
                        <td>ID</td>
                        <td>User</td>
                        <td>Name</td>
                        <td>Cover</td>
                        <td>Created At</td>
                        <td>Updated At</td>
                        <td colspan="2"></td>
                    </tr>
                    @foreach ($allAlbums as $album)
                        <tr class="tableRow">
                            <td>{{ $album->id }}</td>
                            <td>{{ $album->user_id }} </td>
                            <td>
                                <a href="/albums/{{ $album->id }}"> {{ $album->name }}</a>
                            </td>
                            <td>
                                <img class="border border-dark" src="/storage/{{ $album->cover }}"
                                    alt="{{ $album->name }} image cover" />
                            </td>
                            <td>{{ $album->created_at }}</td>
                            <td>{{ $album->updated_at }}</td>
                            <td>
                                <a href="/albums/{{ $album->id }}/edit" id="edit"><i
                                        class="bi bi-pencil-square"></i></a>
                            </td>
                            <td>
                                <form action="/albums/{{ $album->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button id="destroy" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
            @if (session('user')->admin == 1)
                <div class="d-flex justify-content-center">
                    <a href="/admin" class="back-button border border-dark d-flex justify-content-center p-2 w-25">Back</a>
                </div>
            @endif
        </main>
    @endsection
</body>

</html>
