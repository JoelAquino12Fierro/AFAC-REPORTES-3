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






    <div class="divFolio">
        <h2 class="folio"> Folio: </h2>
    </div>
    <table>
        <thead>
            <tr>
                {{-- <div class="area"> --}}
                <th>
                    Área:
                </th>
                {{-- </div> --}}

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
    <div class="divSolicitud">
        <h2 class="solicitud">
            SOLICITUD
        </h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>
                    Módulo
                </th>
                <th>
                    Descripción
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

            </tr>

        </tbody>
    </table>
    <div class="divUsuarios">
        <p class="usuarios">USUARIOS RESPONSABLES</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Departamentod</th>
                <th>Cargo</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jorge Alberto Mondragón Escamilla</td>
                <td>Desarrollo Estratégico</td>
                <td>Insepector B</td>
                <td> </td>
            </tr>
        </tbody>
    </table>



</body>

</html>
