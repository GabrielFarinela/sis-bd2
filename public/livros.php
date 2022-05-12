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

        <h2>Livros</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $titulo_livro = 'titulo_livro';
        $editora = 'editora';
        $data_lancamento = 'data_lancamento';
        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $titulo_livro .
            '     , ' . $editora .
            '     , ' . $data_lancamento .
            '  FROM livros';
            /*TODO-2: Adicione cada variavel a consulta abaixo */


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $titulo_livro . '</th>' .
            '        <th>' . $editora . '</th>' .
            '        <th>' . $data_lancamento . '</th>' .
            '    </tr>';
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            
        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {

                echo '<tr>';

                echo '<td>' . $registro[$titulo_livro] . '</td>' .
                    '<td>' . $registro[$editora] . '</td>' .
                    '<td>' . $registro[$data_lancamento] . '</td>';
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