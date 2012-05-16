<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of utilities
 *
 * @author charles
 */
class utilities {
    
    static function getRandomNum($min = 0, $max = 100){
        $url = 'http://www.random.org/integers/?num=1&min='.$min.'&max='.$max.'&base=10&format=plain&rnd=new&col=5';
        $file = fopen($url, 'r');
        return $num = (int) fread($file, strlen(file_get_contents($url)));
    }
    
    static function getRequest($value, $mysql = false){
        $result = trim(htmlspecialchars(str_replace(array("\r\n", "\r", "\0"), array("\n", "\n", ''), $_REQUEST[$value]), ENT_COMPAT, 'UTF-8'));
        return $result;
    }
    
    static function textToLinks($text){
        $tlds = array(".aero",".biz",".cat",".com",".coop",".edu",".gov",".info",".int",".jobs",".mil",".mobi",".museum",
                        ".name",".net",".org",".travel",".ac",".ad",".ae",".af",".ag",".ai",".al",".am",".an",".ao",".aq",".ar",".as",".at",".au",".aw",
                        ".az",".ba",".bb",".bd",".be",".bf",".bg",".bh",".bi",".bj",".bm",".bn",".bo",".br",".bs",".bt",".bv",".bw",".by",".bz",".ca",
                        ".cc",".cd",".cf",".cg",".ch",".ci",".ck",".cl",".cm",".cn",".co",".cr",".cs",".cu",".cv",".cx",".cy",".cz",".de",".dj",".dk",".dm",
                        ".do",".dz",".ec",".ee",".eg",".eh",".er",".es",".et",".eu",".fi",".fj",".fk",".fm",".fo",".fr",".ga",".gb",".gd",".ge",".gf",".gg",".gh",
                        ".gi",".gl",".gm",".gn",".gp",".gq",".gr",".gs",".gt",".gu",".gw",".gy",".hk",".hm",".hn",".hr",".ht",".hu",".id",".ie",".il",".im",
                        ".in",".io",".iq",".ir",".is",".it",".je",".jm",".jo",".jp",".ke",".kg",".kh",".ki",".km",".kn",".kp",".kr",".kw",".ky",".kz",".la",".lb",
                        ".lc",".li",".lk",".lr",".ls",".lt",".lu",".lv",".ly",".ma",".mc",".md",".mg",".mh",".mk",".ml",".mm",".mn",".mo",".mp",".mq",
                        ".mr",".ms",".mt",".mu",".mv",".mw",".mx",".my",".mz",".na",".nc",".ne",".nf",".ng",".ni",".nl",".no",".np",".nr",".nu",
                        ".nz",".om",".pa",".pe",".pf",".pg",".ph",".pk",".pl",".pm",".pn",".pr",".ps",".pt",".pw",".py",".qa",".re",".ro",".ru",".rw",
                        ".sa",".sb",".sc",".sd",".se",".sg",".sh",".si",".sj",".sk",".sl",".sm",".sn",".so",".sr",".st",".su",".sv",".sy",".sz",".tc",".td",".tf",
                        ".tg",".th",".tj",".tk",".tm",".tn",".to",".tp",".tr",".tt",".tv",".tw",".tz",".ua",".ug",".uk",".um",".us",".uy",".uz", ".va",".vc",
                        ".ve",".vg",".vi",".vn",".vu",".wf",".ws",".ye",".yt",".yu",".za",".zm",".zr",".zw");
        $text = explode(" ", $text);
        for($x = 0; $x < count($text); $x++){
            if(substr($text[$x], 0, 7) == 'http://' || substr($text[$x], 0, 3) == 'www') $link = true;
            $_tld = explode('.', $text[$x]);
            if(count($_tld) > 1){ 
                $_tld = array_pop($_tld);
                $_tld = ".".$_tld;
                var_dump($_tld);
                if(in_array($_tld, $tlds)) $link = true;
            }
            if($link === true) $text[$x] = '<a href="'.$text[$x].'">'.$text[$x].'</a>';
        }
        return implode(" ", $text);
    }
    
    static function Derpxecute($text){
        $fileContents = file(SERVER_DIR."/plugins/Derpxecute/commands.txt");
        if(in_array($text.PHP_EOL, $fileContents)) {
            throw new Exception('Already queued for Derpxecute');
            return false;
        }
        $file = @fopen(SERVER_DIR."/plugins/Derpxecute/commands.txt", "a");
        if($file){
            if(!empty($text)){
                echo "writing";
                fwrite($file, $text.PHP_EOL);
                fclose($file);
                $file = fopen(__DIR__."/logs/generallog.txt", "a");
                fwrite($file, $text.PHP_EOL);
                fclose($file);
                return true;
            }
            else {
                throw new Exception('No command specified for Derpxecute');
                return false;
            }
        }
        else {
            throw new Exception('Unable to write to file for Depxecute');
            return false;
            }
        
    }
    
    static function sendmail($who, $subject, $contents){
        $headers = 
            'From: mcmaster@minederp.com' . "\r\n" .
            'Reply-To: ctharvey@me.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        if(!mail($who, $subject, $contents, $headers)){
            throw new Exception("Unable to send mail: ");
        }
    }
}
?>
