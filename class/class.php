<?php 
	require("conexion.php");
	class Colegio extends Conexion
	{
		private $informacion=array();//atributos
		private $estudiante=array();
		private $datos=array();
        private $usuario=array();
		private $validacion=array();
		private $novedad=array();
		

		public function valida_pass($usuario,$pass)
		{
			{
				$sql="SELECT Email, Contraseña, Rol_IdRol FROM infopersonal WHERE Email='$usuario' AND Contraseña='$pass'";
				$res=$this->conex->query($sql);
				while($reg1=mysqli_fetch_assoc($res))
				{
					$this->validacion[]=$reg1;
				}
				return $this->validacion;
			}
			
		}

		public function valida_usu($id)
		{
			{
				$sql="SELECT DocumentoId, Nombre, Apellido, Contraseña, Email FROM infopersonal WHERE Email='$id'";
				$res=$this->conex->query($sql);
				while($reg1=mysqli_fetch_assoc($res))
				{
					$this->usuario[]=$reg1;
				}
				return $this->usuario;
			}
		}

		Public function insert_noved($id)
		{
			{
				$sql="INSERT INTO registronovedad WHERE InfoPersonal_DocumentoID='$id'";
				$res=$this->conex->query($sql);
				while($reg1=mysqli_fetch_assoc($res))
				{
					$this->usuario[]=$reg1;
				}
				return $this->usuario;
			}
		}
		Public function trae_datos($usuario)
		{
			{
				$sql="SELECT * FROM infopersonal WHERE Email='$usuario'";
				$res=$this->conex->query($sql);
				while($reg1=mysqli_fetch_assoc($res))
				{
					$this->datos[]=$reg1;
				}
				return $this->datos;
			}
		}
		Public function trae_info($id)
		{
			{
				$sql="SELECT * FROM infoestudianteadicional WHERE InfoPersonal_DocumentoID='$id'";
				$res=$this->conex->query($sql);
				while($reg2=mysqli_fetch_assoc($res))
				{
					$this->datos[]=$reg2;
				}
				return $this->datos;
			}
		}
		public function Datos_Estud($usu)//este trae los datos de la BD
		{
			{
				$sql="SELECT * FROM infopersonal WHERE Email='$usu'";
				$result=$this->conex->query($sql);
				while($reg=mysqli_fetch_assoc($result))
				{
					$this->estudiante[]=$reg;
				}
				return $this->estudiante;
			}
		}
		public function Actualizar_Datos($id,$dir,$tel,$telAcu)//Este actualiza los datos de la BD
		{
			if($id=="" or($dir=="") or($tel=="") or($telAcu==""))
			{
				echo "<script type='text/javascript'> 
				alert ('Debe diligenciar todos los campos');
				window.location='actual.php';
				</script>";
			}else
			{
				$sql1="UPDATE infopersonal SET Direccion='$dir',Telefono='$tel' 
			where DocumentoId=$id";
			$result=$this->conex->query($sql1);

			$sql2="UPDATE infoestudianteadicional SET infoestudianteadicional.TelAcudiente='$telAcu' 
			where InfoPersonal_DocumentoID=$id";
			$result1=$this->conex->query($sql2);

			echo "<script type='text/javascript'> 
				alert ('Actualizacion Exitosa');
				window.location='actual.php';
				</script>";
			}
		}
		public function Traer_Noved()
		{
			$sql="select * from tiponov";
			$res=$this->conex->query($sql);//herencia
			while($reg=mysqli_fetch_assoc($res))
			{
				$this->novedad[]=$reg;
			}
			return $this->novedad;
		}
		public function Ver_Novedad()
		{
			$sql="SELECT IdtipoNov, NombreTipoNovedad, IdRegistroNovedad, Registro, 
			fecha, hora, TipoNov_IdTipoNov ,InfoPersonal_DocumentoID from tiponov 
			JOIN registronovedad where IdtipoNov=TipoNov_IdTipoNov";
			$res=$this->conex->query($sql);
			while($most=mysqli_fetch_assoc($res))
			{
				$this->novedad[]=$most;
			} return $this->novedad;
		}
		public function ActualizarDatos1($pos,$ide,$id)
		{
				$tel=$pos[0]['tel'];
				$dir=$pos[0]['dir'];
				$sql="UPDATE infopersonal SET infopersonal.Telefono='$tel', infopersonal.Direccion='$dir' WHERE Email='$ide'";
				$res=$this->conex->query($sql);
				$sql="UPDATE infoestudianteadicional SET TelAcudiente='$tel' WHERE infoestudianteadicional.InfoPersonal_DocumentoID=$id";
				$res=$this->conex->query($sql);
				echo "<script type='text/javascript'> 
				alert ('Actualizacion de datos exitosa exitosa');
				window.location='actual.php';
				</script>";
		}
		public function Repor_Novedad()
		{
				$sql="SELECT IdtipoNov, NombreTipoNovedad, IdRegistroNovedad, Registro, 
				fecha, hora, TipoNov_IdTipoNov ,InfoPersonal_DocumentoID, Nombre, Apellido FROM tiponov 
				INNER JOIN registronovedad ON TipoNov_IdTipoNov=IdtipoNov INNER JOIN infopersonal ON DocumentoId=InfoPersonal_DocumentoID limit 9";
			$res=$this->conex->query($sql);
			while($most=mysqli_fetch_assoc($res))
			{
				$this->novedad[]=$most;
			} return $this->novedad;
		}
		public function Repor_Estud($id)
		{
				$sql="SELECT IdtipoNov, NombreTipoNovedad, IdRegistroNovedad, Registro, 
				fecha, hora, TipoNov_IdTipoNov ,InfoPersonal_DocumentoID, Nombre, Apellido FROM tiponov 
				INNER JOIN registronovedad ON TipoNov_IdTipoNov=IdtipoNov INNER JOIN infopersonal ON DocumentoId=InfoPersonal_DocumentoID WHERE InfoPersonal_DocumentoID='$id'";
			$res=$this->conex->query($sql);
			while($most=mysqli_fetch_assoc($res))
			{
				$this->novedad[]=$most;
			} return $this->novedad;
		}
		public function Insert_user ($id,$n, $a, $d, $tel, $p, $rol, $email)
		{
			if ($id=="" or($n=="") or($a=="") or($d=="") or($tel=="") or($p=="") or($rol=="") or($email=="")) {
				echo"<script type'text/javascript'>
				alert('Debe ingresar todos los campos');
				window.location='user.php';
				</script>";
			}else{
				$cryptpass=crypt($p, 10);
				$sql="INSERT INTO infopersonal values ($id,'$n', '$a', '$d', '$tel','$cryptpass',$rol,'$email',1)";
				$res=$this->conex->query($sql);
				echo"<script type'text/javascript'>
				alert('Usuario creado exitosamente');
				window.location='princ_admin.php';
				</script>";
			}
	
	}
	public function ROl()
    {
        $sql="SELECT * FROM `rol` WHERE rol.Estado =1";
        $rest=$this->conex->query($sql);
        while($res=mysqli_fetch_assoc($rest))
        {
            $this->show[]=$res;
        }
        return $this->show;
    }
	public function Insert_info ($grado,$acud, $id_acud, $tel_acu, $id, $email_acu)
		{
			if ($grado=="" or($acud=="") or($id_acud=="") or($tel_acu=="") or($id=="") or($email_acu=="")) 
			{
				echo"<script type'text/javascript'>
				alert('Debe ingresar todos los campos');
				window.location='crea_est.php';
				</script>";
			}else{
				$sql="INSERT INTO infoestudianteadicional VALUES (null,'$grado','$acud', '$id_acud', '$tel_acu', '$id',123456789, '$email_acu',1)";
				$res=$this->conex->query($sql);
			}
		}
	public function Inser_nov($Registro,$fecha,$hora,$TipoNov_IdTipoNov,$InfoPersonal_DocumentoID)
	{
		if($Registro=="" or($fecha=="") or($hora=="") or($TipoNov_IdTipoNov=="") or($InfoPersonal_DocumentoID==""))
		{
			echo"<script type'text/javascript'>
				alert('Debe ingresar todos los campos');
				window.location='resgis_nov.php';
				</script>";

		}else{

		$sql="INSERT INTO registronovedad VALUES (null,'$Registro','$fecha','$hora','$TipoNov_IdTipoNov',
		'$InfoPersonal_DocumentoID',1)";
		$res=$this->conex->query($sql);
		
		}
	}
	public function Tipo_nov()
    {
        $sql="SELECT * FROM tiponov WHERE tiponov.Estado =1";
        $rest=$this->conex->query($sql);
        while($res=mysqli_fetch_assoc($rest))
        {
            $this->show[]=$res;
        }
        return $this->show;
    }
}

?>