<main class="main">

    <div class="login-aluno">
        <h1>GESTOR</h1>
        <form action="login_gestor_verifica" method="post">
            <!-- @csrf -->
            <div class="campo-ra">
                <input class="input-campo-aluno" type="password" name="user-gestor" placeholder="SENHA" required>
            </div>

            <input type="submit" value="ENVIAR">
        </form>
        <br><br>
        <a class="Botao-voltar-lobby" href="ADM">Voltar</a>
    </div>

</main>