<main class="main-home-aluno">
    <center>
        <h1><?=$data["nome_prova"]?></h1>

    <span><b>DISCIPLINA:</b> <?=$data["disciplina"]?></span><br><br>
    <span><b>PROFESSOR: </b><?=$data["nome_professor"]?></span><br><br>
    <span><b>VALOR: </b> <?=$data["valor"]?></span><br>
    <br><br><br>
    <div >
        <form id="gabaritoForm" action="" method="post">
            <table  class="tabela-alternativas-escolher">
                <?php
$contador = 1;
while ($contador <= $data["QNT_perguntas"]) {?>
                <tr>
                    <td >
                        <span><?php echo $contador ?></span>
                    </td>

                    <td>
                        <div class="Ds"><input type="radio" name="gabarito_questao_<?php echo "{$contador}" ?>" required
                            id="<?php echo "{$contador},A" ?>"    value="<?php echo "{$contador},A" ?>"><label for="<?php echo "{$contador},A" ?>">A</label></div>
                    </td>
                    <td>
                        <div class="Ds"><input type="radio" name="gabarito_questao_<?php echo "{$contador}" ?>" required
                        id="<?php echo "{$contador},B" ?>"    value="<?php echo "{$contador},B" ?>"><label for="<?php echo "{$contador},B" ?>">B</label></div>
                    </td>
                    <td>
                        <div class="Ds"><input type="radio" name="gabarito_questao_<?php echo "{$contador}" ?>" required
                        id="<?php echo "{$contador},C" ?>"    value="<?php echo "{$contador},C" ?>"><label for="<?php echo "{$contador},C" ?>">C</label></div>
                    </td>
                    <td>
                        <div class="Ds"><input type="radio" name="gabarito_questao_<?php echo "{$contador}" ?>" required
                        id="<?php echo "{$contador},D" ?>"    value="<?php echo "{$contador},D" ?>"><label for="<?php echo "{$contador},D" ?>">D</label></div>
                    </td>
                </tr>
                <?php
$contador++;}
?>
            </table>
            <br><br><br>
            <div>
                <center>
                    <h3>ANALISE TODAS AS RESPOSTAS ANTES <br> DE CLICAR NO BOTÃO ABAIXO!</h3>
                </center>
                <br>
            </div>
            <center>
                <div id="div_carregamento" class="hidden">
                    <div class="loader2"></div><br><br>
                    <div class="loader3"></div>

                </div>

                    <button  id="button_enviar_gabarito" onclick="MostrarCarregamento()"  type="submit" name="enviar_gabarito_aluno" class="botao-form-enviar">Enviar Gabarito</button>
            </center>

        </form>


    </div>
    <div>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
    </div>
    </center>
    </main>

