<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>User ID:</td>
                <td><input type="text" name="user_id" value=""></td>
            </tr>
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" value=""></td>
            </tr>
            <tr>
                <td>Content:</td>
                <td><input type="text" name="body" value=""></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

<!-- <div>
    <div class="content">
        <h1>Here's a list of available products</h1>
        <table>
            <thead>
                <td>Name</td>
                <td>Description</td>
                <td>Count</td>
                <td>Price</td>
                </thead>
            <tbody>
                @foreach ($allProducts as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td class="inner-table">{{ $product->description }}</td>
                        <td class="inner-table">{{ $product->count }}</td>
                        <td class="inner-table">{{ $product->price }}</td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
</div> -->