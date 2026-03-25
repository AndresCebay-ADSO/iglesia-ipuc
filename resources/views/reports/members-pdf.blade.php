<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Miembros - IPUC</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 10px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #1e3a8a;
            padding-bottom: 10px;
        }
        .church-search {
            font-size: 18px;
            font-weight: bold;
            color: #1e3a8a;
            margin-bottom: 5px;
        }
        .report-title {
            font-size: 14px;
            color: #4b5563;
        }
        .date {
            font-size: 9px;
            color: #6b7280;
            margin-top: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th {
            background-color: #f3f4f6;
            color: #111827;
            font-weight: bold;
            text-align: left;
            padding: 8px 4px;
            border-bottom: 1px solid #d1d5db;
        }
        td {
            padding: 6px 4px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }
        .status-active {
            color: #065f46;
            font-weight: bold;
        }
        .status-inactive {
            color: #991b1b;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-weight: bold;
            font-size: 12px;
            border-top: 1px solid #d1d5db;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="church-search">IPUC - Avenida Libertadores</div>
        <div class="report-title">Lista de Miembros</div>
        <div class="date">Generado el: {{ date('d/m/Y H:i:s') }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 25%;">Nombre</th>
                <th style="width: 12%;">Documento</th>
                <th style="width: 6%;">Edad</th>
                <th style="width: 10%;">Género</th>
                <th style="width: 15%;">Ministerio</th>
                <th style="width: 22%;">Rol</th>
                <th style="width: 10%;">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->fullname }}</td>
                    <td>{{ $member->document_id }}</td>
                    <td>{{ $member->age }}</td>
                    <td style="text-transform: capitalize;">{{ $member->gender }}</td>
                    <td>{{ $member->formatted_ministry }}</td>
                    <td>{{ $member->formatted_church_role }}</td>
                    <td>
                        <span class="{{ $member->status == 'activo' ? 'status-active' : 'status-inactive' }}">
                            {{ ucfirst($member->status) }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Total de Miembros: {{ count($members) }}
    </div>
</body>
</html>
