$(function (e) {
    "use strict";
        $(".date-inputmask").inputmask("dd-mm-yyyy"),
        //$(".tanggal-inputmask").inputmask("**-**-****"),
        $(".tanggal-inputmask").inputmask({
            mask: "**-**-****"
        }),
        $(".hp-inputmask").inputmask("999999999999"),
        $(".phone-inputmask").inputmask("(999) 999-9999"),
        $(".international-inputmask").inputmask("+9(999)999-9999"),
        $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
        $(".purchase-inputmask").inputmask("aaaa 9999-****"),
        $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
        $(".18-nummask").inputmask("999999999999999999"),
        $(".16-nummask").inputmask("9999999999999999"),
        $(".12-nummask").inputmask("999999999999"),
        $(".8-nummask").inputmask("99999999"),
        $(".7-nummask").inputmask("99999999"),
        $(".2-nummask").inputmask("99"),
        $(".kta-inputmask").inputmask("9999/99-999 ***"),
        $(".nip-inputmask").inputmask("999999999999999999"),
        $(".nik-inputmask").inputmask("9999999999999999"),
        $(".npwp-inputmask").inputmask("****************"),
        $(".bpjs-inputmask").inputmask("9999999999999999"),
        $(".ssn-inputmask").inputmask("999-99-9999"),
        $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
        $(".currency-inputmask").inputmask("$9999"),
        $(".rupiah-inputmask").inputmask("Rp. 9.999.999"),
        $(".percentage-inputmask").inputmask("99%"),
        $(".optional-inputmask").inputmask("(99) 9999[9]-9999"),
        $(".decimal-inputmask").inputmask({
            alias: "decimal"
            , radixPoint: "."
        }),

        $(".email-inputmask").inputmask({
            mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]"
            , greedy: !1
            , onBeforePaste: function (n, a) {
                return (e = e.toLowerCase()).replace("mailto:", "")
            }
            , definitions: {
                "*": {
                    validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]"
                    , cardinality: 1
                    , casing: "lower"
                }
            }
        }),
        $("#num-letter").inputmask("999-AAA"),
        $("#date-time-once").inputmask(),
        $('input').inputmask({ "placeholder": "" })

});