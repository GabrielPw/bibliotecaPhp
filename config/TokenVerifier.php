<!-- file that holds the logic of the permission system that users will have to access some pages. -->

<?php 
    class TokenVerifier{
        public static function verifyRememberToken($db, $token){
            // Verifica se o token é válido
            define ('SECRET_KEY', 'SENHA_SUPER_SECRETA@!123', true);
            list($userId, $storedToken, $mac) = explode(':', $token);
            $expectedMac = hash_hmac('sha256', $userId . ':' . $storedToken, SECRET_KEY);
            
            if (!hash_equals($expectedMac, $mac)) {
                return false;
            }

            // Verifica se o token está no banco de dados
            $user = new Usuario($db);
            $storedTokenFromDB = $user->getRememberToken($userId);
            
            if (!hash_equals($storedTokenFromDB, $storedToken)) {
                return false;
            }
            
            return true;
        }
    }
?>