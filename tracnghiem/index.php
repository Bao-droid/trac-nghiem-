 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Làm bài thi trắc nghiệm</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
     <div class="container">
     	<div class="panel-group">

        <div class="panel panel-primary">
	     <div class="panel-heading">Làm bài thi</div>
	      <div class="panel-body">
	         <div class="row">
	         	<div class="col-sm-12 text-right">
	            <button type="button" name="button" class="btn btn-success" id="btnStart">Bắt đầu</button>      
	         	</div>
	         </div>
	         <div id="questions"> </div>
	         <div class="row">
	         	<div class="col-sm-12 text-center">
	         		<button type="button" class="btn btn-warning" id="btnFinish">Kết thúc bài thi</button>
	         	</div>
	         </div>
            <div class="row">
            	<div class="col-sm-12 text-center">
            		<h4 id='mark' class="text-info"></h4>
            	</div>
            </div>   
	      </div>
        </div>
        </div>
     </div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#btnFinish').hide();
    });

    var questions;

	$('#btnStart').click(function () {
		GetQuestions(); 
		$('#btnFinish').show();
		$(this).hide();
	});

    $('#btnFinish').click(function () {
		
		$(this).hide();
		$('#btnStart').show();
		CheckResult();
	});

    function CheckResult() {
    	let mark = 0;
         $('#questions div.row').each(function(k,v){
            let id = $(v).find('h5').attr('id');
            let question = questions.find(x=>x.id == id);
            let answer = question['answer'];
            let choice = $(v).find('fieldset input[type="radio"]:checked').attr('class');
            
             
            if(choice == answer)
            {
               mark += 2;
             }else{
               console.log('Câu có id : '+id+' sai');  
            }
            $('#question_'+id+' > fieldset > div > label.'+answer).css("background-color","yellow");
         });
        $('#mark').text('Điểm của bạn là: '+mark);
    }

	function GetQuestions() {
		$.ajax({
			url:'questions.php',
			type:'get',
			success:function(data){
				
                questions = jQuery.parseJSON(data);
   
                let index = 1;
                let d = '';
                $.each(questions,function(k,v){
			        d+=    '<div class="row" style = "margin-left:10px;" id = "question_'+v['id']+'" >'; 
			        d+=    '<h5 style="font-weight: bold;" id="'+v['id']+'"> <span class = "text-danger">Câu '+index+': </span> '+v['question']+'</h5>';
			        d+=    '<fieldset>';

			        d+=    '<div class="radio col-md-12">';
			        d+=     '<label class="A"><input type="radio" class="A" name = "'+v['id']+'"> <span class = "text-danger">A: </span> '+v['option_a']+'</label>';
			        d+=     '</div>';

			        d+=     '<div class="radio col-md-12">';
			        d+=     '<label class="B"><input type="radio" class="B" name = "'+v['id']+'"> <span class = "text-danger">B: </span> '+v['option_b']+'</label>';
			        d+=     '</div>';

			        d+=     '<div class="radio col-md-12">';
			        d+=     '<label class="C"><input type="radio" class="C" name = "'+v['id']+'"> <span class = "text-danger">C: </span> '+v['option_c']+'</label>';
			        d+=     '</div>';

			        d+=     '<div class="radio col-md-12">';
			        d+=     '<label class="D"><input type="radio" class="D" name = "'+v['id']+'"> <span class = "text-danger">D: </span> '+v['option_d']+'</label>';
			        d+=     '</div>';

			        d+=    '</fieldset>';
			        d+=    '</div>';
			        index++;
                });
				$('#questions').html(d);
			}
		});
	}
</script>