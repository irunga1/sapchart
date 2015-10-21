(function(){
	template = "<table class='table'>"+ "{{#info}}<tr>"+  	"<td>{{nombre}}</td>"+  "<td>{{precioCosto}}</td>"+  "<td>{{codeBars}}</td>   "+ 	"</tr> {{/info}}"+ 	"</table>"; 
	core ={
		"data":"",	
		"dataforchart":[],
		"obtainData":function(){
			$.post("http://localhost/apirest/operators/apiconect.php",function(data){
				//$("#scContent").html(data);
				result = $.parseJSON(data);
				//console.log(result);
				core.data = result;								
				core.rendering();
				core.formatData();
				
			});	
		},
		"rendering":function(){
			render = Mustache.render(template,core.data);
			$("#scContent").html(render);
		},
		"formatData":function(){ 
			//alert("it works");
			formatdata = new Array();
			colors =["#140599","#15ab99","#99cd35","#99320f"];
			highlight =["#840679","#95cba9","#69ae53","#132f0f"];
			for(i=0; i<core.data.info.length-1;i++){
				core.data.info[i].nombre;
				core.data.info[i].precioCosto;
				core.data.info[i].color = colors[i];
				core.data.info[i].highlight = highlight[i];
				console.log(formatdata);

			}
		}
		
		
	}
	
	core.obtainData();
	
	

})()
				
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Task', 'Hours per Day'],
		['Detergente',     7],
		['Incaparina',      7],
		['Arroz',  7],
		['Jabon Liquido', 9.5]
		
		]);

	var options = {
	title: 'Precios Costo'
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart'));

	chart.draw(data, options);
}