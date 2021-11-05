<?php

	Class Socios extends Conectar{
		
		public function get_socio_all(){
			$conectar = parent::conexion();
			parent::set_names();
			$sql="SELECT * FROM ma_socios_negocio WHERE estado = 1";
			$sql=$conectar->prepare($sql);
			$sql->execute();
			return $resultado=$sql->fetchall(PDO::FETCH_ASSOC);

		}

		public function get_socio($id){
			$conectar = parent::conexion();
			parent::set_names();
			$sql="SELECT * FROM ma_socios_negocio WHERE estado = 1 AND id = ?";
			$sql=$conectar->prepare($sql);
			$sql->bindValue(1,$id);
			$sql->execute();
			return $resultado=$sql->fetchall(PDO::FETCH_ASSOC);

		

		
		}

		public function insert_socio($nombre,$razon_social,$direccion,$tipo_socio,$contacto,$email,$fecha_creado,$estado,$telefono){
			$conectar= parent::conexion();
			parent::set_names();
			$sql="insert into ma_socios_negocio(id,nombre,razon_social,direccion,tipo_socio,contacto,email,fecha_creado,estado,telefono)
			values (null,?,?,?,?,?,?,?,?,?);";
			$sql=$conectar->prepare($sql);
			$sql->bindValue(1,$nombre);
			$sql->bindValue(2,$razon_social);
			$sql->bindValue(3,$direccion);
			$sql->bindValue(4,$tipo_socio);
			$sql->bindValue(5,$contacto);
			$sql->bindValue(6,$email);
			$sql->bindValue(7,$fecha_creado);
			$sql->bindValue(8,$estado);
			$sql->bindValue(9,$telefono);
			$sql->execute();
			return $resultado=$sql->fetchall(PDO::FETCH_ASSOC);

		}

		public function update_socio($id,$nombre,$razon_social,$direccion,$tipo_socio,$contacto,$email,$fecha_creado,$telefono){
			$conectar= parent::conexion();
			parent::set_names();
			$sql="UPDATE  ma_socios_negocio SET nombre = ?,razon_social = ?,direccion = ?,tipo_socio = ?,contacto = ?,email = ?,fecha_creado = ?,telefono = ?
				WHERE estado = 1 AND id = ?;";
			$sql=$conectar->prepare($sql);
			$sql->bindValue(1,$id);
			$sql->bindValue(2,$nombre);
			$sql->bindValue(3,$razon_social);
			$sql->bindValue(4,$direccion);
			$sql->bindValue(5,$tipo_socio);
			$sql->bindValue(6,$contacto);
			$sql->bindValue(7,$email);
			$sql->bindValue(8,$fecha_creado);
			$sql->bindValue(9,$telefono);
			$sql->execute();
			return $resultado=$sql->fetchall(PDO::FETCH_ASSOC);

		}

		public function delete_socio($id){
			$conectar= parent::conexion();
			parent::set_names();
			$sql="DELETE FROM ma_socios_negocio WHERE estado - 1 AND id - ?";
			$sql=$conectar->prepare($sql);
			$sql->bindValue(1,$id);
			$sql->execute();
			return $resultado=$sql->fetchall(PDO::FETCH_ASSOC);

		}
		
	}			
?>