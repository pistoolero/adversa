<?php
function keepAlive($userid){
    include(__DIR__.'/../database.php');
    $query = "UPDATE users SET last_online = :time WHERE user_id = :userid";
    $sel = $db -> Prepare($query);
    $sel -> bindParam(":time",time(),PDO::PARAM_INT);
    $sel -> bindParam(":userid",$userid,PDO::PARAM_INT);
    $sel -> Execute();

}
function time_ago($data_wejsciowa, $show_date = true) {
    $okres = $data_wejsciowa;
    $now = time();
    $ending_date = "";
    $ending_time = "";
    if ($okres > $now) {
        return "Podana data nie może być większa od obecnej.";
    }

    if ($show_date) {
        $ending_date = ", ".date("Y-m-d", $okres);
        $ending_time = " o ".date("H:i", $okres);
    }

    $diff = $now - $okres;

    $minut = floor($diff/60);
    $godzin = floor($minut/60);
    $dni = floor($godzin/24);
    $miesiecy = intval((date('Y', $now) - date('Y', $okres))*12 + (date('m', $now) - date('m', $okres)));
    $lata = intval(date('Y', $now) - date('Y', $okres));
    if ($diff < 60){
        switch($diff){
            case 0: return "przed chwilą";
            case ($diff >= 2 && $diff <= 4):
            case ($diff >= 22 && $diff <= 24):
            case ($diff >= 32 && $diff <= 34):
            case ($diff >= 42 && $diff <= 44):
            case ($diff >= 52 && $diff <= 54): return "$diff sekundy temu"; break;
            default: return "$diff sekund temu"; break;
        }
    }
    if ($minut <= 60) {
        switch($minut) {
            case 1: return "minutę temu";
            case ($minut >= 2 && $minut <= 4):
            case ($minut >= 22 && $minut <= 24):
            case ($minut >= 32 && $minut <= 34):
            case ($minut >= 42 && $minut <= 44):
            case ($minut >= 52 && $minut <= 54): return "$minut minuty temu"; break;
            default: return "$minut minut temu"; break;
        }
    }

    $okres_wczoraj = $now-(60*60*24);
    $okres_przedwczoraj = $now-(60*60*24*2);

    if ($godzin > 0 && $godzin <= 6) {

        if ($godzin == 1) {
            return "Godzinę temu ";
        } else {
            if ($godzin >1 && $godzin<5) return "$godzin godziny temu";
            if ($godzin >4)return "$godzin godzin temu";
        }

    } else if (date("Y-m-d", $okres) == date("Y-m-d", $now)) {
        return "dzisiaj".$ending_time;
    } else if (date("Y-m-d", $okres_wczoraj) == date("Y-m-d", $okres)) {
        return "wczoraj".$ending_time;
    } else if (date("Y-m-d", $okres_przedwczoraj) == date("Y-m-d", $okres)) {
        return "przedwczoraj".$ending_time;
    }

    if ($dni > 0 && $dni <= intval(date('t', $okres))) {
        switch($dni) {
            case ($dni < 7): return "$dni dni temu".$ending_time; break;
            case 7: return "tydzień temu".$ending_time; break;
            case ($dni > 7 && $dni < 14): return "ponad tydzień temu".$ending_date; break;
            case 14: return "dwa tygodznie temu".$ending_date; break;
            case ($dni > 14 && $dni < 21): return "ponad 2 tygodnie temu".$ending_date; break;
            case 21: return "3 tygodnie temu, ".date("Y-m-d", $okres); break;
            case ($dni > 21 && $dni < 28): return "ponad 3 tygodnie temu".$ending_date; break;
            case ($dni >= 28 && $dni < 32): return "miesiąc temu"; break;
        }
    }


    if ($miesiecy > 0 && $miesiecy <= 12) {
        switch($miesiecy) {
            case 1: return "miesiąc temu".$ending_date; break;
            case 2: case 4: return "$miesiecy miesiące temu".$ending_date; break;
            case 3: return "ćwierć roku temu".$ending_date; break;
            case 6: return "pół roku temu".$ending_date; break;
            case 12: return "rok temu".$ending_date; break;
            default: return "$miesiecy miesiecy temu".$ending_date; break;
        }
    }

    if ($lata > 0) {
        $lata1 = array("2", "3", "4");
        $lata2 = array("0", "1", "5", "6", "7", "8", "9", "12", "13", "14");
        if ($lata == 1) {
            return "rok temu".$ending_date;
        } else if (in_array(substr("".$lata, -1), $lata2) || in_array(substr("".$lata, -2, 2), $lata2)) {
            return "$lata lat temu".$ending_date;
        } else if (in_array(substr((string)$lata, -1), $lata1)) {
            return "$lata lata temu".$ending_date;
        }
    }

    return date("Y-m-d", $okres);
}
function dateV($format,$timestamp=null)
{
    $to_convert = array(
        'l' => array('dat' => 'N', 'str' => array('Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela')),
        'F' => array('dat' => 'n', 'str' => array('styczeń', 'luty', 'marzec', 'kwiecień', 'maj', 'czerwiec', 'lipiec', 'sierpień', 'wrzesień', 'październik', 'listopad', 'grudzień')),
        'f' => array('dat' => 'n', 'str' => array('stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia'))
    );
    if ($pieces = preg_split('#[:/.\-, ]#', $format)) {
        if ($timestamp === null) {
            $timestamp = time();
        }
        foreach ($pieces as $datepart) {
            if (array_key_exists($datepart, $to_convert)) {
                $replace[] = $to_convert[$datepart]['str'][(date($to_convert[$datepart]['dat'], $timestamp) - 1)];
            } else {
                $replace[] = date($datepart, $timestamp);
            }
        }
        $result = strtr($format, array_combine($pieces, $replace));
        return $result;
    }
}
function set_active($page){
    if(isset($_GET['page']) AND $_GET['page'] == $page){
        echo 'selected';
    }elseif(!isset($_GET['page']) AND $page == "main"){
        echo 'selected';
    }
}
function set_active_top($page){
    if(isset($_GET['page']) AND $_GET['page'] == $page){
        echo 'selected-top';
    }
}