<?php
class ObjectModel implements ObjectModelInterface{

    private $db;
    private $collection;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function checkLoginPassword($post){
        $result = $this->getLogin($post['login']);
        $validity = password_verify($post['password'], $result[0]['password']);
        if($validity){
            return true;
        }else{
            return false;
        }
    }

    private function getLogin($login){
        $query = $this->db->getDatabase()->prepare("SELECT * FROM users WHERE login=:login");
        $query->bindParam(':login', $login);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll($table){
        if(!isset($this->collection)){
            if($table == "routers" || $table == "servers" || $table == "contact_details"){
                $query = $this->db->getDatabase()->prepare("SELECT *, $table.id AS id FROM $table AS $table INNER JOIN clients AS clients ON $table.client=clients.id GROUP BY $table.id");
                $query->execute();
                $this->collection = $query->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $this->collection = $this->db->getDatabase()->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return $this->collection;
    }

    public function getByCondition($table, $column, $condition){
        if(!$condition){
            return false;
        }
        if ($table == "routers" || $table == "servers" || $table == "contact_details") {
            $query = $this->db->getDatabase()->prepare("SELECT *, $table.id AS id FROM $table AS $table INNER JOIN clients AS clients ON $table.client=clients.id WHERE $table.$column=:condition GROUP BY $table.id");
        }else{
            $query = $this->db->getDatabase()->prepare("SELECT * FROM $table WHERE $column=:condition");
        }
        $query->bindParam(':condition', $condition);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getItemColumns($item){
        $object = $this->getObject($item);
        return $object->getObjectVars();
    }

    private function getObject($type){
        switch ($type){
            case 'routers':
                $object = new Router();
                break;
            case 'servers':
                $object = new Server();
                break;
            case 'contact_details':
                $object = new Contact_detail();
                break;
            case 'clients':
                $object = new Client();
                break;
            case 'tags':
                $object = new Tag();
                break;
            case 'users':
                $object = new User();
                break;
            case 'procedures':
                $object = new Procedures();
                break;
            case 'routers_comment':
                $object = new Router_comment();
                break;
            case 'servers_comment':
                $object = new Server_comment();
                break;
            case 'contact_details_comment':
                $object = new Contact_detail_comment();
                break;
            default:
                return false;
            break;
        }
        return $object;
    }

    public function getBySearch($table, $search){
        if(!$search || !$table){
            return false;
        }
        $search = json_decode($search, true);
        $conditions = $this->prepareSearchCondition($search);
        $query = $this->db->getDatabase()->prepare("SELECT * FROM $table WHERE $conditions");
        $query = $this->bindSearchParams($query, $search);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    private function bindSearchParams($query, $search){
        foreach($search as $i => &$condition){
            $bind_condition_value = '';
            $bind_condition_numbered_name = $condition['numbered_choosen_column'];
            $bind_condition_name = $condition['choosen_column'];
            $fit = trim($condition['fit']);
            if($bind_condition_name == 'tag' || $bind_condition_name == 'phone' || $bind_condition_name == 'mobile_phone' || $bind_condition_name == 'email' || $bind_condition_name == 'ip' || $bind_condition_name == 'operator' || $bind_condition_name == 'down' || $bind_condition_name == 'up' || $bind_condition_name == 'type' || $bind_condition_name == 'user' || $bind_condition_name == 'password' || $bind_condition_name == 'local_contact' || $bind_condition_name == 'operator_contact'){
                switch($fit){
                    case 'Pasuje':
                    case 'Nie pasuje':
                        $condition['value_for_column'] = "%;" . $condition['value_for_column'] . ";%";
                    break;
                    case 'Zawiera':
                    case 'Nie zawiera':
                        $condition['value_for_column'] = "%" . $condition['value_for_column'] . "%";
                    break;
                    case 'Zaczyna się od':
                    case 'Nie zaczyna się od':
                        $condition['value_for_column'] = "%;" . $condition['value_for_column'] . "%";
                    break;
                    case 'Kończy się na':
                    case 'Nie kończy się na':
                        $condition['value_for_column'] = "%" . $condition['value_for_column'] . ";%";
                    break;
                }
            }else{
                switch($fit){
                    case 'Pasuje':
                    case 'Nie pasuje':
                        $condition['value_for_column'] = $condition['value_for_column'];
                    break;
                    case 'Zawiera':
                    case 'Nie zawiera':
                        $condition['value_for_column'] = "%" . $condition['value_for_column'] . "%";
                    break;
                    case 'Zaczyna się od':
                    case 'Nie zaczyna się od':
                        $condition['value_for_column'] = $condition['value_for_column'] . "%";
                    break;
                    case 'Kończy się na':
                    case 'Nie kończy się na':
                        $condition['value_for_column'] = "%" . $condition['value_for_column'];
                    break;
                }
            }
            $query->bindParam(":$bind_condition_numbered_name", $condition['value_for_column']);
        }
        return $query;
    }

    private function prepareSearchCondition(&$search){
        $condition_type = '';
        $search_condition = '';
        foreach($search as $i => &$condition){
            unset($condition['$$hashKey']);
            if(empty($condition_type)){
                $condition_type = $condition['choosen_column'];
            }
            if($condition_type != $condition['choosen_column']){
                $connector = $part_of_condition[count($part_of_condition)-1]['connector'];   
                $search_condition = $search_condition . $this->prepareToMakeCondition($part_of_condition) . " " . $connector . " ";
                unset($part_of_condition);
                $condition_type = $condition['choosen_column'];
            }
            $condition['numbered_choosen_column'] =  $condition['choosen_column'] . $i;
            $part_of_condition[] = $condition;
        }
        $search_condition = $search_condition . $this->prepareToMakeCondition($part_of_condition);
        return $search_condition;
    }

    private function prepareToMakeCondition($part_of_condition){
        unset($part_of_condition[count($part_of_condition)-1]['connector']);
        return $this->makeSearchCondition($part_of_condition);
    }

    private function makeSearchCondition($conditions){
        $result_condition = '';
        $main_condition = '';
        foreach($conditions as $condition){
            if($condition['choosen_column'] == 'tag' || $condition['choosen_column'] == 'server_role' || $condition['choosen_column'] == 'phone' || $condition['choosen_column'] == 'mobile_phone' || $condition['choosen_column'] == 'email' || $condition['choosen_column'] == 'ip' || $condition['choosen_column'] == 'operator' || $condition['choosen_column'] == 'down' || $condition['choosen_column'] == 'up' || $condition['choosen_column'] == 'type' || $condition['choosen_column'] == 'user' || $condition['choosen_column'] == 'password' || $condition['choosen_column'] == 'local_contact' || $condition['choosen_column'] == 'operator_contact'){
                $main_condition = $condition['choosen_column'] . " LIKE :" . $condition['numbered_choosen_column'];
            }else{
                switch($condition['fit']){
                    case 'Pasuje':
                        $main_condition = $condition['choosen_column'] . "=:" . $condition['numbered_choosen_column'];
                    break;
                    case 'Zawiera':
                    case 'Zaczyna się od':
                    case 'Kończy się na':
                        $main_condition = $condition['choosen_column'] . " LIKE :" . $condition['numbered_choosen_column'];
                    break;
                    case 'Nie pasuje':
                        $main_condition = "NOT " . $condition['choosen_column'] . "=:" . $condition['numbered_choosen_column'];
                    break;
                    case 'Nie zawiera':
                    case 'Nie zaczyna się od':
                    case 'Nie kończy się na':
                        $main_condition = $condition['choosen_column'] . " NOT LIKE :" . $condition['numbered_choosen_column'];
                    break;
                    default:
                    break;
                }
            }
            if(isset($condition['connector']) && !empty($condition['connector'])){
                $result_condition = $result_condition . $main_condition . " " . $condition['connector'] . " ";
            }else{
                $result_condition = $result_condition . $main_condition;
            }
        }
        $result_condition = "(" . $result_condition . ")";
        return $result_condition;
    }

    public function moveToInUse($table, $id){
        $post = $this->getByCondition($table, 'id', $id);
        $post[0]['arch'] = '0';
        $this->save($table, $post[0]);
    }

    public function moveToArch($table, $id){
        $post = $this->getByCondition($table, 'id', $id);
        $post[0]['arch'] = '1';
        $this->save($table, $post[0]);
    }

    public function delete($table, $id){
        $query = $this->db->getDatabase()->prepare("DELETE FROM $table WHERE id=:id");
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function deleteByCondition($table, $column, $condition){
        $query = $this->db->getDatabase()->prepare("DELETE FROM $table WHERE $column=:$column");
        $query->bindParam(":$column", $condition);
        return $query->execute();
    }

    public function deleteFile($subject){
        unlink("users_contents/" . $subject . ".txt");
    }

    public function preparePost($post){
        $table = $post['table'];
        unset($post['table']);
        if(array_key_exists('new_client', $post)){
            if(!empty($post['new_client'])){
                $tag_for_client = ";" . $post['new_client'] . ";";
                $new_client_post = array("client" => $post['new_client'], "tag" => $tag_for_client, "arch" => $post['arch']);
                $this->save('clients', $new_client_post);
            }
            unset($post['new_client']);
        }
        if(array_key_exists('tags', $post) && !array_key_exists('id', $post)){
            $post['new_tags'] = $post['tags'];
            unset($post['tags']);
        }
        if(array_key_exists('tags', $post) && array_key_exists('id', $post)){
            $post['tags'] = substr($post['tags'], 1, strlen($post['tags'])-2);
            $post['tag'] = $post['tags'];
            unset($post['tags']);
        }
        if(array_key_exists('new_tags', $post)){
            if(!empty($post['new_tags'])){
                $post['new_tags'] = substr($post['new_tags'], 1, strlen($post['new_tags'])-2);
                $new_tags = explode(';', $post['new_tags']);
                foreach($new_tags as $tag){
                    $new_tag_post = array("tag" => $tag, "arch" => $post['arch']);
                    $this->save('tags', $new_tag_post);
                    unset($new_tag_post['tag']);
                }
            }
            unset($post['new_tags']);
        }
        if(array_key_exists('password', $post) && !empty($post['password']) && $table == 'users'){
            $post['password'] = password_hash($post['password'], PASSWORD_BCRYPT, array('cost'=>10));
        }

        if($table == 'routers' || $table == 'servers' || $table == 'contact_details'){
            $client = $this->getByCondition("clients", "client", $post['client']);
            $post['client'] = $client[0]['id'];
        }

        $check_post_content = $post;
        if(array_key_exists('arch', $check_post_content)){
            unset($check_post_content['arch']);
        }
        if(array_key_exists('id', $check_post_content)){
            unset($check_post_content['id']);
        }
        if(isset($check_post_content) && !empty($check_post_content)){
            $this->save($table, $post);
        }
    }

    public function saveFileContent($post){
        $new_path = "users_contents/" . $post['subject'] . ".txt";
        $post['path'] = $new_path;
        if(array_key_exists('id', $post) && empty($post['id'])){
            unset($post['id']);
        }
        $post_to_check = $post;
        unset($post_to_check['table']);
        unset($post_to_check['content']);
        unset($post_to_check['new_tags']);
        if($this->checkExactPostExist($post['table'], $post_to_check)){
            return false;
        }
        if(isset($post['path']) && !empty($post['path'])){
            $old_path = $post['path'];
            if($old_path != $new_path){
                rename($old_path, $new_path);
            } 
        }
        file_put_contents($new_path, $post['content']);
        unset($post['content']);
        $this->preparePost($post);
    }

    private function save($table, $post){
        if($this->checkExactPostExist($table, $post)){
            return false;
        }
        $object = $this->prepareObject($table, $post);
        $this->db->save($table, $object);
    }

    private function prepareObject($type, $post){
        $object = $this->getObject($type);
        foreach ($object->getObjectVars() as $varName => $varValue){
            if($varName == 'id' && !array_key_exists('id', $post)){
                continue;
            }
            $method = 'set' . ucfirst($varName);
            if(method_exists($object, $method)) {
                $object->$method($post[$varName]);
            }
        }
        return $object;
    }

    private function checkExactPostExist($table, $post){
        $condition = $this->prepareExactPostWhere($table, $post);
        if(array_key_exists('id', $post)){
            $condition = $condition . " AND id!=:id";
        }
        $query = $this->db->getDatabase()->prepare("SELECT id FROM $table WHERE $condition");
        $query = $this->bindParamsToCheckExactPostExist($query, $post, $table);
        $query->execute();
        if($query->fetchAll()){
            return true;
        }else{
            if(array_key_exists('login', $post)){
                $query = $this->db->getDatabase()->prepare("SELECT id FROM $table WHERE login=:login AND id!=:id");
                $query->bindParam(":login", $post['login']);
                $query->bindParam(":id", $post['id']);
                $query->execute();
                if($query->fetchAll()){
                    return true;
                }
            }
            return false;
        } 
    }

    private function prepareExactPostWhere($table, $post){
        foreach($post as $varName => $varValue){
            if($varName == 'id' || ($varName == 'password' && $table == 'users') || ($varName == 'tag' && $table != 'tags') || $varName == 'arch' || $varName == 'date' || $varName == 'author' || $varName == 'path'){
                continue;
            }
            $condition[] = "$varName=:$varName";
        }
        return implode(' AND ', $condition);
    }

    private function bindParamsToCheckExactPostExist($query, $post, $table){
        foreach($post as $varName => &$varValue){
            if(($varName == 'password' && $table == 'users') || ($varName == 'tag' && $table != 'tags') || $varName == 'arch'  || $varName == 'date' || $varName == 'author' || $varName == 'path'){
                continue;
            }
            $query->bindParam(":$varName", $varValue);
        }
        return $query;
    }

    public function getNamesToShow($name){
        switch($name){
            case 'clients':
                $return_name = "Klienta";
                break;
            case 'client':
                $return_name = "Klient";
                break;
            case 'tag':
            case 'tags':
                $return_name = "Tag";
                break;
            case 'arch':
                $return_name = "Archiwum";
                break;
            case 'contact_details':
                $return_name = "Dane Kontaktowe";
                break;
            case 'firstname':
                $return_name = "Imię";
                break;
            case 'lastname':
                $return_name = "Nazwisko";
                break;
            case 'phone':
                $return_name = "Telefon";
                break;
            case 'mobile_phone':
                $return_name = "Telefon Komórkowy";
                break;
            case 'email':
                $return_name = "Email";
                break;
            case 'procedures':
                $return_name = "Procedur";
                break;
            case 'author':
                $return_name = "Autor";
                break;
            case 'subject':
                $return_name = "Tytuł";
                break;
            case 'date':
                $return_name = "Data";
                break;
            case 'routers':
                $return_name = "Router";
                break;
            case 'location':
                $return_name = "Lokalizacja";
                break;
            case 'model':
                $return_name = "Model";
                break;
            case 'ip':
                $return_name = "IP";
                break;
            case 'operator':
                $return_name = "Operator";
                break;
            case 'down':
                $return_name = "Down";
                break;
            case 'up':
                $return_name = "Up";
                break;
            case 'type':
                $return_name = "Typ łącza";
                break;
            case 'user':
                $return_name = "Użytkownik";
                break;
            case 'users':
                $return_name = "Użytkownika";
                break;
            case 'password':
                $return_name = "Hasło";
                break;
            case 'state':
                $return_name = "Status";
                break;
            case 'local_contact':
                $return_name = "Kontakt lokalny";
                break;
            case 'operator_contact':
                $return_name = "Kontakt do operatora";
                break;
            case 'role':
            case 'server_role':
                $return_name = "Rola";
                break;
            case 'servers':
                $return_name = "Serwer";
                break;
            case 'server_type':
                $return_name = "Typ";
                break;
            case 'operation_system':
                $return_name = "System operacyjny";
                break;
            case 'login':
                $return_name = "Login";
                break;
            case 'privilege':
                $return_name = "Uprawnienia";
                break;
            default:
                $return_name = "";
                break;
        }
        return $return_name;
    }
}
?>