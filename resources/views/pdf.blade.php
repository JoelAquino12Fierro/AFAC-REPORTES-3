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
                        <td>26/07/2024</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>SOLICITUDES DE ATENCIÓN</strong></td>
                        <td>DDE-DTIyARS F01</td>
                    </tr>
                </table>
            </div>
        </header>
        <div class="folio">
            <h4>Folio: DTIARS-0108</h4>
        </div>
        <section class="info">
            <table>
                <tr>
                    <td><strong>Área:</strong></td>
                    <td><strong>Sistema:</strong></td>
                    <td><strong>Tipo de reporte:</strong></td>
                </tr>
                <tr>
                    <td><strong>Fecha de entrega:</strong></td>
                    <td><strong>Usuario que Genera el Reporte:</strong></td>
                    <td>Solicitud</td>
                </tr>
                <tr>
                    <td>19/10/2024</td>
                    <td>Oscar Manuel Cornelio Vazquez</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3"> 
                        Descripción de la solicitud:
                        <p>
                            Se solicita el apoyo con la corrección del siguiente dato, en la plataforma de citas, a continuación detallado.
                            Se concluyó con error el trámite del usuario Rolando Manuel Sanchez Díaz, ya que dice "Atendido Apto" y DEBE DECIR "ATENDIDO NO APTO".
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
                    <td>Módulo</td>
                    <td>Descripción</td>
                </tr>
                <tr>
                    <td>CITAS AGENDADAS</td>
                    <td>
                        ROLANDO MANUEL SANCHEZ DIAZ<br>
                        CURP: SADRB60326HCNSNL07<br>
                        ANTES: ATENDIDO APTO<br>
                        ACTUALIZACIÓN: ATENDIDO NO APTO
                    </td>
                </tr>
            </table>
        </section>
        <section class="usuarios">
            <table>
                <tr>
                    <th colspan="4">
                        <h4>USUARIOS RESPONSABLES</h4>
                    </th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Observaciones</th>
                </tr>
                <tr>
                    <td>JUAREZ JESSICA</td>
                    <td>JEFA DE DEPARTAMENTO</td>
                    <td>JEFA DE DEPARTAMENTO</td>
                    <td></td>
                </tr>
                <tr>
                    <td>ANGEL CAMEZCO</td>
                    <td>DESARROLLO</td>
                    <td>INSPECTOR B</td>
                    <td></td>
                </tr>
                <tr>
                    <td>MANUEL ORTEGA</td>
                    <td>SISTEMAS</td>
                    <td>INSPECTOR B</td>
                    <td></td>
                </tr>
            </table>
        </section>
    </div>
</body>
</html>
