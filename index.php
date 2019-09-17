      <head>  
           <title>Live Table Data Edit</title>  
           <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <h3 align="center">Historic Roll Maintenance</h3><br />  
                     <div id="live_data"></div>                 
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $('#live_data').on('click', '#btn_add', function(){  
           var SequenceNumber = $('#SequenceNumber').text();  
           var RollNumber = $('#RollNumber').text();  
           var Name = $('#Name').text();
           var Status = $('#Status').text();
           if(SequenceNumber == '')  
           {  
                alert("Enter Sequence Number");  
                return false;  
           }  
           if(RollNumber == '')  
           {  
                alert("Enter Roll Number");  
                return false;  
           }  
             if(Name == '')  
           {  
                alert("Enter Name");  
                return false;  
           }  
             if(Status == '')  
           {  
                alert("Enter Status");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{SequenceNumber:SequenceNumber, RollNumber:RollNumber, Name:Name, Status:Status},  
                
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);
                }  
           });  
      }  
      $('#live_data').on('dblclick', '.Name', function(){  
           var id = $(this).data("id1");  
           var Name = $(this).text();  
           edit_data(id, Name, "Name");  
      }); 
      $('#live_data').on('dblclick', '.Status', function(){  
           var id = $(this).data("id2");  
           var Status = $(this).text();  
           edit_data(id, Status, "Status");  
      }); 
      $('#live_data').on('dblclick', '.SequenceNumber', function(){  
           var id = $(this).data("id3");  
           var SequenceNumber = $(this).text();  
           edit_data(id, SequenceNumber, "SequenceNumber");  
      });  
      $('#live_data').on('dblclick', '.RollNumber', function(){  
           var id = $(this).data("id4");  
           var RollNumber = $(this).text();  
           edit_data(id, RollNumber, "RollNumber");  
      });  
      $('#live_data').on('click', '.btn_delete', function(){  
           var id=$(this).data("id5");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>