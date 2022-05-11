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

        <h2>Autores</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $nome_autor = 'nome_autor';
        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $nome_autor .
            '  FROM autor';
            /*TODO-2: Adicione cada variavel a consulta abaixo */


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $nome_autor . '</th>' .
            '    </tr>';
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            
        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {

                echo '<tr>';

                echo '<td>' . $registro[$nome_autor] . '</td>' ;
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