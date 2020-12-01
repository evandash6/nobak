<script>
 var icons = function(cell, formatterParams){
        return "<div class='btx_ver btn btn-success btn-sm' href='inicio/ver' ide='' id='ver' title='Ver'><i class='fas fa-eye'></i></div> \
                <div class=' btx_editar btn btn-secondary btn-sm' href='inicio/editar' ide='' id='editar' title='Editar'><i class='fas fa-edit'></i></div> \
                <div class='btx_eliminar btn btn-danger btn-sm text-white' ide='' id='eliminar' title='Eliminar'><i class='fas fa-trash'></i></div>";
    };
var tabledata = [
 	{id:1, name:"Oli Bob", age:"12", col:"red", dob:""},
 	{id:2, name:"Mary May", age:"1", col:"blue", dob:"14/05/1982"},
 	{id:3, name:"Christine Lobowski", age:"42", col:"green", dob:"22/05/1982"},
 	{id:4, name:"Brendon Philips", age:"125", col:"orange", dob:"01/08/1980"},
 	{id:5, name:"Margret Marmajuke", age:"16", col:"yellow", dob:"31/01/1999"},
 ];

 var table = new Tabulator("#productos", {
    layout:"fitDataFill",
 	height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
 	data:tabledata, //assign data to table
     columns:[ //Define Table Columns
	 	{title:"Name", field:"name", width:150},
	 	{title:"Age", field:"age",width:150 },
	 	{title:"Favourite Color", field:"col"},
        {title:"Date Of Birth", field:"dob", sorter:"date", hozAlign:"center"},
        {title:"Acciones", formatter:icons, align:"center",width:180},
 	],
 	rowClick:function(e, row){ //trigger an alert message when the row is clicked
 		alert("Row " + row.getData().id + " Clicked!!!!");
 	},
});

</script>