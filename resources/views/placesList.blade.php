<!DOCTYPE html>
<html lang="en">
<head>
  <title>Places List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Places List</h2>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Price From</th>
        <th>Price To</th>
        <th>Image</th>
        <th>Created at</th>
        <th>Published</th>
        <th>Edit</th>
        <th>Show</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($places as $place)
      <tr>
        <td>{{ $place->title }}</td>
        <td>{{ $place->description }}</td>
        <td>{{ $place->priceFrom }}$</td>
        <td>{{ $place->priceTo }}$</td>
        <td><img src="assets/images/{{ $place->image }}" width="100px"></td>
        <td>{{ $place->created_at }}$</td>
        <td>
            @if($place->published)
                Yes ✔
            @else
                No ❌
            @endif
        </td>
        <td><a href="editPlace/{{ $place->id }}">Edit</a></td>
        <td><a href="placeDetail/{{ $place->id }}">Show</a></td>
        <td><a href="deletePlace/{{ $place->id }}" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>