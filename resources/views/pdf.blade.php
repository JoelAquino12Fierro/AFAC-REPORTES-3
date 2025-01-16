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
            <!-- <div class="header-left">
                <h2>AGENCIA FEDERAL DE AVIACIÓN CIVIL</h2>
                <p>DIRECCIÓN DE DESARROLLO ESTRATÉGICO</p>
                <p>DEPARTAMENTO DE TECNOLOGÍA INFORMÁTICA Y ATENCIÓN A USUARIOS</p>
                <h3>SOLICITUDES DE ATENCIÓN</h3>
            </div> -->
            <div class="header-right">
                <table>
                    <!-- <tr>
                        <td>
                            <img src="{{ public_path('img/AFAC_color.png') }}" alt="" class="logo">
                            {{-- Logo AFAC --}}
                        </td>
                    </tr> -->
                    <tr>
                    <td>
                            <img src="{{ public_path('img/AFAC_color.png') }}" alt="" class="logo">
                            {{-- Logo AFAC --}}
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
                        <td>26/07/2024</td>
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
                    <td>UTIC</td>
                    <td><strong>Sistema:</strong></td>
                    <td>Sistema de Citas SICT</td>
                </tr>
                <tr>
                    <td><strong>Tipo de reporte:</strong></td>
                    <td colspan="3">Solicitud</td>
                </tr>
                <tr>
                    <td><strong>Fecha de entrega:</strong></td>
                    <td>19/10/2024</td>
                    <td><strong>Usuario que Genera el Reporte:</strong></td>
                    <td>Oscar Manuel Cornelio Vazquez</td>
                </tr>
            </table>
        </section>
        <section class="descripcion">
            <h4>Descripción de la solicitud:</h4>
            <p>
                Se solicita el apoyo con la corrección del siguiente dato, en la plataforma de citas, a continuación detallado.
            </p>
            <p>
                Se concluyó con error el trámite del usuario Rolando Manuel Sanchez Díaz, ya que dice "Atendido Apto" y DEBE DECIR "ATENDIDO NO APTO".
            </p>
        </section>
        <section class="solicitud">
            <h4>SOLICITUD</h4>
            <table>
                <tr>
                    <th>Módulo</th>
                    <th>Descripción</th>
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
            <h4>USUARIOS RESPONSABLES</h4>
            <table>
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
