<?php require_once(__DIR__."/../header.php"); ?>

<div class="container pt-5">
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
            <form method="POST" action="<?= $this->router->route("auth.login") ?>">
                <h4 class="text-center">Login no Sistema</h4>
                <div class="mb-3">
                    <label for="loginInputEmail" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="loginInputEmail">
                </div>
                <div class="mb-3">
                    <label for="passInputPassword" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="passInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Autenticar</button>
            </form>
        </div>
        <div class="col-sm"></div>
    </div>
</div>

<?php require_once(__DIR__."/../footer.php"); ?>