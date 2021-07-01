
        (function($,W,D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#form").validate({
                        rules: {
                            knjigaNaziv: {
                                required: true,
                                minlength: 2,
                                maxlength: 100
                            },
                            pisac: {
                                required: true
                            },
                            knjigaIzdanje: {
                                required: true,
                                minlength: 1,
                                maxlength: 10,
                                number: true
                            },
                            knjigaTiraz: {
                                required: true,
                                minlength: 1,
                                maxlength: 10,
                                number: true
                            },
                            knjigaCena: {
                                required: true,
                                minlength: 1,
                                maxlength: 10,
                                number: true

                            },
                            knjigaStanje: {
                                required: true,
                                minlength: 1,
                                maxlength: 10,
                                number: true

                            }
                        },
                        messages: {
                            knjigaNaziv: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 2 karaktera!",
                                maxlength: "Polje može imati maksimum 100 karaktera!"
                            },
                            pisac: {
                                required: "Polje je obavezno!"
                            },
                            knjigaIzdanje: {
                                required: "Polje je obavezno!" ,
                                minlength: "Polje mora imati minimum 1 karaktera!",
                                maxlength: "Polje može imati maksimum 10 karaktera!",
                                number: "Morate uneti brojeve!"
                            },
                            knjigaTiraz: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 1 karaktera!",
                                maxlength: "Polje može imati maksimum 10 karaktera!",
                                number: "Morate uneti brojeve!"
                            },
                            knjigaCena: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 1 karaktera!",
                                maxlength: "Polje može imati maksimum 10 karaktera!",
                                number: "Morate uneti brojeve!"
                            },
                            knjigaStanje: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 1 karaktera!",
                                maxlength: "Polje može imati maksimum 10 karaktera!",
                                number: "Morate uneti brojeve!"
                            }
                        },
                        submitHandler: function(form) {
                            form.submit();
                        }
                    });
                }
            }
            $(D).ready(function($) {
                JQUERY4U.UTIL.setupFormValidation();
            });
        })(jQuery, window, document);
  
   