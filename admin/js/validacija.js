        (function($,W,D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#form").validate({
                        rules: {
                            naocareNaziv: {
                                required: true,
                                minlength: 2,
                                maxlength: 100
                            },
                            proizvodjac: {
                                required: true
                            },
                            naocareGod: {
                                required: true,
                                minlength: 1,
                                maxlength: 10,
                                number: true
                            },
                            naocareStanje: {
                                required: true,
                                minlength: 1,
                                maxlength: 10,
                                number: true
                            },
                            naocareCena: {
                                required: true,
                                minlength: 1,
                                maxlength: 10,
                                number: true
                            },
                            
                        },
                        messages: {
                            naocareNaziv: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 2 karaktera!",
                                maxlength: "Polje može imati maksimum 100 karaktera!"
                            },
                            proizvodjac: {
                                required: "Polje je obavezno!"
                            },
                            naocareGod: {
                                required: "Polje je obavezno!" ,
                                minlength: "Polje mora imati minimum 1 karaktera!",
                                maxlength: "Polje može imati maksimum 10 karaktera!",
                                number: "Morate uneti brojeve!"
                            },
                            
                            naocareCena: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 1 karaktera!",
                                maxlength: "Polje može imati maksimum 10 karaktera!",
                                number: "Morate uneti brojeve!"
                            },
                            naocareStanje: {
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
