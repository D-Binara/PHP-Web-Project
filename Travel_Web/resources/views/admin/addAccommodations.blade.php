@extends('layouts.adminNav')

@section('content')
    <div class="container">
        <h1>Create Accommodation</h1>
      s
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" id="location" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" id="price" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
