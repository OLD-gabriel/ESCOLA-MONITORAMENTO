<?php

namespace app\models\monitoramento;

use app\config\Database;
use PDO;

class ADModel
{

    public static function EditarAluno($dados)
    {
        $sql = "UPDATE alunos SET nome = :nome, turno = :turno, data_nasc = :data_nasc, turma = :turma WHERE ra = :ra";

        $query = Database::GetInstance()->prepare($sql);
        $query->bindParam(':ra', $dados['ra']);
        $query->bindParam(':nome', $dados['nome']);
        $query->bindParam(':turno', $dados['turno']);
        $query->bindParam(':data_nasc', $dados['data_nasc']);
        $query->bindParam(':turma', $dados['turma']);
        $query->execute();
        return $query;
    }

    public static function EditarProfessor($dados)
    {
        $sql = "UPDATE professores SET nome = :nome, usuario = :usuario, senha = :senha, numero = :numero, disciplinas = :disciplinas WHERE id = :id";

        $query = Database::GetInstance()->prepare($sql);
        $query->bindParam(':id', $dados['id']);
        $query->bindParam(':nome', $dados['nome']);
        $query->bindParam(':usuario', $dados['usuario']);
        $query->bindParam(':senha', $dados['senha']);
        $query->bindParam(':numero', $dados['numero']);
        $query->bindParam(':disciplinas', $dados['disciplinas']);
        $query->execute();
        return $query;
    }

    public static function AdicionarProfessor($dados)
    {
        $sql = "INSERT INTO professores (nome, usuario, senha, numero, disciplinas)
                VALUES (:nome, :usuario, :senha, :numero, :disciplinas)";

        $query = Database::GetInstance()->prepare($sql);
        $query->bindParam(':nome', $dados['nome']);
        $query->bindParam(':usuario', $dados['usuario']);
        $query->bindParam(':senha', $dados['senha']);
        $query->bindParam(':numero', $dados['numero']);
        $query->bindParam(':disciplinas', $dados['disciplinas']);
        $query->execute();
        return $query;
    }

    public static function AdicionarAluno($dados)
    {
        $sql = "INSERT INTO alunos (ra, nome, turno, data_nasc, turma)
                    VALUES (:ra, :nome, :turno, :data_nasc, :turma)";

        $query = Database::GetInstance()->prepare($sql);
        $query->bindParam(':ra', $dados['ra']);
        $query->bindParam(':nome', $dados['nome']);
        $query->bindParam(':turno', $dados['turno']);
        $query->bindParam(':data_nasc', $dados['data_nasc']);
        $query->bindParam(':turma', $dados['turma']);
        $query->execute();
        return $query;
    }

    public static function AdicionarDisciplina($nomeDisciplina)
    {
        $sql = "INSERT INTO disciplinas (nome) VALUES (:nome)";

        $query = Database::GetInstance()->prepare($sql);
        $query->bindParam(':nome', $nomeDisciplina);
        $query->execute();
        return $query;
    }

    public static function ExcluirProfessor($id)
    {
        $sql = "DELETE FROM professores WHERE id = :id";

        $query = Database::GetInstance()->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        return $query;
    }

    public static function ExcluirDisciplina($idDisciplina)
    {
        $sql = "DELETE FROM disciplinas WHERE id = :id";

        $query = Database::GetInstance()->prepare($sql);
        $query->bindParam(':id', $idDisciplina);
        $query->execute();
        return $query;
    }

    public static function GetMaterias()
    {
        $sql = "SELECT * FROM disciplinas";
        $query = Database::GetInstance()->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetProfessores()
    {
        $sql = "SELECT * FROM professores ORDER BY nome ASC ";
        $query = Database::GetInstance()->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetTurmas()
    {
        $sql = "SELECT * FROM turmas ORDER BY nome ASC ";
        $query = Database::GetInstance()->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetDisciplinas()
    {
        $sql = "SELECT * FROM disciplinas ORDER BY id DESC ";
        $query = Database::GetInstance()->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
