 <!Doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-compatible" content= "IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
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
    <div class="row">
    <div class="col-sm-4">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Tìm kiếm" id="txtSearch"/>
        <div class="input-group-btn">
          <button class="btn btn-primary" type="submit" id="btnSearch">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
        <nav aria-label="Page navigation example">
             <ul class="pagination" style="margin:0px; padding-top:0; margin-left: 10px;" id="pagination">
            </ul>
          </nav>
    </div>

    <div class="col-sm-2 text-right">
    <button id="btnQuestion" class="btn btn-success">+</button>
    </div>
    </div>

     <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Câu hỏi</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody id="questions">
  </tbody>
</table>
	</div>
</body> 
</html>  
<?php include('mdlQuestion.php')?> 

<script type="text/javascript">
    var page = 1;
    $(document).ready(function(){
       $('#btnSearch').click();
    });

    $('#btnQuestion').click(function() {
      $('#txtQuestionId').val('');

      $('#txaQuestion').val('');
      $('#txaOptionA').val('');
      $('#txaOptionB').val('');
      $('#txaOptionC').val('');
      $('#txaOptionD').val('');

      $('#rdOptionA').prop('checked',false);
      $('#rdOptionB').prop('checked',false);
      $('#rdOptionC').prop('checked',false);
      $('#rdOptionD').prop('checked',false);

      $('#modalQuestion').modal();
    });

     $('#btnSearch').click(function() {
      let search = $('#txtSearch').val().trim();
       ReadData(search);
       Pagination(search);
    });   
   
     $(document).on('click',"input[name='update']",function() {
          
         var trid = $(this).closest('tr').attr('id');
           GetDetail(trid);

          $('#txaQuestion').attr('readonly',false);
          $('#txaOptionA').attr('readonly',false);
          $('#txaOptionB').attr('readonly',false);
          $('#txaOptionC').attr('readonly',false);
          $('#txaOptionD').attr('readonly',false);

          $('#rdOptionA').attr('disabled',false);
          $('#rdOptionB').attr('disabled',false);
          $('#rdOptionC').attr('disabled',false);
          $('#rdOptionD').attr('disabled',false);

          $('#txtQuestionId').val(trid);
          $('#btnSubmit').show();
    });
     
     $(document).on('click',"input[name='view']",function(){
          var bid = this.id;
         var trid = $(this).closest('tr').attr('id');
         //console.log(trid);
           GetDetail(trid);

          $('#txaQuestion').attr('readonly','readonly');
          $('#txaOptionA').attr('readonly','readonly');
          $('#txaOptionB').attr('readonly','readonly');
          $('#txaOptionC').attr('readonly','readonly');
          $('#txaOptionD').attr('readonly','readonly');

          $('#rdOptionA').attr('disabled','readonly');
          $('#rdOptionB').attr('disabled','readonly');
          $('#rdOptionC').attr('disabled','readonly');
          $('#rdOptionD').attr('disabled','readonly');

          $('#btnSubmit').hide();
        });

        
     $(document).on('click',"input[name='delete']",function() {
       
         var trid = $(this).closest('tr').attr('id');
         if (confirm("Bạn chắc chắn muốn xóa câu hỏi này?") == true) {
            $.ajax({
            url:'delete.php',
            type:'post',
            data:{
                 id:trid
          },
            success:function(data){
           alert(data);
           ReadData();
         }
    }); 
   }
   });           

     function GetDetail(id){

        $.ajax({
        url:'detail.php',
        type:'get',
        data:{
            id:id
        },
        success:function(data){
          //console.log(data);
          var q = jQuery.parseJSON( data);
          $('#txaQuestion').val(q['question']);
          $('#txaOptionA').val(q['option_a']);
          $('#txaOptionB').val(q['option_b']);
          $('#txaOptionC').val(q['option_c']);
          $('#txaOptionD').val(q['option_d']);
      
          $('#modalQuestion').modal();

          switch (q['answer'])
          {
              case 'A':
              $('#rdOptionA').prop('checked',true);
              break;
              case 'B':
              $('#rdOptionB').prop('checked',true);
              break;
              case 'C':
              $('#rdOptionC').prop('checked',true);
              break;
              case 'D':
              $('#rdOptionD').prop('checked',true);
              break;
          }          

        }
      });
     }
     
     function ReadData(search){
          $.ajax({
        url:'view.php',
        type:'get',
        data:{
             search:search,
             page:page
        },
        success:function(data){
              $('#questions').empty();
              $('#questions').append(data);

        }
      });
     }
           $('#txtSearch').on('keypress', function(e){
               if(e.which === 13) { 
                    $('#btnSearch').click();
              }

           });

       $('#pagination').on("click", "li a", function (event) {
            event.preventDefault();
            page=$(this).text();
            ReadData($('#txtSearch').val());
       });

function Pagination(search){
         $.ajax({
        url:'pagination.php',
        type:'get',
        data:{
             search:search 
        },
        success:function(data){
              
               console.log(data);
               if (data<=1) {
                $('#pagination').hide();
               } else {
                $('#pagination').show();
                $('#pagination').empty();
                let pagi = '';
                for (i = 1; i <= data ; i++)
                    {
                 pagi += '<li class="page-item"><a class="page-link" href="#">'+i+'</a></li>';
                    }  
                    $('#pagination').append(pagi);
               }
        }
      });
}

</script>