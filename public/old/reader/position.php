<?php
    
    Class Position{

        public static function create($name){
            $item = R::dispense('position');
            $item->name = $name;
            $id = R::store($item);
            return $id;
        }

        public static function read($id){
            $item = R::load('position', $id);
            return $item;
        }

        public static function update($id, $name){
            $item = R::load('position', $id);
            $item->name = $name;
            $id = R::store($item);
            return $id;           
        }

        public static function delete($id){
            $item = R::load('position', $id);
            $id = R::trash( $book );
            return $id;
        }     
        public static function getAll(){
            $items = R::findAll( 'position' );
            return  $items;
        }   
    }