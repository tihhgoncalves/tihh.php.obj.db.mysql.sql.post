# Objeto de PHP - tihh_db_mysql_sql_post()
Objeto de PHP que gera SQL (post) automaticamente.

[![Versão](http://app.tiago.art.br/flags/version.php?path=tihhgoncalves/tihh.php.obj.db.mysql.sql.post)](/releases.md)
[![Versão](http://app.tiago.art.br/flags/size.php?path=tihhgoncalves/tihh.php.obj.db.mysql.sql.post)](/releases.md)

### Instalação
Para utilizar esse script, utilize o seguinte comando:

```
  bower install tihh.php.obj.db.mysql.sql.post --save
```

P.S.: Caso prefira, você pode fazer o download do projeto manualmente.

### Exemplo

```
  <?
  
  require('bower_components/tihh.php.obj.db.mysql.sql.post/load.php');
  
  $post = new tihh_db_mysql_sql_post('Usuarios');
  $post->id = 123;
  $post->AddFieldString('Nome', '');
  
  echo $post->GetSQL();
  
  //UPDATE `Usuarios` SET `Nome` = NULL WHERE ID = 123
  
  ?>
```

### Autor
![logo](https://raw.githubusercontent.com/tihhgoncalves/tihh.php.obj.db.mysql/master/logo.png)


Esse script de PHP foi desenvolvido por Tihh Gonçalves (tiago@tiago.art.br). 

Mais informações: www.tiago.art.br
