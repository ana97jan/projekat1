
        google.load('visualization', '1.0', {'packages':['corechart']});
        google.setOnLoadCallback(iscrtaj);

        function iscrtaj() {
            var jsonData = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json",
                dataType:"json",
                async: false
            }).responseText;

            var a = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=1",
                dataType:"json",
                async: false
            }).responseText;

            var b = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=2",
                dataType:"json",
                async: false
            }).responseText;

            var c = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=3",
                dataType:"json",
                async: false
            }).responseText;

            var d = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=4",
                dataType:"json",
                async: false
            }).responseText;

            var e = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=5",
                dataType:"json",
                async: false
            }).responseText;
            var f = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=6",
                dataType:"json",
                async: false
            }).responseText;

            var g = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=7",
                dataType:"json",
                async: false
            }).responseText;

            var h = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=8",
                dataType:"json",
                async: false
            }).responseText;

            var i = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=9",
                dataType:"json",
                async: false
            }).responseText;

            var j = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=10",
                dataType:"json",
                async: false
            }).responseText;

            var k = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=11",
                dataType:"json",
                async: false
            }).responseText;

            var l = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=12",
                dataType:"json",
                async: false
            }).responseText;

            var m = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=13",
                dataType:"json",
                async: false
            }).responseText;

            var n = $.ajax({
                url: "http://localhost/projekat/vizuelizacija.json?pisac=14",
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
            var data8 = new google.visualization.DataTable(h);
            var data9 = new google.visualization.DataTable(i);
            var data10 = new google.visualization.DataTable(j);
            var data11 = new google.visualization.DataTable(k);
            var data12 = new google.visualization.DataTable(l);
            var data13 = new google.visualization.DataTable(m);
            var data14 = new google.visualization.DataTable(n);


            var options = {'title': 'Prikaz knjiga na stanju',
                           'hAxis': {title: 'Količina',  titleTextStyle: {color: 'black', fontSize: 18}},
                           'width':800,
                           'height':600,
                           'colors': ['green']
                          };
          var chart = new google.visualization.BarChart(document.getElementById("chart_div"));

            // Funkcija događaja
            function dogadjaj() {
                var selectedItem = chart.getSelection()[0];
                if(selectedItem) {
                    var knjiga = data.getValue(selectedItem.row, 0);
                    var kolicina = data.getValue(selectedItem.row, 1);
                    alert('Knjiga: '+ knjiga +', Količina: '+ kolicina +' kom ');
                }
            }

            // Dodavanje osluškivača za klik događaj
            var listenerHandle = google.visualization.events.addListener(chart, 'select', dogadjaj);
            chart.draw(data,{width: 800, height: 1000,   title: 'Prikaz svih knjiga',colors:['green']});

            var buttonVizualizacija = document.getElementById('buttonVizualizacija');
            buttonVizualizacija.onclick = function() {
                var lista = document.forma.knjiga.selectedIndex;
                var izabranPisac = document.forma.knjiga.options[lista].value;
                if(izabranPisac == '') {
                    chart.draw(data, options);
                    listenerHandle = google.visualization.events.addListener(chart, 'select', dogadjaj);
                };
                if(izabranPisac == '1') {
                    chart.draw(data1, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranPisac == '2') {
                    chart.draw(data2, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranPisac == '3') {
                    chart.draw(data3, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranPisac == '4') {
                    chart.draw(data4, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranPisac == '5') {
                    chart.draw(data5, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranPisac == '6') {
                    chart.draw(data6, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranPisac == '7') {
                    chart.draw(data7, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranPisac == '8') {
                    chart.draw(data8, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranPisac == '9') {
                    chart.draw(data9, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranPisac == '10') {
                    chart.draw(data10, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranPisac == '11') {
                    chart.draw(data11, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranPisac == '12') {
                    chart.draw(data12, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranPisac == '13') {
                    chart.draw(data13, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
                if(izabranPisac == '14') {
                    chart.draw(data14, options);
                    google.visualization.events.removeListener(listenerHandle);
                };
            }
        }
    