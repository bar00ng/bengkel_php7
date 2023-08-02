<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/route-tes" method="post">
        @csrf
        <button type="submit">Masuk</button>
    </form>

    <hr>

    <form action="/delete-tes/1" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">delet`</button>
    </form>

    <hr>

    @foreach($data_tes as $data)
        {{ 'Umur : ' . $data->umur }}
        {{ 'Nama : ' . $data->nama }}
        {{ 'Alamat : ' . $data->alamat }}
    @endforeach
</body>
</html>