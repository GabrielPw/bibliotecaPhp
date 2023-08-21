<form class="content p-2" method="POST" action="/cadastrar">
    <!---Nome-->
    <div class="field">
        <label class="label">Nome</label>
        <div class="control has-icons-left">
            <input class="input" name="nome" type="text" placeholder="Nome">
            <span class="icon is-small is-left">
                <i class="fa-solid fa-circle-user"></i>
            </span>

        </div>
        <p class="help is-hidden">This is a help text</p>
    </div>

    <!---Email-->
    <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left">
            <input class="input" name="email" type="text" placeholder="Email">
            <span class="icon is-small is-left">
                <i class="fa-solid fa-envelope"></i>
            </span>
        </div>
        <p class="help is-hidden">This is a help text</p>
    </div>

    <!---Endereço-->
    <div class="field">
        <label class="label">Endereço</label>
        <div class="control has-icons-left">
            <input class="input" name="endereco" type="text" placeholder="Endereço">
            <span class="icon is-small is-left">
                <i class="fa-solid fa-location-dot"></i>
            </span>
        </div>
        <p class="help is-hidden">This is a help text</p>
    </div>

    <!---Telefone-->
    <div class="field">
        <label class="label">Telefone</label>
        <div class="control has-icons-left">
            <input class="input" name="telefone" type="text" placeholder="Telefone">
            <span class="icon is-small is-left">
                <i class="fa-solid fa-phone"></i>
            </span>
        </div>
        <p class="help is-hidden">This is a help text</p>
    </div>

    <!---Senha-->
    <div class="field">
        <label class="label">Senha</label>
        <p class="control has-icons-left">
            <input class="input" name="senha" type="password" placeholder="Senha">
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

    <p class="control mt-5 is-flex is-justify-content-center ">
        <button class="button is-link is-outlined is-medium is-fullwidth" title="Cadastrar" type="submit">Cadastrar</button>
    </p>

    </div>
</form>