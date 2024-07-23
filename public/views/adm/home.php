<main class="main-home">
    <section class="gestor-main">
        <div class="menu-lateral-gestor">

            <details class="details-menu-gestor">
                <summary class="sumary-menu-gestor">Alunos</summary>
                <button class="button-details-menu-gestor" onclick="mostrarConteudo('alunos')">Alunos</button>
                <button class="button-details-menu-gestor" onclick="mostrarConteudo('provas')">Provas</button>
                <button class="button-details-menu-gestor" onclick="mostrarConteudo('AddAluno')">Adicionar
                    Aluno</button>
            </details>

            <details class="details-menu-gestor">
                <summary class="sumary-menu-gestor">Materias</summary>
                <button class="button-details-menu-gestor" onclick="mostrarConteudo('materia')">Materia</button>
                <button class="button-details-menu-gestor" onclick="mostrarConteudo('adicionarMateria')">Adicionar
                    Materia</button>
            </details>

            <details class="details-menu-gestor">
                <summary class="sumary-menu-gestor">Professor</summary>
                <button class="button-details-menu-gestor" onclick="mostrarConteudo('adicionarProfessor')">Adicionar
                    Professor</button>
                <button class="button-details-menu-gestor" onclick="mostrarConteudo('verProfessores')">Ver
                    Professores</button>
            </details>

            <details class="details-menu-gestor">
                <summary class="sumary-menu-gestor">Turmas</summary>
                <button class="button-details-menu-gestor" onclick="mostrarConteudo('adicionarTurma')">Adicionar
                    Turma</button>
                <button class="button-details-menu-gestor" onclick="mostrarConteudo('verTurmas')">Ver Turmas</button>
            </details>
        </div>

        <div class="info-gestor">
            <div id="conteudo">
                <div class="painel-frontal-gestor conteudo-item active">
                    <img src="https://telegra.ph/file/14ab586a79f8002b24880.png" alt="IMAGEM BRAZÃO">
                    <h1>PAINEL GESTOR</h1>
                </div>

                <div id="AddAluno" class="conteudo-item">
                    <form action="adicionar_aluno" method="post" class="form-adicionar-aluno">
                        <h1>Adicionar Aluno</h1>
                        <div class="input-group-adicionar-aluno">
                            <h3>RA</h3>
                            <input type="text" name="ra" id="adicionarRA" placeholder="RA" required>
                        </div>
                        <div class="input-group-adicionar-aluno">
                            <h3>NOME DO ALUNO</h3>
                            <input type="text" name="nome" id="adicionarNome" placeholder="Nome" required>
                        </div>
                        <div class="input-group-adicionar-aluno">
                            <h3>DATA DE NASCIMENTO</h3>
                            <input type="date" name="data_nasc" id="adicionarDataNasc" placeholder="Data de Nascimento"
                               >
                        </div>
                        <h3>TURMA:</h3>
                        <div class="radio-group">
                            <?php foreach ($data["turmas"]["turmas"] as $turma) {?>
                            <input type="radio" id="turma_add_<?=$turma["nome"]?>" name="turma_adicionar" required value="<?=$turma["nome"]?>">
                            <label for="turma_add_<?=$turma["nome"]?>"><?=$turma["nome"]?></label>
                            <?php }?>
                        </div>
                        <h3>TURNO:</h3>
                        <div class="radio-group">
                            <?php foreach ($data["turnos"] as $turnos) {?>
                            <input type="radio" id="turno_add_<?=$turnos?>" name="turno_adicionar" required value="<?=$turnos?>">
                            <label for="turno_add_<?=$turnos?>"><?=$turnos?></label>
                            <?php }?>
                        </div>
                        <br><br>
                        <center>
                        <button type="submit" class="btn-salvar-adicionar-aluno">Salvar</button>
                        </center>
                        <br><br><br><br><br><br><br><br><br>
                        </form>
                </div>


                <div id="alunos" class="conteudo-item">
                <center>
                    <h1>ALUNOS</h1>
                </center>
                <div id="filtro-container-alunos" class="filtro-container">
                <input type="text" id="filtroRAAlunos" class="filtro-ra" placeholder="Filtrar por RA" oninput="filtrarTabela('tabelaAlunos', 'filtroRAAlunos', 'filtroNomeAlunos')">
                <input type="text" id="filtroNomeAlunos" class="filtro-nome" placeholder="Filtrar por Nome" oninput="filtrarTabela('tabelaAlunos', 'filtroRAAlunos', 'filtroNomeAlunos')">
    </div>
                    <table id="tabelaAlunos" class="tabela_alunos_adm">

                        <thead>
                            <tr>
                                <th>RA</th>
                                <th>ALUNO</th>
                                <th>TURMA</th>
                                <th>EDITAR</th>
                                <th>EXCLUIR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data["alunos"]["alunos"] as $aluno) {?>
                            <tr>
                                <td><?=$aluno["ra"]?></td>
                                <td><?=$aluno["nome"]?></td>
                                <td><?=$aluno["turma"]?></td>
                                <td><button class="btn-editar"
                                        onclick="editarAluno('<?=$aluno["ra"]?>', '<?=$aluno["nome"]?>', '<?=$aluno["turma"]?>', '<?=$aluno["turno"]?>', '<?=$aluno["data_nasc"]?>')">EDITAR</button>
                                </td>
                                <td> <button class="btn-excluir">EXCLUIR</button> </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <div id="formEditar" class="form-editar">
                        <form action="editar_dados_aluno" method="post">
                            <h1>EDITAR DADOS DO ALUNO</h1>
                            <div class="input-group">
                                <h3>RA</h3>
                                <input type="text" style="background-color: #BCBCBC;" name="ra" readonly id="editarRA"
                                    placeholder="RA">
                            </div>
                            <div class="input-group">
                                <h3>NOME DO ALUNO</h3>
                                <input type="text" name="nome" id="editarNome" placeholder="Nome">
                            </div>
                            <div class="input-group">
                                <h3>DATA DE NASCIMENTO</h3>
                                <input type="text" id="data" name="data" placeholder="Data de Nascimento">
                            </div>
                            <h3>TURMA:</h3>
                            <div class="radio-group">
                                <?php foreach ($data["turmas"]["turmas"] as $turma) {?>
                                <input type="radio" id="turma_<?=$turma["nome"]?>" name="turma"
                                    value="<?=$turma["nome"]?>">
                                <label for="turma_<?=$turma["nome"]?>"><?=$turma["nome"]?></label>
                                <?php }?>
                            </div>
                            <h3>TURNO:</h3>
                            <div class="radio-group">
                                <?php foreach ($data["turnos"] as $turnos) {?>
                                <input type="radio" id="turno_<?=$turnos?>" name="turno" value="<?=$turnos?>">
                                <label for="turno_<?=$turnos?>"><?=$turnos?></label>
                                <?php }?>
                            </div>
                            <button type="submit" class="btn-editar">Salvar</button>
                            <button type="button" class="btn-excluir" onclick="cancelarEdicao()">Cancelar</button>
                            <br><br><br><br><br><br><br><br><br>
                        </form>
                    </div>
                </div>

                <div id="provas" class="conteudo-item">
                    <center>
                    <h1>PROVAS FEITAS</h1>
                    </center>
                    <div id="filtro-container-provas" class="filtro-container">
        <input type="text" id="filtroRAProvas" class="filtro-ra" placeholder="Filtrar por RA" oninput="filtrarTabela('tabelaProvas', 'filtroRAProvas', 'filtroNomeProvas')">
        <input type="text" id="filtroNomeProvas" class="filtro-nome" placeholder="Filtrar por Nome" oninput="filtrarTabela('tabelaProvas', 'filtroRAProvas', 'filtroNomeProvas')">
    </div>
                    <table id="tabelaProvas" class="tabela_alunos_adm">
                        <thead>
                            <tr>
                                <th>RA</th>
                                <th>ALUNO</th>
                                <th>TURMA</th>
                                <th>DISCIPLINA</th>
                                <th>PONTOS</th>
                                <th>EDITAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data["alunos"]["provas_feitas"] as $aluno) {?>
                            <tr>
                                <td><?=$aluno["ra"]?></td>
                                <td><?=$aluno["aluno"]?></td>
                                <td><?=$aluno["turma"]?></td>
                                <td><?=$aluno["disciplina"]?></td>
                                <td><?=$aluno["pontos_aluno"]?></td>
                                <td><button class="btn-editar">EDITAR</button>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
</main>