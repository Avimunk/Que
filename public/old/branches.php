<?php
    
    Class Branches{

        public static function create($name){
            $item = R::dispense('branches');
            $item->name = $name;
            $id = R::store($item);
            return $id;
        }

        public static function read($id){
            $item = R::load('branches', $id);
            return $item;
        }

        public static function update($id, $name){
            $item = R::load('branches', $id);
            $item->name = $name;
            $id = R::store($item);
            return $id;           
        }

        public static function delete($id){
            $item = R::load('branches', $id);
            $id = R::trash( $book );
            return $id;
        }     
        public static function getAll(){
            $items = R::findAll( 'branches' );
            return  $items;
        }   
    }