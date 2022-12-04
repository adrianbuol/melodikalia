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
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h3>CRUD - GENRES</h3>
                <div class="d-flex justify-content-md-between align-items-center p-3 w-75">
                    <a id="btn-create" href="/genres/create"
                        class="border border-dark col-2 d-flex justify-content-center">Create</a>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <table class="m-4">
                        <tr class="tableRow">
                            <td>ID</td>
                            <td>Name</td>
                            <td>Created At</td>
                            <td>Updated At</td>
                            <td colspan="2"></td>
                        </tr>
                        @foreach ($allGenres as $genre)
                            <tr class="tableRow">
                                <td>{{ $genre->id }}</td>
                                <td>
                                    <a href="/genres/{{ $genre->id }}">{{ $genre->name }}</a>
                                </td>
                                <td>{{ $genre->created_at }}</td>
                                <td>{{ $genre->updated_at }}</td>
                                <td>
                                    <a href="/genres/{{ $genre->id }}/edit" id="edit"><i
                                            class="bi bi-pencil-square"></i></a>
                                </td>
                                <td>
                                    <form action="/genres/{{ $genre->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button id="destroy" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <a href="/admin" class="back-button border border-dark d-flex justify-content-center p-2 w-25">Back</a>
            </div>
        </main>
    @endsection
</body>

</html>
