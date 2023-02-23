@extends('layout')
@section('title', 'Immeubles')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        ADD
                    </div>
                    <div class="card-body">
                        <form action="/action_page.php">
                            <div class="row mb-3 mt-2">
                                <div class="col">
                                    <label for="name" class="form-label">Name:</label>
                                  <input type="text" class="form-control" placeholder="Enter email" name="email">
                                </div>
                                <div class="col">
                                    <label for="name" class="form-label">Tele:</label>
                                  <input type="password" class="form-control" placeholder="Enter password" name="pswd">
                                </div>
                              </div>
                              <div class="row mb-3 mt-3">
                                <div class="col">
                                    <label for="name" class="form-label">Name:</label>
                                  <input type="text" class="form-control" placeholder="Enter email" name="email">
                                </div>
                                <div class="col">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="file" class="form-control" id="customFile" />
                                </div>
                              </div>
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                    name="name">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
