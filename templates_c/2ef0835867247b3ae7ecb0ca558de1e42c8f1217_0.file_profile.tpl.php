<?php
/* Smarty version 5.4.3, created on 2025-01-29 14:22:29
  from 'file:profile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_679a2b95c357c5_81961326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ef0835867247b3ae7ecb0ca558de1e42c8f1217' => 
    array (
      0 => 'profile.tpl',
      1 => 1738156547,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_679a2b95c357c5_81961326 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\phploginform\\templates';
$_smarty_tpl->renderSubTemplate("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    <?php if ($_smarty_tpl->getValue('isUserLogged')) {?>
        <div class="container mt-5">
            <h2>Profil użytkownika</h2>
            <form action="<?php echo (defined('BASE_URL') ? constant('BASE_URL') : null);?>
/saveProfile" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstName">Imię</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $_smarty_tpl->getValue('user')->getFirstName();?>
" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Nazwisko</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $_smarty_tpl->getValue('user')->getLastName();?>
" required>
                </div>
                <div class="form-group">
                    <label for="birthDate">Data urodzenia</label>
                    <input type="date" class="form-control" id="birthDate" name="birthDate" value="<?php echo $_smarty_tpl->getValue('user')->getBirthDate();?>
" required>
                </div>
                <div class="form-group">
                    <label for="profilePicture">Zdjęcie profilowe</label>
                    <input type="file" class="form-control-file" id="profilePicture" name="profilePicture">
                    <?php if ($_smarty_tpl->getValue('user')->getProfilePicture()) {?>
                        <img src="<?php echo $_smarty_tpl->getValue('user')->getProfilePicture();?>
" alt="Zdjęcie profilowe" class="img-thumbnail mt-2" width="150">
                    <?php }?>
                </div>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </form>

            <h2 class="mt-5">Zmiana hasła</h2>
            <form action="<?php echo (defined('BASE_URL') ? constant('BASE_URL') : null);?>
/changePassword" method="post">
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
    <?php } else { ?>
        <h1>Musisz być zalogowany, aby zobaczyć tę stronę.</h1>
        <a href="/phploginform/login">Zaloguj się</a>
    <?php }
$_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
