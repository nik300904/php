<div class='container container__header'>
    <a href='index.php?p=view&pag=2&sort=id' class='buttons buttons__text <?php if ($_GET['p'] == 'view') {echo 'underline';}?>'>Просмотр</a>
    <a href='index.php?p=add' class='buttons buttons__text <?php if ($_GET['p'] == 'add') {echo 'underline';}?>'>Добавить</a>
    <a href='index.php?p=edit' class='buttons buttons__text <?php if ($_GET['p'] == 'edit') {echo 'underline';}?>'>Редактировать</a>
    <a href='index.php?p=delete' class='buttons buttons__text <?php if ($_GET['p'] == 'delete') {echo 'underline';}?>'>Удалить</a>
</div>