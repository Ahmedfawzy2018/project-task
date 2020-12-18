<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#attributes").keyup(function(){
			var num,text,i;

			num = $("#attributes").val();
			text = '';
			if(!isNaN(num) && num > 0){
				for(i=0;i<num;i++){

					text +='<div class="col-lg-2" id="attr_Arr">';
					text +='<input type="text" class="form-control" required id="key" placeholder="KEY">';
					text +='<br>';
		            text +='<input type="text" class="form-control" required  id="val" placeholder="Value">';
		           	text += '<br>' ;
		            text +='</div>' ;
		        }

		        document.getElementById('attr_no').innerHTML = text ;
	        }else{
	        	document.getElementById('attr_no').innerHTML = "";
	        }
		});

		$("#submit_btn").click(function(){
			var keys = [] ;
			var vals = [] ;

			    $(".col-lg-2").each(function () {
			        keys.push($(this).find("#key").val() ) ;
			        vals.push($(this).find("#val").val() ) ;
			    }); 

			  document.getElementById('inputArrKeys').value = keys ;
			  document.getElementById('inputArrVals').value = vals ;
		});

	});
</script>