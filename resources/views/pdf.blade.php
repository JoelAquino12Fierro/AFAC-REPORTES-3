<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
</head>


<body>
    {{-- Encabezado --}}
    <header>
        <table class="tablaHeader">
            <thead>
                <tr>
                    <th>
                        <img src="{{ public_path('img/AFAC_color.png') }}" alt="" class="logo">
                        {{-- Logo AFAC --}}
                    </th>
                    <th class="AFAC">
                        AGENCIA FEDERAL DE AVIACIÓN CIVIL
                        DIRECCIÓN DE DESARROLLO ESTRATÉGICO
                        DEPARTAMENTO DE TECNOLOGÍA INFORMÁTICA Y ATENCIÓN A USUARIOS</p>
                    </th>
                    <th>
                        <th>
                            Hoja
                        </th>
                        <th>
                            Proceso
                        </th>
                        <th>
                            Versión plantilla
                        </th>
                        <th>
                            Fecha plantilla
                        </th>
                    </th>
                </tr>
            </thead>
            <tbody>
                <td>

                </td>
                <td>
                    SOLICITUDES DE ATENCIÓN
                </td>
                <td>
                    <td>
                        1 de 1
                    </td>
                    <td>
                        ADP
                    </td>
                    <td>
                        1.0
                    </td>
                    <td>
                        26/07/2024
                    </td>
                    DDE-DTI
                </td>
            </tbody>
        </table>
    </header>

    <h2> Folio: </h2>

    {{-- Segunda Tabla --}}
    <table>
        <thead>
            <tr>
                <th>
                    Área:
                </th>
                <th>
                    Sistema:
                </th>
                <th>
                    Tipo de reporte:
                </th>
                <th>
                    Fecha de entrega:
                </th>
                <th>
                    Usuario que genera el reporte:
                </th>
                <th>
                    Descripción de la solicitud
                </th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    UTIC
                </td>
                <td>
                    Sistema de citas SICT
                </td>
                <td>
                    Incidencia
                    Falla
                    Solicitud
                </td>
                <td>
                    19/10/2024
                </td>
                <td>
                    Leslie Mendoza
                </td>
                <td>
                    Descripción de la solicitud
                </td>

            </tr>
        </tbody>

    </table>
    <h2>
       SOLICITUD 
    </h2>

    <table>
        <thead>
            <tr>
            <th>
                Módulo
            </th>
            <th>
                Descripción
            </th>
            <th>
                Usuarios responsables
            </th>
            <tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    CITAS AGENDADAS
                </td>
                <td>
                    Descripción
                </td>
                <td>
                    Nombre:
                    <br>
                    Departamento:
                    <br>
                    Cargo:
                    <br>
                    Observaciones:
                    <br>
                </td>
            </tr>

        </tbody>
    </table>



</body>

</html>
