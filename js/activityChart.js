function initActivityChart()
{
    var options= comChart.getOption();
    var cUrl=window.location.href;
    var type=cUrl.toString().substring(cUrl.length-1);
    var url="index.php/ActivityController/activitySinglePoints/"+type;
    this.callback = function () {
                return function (data) {
                    var kk = url;
                    alert(kk);
                }
            };
    $.ajax({
        type:"post",
        url:url,
        dataType:"json",
        timeout:120000,
        error: this.callback(), 

        success: function(jsonArray){
            var j = eval(jsonArray);
            var length = j.length;
            for(var i=0;i<length;i++){
            options.series[0].data[i].name=j[i].tn;
            options.series[0].data[i].value=j[i].points;
            }
           
            comChart.hideLoading();
            comChart.setOption(options);
      
    }
});
}



var comChart = echarts.init(document.getElementById('pie'));
option = {
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    series: [
            {
            name:'访问来源',
            type:'pie',
            radius: ['40%', '60%'],
            avoidLabelOverlap: false,
            label: {
                normal: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '30',
                        fontWeight: 'bold'
                    }
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data:[
                {value:0, name:''},
                {value:0, name:''}
            ]
        }
        ]
};
comChart.setOption(option);
comChart.hideLoading();  
initActivityChart();

