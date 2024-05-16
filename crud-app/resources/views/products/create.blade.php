<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

        <h1>create a product</h1>
        <div>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        </div>
        <form method="post" action="{{route('product.store')}}">
            @csrf
            @method('post')
            <div>
                <label for="">Name</label>
                <input type="text" name="name" placeholder="name">
            </div>
            <div>
                <label for="">Quantity</label>
                <input type="text" name="qyt" placeholder="Quantity">
            </div>
            <div>
                <label for="">Price</label>
                <input type="text" name="price" placeholder="price">
            </div>
            <div>
                <label for="">Description</label>
                <input type="text" name="description" placeholder="Description">
            </div>
            <div>
                <input type="submit" value="Save a new product"/>
            </div>
            


        </form>
    </body>
</html>