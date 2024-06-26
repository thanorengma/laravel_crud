<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Product</h1>
        <div>
            @if(session()->has('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div>
            <a href="{{route('product.create')}}">create a product</a>
        </div>
        <div>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>QTY</th>
                    <th>PRICE</th>
                    <th>DESCRIPTION</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->qyt}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                            <a href="{{route('product.edit',['product' => $product])}}">EDIT</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('product.destroy', ['product' => $product])}}">
                                @csrf 
                                @method('delete')
                                <input type="submit" value='Delete' />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>