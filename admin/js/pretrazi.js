 function pretrazi(tekst) {
            var bodyTabele = document.getElementById('ajaxPodaci');
            var url = "http://localhost/projekat/naocare/'.$proizvodjacID.'.json?search="+ tekst;
            $.getJSON(url, function(odgovorServisa) {
                bodyTabele.innerHTML = "";
                $.each(odgovorServisa.naocare,function(i, naocare) {
                    $("#ajaxPodaci").append("<tr>"+
                            "<td>"+ naocare.naocareNaziv +"</td> "+
                            "<td>"+ naocare.naocareGod +"</td>"+
                            "<td>"+ naocare.naocareCena +"</td>" +
                            "<td>"+ naocare.naocareStanje +"</td>" +
                            "<td>"+ naocare.proizvodjacNaziv +"</td>" +
                            "</tr>");
                })
            });
        }