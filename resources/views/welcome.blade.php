<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Document</title>
</head>

<body>

    <div class="row">
        <div class="col">
            <table id="my-table" class="table align-middle caption-top table-striped">
                <caption>Tabela de <b>Alunos</b></caption>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOME</th>
                        <th scope="col">FOTO</th>
                        <th scope="col">ANO INGRESSO</th>
                        <th scope="col">NAPNE</th>
                        <th scope="col">CURSO</th>
                        <th scope="col">ACAO</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->foto }}</td>
                        <td>{{ $item->ano_ingresso }}</td>
                        <td>{{ $item->napne }}</td>
                        <td>{{ $item->curso->nome }}</td>

                        <td>
                            <a href="{{route('PDF',$item)}}" class="btn btn-primary">TESTE</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>


    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

</body>

</html>