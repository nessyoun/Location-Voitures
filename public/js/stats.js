function activateStats() {
    var active = document.getElementById('stats');
    active.classList.add('activer');

    var app = document.getElementById('sidebar');
    document.body.classList.remove("bg-dark");
    app.classList.add('bg-dark');
    app.classList.add('text-white');
}

function createBarChart(labels, values) {
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Profit',
                data: values,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function createDoughnutChart(labels,values) {
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First Dataset',
            data: values,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
    };

    var myChart2 = new Chart(document.getElementById('myChart1'), config);
}




activateStats();






async function fetchProfitData() {
    try {
      const response = await fetch('http://localhost:8000/profit');
      
      if (!response.ok) {
        throw new Error('La requête a échoué');
      }
      
      const data = await response.json(); // Supposons que les données sont au format JSON
      
      if (data && data.labels && data.values) {
        const { labels, values } = data;
        return { labels, values };
      } else {
        throw new Error('Les données reçues ne sont pas au format attendu');
      }
    } catch (error) {
      console.error(error);
      return null; // En cas d'erreur, vous pouvez retourner null ou gérer l'erreur de manière appropriée
    }
  }

  async function fetchProfitDataForDonuts() {
    try {
      const response = await fetch('http://localhost:8000/carRank');
      
      if (!response.ok) {
        throw new Error('La requête a échoué');
      }
      
      const data = await response.json(); // Supposons que les données sont au format JSON
      
      if (data && data.labels && data.values) {
        const { labels, values } = data;
        return { labels, values };
      } else {
        throw new Error('Les données reçues ne sont pas au format attendu');
      }
    } catch (error) {
      console.error(error);
      return null; // En cas d'erreur, vous pouvez retourner null ou gérer l'erreur de manière appropriée
    }
  }
  

  fetchProfitData()
    .then(result => {
      if (result) {
        const labels = result.labels;
        const values = result.values;
        createBarChart(labels,values);
        console.log('Labels:', labels);
        console.log('Values:', values);
      } else {
        console.log('La récupération des données a échoué.');
      }
    });
  
    fetchProfitDataForDonuts()
    .then(result => {
      if (result) {
        const labels = result.labels;
        const values = result.values;
        createDoughnutChart(labels,values);

        console.log('Labels:', labels);
        console.log('Values:', values);
      } else {
        console.log('La récupération des données a échoué.');
      }
    });