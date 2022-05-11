<!DOCTYPE html>

<head>
    <style>
        .content {
            max-width: 500px;
            margin: auto;
        }
    </style>
</head>

<html>

<body>
    <div class="content">
        <h1>Bibliófilo's</h1>

        <h2>Leitores</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $nome_leitor = 'nome_leitor';
        $idade = 'idade';
        $email = 'email';
        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $nome_leitor .
            '     , ' . $idade .
            '     , ' . $email .
            '  FROM leitores';
            /*TODO-2: Adicione cada variavel a consulta abaixo */


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $nome_leitor . '</th>' .
            '        <th>' . $idade . '</th>' .
            '        <th>' . $email . '</th>' .
            '    </tr>';
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {

                echo '<tr>';

                echo '<td>' . $registro[$nome_leitor] . '</td>' .
                    '<td>' . $registro[$idade] . '</td>' .
                    '<td>' . $registro[$email] . '</td>';
                    /* TODO-4: Adicione a tabela os novos registros. */

                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '';
        }
        FecharConexao($conexao);
        ?>
    </div>
</body>

</html>