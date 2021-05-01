<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Listado de Contactos</title>
        <style>
            table {
                width: 100%;
                border: 1px solid #000;
            }

            th {
                background-color: #000;
                color: #fff;
                font-size: 18px;
            }
            
            th, td {
                width: 25%;
                text-align: center;
                vertical-align: top;
                border: 1px solid #000;
                border-collapse: collapse;
            }

            td {
                padding: 0.5em;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>Listado de Contactos</h1>
            <table>
                <tr>
                    <th>Nombre completo</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Puesto</th>
                </tr>
                @foreach ($contactos as $contacto)
                    <tr>
                        <td>{{ $contacto->name.' '.$contacto->username }}</td>
                        <td>{{ $contacto->email }}</td>
                        <td>{{ $contacto->address }}</td>
                        <td>{{ $contacto->cellphone }}</td>
                        <td>{{ $contacto->job_title }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>