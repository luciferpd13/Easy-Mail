<h1 align="center" class="display-4">Sent-Mail</h1>
<?php
include_once('db.php');

$id=$_SESSION['id'];
$i=0;
$j=0;
$l=0;
$p = 1;

$sql="SELECT * FROM sentmail where rec_id='$id' ORDER BY mail_id DESC";
$dd=mysqli_query($con,$sql);

echo "<div class='container-fluid'>";

	echo "<table class='table'>";
while(list($mid,$rid,$sid,$snid,$s,$m,$aa,$d,$sss)=mysqli_fetch_array($dd))
{
	echo "<tr class='row'>";

	echo "<form action='delete_msg.php' method='get'>";

	echo "<td>".$p++.".</td>";
	echo "<td id='get".$i."' class='col-lg-2' style='cursor: pointer;'>";
	
	//strrpos($string," ")
	
	if($sss)
	{
	echo "<strong>".$snid."</strong></td>";
		echo "<td id='gett".$j."' class='col-lg-8' style='cursor: pointer;'><strong>".substr($s,0,20)."</strong> - ";
		if(strrpos($m,"<br />"))
				{
					$a= strrpos($m,"<br />");
					echo substr($m,0,40)."&nbsp&nbsp<small>Click to see full message</small>";
					
				}else{
					echo substr($m,0,100);
					
				}
				echo "</td>";
	echo "<td>$d&nbsp;&nbsp;&nbsp;&nbsp;<button type='button' id='del".$l."'><i class='far fa-trash-alt'></i></a></button></td>";
	echo "</tr>";
	}else
	{
		echo $snid;
				echo "<td id='gett".$j."' class='col-lg-8' style='cursor: pointer;'>".substr($s,0,20)." - ";
				
				if(strrpos($m,"<br />"))
				{
					$a= strrpos($m,"<br />");
					echo substr($m,0,40)."&nbsp&nbsp<small>Click to see full message</small>";
					
				}else{
					echo substr($m,0,100);
				}
				
				echo "</td>";
	echo "<td>$d&nbsp;&nbsp;&nbsp;&nbsp;<button type='button' id='del".$l."'><i class='far fa-trash-alt'></i></a></button></td>";
	echo "</tr>";
	}
	

		echo "
	<script>
	$('#get".$i."').click(function() {
  //  window.location = 'mail.php?consent=".$mid."';
   post('mail.php', {consent: '".$mid."'});
});
	$('#gett".$j."').click(function() {
 //   window.location = 'mail.php?consent=".$mid."';
  post('mail.php', {consent: '".$mid."'});
});
	$('#del".$l."').click(function() {
		post('del_sent.php', {name: '".$mid."'});
	//window.location = 'delete_sent.php?ch%5B%5D=".$mid."&delete=Delete';
	});


function post(path, params, method) {
    method = method || 'post'; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement('form');
    form.setAttribute('method', method);
    form.setAttribute('action', path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement('input');
            hiddenField.setAttribute('type', 'hidden');
            hiddenField.setAttribute('name', key);
			hiddenField.setAttribute('name1', key);
			hiddenField.setAttribute('value', params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}
	</script>
	";	
	$i++;
	$j++;
	$l++;
	}
	
	echo "</table>";
	
	

	
	
	


?>

