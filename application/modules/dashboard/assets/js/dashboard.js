$(document).ready(function() {

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
            {
                label: 'Total Visit',
                data: [],
                backgroundColor: 'rgba(255, 99, 132, 0.2)', 
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1
            },

            {
                label: 'Total Bill',
                data: [],
                // type: 'line',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }

            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });


    var getData = function() {
        $.ajax({
            url:'dashboard/totalvisit',
            success: function(result) { 
                  myChart.data.datasets[0].data = result;  
                  myChart.update();
                }
        });

         $.ajax({
            url:'dashboard/totalbill',
            success: function(result) { 
                  myChart.data.datasets[1].data = result;  
                  myChart.update();
                }
        });

    };
    getData();
    // setInterval(getData, 3000); 


});