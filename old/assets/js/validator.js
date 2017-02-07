/**
 * Created by Admin on 2016-03-24.
 */
var pl = {
    errorTitle: 'Nie udało się wysłać formularza!',
    requiredFields: 'Nie wypełniłeś wszystkich wymaganych pól',
    badTime: 'Podałeś zły czas',
    badEmail: 'Podałeś błędny adres e-mail',
    badTelephone: 'Podałeś błędny numer telefonu',
    badSecurityAnswer: 'Źle odpowiedziałeś na pytanie zabezpieczające',
    badDate: 'Wybrałeś nieprawidłową datę',
    lengthBadStart: 'The input value must be between ',
    lengthBadEnd: '.',
    lengthTooLongStart: 'Wprowadzona ilość znaków jest większa od ',
    lengthTooShortStart: 'Wprowadzona ilość znaków jest mniejsza od ',
    notConfirmed: 'Hasła nie pasują',
    badDomain: 'Nieprawidłowa wartość domeny',
    badUrl: 'Wprowadzona wartość zawiera błędny adres URL',
    badCustomVal: 'Wartość pola jest nieprawdiłowa',
    andSpaces: ' and spaces ',
    badInt: 'Wprowadzona wartość zawiera błędną liczbę',
    badSecurityNumber: 'Your social security number was incorrect',
    badUKVatAnswer: 'Incorrect UK VAT Number',
    badStrength: 'Hasło nie jest wystarczająco mocne',
    badNumberOfSelectedOptionsStart: 'You have to choose at least ',
    badNumberOfSelectedOptionsEnd: ' answers',
    badAlphaNumeric: 'Pole przyjmuje tylko wartości alfanumeryczne ',
    badAlphaNumericExtra: ' i ',
    wrongFileSize: 'Plik, który próujesz dodać jest za duży (max %s)',
    wrongFileType: 'Tylko pliki typu %s mogą zostać dodane',
    groupCheckedRangeStart: 'Wybierz pomiędzy ',
    groupCheckedTooFewStart: 'Wybierz conajmniej ',
    groupCheckedTooManyStart: 'Wybierz maksymalnie ',
    groupCheckedEnd: ' przedmiot(-y/-ów) ',
    badCreditCard: 'Numer karty kredytowej jest niepoprawny',
    badCVV: 'Numer CVV jest niepoprawny',
    wrongFileDim : 'Nieprawidłowe wymiary obraazka,',
    imageTooTall : 'obrazek nie może być wyższy niż',
    imageTooWide : 'obrazek nie może być szerszy niż',
    imageTooSmall : 'obrazek jest za mały',
    min : 'min',
    max : 'max',
    imageRatioNotAccepted : 'Proporcje obrazka są nieprawidłowe'
};

$.validate({
    validateOnBlur : true,
    showHelpOnFocus: true,
    disabledFormFilter : 'form.toggle-disabled',
    language : pl,
    modules : 'security, html5, toggleDisabled',
    onModulesLoaded : function() {
        var optionalConfig = {
            fontSize: '12pt',
            padding: '4px',
            bad: 'Słabe',
            weak: 'Średnie',
            good: 'Mocne',
            strong: 'Świetne',
            color: '#ffffff'
        };

        $('input[name="password-r"]').displayPasswordStrength(optionalConfig);
    }
});/**
 * Created by Admin on 2016-03-02.
 */
