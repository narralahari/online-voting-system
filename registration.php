<?php
	include 'conn.php';
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" language="javascript">
 function validate()
 {
  var fname=document.reg.fname.value;
  var lname=document.reg.lname.value;
  var email=document.reg.email.value;
  var x=document.reg.email.value;
  var pass=document.reg.psw.value;
  var cpass=document.reg.cpsw.value;
  var gender=document.reg.gender.value;
  var hobby=document.reg.hobby.value;
  var city_id=document.reg.city_id.value;





if(fname=="")
  {
    window.alert("Please Enter Firstname!");
    document.reg.fname.focus();
    return false;

 }

 if(lname=="")
  {
    window.alert("Please Enter Lastname!");
    document.reg.lname.focus();
    return false;

 }

 if(email=="")
  {
    window.alert("Please Enter Roll No!");
    document.reg.email.focus();
    return false;

 }

   else
{
if(isNaN(x)||x.indexOf(" ")!=-1)
{
alert("Enter numeric value");
return false;
}
if (10>x.length)
{
alert("Roll No. Contain Maximum 10 Characters");
return false;
}
else if(x.length>10)
{
alert("Contact No. Contain Maximum 10 Characters");
return false;
}

}

                                   if(pass=="")
  {
    window.alert("Please Enter Password!");
    document.reg.psw.focus();
    return false;

 }

 if(cpass=="")
  {
    window.alert("Please Enter Confirm Password!");
    document.reg.cpsw.focus();
    return false;

 }

                           if ( ( reg.gender[0].checked == false ) && ( reg.gender[1].checked == false ) )

                           {
                               alert ( "Please choose your Gender: Male or Female!" );
                               return false;
                           }



                            if ( ( reg.hobby[0].checked == false ) && ( reg.hobby[1].checked == false ) && ( reg.hobby[2].checked == false ) && ( reg.hobby[3].checked == false ) && ( reg.hobby[4].checked == false ) && ( reg.hobby[5].checked == false ) && ( reg.hobby[6].checked == false ) && ( reg.hobby[7].checked == false ) )


                         {
                         alert ( "Please Choose Your Semester!" );
                            return false;
                         }



          if(city_id=="-1")
  {
    window.alert("Please Enter Branch!");
    document.reg.city_id.focus();
    return false;

 }





}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">@import 'validation.css';</style>
<style type="text/css">
	.button
	{
		margin-right:50px;
		height:30px;
		width:100px;
		background-color:#000000;
		color:#999999;
		border:#999999 solid 2px;
		border-radius:10px;
	}
	</style>

</head>
<body style="background-color:green">
<form name="reg" action=" " method="post" onSubmit="return validate()" >
  <center><h1 style="color:blue">Please Register New Voter <h1></center>
  <table border="1" align="center" rules="groups" width="750" height="500" bgcolor="yellow">

    <tr>
      <td>Firstname </td>
      <td><input type="text" name="fname" /></td>
	  <td></td>
    </tr>
    <tr>
      <td>Lastname </td>
      <td><input type="text" name="lname" /></td>
	  <td></td>
    </tr>
    <tr>
      <td>Roll No  </td>
      <td><input type="text" name="email" onblur="emailCheck('email_check.php?e='+this.value);" />
        </td><td><div id="email_check"></div></td>
    </tr>
    <tr>
      <td>Password </td>
      <td><input type="password" name="psw" id="pwd" /></td>
	  <td></td>
    </tr>
    <tr>
      <td>Confirm Password  </td>
      <td><input type="password" name="cpsw" id="cpwd" />
       </td>
	   <td><p id="error1"></p></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="gender" value="Male" />
        Male
        <input type="radio" name="gender" value="Female" />
        Female
        </td>
		<td></td>
    </tr>
    <tr>
      <td>Semester  </td>
      <td><input type="radio" name="hobby" value="First" />
        First
        <input type="radio" name="hobby" value="Second" />
        Second
        <input type="radio" name="hobby" value="Third" />
        Third
        <input type="radio" name="hobby" value="Fourth" />
        Fourth
        <input type="radio" name="hobby" value="Fivth" />
        Fivth
        <input type="radio" name="hobby" value="Sixth" />
        Sixth
        <input type="radio" name="hobby" value="Seventh" />
        Seventh
        <input type="radio" name="hobby" value="Eigth" />
        Eigth
        </td>

    </tr>
    <tr>
      <td>Branch  </td>
      <td><select name="city_id" >
          <option value="-1">Select Branch</option>
          <?php
						$sel_city="SELECT * FROM city ORDER BY city_name";
						$res_city=mysql_query($sel_city);
						while($fet_city=mysql_fetch_array($res_city))
						{
					?>
          <option value="<?php echo $fet_city['city_id'];?>"><?php echo $fet_city['city_name'];?></option>
          <?php
						}
					 ?>
        </select></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="SUBMIT" value="Register" class="button" /></td>
    </tr>
  </table>
</form>

</body>
</html>
<?php


        $fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$psw=$_POST['psw'];
		$cpsw=$_POST['cpsw'];
		$gender=$_POST['gender'];
		$hobby=$_POST['hobby'];
		$city_id=$_POST['city_id'];
		 $image=date('d/m/y G:i:s');
                $status='Inactive';

        if(isset($_POST['SUBMIT']) && $_POST['SUBMIT']=='Register')
	{



                        $ins="INSERT INTO login(id,fname,lname,email,psw,gender,hobby,city_id,image,status) VALUES(NULL,'$fname','$lname','$email','$psw','$gender','$hobby','$city_id','$image','$status')";
                        $ins1="INSERT INTO forget(email,fname,psw) VALUES('$email','$fname','$psw')";

			if($psw==$cpsw)
			{

				mysql_query($ins);
				echo "<script>alert('Successfully Registered.......for Activate Your Account Please Contacts Election Administrator ');
					window.location='index.php';
				</script>";
			}
			else
			{
				echo "<script>alert('Password and Confirm Password Are Not Same...');
				window.location='registration.php';
				</script>";
			}

                        if($psw==$cpsw)
                        {

				mysql_query($ins1);
				echo "<script>alert('Successfully Registered.......for Activate Your Account Please Contacts Election Administrator ');
					window.location='index.php';
				</script>";
			}

                        else

                        {

                                echo "<script>alert('Password and Confirm Password Are Not Same...');
				window.location='registration.php';
				</script>";
			}




 }
?>
