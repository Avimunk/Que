<?php
    
    Class Guests{

        public static function create($fname, $lname, $phone,$branch){
            $item = R::dispense('guests');
            $item->first_name = $fname;
            $item->last_name = $lname;
            $item->phone = $phone;
            $item->is_inside = 1;
            $item->position = 2;
            $item->branch = $branch;
            $id = R::store($item);
            return $id;
        }

        public static function read($id){
            $item = R::load('guests', $id);
            return $item;
        }

        public static function update($id, $branch, $position){
            $item = R::load('guests', $id);
            $prev_position = $item->branch;
            $item->branch = $branch;
            $item->position = $position;
            $id = R::store($item);
            return $id;           
        }

        public static function delete($id){
            $item = R::load('guests', $id);
            $id = R::trash( $item );
            return $id;
        }
        public static function left($id){
            $item = R::load('guests', $id);
            $item->is_inside = 0;
            $date = new DateTime();
            $date->setTimestamp(time());  
            $item->time_left = $date->format('Y-m-d H:i:s');           
            $id = R::store($item);
            return $id;
        }   
        public static function getAll(){
            $items = R::findAll( 'guests' , ' ORDER BY time_reg ASC');
            return  $items;
        } 
        public static function getByBranch(){
            $items = R::findAll( 'guests' , ' ORDER BY time_reg ASC');

            return  $items;
        }     
        public static function getByPosition($position){
            $items = R::findAll( 'guests', ' position = '.$position.' AND is_inside NOT IN(0,5)  ORDER BY time_reg ASC');
            return  $items;
        }

        public static function getRegistration(){
            $items = R::findAll( 'guests', ' is_inside = 0 OR is_inside IS NULL ORDER BY time_reg ASC');
            return  $items;
        }
        public static function getByDistribution($id){
            $items = R::findAll( 'guests', ' position = 2 AND branch = '.$id.' ORDER BY time_reg ASC');
            return  $items;
        }
        public static function getByDistributionTable($id, $table){
            $items = R::findAll( 'guests', ' position = 2 AND branch = '.$id.' AND (`table` = '.$table.' OR `table` IS NULL) AND is_inside IN(0, 1, 4, 6, 7) ORDER BY time_reg ASC');
            //echo ' position = 2 AND branch = '.$id.' AND `table` = '.$table.'  ORDER BY time_reg DESC';
            return  $items;
        }

        public static function getTestDrive(){
            $items = R::findAll( 'guests', ' is_inside = 1 AND position = 3 ORDER BY time_reg ASC');
            //$items = R::findAll( 'guests' , ' ORDER BY time_reg DESC');
            return  $items;
        }
        public static function finishGuest($id){
            $item = R::load('guests', $id);
            $item->is_inside = 5;
            $id = R::store($item);
            return  $id;
        }
        public static function takeGuest($id, $table){
            $item = R::load('guests', $id);
            $item->is_inside = 6;
            $item->table = $table;
            $id = R::store($item);
            return  $id;
        }
        public static function takeGuestTest($id){
            $item = R::load('guests', $id);
            $item->is_inside = 6;
            $id = R::store($item);
            return  $id;
        }
        public static function callGuest($id, $table){
            $item = R::load('guests', $id);
            $item->is_inside = 7;
            $item->table = $table;
            $id = R::store($item);
            return  $id;
        }
        public static function callGuestTest($id){
            $item = R::load('guests', $id);
            $item->is_inside = 7;
            $id = R::store($item);
            return  $id;
        }
        public static function setBranch($id, $branch){
            $item = R::load('guests', $id);
            $item->branch = $branch;
            $id = R::store($item);
            return  $id;
        }
        public static function changePosition($id, $branch){
            $item = R::load('guests', $id);
            $item->branch = $branch;
            $item->table = null;
            print  json_encode($item->branch);
            $id = R::store($item);
        }
        public static function pausePosition($id){
            $item = R::load('guests', $id);
            if($item->is_inside == 4){
                $item->is_inside = 1;
            }else{
                $item->is_inside = 4;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://rest.nexmo.com/sms/json?api_key=dcdcd09a&api_secret=d82f807f&from=TagMedia&to=972" . substr($item->phone, 1, 11) . "&text=You+missed+your+que+!+Please+get+back");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
                $output = curl_exec($ch);
                curl_close($ch);
            }
            R::store($item);
        }

        public static function register($id){
            $item = R::load('guests', $id);
            $item->is_inside = 1;
            $item->position = 2;
            $item->prev_position = 1;
            $date = new DateTime();
            $date->setTimestamp(time());
            $item->time_reg = $date->format('Y-m-d H:i:s');


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://rest.nexmo.com/sms/json?api_key=dcdcd09a&api_secret=d82f807f&from=TagMedia&to=972" . substr($item->phone, 1, 11) . "&text=Welcome+to+test+drive+event!+Your+number+in+que+is+" . $item->id . "");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
            $output = curl_exec($ch);
            curl_close($ch);
            R::store($item);
            print $item->position;
        }
        public static function switchPosition($id){

            $item = R::load('guests', $id);
            $item->is_inside = 1;
            if($item->position == 1){
                $item->position = 2;
                $item->prev_position = 1;
                $date = new DateTime();
                $date->setTimestamp(time());
                $item->time_reg = $date->format('Y-m-d H:i:s');
            }elseif($item->position == 2){
                $item->position = 3;
                $item->prev_position = $item->branch;
                $item->last_stage = 1;
                $date = new DateTime();
                $date->setTimestamp(time());
                $item->time_prev = $date->format('Y-m-d H:i:s');
                $item->time_reg = $date->format('Y-m-d H:i:s');
            }elseif($item->position == 3){
                $item->is_inside = 1;
                $item->prev_position = 999;
                $date = new DateTime();
                $date->setTimestamp(time() + 300);
                $item->time_reg = $date->format('Y-m-d H:i:s');
                $item->position = 2;
            }elseif($item->position == null){
                $item->position = 2;
                $item->prev_position = 1;
                $date = new DateTime();
                $date->setTimestamp(time());
                $item->time_reg = $date->format('Y-m-d H:i:s');
            }else{
                $item->position == 2;
                $item->prev_position = 1;
                $date = new DateTime();
                $date->setTimestamp(time());
                $item->time_reg = $date->format('Y-m-d H:i:s');
            }


            /*
            $item = R::load('guests', $id);
            $item->is_inside = 1; 
            if($item->position == 1){
                $item->position = 2;
                $item->prev_position = 1;
            }elseif($item->position == 2){
                $item->position = 3;
                $item->prev_position = $item->branch;
                $item->last_stage = 1;
                $date = new DateTime();
                $date->setTimestamp(time());
                $item->time_prev = $date->format('Y-m-d H:i:s');
            }elseif($item->position == 3){
                $item->is_inside = 3;
                $date = new DateTime();
                $date->setTimestamp(time());
                $item->time_left = $date->format('Y-m-d H:i:s');
                $item->position = 2;
            }elseif($item->position == null){
                $item->position = 2;
            }else{
                $item->position == 2;
            }
            */


            R::store($item);
            print $item->position;
        }  


    }