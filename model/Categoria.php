<?php

   class Categoria extends Conectar{


      /* TODO: Mostrar todos los registro de Categoria */
     public function show_categoria(){
        $conectar=parent::Conexion();
        parent::set_names();
        $sql="call SP_LIST_CAT()";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }




     /* TODO: Mostrar registro por cat_id recibido desde Frontend */
     public function show_categoria_id($cat_id){
        $conectar=parent::Conexion();
        parent::set_names();
        $sql="call SP_LIST_CAT_ID(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }




     /* TODO: Insertar Nuevo Registro desde Frontend */
     public function create_categoria($cat_nom, $cat_descrip){
        $conectar=parent::Conexion();
        parent::set_names();
        $sql="call SP_INSERT_CAT(?,?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_descrip);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }



      /* TODO: Actualizar datos del Registro desde Frontend */
      public function update_categoria($cat_id, $cat_nom, $cat_descrip){
            $conectar=parent::Conexion();
            parent::set_names(); 

            $sql="call SP_UPDATE_CAT(?,?,?)";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->bindValue(2, $cat_nom);
            $sql->bindValue(3, $cat_descrip);
            $sql->execute();
        
     }



      /* TODO: Actualizar Campo est = 0 del Registro Segun cat_id */
      public function update_estado($cat_id){
        $conectar=parent::Conexion();
        parent::set_names(); 
        
        $sql="call SP_DELETE_CAT_ID (?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
    
     }


   }



?>