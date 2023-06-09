<?php


class Cliente extends Conectar{

 /* TODO: Mostrar todos los registro de Clientes */
  public function show_cliente(){
    $conectar=parent::Conexion();
    parent::set_names();
    $sql="call SP_LIST_CLI ()";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
 }

 

 /* TODO:Listar Registro especifico segun ID */
 public function show_cliente_x_id($cli_id){
    $conectar=parent::Conexion();
    parent::set_names();
    $sql="call SP_LIST_CLI_ID(?)";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $cli_id);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
 }


  /* TODO: Insertar Nuevo Registro desde Frontend */
  public function create_cliente($cli_nom, $pais_id, $int_id, $cli_correo, $cli_cel){
   $conectar=parent::Conexion();
   parent::set_names();
   $sql="call SP_INSERT_CLI(?,?,?,?,?)";
   $sql=$conectar->prepare($sql);
   $sql->bindValue(1, $cli_nom);
   $sql->bindValue(2, $pais_id);
   $sql->bindValue(3, $int_id);
   $sql->bindValue(4, $cli_correo);
   $sql->bindValue(5, $cli_cel);
   $sql->execute();
   return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
 }



  /* TODO: Insertar Nuevo Registro desde Frontend */
  public function update_cliente($cli_id, $cli_nom, $pais_id, $int_id, $cli_correo, $cli_cel){
      $conectar=parent::Conexion();
      parent::set_names();
      $sql="call SP_UPDATE_CLI (?,?,?,?,?,?)";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $cli_id);
      $sql->bindValue(2, $cli_nom);
      $sql->bindValue(3, $pais_id);
      $sql->bindValue(4, $int_id);
      $sql->bindValue(5, $cli_correo);
      $sql->bindValue(6, $cli_cel);
    
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  }


  /* TODO: Actualizar Campo est = 0 (Eliminar de Lista) del Registro Segun cli_id */
  public function update_estado($cli_id){
      $conectar=parent::Conexion();
      parent::set_names(); 
      $sql="call SP_DELETE_CLI_ID(?)";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $cli_id);
      $sql->execute();

  }









}



?>