 function pretrazi(tekst) {
            var bodyTabele = document.getElementById('ajaxPodaci');
            var url = "http://localhost/projekat/knjiga/'.$pisacID.'.json?search="+ tekst;
            $.getJSON(url, function(odgovorServisa) {
                bodyTabele.innerHTML = "";
                $.each(odgovorServisa.knjiga,function(i, knjiga) {
                    $("#ajaxPodaci").append("<tr>"+
                            "<td>"+ knjiga.knjigaNaziv +"</td> "+
                            "<td>"+ knjiga.knjigaIzdanje +"</td>"+
                            "<td>"+ knjiga.knjigaTiraz +"</td>"+
                            "<td>"+ knjiga.knjigaCena +"</td>" +
                            "<td>"+ knjiga.knjigaStanje +"</td>" +
                            "<td>"+ knjiga.pisacPrezime +"</td>" +
                            "</tr>");
                })
            });
        }