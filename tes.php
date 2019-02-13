<?php
class Parser
{
  var $nomor_hp;
  var $nama;
  var $usia;
  var $email;

  function parse_identity($input)
  {
    $result = preg_match('/([0-9\+]*) ([a-zA-Z ]*) ([0-9]*) ([a-zA-Z0-9_\-\A@\A.a-zA-Z0-9\-_]*)/', $input, $output);
    if ($result == false) throw new Exception('Data tidak cocok');
    $this->nomor_hp = $output[1];
    $this->nama = $output[2];
    $this->usia = $output[3];
    $this->email = $output[4];
  }
  
  function explain()
  {
    return <<<EOF
Nomor HP   : {$this->nomor_hp}
Nama       : {$this->nama}
Usia       : {$this->usia}
Email      : {$this->email}

EOF;
  }
}

$parser = new Parser();
try {
  $parser->parse_identity('085357869610 Dani Wira Sasmita 26 daniwira45@gmail.com');
  echo $parser->explain();
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}