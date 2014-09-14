
<form action="?ctrl=News&action=EditOne" method="POST">
<?php 
foreach ($items as $el) : ?>
    <input type="radio" name="id" value="<?php echo $el->id;?>"/>
<?php echo $el->title . '<br>';?>
<?php endforeach ;?><input type="submit" value="Выбрать элемент">
</form>
