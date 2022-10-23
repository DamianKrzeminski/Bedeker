# bedeker
Do projektu użyto bazy danych MariaDb, w projekcie znajduje się kopia bazy danych "bedeker" z testowymi wartościami. Należy w niej założyć użytkownika bedeker z pełnymi uprawnieniami do bazy bedeker i nadać mu hasło almuslupus2009.
Opcjonalnie można zmienić użytkownika i hasło, ale trzeba pamiętać o dokonaniu zmiany w lib/Config.php
W razie problemów z logowaniem:
Login cirrus_dk
Hasło 123
Jeśli zmienimy hasło i nie możemy się dostać do CMS możemy zmienić hasło w phpmyadmin, ale musimy znać hash hasła. Poniżej metoda, którą można uzyskać odpowiedni hash:
Hasło należy zmienić za pomocą 
<?php 
      $password="123"
      echo password_hash("$password", PASSWORD_BCRYPT, array('cost'=>10));
?>
