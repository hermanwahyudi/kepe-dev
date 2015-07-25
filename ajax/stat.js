function c(year, a=[], b=[], c=[], d=[], e=[], f=[], g=[], h=[]) {
    var r = a; var t = c; var v = e; var x = g;
    var s = b; var u = d; var w = f; var y = h;
    var chart = new CanvasJS.Chart("chartContainer",{
      title:{
        text: "Unique Visitors Statistics " + year + " - KepoAbis.com"             
      }, 
      animationEnabled: true,     
      axisY:{
        titleFontFamily: "arial",
        titleFontSize: 12,
        includeZero: false
      },
      toolTip: {
        shared: true
      },
      data: [{        
        type: "spline",  
        name: "Home Page",        
        showInLegend: true,
        dataPoints: [
            {label: t[0], y: u[0]},     
            {label: t[1], y: u[1]},     
            {label: t[2], y: u[2]},     
            {label: t[3], y: u[3]},     
            {label: t[4], y: u[4]},     
            {label: t[5], y: u[5]},     
            {label: t[6], y: u[6]},     
            {label: t[7], y: u[7]},
            {label: t[8], y: u[8]},     
            {label: t[9], y: u[9]},     
            {label: t[10], y: u[10]},     
            {label: t[11], y: u[11]}           
        ]
      },
      {
       type: "spline",  
        name: "Article Page",        
        showInLegend: true,
        dataPoints: [
            {label: v[0], y: w[0]},     
            {label: v[1], y: w[1]},     
            {label: v[2], y: w[2]},     
            {label: v[3], y: w[3]},     
            {label: v[4], y: w[4]},     
            {label: v[5], y: w[5]},     
            {label: v[6], y: w[6]},     
            {label: v[7], y: w[7]},
            {label: v[8], y: w[8]},     
            {label: v[9], y: w[9]},     
            {label: v[10], y: w[10]},     
            {label: v[11], y: w[11]}
        ]
      },
      {
       type: "spline",  
        name: "News Page",        
        showInLegend: true,
        dataPoints: [
            {label: x[0], y: y[0]},     
            {label: x[1], y: y[1]},     
            {label: x[2], y: y[2]},     
            {label: x[3], y: y[3]},     
            {label: x[4], y: y[4]},     
            {label: x[5], y: y[5]},     
            {label: x[6], y: y[6]},     
            {label: x[7], y: y[7]},
            {label: x[8], y: y[8]},     
            {label: x[9], y: y[9]},     
            {label: x[10], y: y[10]},     
            {label: x[11], y: y[11]}            
        ]
      },
      {
       type: "spline",  
        name: "Videografi Page",        
        showInLegend: true,
        dataPoints: [
            {label: r[0], y: s[0]},     
            {label: r[1], y: s[1]},     
            {label: r[2], y: s[2]},     
            {label: r[3], y: s[3]},     
            {label: r[4], y: s[4]},     
            {label: r[5], y: s[5]},     
            {label: r[6], y: s[6]},     
            {label: r[7], y: s[7]},
            {label: r[8], y: s[8]},     
            {label: r[9], y: s[9]},     
            {label: r[10], y: s[10]},     
            {label: r[11], y: s[11]}             
        ]
      }
      ],
      legend:{
        cursor:"pointer",
        itemclick:function(e){
          if(typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
          }
          else {
            e.dataSeries.visible = true;            
          }
          chart.render();
        }
      }
    });
    chart.render();
}

function stat(year) {
    var oReq = new XMLHttpRequest();
    oReq.onload = function() {
        var data = JSON.parse(this.responseText); 
        var r = []; var t = []; var v = []; var x = [];
        var s = []; var u = []; var w = []; var y = [];
        var temp = [];
        for(i = 0; i < 4; i++) {
            if(i == 0) temp = data.Home; 
            if(i == 1) temp = data.Article;
            if(i == 2) temp = data.News;
            if(i == 3) temp = data.Videografi;
            var r = []; var s = [];
            for(j = 0; j < temp.length; j++) {
                r[j] = temp[j].label;
                s[j] = temp[j].y;
            }
            if(i == 0) {
                t = r; u = s;
            }
            if(i == 1) {
                v = r; w = s;
            }
            if(i == 2) {
                x = r; y = s;
            }
            temp = [];
        }
        c(year, r, s, t, u, v, w, x, y);
    };
    oReq.open("GET", location.href + "/get_stat/" + year, true);
    oReq.send();
}

window.onload = function() {
    var defaultYear = "";
    c(defaultYear);
};