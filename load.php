<?
class tihh_db_mysql_sql_post{

  private $fields = array();
  private $files = array();
  private $table;

  public $id = -1;

  public function __construct($table){
    $this->table = $table;
  }

  public function AddFieldString($fieldName, $value){

    if($value == null)
      $value = 'NULL';
    else
      $value = "'$value'";

    $this->fields[$fieldName] = $value;
  }

  public function AddFieldNumber($fieldName, $value){

    if($value == null)
      $field = array($fieldName, "NULL");
    else
      $field = array($fieldName, number_format($value, 2, '.', ''));

    $this->fields[] = $field;

  }

  public function AddFieldInteger($fieldName, $value){

    //verifica se já foi setado este campo...
    $this->verifyField($fieldName);

    $field = array($fieldName, intval($value));
    $this->fields[] = $field;
  }

  public function AddFieldBoolean($fieldName, $value){

    //verifica se já foi setado este campo...
    $this->verifyField($fieldName);

    $field = array($fieldName, ($value)?"'Y'":"'N'");
    $this->fields[] = $field;
  }

  public function AddFieldDateTime($fieldName, $value){

    //verifica se já foi setado este campo...
    $this->verifyField($fieldName);

    $this->AddFieldString($fieldName, $value);
  }

  public function AddFieldDateTimeNow($fieldName){
    $field = array($fieldName, "NOW()");
    $this->fields[] = $field;
  }

  public function AddFieldDateToday($fieldName){
    $field = array($fieldName, "TODAY()");
    $this->fields[] = $field;
  }

  public function GetSQL(){

    if(count($this->fields) == 0){
      die('[tihh_db_mysql_sql_post] Você não pode gerar o SQl sem nenhum campo setado.');
    }

    //Inserção ou Atualização..
    if($this->id > 0){

      $sql   = 'UPDATE `' . $this->table . '` SET ';

      $sql_fields = array();

      foreach ($this->fields as $x=>$field) {
        $sql_fields[] = '`' . $x . '` = ' . $field;
      }

      $sql .= implode(', ', $sql_fields);

      $sql .= ' WHERE ID = ' . $this->id;

    } else {

      $sql  = 'INSERT INTO ' . $this->table;

      $sql_fields = array();
      $sql_values = array();

      foreach ($this->fields as $x=>$field) {
        $sql_fields[]  = '`' . $x . '`';
        $sql_values[] = $field;
      }

      $sql .= '(' . implode(', ', $sql_fields) . ')';
      $sql .= ' VALUES(' . implode(', ', $sql_values) . ')';
    }

    return $sql;
  }

}
?>