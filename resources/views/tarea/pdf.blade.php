<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .titulo{
            border: 1px;
            background-color:#c2c2c2;
            text-align: center;
            width: 100%;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .page-break {
            page-break-after: always;
        }

        .tabla{
            width: 100%;
        }

        table th{
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="titulo">Llegamos hasta Aqui</div>
    <table class="tabla">
        <thead>
            <tr>
                <th>ID</th>
                <th>TAREA</th>
                <th>FECHA LIMITE</th>
            </tr>
        </thead>
        <body>
            @foreach ($tareas as $tarea)
                <tr>
                    <td>{{$tarea->id}}</td>
                    <td>{{$tarea->tarea}}</td>
                    <td>{{date('d/m/Y',strtotime($tarea->fecha_limite))}}</td>
                </tr>
            @endforeach
        </body>
    </table>
    <div class="page-break"></div>
    <div class="titulo">Pagina 2</div>
</body>
</html>

