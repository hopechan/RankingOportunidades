var notas = [9.1,9.2,9.2,9.4,9.5,9.8];
var nombres = ["Estudiante 1", "Estudiante 2","Nombre", "Estudiante 3", "Estudiante 4", "Estudiante 5"];

var ctx = document.getElementById("grafico");

var barras = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: nombres,
        datasets: [{
            label: 'Ranking Oportunidades', // Name the series
            data: notas, // Specify the data values array
            backgroundColor: [ // Specify custom colors
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [ // Add custom color borders
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1 // Specify bar border width
        }]
    },
    options: {
      responsive: true, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    }
});