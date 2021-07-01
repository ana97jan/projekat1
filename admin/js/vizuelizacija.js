        google.load('visualization', '1.0', {'packages':['corechart']});
        google.setOnLoadCallback(iscrtaj);

        function iscrtaj() {
            var jsonData = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json",
                dataType:"json",
                async: false
            }).responseText;

            var a = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?proizvodjac=1",
                dataType:"json",
                async: false
            }).responseText;

            var b = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?proizvodjac=2",
                dataType:"json",
                async: false
            }).responseText;

            var c = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?proizvodjac=3",
                dataType:"json",
                async: false
            }).responseText;

            var d = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?proizvodjac=4",
                dataType:"json",
                async: false
            }).responseText;

            var e = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?proizvodjac=5",
                dataType:"json",
                async: false
            }).responseText;
            var f = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?proizvodjac=6",
                dataType:"json",
                async: false
            }).responseText;

            var g = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?proizvodjac=7",
                dataType:"json",
                async: false
            }).responseText;

          

            var data = new google.visualization.DataTable(jsonData);
            var data1 = new google.visualization.DataTable(a);
            var data2 = new google.visualization.DataTable(b);
            var data3 = new google.visualization.DataTable(c);
            var data4 = new google.visualization.DataTable(d);
            var data5 = new google.visualization.DataTable(e);
            var data6 = new google.visualization.DataTable(f);
            var data7 = new google.visualization.DataTable(g);
           


            var options = {'title': 'Prikaz naocara',
                           'hAxis': {title: 'Količina',  titleTextStyle: {color: 'black', fontSize: 18}},
                           'width':800,
                           'height':545,
                           'colors': ['green']
                          };
          var chart = new google.visualization.BarChart(document.getElementById("chart_div"));

            // Funkcija događaja
            function dogadjaj() {
                var selectedItem = chart.getSelection()[0];
                if(selectedItem) {
                    var naocare = data.getValue(selectedItem.row, 0);
                    var kolicina = data.getValue(selectedItem.row, 1);
                    alert('Naocare: '+ naocare +', Količina: '+ kolicina +' kom ');
                }
            }

            // Dodavanje osluškivača za klik događaj
            var listenerHandle = google.visualization.events.addListener(chart, 'select', dogadjaj);
            chart.draw(data,{width: 800, height: 1000,   title: 'Prikaz naocara',colors:['green']});

            var buttonVizualizacija = document.getElementById('buttonVizualizacija');
            buttonVizualizacija.onclick = function() {
                var lista = document.forma.naocare.selectedIndex;
                var izabranProizvodjac = document.forma.naocare.options[lista].value;
                if(izabranProizvodjac == '') {
                    chart.draw(data, options);
                    listenerHandle = google.visualization.events.addListener(chart, 'select', dogadjaj);
                };
                if(izabranProizvodjac == '1') {
                    chart.draw(data1, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranProizvodjac == '2') {
                    chart.draw(data2, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranProizvodjac == '3') {
                    chart.draw(data3, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranProizvodjac == '4') {
                    chart.draw(data4, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranProizvodjac == '5') {
                    chart.draw(data5, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranProizvodjac == '6') {
                    chart.draw(data6, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranProizvodjac == '7') {
                    chart.draw(data7, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
               
            }
        }
