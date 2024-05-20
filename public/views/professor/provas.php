<main class="main-home-professor " >
    <center>

<h1 class="titulo-NSL">NSL - SISTEMA DE MONITORAMENTO</h1>
        <h2>PROVAS - <?= $_SESSION["nome_professor"]?></h2>
    </center>
<br>
<?php
$status = false;
foreach($data["provas"] as $prova){ 
    $contador = 0;
    if($data["provas_alunos"] != null){ 
    
    foreach($data["provas_alunos"] as $P_aluno){
        if($P_aluno["id_prova"] == $prova["id"]){
            $contador++;
        }
    }
}

    if($data["provas_alunos"] != null){ 
        foreach($data["provas_alunos"] as $prova_aluno){
            if($prova_aluno["id_prova"] == $prova["id"]){
                $status = true;
            }
        }
    }
    
    ?>


<div class="prova-pendente">
                    <div class="linha-vertical-campo-prova" style="background-color: #04C636;" ></div>
                    <div class="conteudo-prova">
                        <i class="fas fa-file-alt fa-4x" style="color: #04C636;"></i>

                        <div class="prova-detalhes">
                            <center>

                            <span class="prova-nome-disciplina">
                            <?= $prova["nome_prova"] ?>
                            </span> <br>
                            <span class="prova-nome-disciplina">
                            <?= $prova["data_prova"] ?>
                            </span> <br>
                            <span class="prova-nome-professor">
                                <?= $contador ?> aluno(s) Fizeram a prova.
                            </span>
                            </center>
                        </div>
  

                        <?php if($status == true){?>
                <form method="post" action="prova">
                            <button type="submit" value="<?= $prova['id'] ?>" name="id-prova" class="botao-form-enviar">Ver</button>
                </form>
                <?php }else{?>
                    <button class="botao-form-enviar">SEM DADOS</button>
                <?php }?>
                    </div>
                </div><br>

<?php }?>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

</main>