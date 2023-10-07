<?php

    namespace App;

    use PDO;
    use App\Config;

    class Utils{
        static function random_word($filename){
            $content = file_get_contents($filename);
            $result = explode("\n", $content);
    
            $n = random_int(0, count($result));
    
            return strtolower($result[$n]);
        }
    
        static function random_word_db($db){
    
            $request = 'SELECT valeur FROM mots';
            $objects = $db->query($request, Config::$PATH_MODELS."Mots");
        
            $n = random_int(0, sizeof($objects));
            return $objects[$n]->getValeur();
        }
    
        static function render_word($word, $letters){
            $new = "";
            foreach (str_split(strtolower($word)) as $key => $letter) {
                if( in_array($letter, str_split(strtolower($letters))) || $key == 0){
                    $new = $new . $letter;
                }else{
                    $new = $new . "_";
                }
            }
            return strtolower($new);
        }
    
        static function is_in($letter, $word){
            if(in_array(strtolower($letter), str_split(strtolower($word)))){
                return true;
            }else{
                return false;
            }
        }
    
        static function win($letters, $word){
            $rendered = self::render_word($word, $letters);
            if(strtolower($rendered) == strtolower($word)){
                return true;
            }
            return false;
        }
    }
    
