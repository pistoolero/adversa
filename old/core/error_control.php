<?php

if(isset($_COOKIE['error'])){
    echo "<div class='alert alert-dismissible alert-danger z-depth-1 alert-cookie' role='alert' style='margin-top: 2em; padding-right: 1em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-warning'></span> <strong>Uwaga!</strong> ";
    switch($_COOKIE['error']){
        case 0:
            echo "Proszę wypełnić wszystkie pola!";
            break;
        case 1:
            echo "Podane hasła nie są identyczne!";
            break;
        case 2:
            echo "Taki użytkownik już istnieje!";
            break;
        case 3:
            echo "Podany email jest już w użyciu!";
            break;
        case 4:
            echo "Użytkownik o takiej nazwie nie istnieje!";
            break;
        case 5:
            echo "Błędne hasło";
            break;
        case 6:
            echo "Twoje konto jest nieaktywne!";
            break;
        case 9:
            echo "Wypełnij wszystkie pola!";
            break;
        case 10:
            echo "Stare hasło jest niepoprawne!";
            break;
        case 11:
            echo "Hasła nie są identyczne!";
            break;
        case 12:
            echo "Stare i nowe hasło nie może być takie same!";
            break;
        case 13:
            echo "Musisz być zalogowany!";
            break;
        case 15:
            echo "Plik już istnieje na serwerze";
            break;
        case 16:
            echo "Plik jest za duży";
            break;
        case 17:
            echo "Plik musi mieć rozszerzenie <b>jpg</b>, <b>png</b> lub <b>gif</b>.";
            break;
        case 18:
            echo "Przerpaszamy, ale Twoje konto zostało zablokowane. Skontaktuj się z administratorem.";
            break;
        case 20:
            echo "Nie masz wystarczających uprawnień!";
            break;
        case 21:
            echo "Ilość postów musi być <strong>liczbą</strong>";
            break;
        case 22:
            echo "Nie masz wystarczającej ilości punktów";
            break;
        case 23:
            echo "Niepoprawne reCaptcha";
            break;
        case 24:
            echo "Nie możesz usunąć kapitana z drużyny";
            break;
        case 25:
            echo "Nie jesteś kapitanem tej drużyny";
            break;
        case 26:
            echo "Jesteś już członkiem jakiejś drużyny";
            break;
        case 27:
            echo "Liczba członków w drużynie nie może być większa od 7";
            break;
        case 28:
            echo "Wysłałeś już prośbę do tej drużyny. Poczekaj na odpowiedź.";
            break;
        case 29:
            echo "Użytkownik ma już drużynę, automatycznie anulowano prośbę.";
            break;
        case 30:
            echo "Nie możesz wezwać admina więcej niż raz";
            break;
        case 31:
            echo "Musisz zaznaczyć min. 5 zawodników";
            break;
        case 32:
            echo "Wszyscy zawodnicy muszą mieć zweryfikowane konto CS:GO";
            break;
        case 33:
            echo "Podane konto CS:GO jest już przypisane do innego użytkownika";
            break;
        case 34:
            echo "Turniej ma już maksymalną ilość drużyn";
            break;
        case 35:
            echo "Twoja drużyna jest już zapisana do tego turnieju";
            break;
        case 36:
            echo "Nie udało się uruchomić serwera";
            break;
        case 37:
            echo "Nie udało się zatrzymać serwera";
            break;
        case 38:
            echo "Nie udało się zrestartować serwera";
            break;
        case 39:
            echo "Brak dostępu lub błąd 404";
            break;


        default:
            echo "Nieznany błąd. Spróbuj ponownie.";
            break;
    }
    echo "</div>";
}else if(isset($_COOKIE['success'])){
    echo "<div class='alert alert-dismissible alert-success alert-cookie' role='alert' style='margin-top: 2em; padding-right: 1em;'><button data-dismiss=\"alert\" class=\"close\" type=\"button\">&times;</button><span class='fa fa-fw fa-check'></span> ";
    switch($_COOKIE['success']){
        case 0:
            echo "Rejestracja powiodła się. Aktywuj swoje konto na podanym przy rejestracji koncie email. Pamiętaj, aby sprawdzić SPAM!";
            break;
        case 1:
            echo "Konto zostało aktywowane!";
            break;
        case 2:
            echo "Zostałeś wylogowany";
            break;
        case 4:
            echo "Zalogowano!";
            break;
        case 5:
            echo "Twoje hasło zostało poprawnie zmienione";
            break;
        case 6:
            echo "Zmiany zostały zapisane.";
            break;
        case 7:
            echo "Pomyślnie usunięto awatar";
            break;
        case 8:
            echo "Pomyślnie zakończono zadanie!";
            break;
        case 9:
            echo "Ponownie otworzono zadanie";
            break;
        case 10:
            echo "Usunięto zadanie";
            break;
        case 11:
            echo "Usunięto użytkownika";
            break;
        case 12:
            echo "Zbanowano użytkownika";
            break;
        case 13:
            echo "Odbanowano użytkownika";
            break;
        case 14:
            echo "Pomyślnie dodano streamera";
            break;
        case 15:
            echo $lang['changeLangSuccess'];
            break;
        case 16:
            echo "Pomyślnie dodano wideo premium";
            break;
        case 17:
            echo "Pomyślnie zakupiono video";
            break;
        case 18:
            echo "Pomyślnie dodano moduł";
            break;
        case 19:
            echo "Pomyślnie zmieniono kapitana drużyny";
            break;
        case 20:
            echo "Pomyślnie usunięto członka drużyny";
            break;
        case 21;
            echo "Wysłano Twoją prośbę o dołączenie do drużyny";
            break;
        case 22;
            echo "Zaakceptowano członka drużyny";
            break;
        case 23;
            echo "Odrzucono prośbę użytkownika o dołączenie do drużyny";
            break;
        case 24;
            echo "Zapisano drużynę do turnieju";
            break;
        case 25;
            echo "Wpis został dodany";
            break;
        case 26;
            echo "Profil został wyedytowany";
            break;
        case 27;
            echo "Wpis jest teraz promowany";
            break;
        case 28;
            echo "Wpis nie jest już promowany";
            break;
        case 29;
            echo "Wpis został opublikowany";
            break;
        case 30;
            echo "Wpis został ukryty";
            break;
        case 31;
            echo "Serwer został dodany";
            break;
        case 32;
            echo "Serwer został uruchomiony";
            break;
        case 33;
            echo "Serwer został zatrzymany";
            break;
        case 34;
            echo "Serwer został zrestartowany";
            break;
        case 35;
            echo "Turniej został utworzony";
            break;
        case 36;
            echo "Zaproszenie zostało wysłane";
            break;

        default:
            echo "Udało się!";
            break;
    }
    echo "</div>";
}

?>