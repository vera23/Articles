
<form action="?ctrl=News&action=Edit" method="POST">
 <input type='hidden' name="id" value="<?php  echo $items->id ;?>"><br/>
<label for="title">Название статьи:</label><br/>
<input type="text" name="title" size="60" value="<?php  echo $items->title ;?>"><br/>
<label for="content">Текст статьи:</label><br/>
<input type="text" name="content" size="60" value="<?php  echo $items->content ;?>"><br/>
<input type="submit" value="Отправить">
</form>


