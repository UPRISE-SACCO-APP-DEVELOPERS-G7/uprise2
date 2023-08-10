var ctx = document.getElementById("bar").getContext("2d");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Like',
            data: [2050, 1900, 2100, 2800, 1800, 2000, 2500, 2600, 2450, 1950, 2300, 2900],
            backgroundColor: [
                '#FF8300'

            ],
            borderColor: 'rgb(41, 155, 99)',
            borderWidth: 1
        },
        // {
        //     label: 'Dislike',
        //     data: [50, 190, 20, 800, 18, 20],
        //     backgroundColor: [
        //         '#0000D1'

        //     ],
        //     borderColor: 'rgb(41, 155, 99)',
        //     borderWidth: 1
        // }
    ]
    },
    options: {
        responsive: true
    }
});
