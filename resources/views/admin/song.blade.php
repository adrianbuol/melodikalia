<!DOCTYPE html>
<html>

<body>
    @extends('layouts.app')

    @section('content')
        <main>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h3>CRUD - SONGS</h3>
                <div class="d-flex justify-content-md-between align-items-center p-3 w-75">
                    <a href="/songs/create" class="border border-dark col-2 d-flex justify-content-center">Create</a>
                    <a href="#" class="border border-dark col-2 d-flex justify-content-center">Read</a>
                    <a href="#" class="border border-dark col-2 d-flex justify-content-center">Update</a>
                    <a href="#" class="border border-dark col-2 d-flex justify-content-center">Delete</a>
                </div>
                <a href="/admin" class="border border-dark col-2 d-flex justify-content-center">Back</a>
            </div>

        </main>
    @endsection
</body>

</html>
