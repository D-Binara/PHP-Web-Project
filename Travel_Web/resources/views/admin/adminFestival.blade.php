@extends('layouts.adminNav')
@section('content')
    <section class="destinations-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($festival as $festival)
                    <div class="col-md-4 d-flex justify-content-center mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('image/' . $festival->image) }}" class="card-img-top"
                                 alt="{{ $festival->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $festival->title }}</h5>
                                <p class="card-text">{{ Str::limit($festival->description, 100) }}</p>
                                <p class="card-text">{{ $festival->location }}</p>
                                <p class="card-text">{{ $festival->country }}</p>
                                <div class="d-flex justify-content-between">
                                    <!-- Update Button -->
                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                            data-bs-target="#updateModal{{ $festival->id }}">
                                        <i class="fas fa-edit"></i>Update
                                    </button>
                                    <form action="{{ route('festival.destroy', $festival->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Update Modal -->
                    <div class="modal fade" id="updateModal{{ $festival->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="updateModalLabel{{ $festival->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel{{ $festival->id }}">Update
                                        Destination</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('festival.update', $festival->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        @if($errors->any())
                                            <div class="alert alert-danger" role="alert">
                                                <ul class="mb-0">
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                   value="{{ $festival->title }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description"
                                                      required>{{ $festival->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="location" class="form-label">Location</label>
                                            <textarea class="form-control" id="location" name="location"
                                                      required>{{ $festival->location }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="country" class="form-label">Country</label>
                                            <textarea class="form-control" id="country" name="country"
                                                      required>{{ $festival->country }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" class="form-control-file" id="image" name="image">
                                            <small class="form-text text-muted">Leave empty to keep the current
                                                image.</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Update Modal -->

                @endforeach
            </div>
        </div>
    </section>


    <!-- Include Bootstrap JS and Popper.js for Bootstrap 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
