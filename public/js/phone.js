let input = document.querySelector("#phone");

let iti = window.intlTelInput(input, {
    initialCountry: "bj",
    geoIpLookup: function(success, failure) {
        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "bj";
            success(countryCode);
        });
    },
    separateDialCode: true,
    utilsScript: "{{asset('intlTelInput/js/utils.js')}}",
});

$('#phoneform').submit(function(e) {
    if (!iti.isValidNumber() && $('#phone').val()) {
        e.preventDefault();
        $('#phone').addClass('is-invalid');
        $('#phone_div').after("<span class=\"invalid-feedback\" role=\"alert\"><strong>Numéro invalide</strong></span>");
    }
    else
        $('#phone').val(iti.getNumber(intlTelInputUtils.numberFormat.E164));
});