<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Detail</title>
</head>
<body>
    Place image: {{ $place->image }}
    <br>
    Place title: {{ $place->title }}
    <br>
    Place description: {{ $place->description }}
    <br>
    Place price start from: {{ $place->priceFrom }}
    <br>
    Place price end at: {{ $place->priceTo }}
    <br>
    @if($place->published)
        It is published.
    @else
        It is not published.
    @endif
</body>
</html>