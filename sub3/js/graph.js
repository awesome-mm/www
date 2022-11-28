const data = {
  labels: [
    '2017', '2018 ', '2019', '2020', '2021'
  ], //항목
  datasets: [{
    label: '자산 총계',
    data: [3153, 3582, 4449, 5492, 7119], //값
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
    ],
    borderWidth: 1
  }]
};

const config = {
  type: 'bar', //그래프형태
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};


const myChart1 = new Chart(
  document.getElementById('myChart1'),
  config
);

const data2 = {
  //항목
  labels: [
    '2017', '2018 ', '2019', '2020', '2021'
  ],
  datasets: [ {
      type: 'bar',
      label: '영업이익',
      data: [427, 412, 291, -250, 1026],
      backgroundColor: [
        'rgb(255, 205, 86)',
      ],
      borderColor: [
        'rgb(255, 205, 86)',

      ],
    }, {
      type: 'bar',
      label: '순이익',
      data: [411, 427, 271, 82, 1455],
      backgroundColor: [
        'rgba(54, 162, 235, 0.2)',
      ],
      borderColor: [
        'rgba(54, 162, 235, 0.2)',
      ],
    },{ 
      label: '매출',
      data: [2727, 2630, 2546, 1185, 3773],
      type: 'bar',
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 0.2)'
      ],
    }],
    labels: [
      '2017', '2018 ', '2019', '2020', '2021'
    ],
    


    borderWidth: 1
  
};

const config2 = {
  type: 'bar', //그래프형태
  data: data2,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};


const myChart2 = new Chart(
  document.getElementById('myChart2'),
  config2
);
