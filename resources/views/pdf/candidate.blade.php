<!DOCTYPE html>
<html>
<head>
    <title>Informações do Candidato</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
            color: #333;
        }
        h1, h2, h3 {
            color: #333;
            text-align: center;
        }
        p {
            font-size: 14px;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-section table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-section table, .info-section th, .info-section td {
            border: 1px solid #ccc;
        }
        .info-section th, .info-section td {
            padding: 10px;
            text-align: left;
        }
        .info-section th {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="info-section">
        <h2>Dados Pessoais</h2>
        <table>
            <tr>
                <th>Nome</th>
                <td>{{ $candidate->name }}</td>
            </tr>
            <tr>
                <th>Idade</th>
                <td>{{ \Carbon\Carbon::parse($candidate->nascimento)->age }} anos</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $candidate->email }}</td>
            </tr>
            <tr>
                <th>Celular</th>
                <td>{{ $candidate->celular }}</td>
            </tr>
        </table>
    </div>

    @if($candidate->faculdade)
        <div class="info-section">
            <h2>Educação</h2>
            <table>
                <tr>
                    <th>Faculdade</th>
                    <td>{{ $candidate->faculdade }}</td>
                </tr>
                <tr>
                    <th>Início da Faculdade</th>
                    <td>{{ \Carbon\Carbon::parse($candidate->inicio_faculdade)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Fim da Faculdade</th>
                    <td>{{ $candidate->fim_faculdade ? \Carbon\Carbon::parse($candidate->fim_faculdade)->format('d/m/Y') : 'Ainda cursando' }}</td>
                </tr>
            </table>
        </div>
    @endif

    @if($candidate->empresa_contratante)
        <div class="info-section">
            <h2>Experiência Profissional</h2>
            <table>
                <tr>
                    <th>Empresa Contratante</th>
                    <td>{{ $candidate->empresa_contratante }}</td>
                </tr>
                <tr>
                    <th>Data de Contratação</th>
                    <td>{{ \Carbon\Carbon::parse($candidate->dia_contratacao)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Tempo de Serviço</th>
                    <td>{{ $formattedDiff }}</td>
                </tr>
                <tr>
                    <th>Profissão</th>
                    <td>{{ $candidate->profissao }}</td>
                </tr>
            </table>
        </div>
    @elseif($candidate->profissao)
        <div class="info-section">
            <h2>Trabalho Independente</h2>
            <p>Atualmente trabalha de maneira independente como {{ $candidate->profissao }}.</p>
        </div>
    @elseif($candidate->faculdade)
        <div class="info-section">
            <h2>Status Atual</h2>
            <p>Atualmente está a procura de emprego e focado em sua faculdade.</p>
        </div>
    @endif

    <div class="footer">
        <p>Relatório gerado em {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
    </div>
</body>
</html>
