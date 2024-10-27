<?php
  include '..\php\try.php';
  $email = (isset($_POST['email']) ? $_POST['email'] : '');
  $pass = (isset($_POST['password']) ? $_POST['password'] : '');
  $phone = (isset($_POST['phone']) ? $_POST['phone'] : '');
  $add = (isset($_POST['address']) ? $_POST['address'] : '');
  $query = "select * from data where Email='$email' and pass='$pass';";
  $result = mysqli_query($conn,$query);
  $rows = mysqli_num_rows($result);?>
if($rows != 1){
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
	$(function(){
		// alert('successfully');
		Swal.fire(
		
			'Welcome',
			'successfully',
			'success'
		)
	});
</script>
 }
 else
 {
 	<script type="text/javascript">
 	$(function(){
   Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  footer: '<a href>Why do I have this issue?</a>'
})
});
 	</script>
 }
 }
}








