<?php

    class Usuario{

        private $conn;
        private $table = 'usuarios';

        private $name;
        private $email;
        private $password;
        private $profile_image;

        function __construct($db)
        {
            $this->conn = $db;
        }

        function storeOrUpdateRememberToken($userId, $token){
            if (!$this->conn) {
                echo "Erro na conexão com o banco de dados.";
                return null;
            }

            // Primeiro, verifique se o usuário já tem um token armazenado
            $existingToken = $this->getRememberToken($userId);

            if ($existingToken) {
                // Se já existe um token, atualize-o
                $query = 'UPDATE remember_tokens SET remember_token = :remember_token WHERE id_usuario = :id_usuario';
        
                $stmt = $this->conn->prepare($query);
                $stmt->bindValue(':id_usuario', $userId, PDO::PARAM_INT);
                $stmt->bindValue(':remember_token', $token, PDO::PARAM_STR);
        
                if ($stmt->execute()) {
                    return true; // Token atualizado com sucesso
                } else {
                    echo "Erro ao atualizar o token: " . $stmt->error;
                    return false;
                }
            } else {
                // Se não existe um token, insira um novo
                $query = 'INSERT INTO remember_tokens (id_usuario, remember_token) VALUES (:id_usuario, :remember_token)';
        
                $stmt = $this->conn->prepare($query);
                $stmt->bindValue(':id_usuario', $userId, PDO::PARAM_INT);
                $stmt->bindValue(':remember_token', $token, PDO::PARAM_STR);
        
                if ($stmt->execute()) {
                    return true; // Token armazenado com sucesso
                } else {
                    echo "Erro ao armazenar o token: " . $stmt->error;
                    return false;
                }
            }
        }

        function getRememberToken($id){
            if (!$this->conn) {
                echo "Erro na conexão com o banco de dados.";
                return null;
            }

            $query = 'SELECT * FROM remember_tokens WHERE id_usuario = :id_usuario_';

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id_usuario_', $id, PDO::PARAM_STR);
            
            $stmt->execute();

            if ($stmt->error) {
                echo "Erro na consulta SQL: " . $stmt->error;
                return null;
            }

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                return $result['remember_token'];
            } else {
                return null;
            }
        }

        function getByEmailAndPassword($email, $password){

            if (!$this->conn) {
                echo "Erro na conexão com o banco de dados.";
                return null;
            }

            $query = 'SELECT * FROM usuarios u WHERE u.email = :email AND u.senha = :senha';

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':senha', $password, PDO::PARAM_STR);

            $stmt->execute();

            if ($stmt->error) {
                echo "Erro na consulta SQL: " . $stmt->error;
            }

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        }

        function getUserById($id) {
            if (!$this->conn) {
                echo "Erro na conexão com o banco de dados.";
                return null;
            }
            
            $query = 'SELECT * FROM usuarios WHERE id = :id';
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
            $stmt->execute();
            
            if ($stmt->error) {
                echo "Erro na consulta SQL: " . $stmt->error;
                return null;
            }
        
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        }

        function checkIfCookieIsValid(){
            define ('SECRET_KEY', 'SENHA_SUPER_SECRETA@!123', true);
            if (isset($_COOKIE['rememberme'])) {
                list($userId, $token, $mac) = explode(':', $_COOKIE['rememberme']);
                $expectedMac = hash_hmac('sha256', $userId . ':' . $token, SECRET_KEY);
                
                // verifica validade do token.
                if (hash_equals($expectedMac, $mac)) {
                    $storedToken = $this->getRememberToken($userId);
                    if (hash_equals($storedToken, $token)) {
                        return true;
                    }
                }
                return false;
            }
        }
    }

?>