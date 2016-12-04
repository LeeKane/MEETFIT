/**
 * Created by mac on 16/10/20.
 */

// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('pie'));

// 指定图表的配置项和数据
option = {


    title: {
        text: '',
        left: 'center',
        top: 20,
        textStyle: {
            color: '#ccc'
        }
    },

    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },

    visualMap: {
        show: false,
        min: 80,
        max: 600,
        inRange: {
            colorLightness: [0, 1]
        }
    },
    series : [
        {
            name:'运动类型与消耗卡路里',
            type:'pie',
            radius : '55%',
            center: ['50%', '50%'],
            data:[
                {value:335, name:'跑步'},
                {value:310, name:'足球'},
                {value:274, name:'骑行'},
                {value:235, name:'游泳'},
                {value:400, name:'健身运动'}
            ].sort(function (a, b) { return a.value - b.value}),
            roseType: 'angle',
            label: {
                normal: {
                    textStyle: {
                        color: 'rgba(0, 0, 0, 0.3)'
                    }
                }
            },
            labelLine: {
                normal: {
                    lineStyle: {
                        color: 'rgba(0, 0, 0, 0.3)'
                    },
                    smooth: 0.2,
                    length: 10,
                    length2: 20
                }
            },
            itemStyle: {
                normal: {
                    color: '#c23531',
                    shadowBlur: 200,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};

// 使用刚指定的配置项和数据显示图表。
myChart.setOption(option);


var comChart = echarts.init(document.getElementById('com'));
option = {
    title: {
        text: '',
    },
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        data: ['you', 'friend']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis: {
        type: 'value',
        boundaryGap: [0, 0.01]
    },
    yAxis: {
        type: 'category',
        data: ['跑步','游泳','足球','健身运动','骑行','总量']
    },
    series: [
        {
            name: 'you',
            type: 'bar',
            data: [18203, 23489, 29034, 104970, 131744, 630230]
        },
        {
            name: 'friend',
            type: 'bar',
            data: [19325, 23438, 31000, 121594, 134141, 681807]
        }
    ]
};
comChart.setOption(option);

var radChart=echarts.init(document.getElementById('rad'));
option = {
    title: {
        text: ''
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        x: 'center',
        data:['','','','','']
    },
    radar: [
        {
            indicator: [
                {text: '运动量', max: 100},
                {text: '毅力', max: 100},
                {text: '科学锻炼', max: 100},
                {text: '睡眠质量', max: 100}
            ],
            center: ['50%','40%'],
            radius: 80
        },

    ],
    series: [
        {
            type: 'radar',
            tooltip: {
                trigger: 'item'
            },
            itemStyle: {normal: {areaStyle: {type: 'default'}}},
            data: [
                {
                    value: [60,73,85,40],
                    name: '评分'
                }
            ]
        }
    ]
};
radChart.setOption(option);