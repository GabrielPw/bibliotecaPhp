<?php $errorMsg = (isset($_GET["loginError"]))? 'Credenciais Inválidas':'' ?>
<div class="card loginDiv" style="display: none;">
    <div class="card-content">
        <p class="title p-2">
            Seja bem vindo!
            </p>
            <p class="subtitle p-2">
            Entre com sua conta.
            </p>
        <div class="content p-2">
            <form action="/login" method="POST" >
            <!---Email-->
            <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left">
                <input class="input" type="email" name="email" placeholder="Email" id="email">
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-envelope"></i>
                </span>
                </div>
                <p class="help is-hidden">This is a help text</p>
            </div>

            <!---Senha-->
            <div class="field">
                <label class="label">Senha</label>
                <p class="control has-icons-left">
                <input class="input" type="password" name="password" placeholder="Senha" id="password">
                <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                </span>
                </p>
            </div>

            <div class="is-flex is-align-items-center is-justify-content-center mb-4">
                <span class="line mr-2"></span>
                    <span class="mb-1 has-text-weight-semibold">ou entre com</span>
                <span class="line ml-2"></span>
            </div> 
            
            <div class="is-flex is-justify-content-center">
                <button class="button is-wdt is-normal mr-2	" title="Google"><img src="assets/icons/google.svg" alt="Google" srcset=""></button>
                <button class="button is-wdt is-normal mr-2	" title="Facebook"><img src="assets/icons/facebook.svg" alt="Facebook" srcset=""></button>
                <button class="button is-wdt is-normal" title="Linkedin"><img src="assets/icons/linkedin.svg" alt="" srcset=""></button>
            </div>

                <!-- id="login-link"  -->
            <p class="control mt-5 is-flex is-justify-content-center ">
                <button class="button is-link is-outlined is-medium is-fullwidth" type="submit" title="Entrar">Entrar</button>
            </p>
            <!-- mensagem de erro -->
            <div  id="login-message">
                <p style="color: darkred;"><?php echo $errorMsg; ?></p>
            </div>
            </form>
        </div>
    </div>
</div>