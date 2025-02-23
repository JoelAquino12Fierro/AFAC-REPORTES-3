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

    <div class="background">
        <img src="{{ asset('img/fondo.png') }}" alt="Fondo">
    </div>
    <div class="container">
        <header>
            <div class="header-right">
                <table>
                    <tr>
                        <td rowspan="5">

                            <img src="{{ asset('img/AFAC_color.png') }}" class="logo">

                        </td>
                        <td rowspan="4">
                            <p> <strong>AGENCIA FEDERAL DE AVIACIÓN CIVIL</strong></p>
                            <p>
                                DEPARTAMENTO DE TECNOLOGÍA INFORMÁTICA Y ATENCIÓN A USUARIOS
                                DIRECCIÓN DE DESARROLLO ESTRATÉGICO
                            </p>
                        </td>
                        <td>Hoja</td>
                        <td>1 de 1</td>
                    </tr>
                    <tr>
                        <td>Proceso</td>
                        <td>ADP</td>
                    </tr>
                    <tr>
                        <td>Versión plantilla</td>
                        <td>0.1</td>
                    </tr>
                    <tr>
                        <td>fecha plantilla</td>
                        <td>{{ $fecha_aplication }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>SOLICITUDES DE ATENCIÓN</strong></td>
                        <td>DDE-DTIyARS F01</td>
                    </tr>
                </table>
            </div>
        </header>
        <div class="folio">
            <h4 class="azul">Folio: {{ $folio }}</h4>
        </div>
        <section class="info">
            <table>
                <tr>
                    <td>
                        <strong class="azul">Área: </strong>
                        <br>
                        <p> {{ $area }} </p>
                    </td>
                    

                    @foreach ($system as $sys)
                    <td>
                        <strong class="azul">Sistema:</strong>
                        <br>
                        <p> {{ $sys->systems_name }} </p>
                    </td>
                    @endforeach
                    @foreach ($type as $typ)
                    <td>
                        <strong class="azul">Tipo de reporte:</strong>
                        <br>
                        <p>{{ $typ->name_types_reports }}</p>
                    </td>
                    @endforeach
                </tr>
                <tr>
                    <td>
                        <strong class="azul">Fecha de entrega:</strong>
                        <p>{{ $report_date }}</p>
                    </td>

                    <td>
                        <strong class="azul">Usuario que Genera el Reporte:</strong>
                        <br>

                        <p>{{ $user }}</p>

                    </td>

                    <td></td>
                </tr>

                <tr>
                    <td colspan="3">
                        <strong class="azul"> Descripción de la solicitud: </strong>
                        <p class="mayusuculas">
                            {{ $description }}
                        </p>


                    </td>
                </tr>
            </table>
        </section>
        <section class="solicitud">
            <table>
                <tr>
                    <th colspan="2"><strong>SOLICITUD</strong></th>
                </tr>
                <tr>
                    <td class="negritas">Módulo</td>
                    <td class="negritas">Descripción</td>
                </tr>
                <tr>

                    @foreach ($module as $modu)
                    <td class="modulo">{{ $modu->modules_name }}</td>
                    @endforeach

                    <td class="mayusculas">
                        {{ $descriptionA }}
                        <br>
                        @if (!empty($img) && file_exists(public_path($img)))
                        <img class="evidence" src="{{ asset($img) }}" style="max-width: 500px; height: auto;">
                        @endif

                        <br>
                        @endif

                    </td>

                </tr>
            </table>
        </section>
        <section class="usuarios">
            <table>
                <tr>
                    <th colspan="4" class="u"><strong>USUARIOS RESPONSABLES</strong></th>
                </tr>

                <tr>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Observaciones</th>
                </tr>
                @foreach ($name as $na)
                <tr>
                    <td class="mayusculas">
                        {{ $na->name . ' ' . $na->p . ' ' . $na->m }}
                    </td>

                    <td class="mayusculas">
                        {{ $na->area }}
                    </td>
                    <td class="mayusculas">
                        {{ $na->position }}
                    </td>
                    <td></td>
                </tr>
                @endforeach
            </table>
        </section>
    </div>
</body>

</html>