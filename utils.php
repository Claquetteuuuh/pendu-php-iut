<?php
    function random_word($filename){
        $content = file_get_contents($filename);
        $result = explode("\n", $content);

        $n = random_int(0, count($result));

        return strtolower($result[$n]);
    }

    function random_word_db($db){

        $request = 'SELECT valeur FROM mots';
        $results = $db->query($request);
        $n = random_int(0, mysqli_num_rows($results)-1);
        for ($i=0; $i <= $n; $i++) { 
            $row=mysqli_fetch_array($results);
            if($n == $i){
                mysqli_free_result($results);
                return strtolower($row["valeur"]);
            }
        } 
    }

    function render_word($word, $letters){
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

    function is_in($letter, $word){
        if(in_array(strtolower($letter), str_split(strtolower($word)))){
            return true;
        }else{
            return false;
        }
    }

    function win($letters, $word){
        $rendered = render_word($_SESSION["mot"], $_SESSION["letters"]);
        if($rendered == $word){
            return true;
        }
        return false;
    }
?>