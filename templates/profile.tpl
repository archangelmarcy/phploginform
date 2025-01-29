{include file="header.tpl"}
    {if $isUserLogged}
        <div class="container mt-5">
            <h2>Profil użytkownika</h2>
            <form action="{$smarty.const.BASE_URL}/saveProfile" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstName">Imię</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="{$user->getFirstName()}" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Nazwisko</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="{$user->getLastName()}" required>
                </div>
                <div class="form-group">
                    <label for="birthDate">Data urodzenia</label>
                    <input type="date" class="form-control" id="birthDate" name="birthDate" value="{$user->getBirthDate()}" required>
                </div>
                <div class="form-group">
                    <label for="profilePicture">Zdjęcie profilowe</label>
                    <input type="file" class="form-control-file" id="profilePicture" name="profilePicture">
                    {if $user->getProfilePicture()}
                        <img src="{$user->getProfilePicture()}" alt="Zdjęcie profilowe" class="img-thumbnail mt-2" width="150">
                    {/if}
                </div>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </form>

            <h2 class="mt-5">Zmiana hasła</h2>
            <form action="{$smarty.const.BASE_URL}/changePassword" method="post">
                <div class="form-group">
                    <label for="newPassword">Nowe hasło</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Powtórzenie nowego hasła</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                </div>
                <button type="submit" class="btn btn-primary">Zatwierdź</button>
            </form>
        </div>
    {else}
        <h1>Musisz być zalogowany, aby zobaczyć tę stronę.</h1>
        <a href="/phploginform/login">Zaloguj się</a>
    {/if}
{include file="footer.tpl"}