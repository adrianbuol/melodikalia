<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <main>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1>CRUD</h1>
                <div id="crudLinks" class="d-flex justify-content-md-between align-items-center p-3 w-75">
                    <a href="/albums" class="border border-dark col-2 d-flex justify-content-center">Albums</a>
                    <a href="/genres" class="border border-dark col-2 d-flex justify-content-center">Genres</a>
                    <a href="/songs" class="border border-dark col-2 d-flex justify-content-center">Songs</a>
                    <a href="/users" class="border border-dark col-2 d-flex justify-content-center">Users</a>
                </div>
            </div>

        </main>
    @endsection
</body>

</html>
