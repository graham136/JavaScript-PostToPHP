	// Java Script post in html5 page via Rest
	// remember jquery libraries
<script>	
				var postFormStr = "<form method='POST' action='" + '/URL/DBwriter.php' + "'>\n";
				postFormStr += "<input type='hidden' name='" + 'Correct' + "' value='" + correctanswer + "'></input>";
				postFormStr += "<input type='hidden' name='" + 'Answered' + "' value='" + answered + "'></input>";
				postFormStr += "</form>";
				var formElement = $(postFormStr);
				$('body').append(formElement);
				$(formElement).submit();
</script>

// dbwriter.php paste in dbwriter.php
<?php

	$correct = $_POST['Correct'];
	$answered = $_POST['Answered'];
		
	$stmt = $conn->prepare("INSERT INTO yourtable ( correct,answered) VALUES (?, ?)");
	if (!$stmt){die('Failed prepare'.$conn->error);}
	$stmt->bind_param("ii", $correct,$answered);
	$stmt->execute();
?>
