<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Place</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Update Place</h2>
  <form action="{{ route('updatePlace',$place->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" value="{{ $place->title }}" name="title">
      @error('title')
        <div class='alert alert-warning'>
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" rows="5" id="description" name="description">{{ $place->description }}</textarea>
        @error('description')
        <div class='alert alert-warning'>
          {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
      <label for="price">Price From:</label>
      <input type="number" class="form-control" id="price" placeholder="Enter Price" name="priceFrom" value="{{ $place->priceFrom }}">
      @error('priceFrom')
      <div class='alert alert-warning'>
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="price">Price To:</label>
      <input type="number" class="form-control" id="price" placeholder="Enter Price" name="priceTo" value="{{ $place->priceTo }}">
      @error('priceTo')
      <div class='alert alert-warning'>
        {{ $message }}
      </div>
      @enderror
    </div> 
    <div class="form-group">
      <label for="image">Image:</label>
      <div class="form-group">
        <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
        <img src=" {{ asset('assets/images/'.$place->image) }} " alt="cars" style="width:250px;">
      </div>
      @error('image')
      <div class='alert alert-warning'>
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published" @checked($place->published)> Published</label>
    </div>
    <button type="submit" class="btn btn-default">Edit</button>
  </form>
</div>

</body>
</html>