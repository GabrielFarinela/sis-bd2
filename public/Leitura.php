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

        <h2>Leituraes</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $leitura_id_leitor = 'leitura.id_leitor';
        $leitura_id_livro = 'leitura.id_livro';
        $leitura_data_comeco = 'leitura.data_comeco';
        $leitura_data_final = 'leitura.data_final';
        $leitor_nota = 'leitor.nota';
        $leitor_cidade = 'leitor.cidade';
        $leitor_idade = 'leitor.idade';
        $livro_titulo = 'livro.titulo';
        $livro_autor = 'livro.autor';
        $livro_classificacao = 'livro.classificacao';
        $livro_editora = 'livro.editora';

        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $leitura_id_leitor .
            '     , ' . $leitura_id_livro .
            '     , ' . $leitura_data_comeco .
            '     , ' . $leitura_data_final .
            '     , ' . $leitor_nota .
            '     , ' . $leitor_cidade .
            '     , ' . $leitor_idade .
            '     , ' . $livro_autor .
            '     , ' . $livro_classificacao .
            '     , ' . $livro_editora .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '
            from leitura 
             inner join livro on leitura.id_livro = livro.id_livro 
             inner join leitura on leitura.id_leitura = leitura.id_leitura;
            ';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $leitura_id_leitor . '</th>' .
            '        <th>' . $id_livro . '</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '        <th>' . $data_comeco . '</th>' .
            '        <th>' . $data_final . '</th>' .
            '        <th>' . $nota . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {

                echo '<tr>';

                echo '<td>' . $registro[$leitura_id_leitor] . '</td>' .
                    '<td>' . $registro[$id_livro] . '</td>' .
                    /* TODO-4: Adicione a tabela os novos registros. */
                    '<td>' . $registro[$data_comeco] . '</td>'.
                    '<td>' . $registro[$data_final] . '</td>'.
                    '<td>' . $registro[$nota] . '</td>';

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