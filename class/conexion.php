<?php 
require("param_db.php");
class Conexion
{
	protected $conex;

	public function Conexion()
	{
		$this->conex=new mysqli(host,user,pass,base);
		if(isset($this->conex->connect->errno))
		{
			echo "Atencion se ha Presentado un error en la conexion...";
		}
		$this->conex->set_charset(charset);
	}
}
?>