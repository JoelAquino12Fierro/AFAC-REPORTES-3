<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
    <style>
        body {
            background-image: url('file://$fondo'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>


<body>

    <div class="watermark">
        <img src="{{ public_path('img/fondo.png') }}" alt="Marca de Agua">
    </div>
    <div class="container">
        <header>
            <div class="header-right">
                <table>
                    <tr>
                        <td rowspan="5">
                            <img src="{{ public_path('img/AFAC_color.png') }}" alt="" class="logo">
                            {{-- Logo AFAC --}}
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
                    @foreach ($area as $area)
                        <td>
                            <strong class="azul">Área: </strong>
                            <br>
                            <p> {{ $area->areas_name }} </p>
                        </td>
                    @endforeach

                    @foreach ($system as $system)
                        <td>
                            <strong class="azul">Sistema:</strong>
                            <br>
                            <p> {{ $system->systems_name }} </p>
                        </td>
                    @endforeach
                    @foreach ($type as $type)
                        <td>
                            <strong class="azul">Tipo de reporte:</strong>
                            <br>
                            <p>{{ $type->name_types_reports }}</p>
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
                        {{-- @foreach ($user as $user) --}}
                        <p>{{ $user }}</p>
                        {{-- @endforeach --}}
                    </td>

                    <td></td>
                </tr>
                {{-- <tr>
                    <td>19/10/2024</td>
                    <td>Oscar Manuel Cornelio Vazquez</td>
                    <td></td>
                </tr> --}}
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

                    @foreach ($module as $module)
                        <td class="modulo">{{ $module->modules_name }}</td>
                    @endforeach

                    <td class="mayusculas">
                        {{ $descriptionA }}
                        <br>
                        <img class="evidence" src="{{public_path($img)}}" >
                        {{-- src="{{ public_path('img/fondo.png') }}" --}}
                    </td>

                </tr>
            </table>
        </section>
        <section class="usuarios">
            <table>
                <tr>
                    <th colspan="4" class="u"><strong>USUARIOS RESPONSABLES</strong></th>
                </tr>
                {{-- <tr>
                    <th  colspan="4">
                        <strong>USUARIOS RESPONSABLES</strong>
                    </th>
                </tr> --}}
                <tr>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Observaciones</th>
                </tr>
                @foreach ($name as $name)
                    <tr>

                        <td class="mayusculas">
                            {{-- @foreach ($name as $name) --}}
                            {{ $name->name . ' ' . $name->p . ' ' . $name->m }}
                            {{-- <p>{{ $usuario->nombre . ' ' . $usuario->apellido }}</p> --}}
                            {{-- @endforeach --}}
                        </td>

                        <td class="mayusculas">
                            {{-- @foreach ($dep as $dep)
                        {{ $dep->areas_name }}
                        @endforeach --}}
                            {{ $name->area }}
                        </td>
                        <td class="mayusculas">
                            {{ $name->position }}
                        </td>
                        <td></td>

                    </tr>
                @endforeach
            </table>
        </section>
    </div>
</body>

</html>
