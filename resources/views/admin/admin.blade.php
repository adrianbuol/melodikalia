<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <main>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h3>CRUD</h3>
                <div class="d-flex justify-content-md-between align-items-center p-3 w-75">
                    <a href="/admin/album" class="border border-dark col-2 d-flex justify-content-center">Albums</a>
                    <a href="/admin/genre" class="border border-dark col-2 d-flex justify-content-center">Genres</a>
                    <a href="/admin/song" class="border border-dark col-2 d-flex justify-content-center">Songs</a>
                    <a href="/admin/user" class="border border-dark col-2 d-flex justify-content-center">Users</a>
                </div>
            </div>

        </main>
    @endsection
</body>

</html>
