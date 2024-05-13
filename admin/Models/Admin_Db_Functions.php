<?php
require_once('db_Connection.php');
//Restaurant Part-------------------------------------------------------------------
function Rest_Delete($id,$name)
{
	$sql1="select * from restaurant where Rest_Id='$id' and Rest_Name='$name'";
	$con1=conn();
	$res1= mysqli_query($con1,$sql1);
	$row=mysqli_num_rows($res1);
	if($row==0)
	{
		return false;
	}
	else
	{
        $sql2="delete from restaurant where Rest_Id='$id' and Rest_Name='$name'";
        $con2=conn();
	    mysqli_query($con2,$sql2);
		return true;
	}
}
function Rest_List()
{
	$sql3="select * from restaurant";
	$con3=conn();
	$res3= mysqli_query($con3,$sql3);
	return $res3;
}
function Rest_Add($Id,$Name,$Mobile,$Address,$Type,$Rating,$Revenue)
{
	$sql="select * from restaurant where Rest_Id='$Id'";
	$con=conn();
	$res= mysqli_query($con,$sql);
	$row=mysqli_num_rows($res);
	if($row>0)
	{
		return false;
	}
	else{
		$sql4="insert into restaurant (Rest_Id, Rest_Name, Rest_Mobile, Rest_Address, Rest_Type, Rest_Rating, Rest_Revenue) 
		VALUES ('$Id','$Name','$Mobile','$Address','$Type','$Rating','$Revenue')";
		$con4=conn();
		$res4= mysqli_query($con4,$sql4);
		return true;
	}
	
}

function Rest_Update($id,$name,$Mobile,$Address,$Type)
{
	$sql5="select * from restaurant where Rest_Id='$id' and Rest_Name='$name'";
	$con5=conn();
	$res5= mysqli_query($con5,$sql5);
	$row=mysqli_num_rows($res5);
	if($row==0)
	{
		return false;
	}
	else
	{
		if(!empty($Mobile))
		{
        $sql6="update restaurant set Rest_Mobile='$Mobile' where Rest_Id='$id' and Rest_Name='$name'";
        $con6=conn();
	    mysqli_query($con6,$sql6);
		}

		if(!empty($Address))
		{
        $sql7="update restaurant set Rest_Address='$Address' where Rest_Id='$id' and Rest_Name='$name'";
        $con7=conn();
	    mysqli_query($con7,$sql7);
		}

		if(!empty($Type))
		{
        $sql8="update restaurant set Rest_Type='$Type' where Rest_Id='$id' and Rest_Name='$name'";
        $con8=conn();
	    mysqli_query($con8,$sql8);
		}
		return true;
	}
}


//Store Part-------------------------------------------------------------------
function Store_Delete($id,$name)
{
	$sql1="select * from store where Store_Id='$id' and Store_Name='$name'";
	$con1=conn();
	$res1= mysqli_query($con1,$sql1);
	$row=mysqli_num_rows($res1);
	if($row==0)
	{
		return false;
	}
	else
	{
        $sql2="delete from store where Store_Id='$id' and Store_Name='$name'";
        $con2=conn();
	    mysqli_query($con2,$sql2);
		return true;
	}
}
function Store_List()
{
	$sql3="select * from store";
	$con3=conn();
	$res3= mysqli_query($con3,$sql3);
	return $res3;
}
function Store_Add($Id,$Name,$Mobile,$Address,$Type,$Rating,$Revenue)
{
	$sql="select * from store where Store_Id='$Id'";
	$con=conn();
	$res= mysqli_query($con,$sql);
	$row=mysqli_num_rows($res);
	if($row>0)
	{
		return false;
	}
	else{
		$sql4="insert into store (Store_Id, Store_Name, Store_Mobile, Store_Address, Store_Type, Store_Rating, Store_Revenue) 
		VALUES ('$Id','$Name','$Mobile','$Address','$Type','$Rating','$Revenue')";
		$con4=conn();
		$res4= mysqli_query($con4,$sql4);
		return true;
	}
	
}

function Store_Update($id,$name,$Mobile,$Address,$Type)
{
	$sql5="select * from store where Store_Id='$id' and Store_Name='$name'";
	$con5=conn();
	$res5= mysqli_query($con5,$sql5);
	$row=mysqli_num_rows($res5);
	if($row==0)
	{
		return false;
	}
	else
	{
		if(!empty($Mobile))
		{
        $sql6="update store set Store_Mobile='$Mobile' where Store_Id='$id' and Store_Name='$name'";
        $con6=conn();
	    mysqli_query($con6,$sql6);
		}

		if(!empty($Address))
		{
        $sql7="update store set Store_Address='$Address' where Store_Id='$id' and Store_Name='$name'";
        $con7=conn();
	    mysqli_query($con7,$sql7);
		}

		if(!empty($Type))
		{
        $sql8="update store set Store_Type='$Type' where Store_Id='$id' and Store_Name='$name'";
        $con8=conn();
	    mysqli_query($con8,$sql8);
		}
		return true;
	}
}

//Airline Part-------------------------------------------------------------------
function Airln_Delete($id,$name)
{
	$sql1="select * from airlines where Airlines_Id='$id' and Airlines_Name='$name'";
	$con1=conn();
	$res1= mysqli_query($con1,$sql1);
	$row=mysqli_num_rows($res1);
	if($row==0)
	{
		return false;
	}
	else
	{
        $sql2="delete from airlines where Airlines_Id='$id' and Airlines_Name='$name'";
        $con2=conn();
	    mysqli_query($con2,$sql2);
		return true;
	}
}
function Airln_List()
{
	
		$sql="select * from airlines";
		$con=conn();
		$res= mysqli_query($con,$sql);
		return $res;
	}
	

function Airln_Add($Id,$Name,$Mobile,$Destination,$Type,$Rating,$Revenue)
{
	$sql="select * from airlines where Airlines_Id='$Id'";
	$con=conn();
	$res= mysqli_query($con,$sql);
	$row=mysqli_num_rows($res);
	if($row>0)
	{
		return false;
	}
	else{
		$sql4="insert into airlines (Airlines_Id, Airlines_Name, Airlines_Mobile, Airlines_Destination, Airlines_Type, Airlines_Rating, Airlines_Revenue) 
		VALUES ('$Id','$Name','$Mobile','$Destination','$Type','$Rating','$Revenue')";
		$con4=conn();
		$res4= mysqli_query($con4,$sql4);
		return true;
	}
	
}

function Airln_Update($id,$name,$Mobile,$Destination,$Type)
{
	$sql5="select * from airlines where Airlines_Id='$id' and Airlines_Name='$name'";
	$con5=conn();
	$res5= mysqli_query($con5,$sql5);
	$row=mysqli_num_rows($res5);
	if($row==0)
	{
		return false;
	}
	else
	{
		if(!empty($Mobile))
		{
        $sql6="update airlines set Airlines_Mobile='$Mobile' where Airlines_Id='$id' and Airlines_Name='$name'";
        $con6=conn();
	    mysqli_query($con6,$sql6);
		}

		if(!empty($Destination))
		{
        $sql7="update airlines set Airlines_Destination='$Destination' where Airlines_Id='$id' and Airlines_Name='$name'";
        $con7=conn();
	    mysqli_query($con7,$sql7);
		}

		if(!empty($Type))
		{
        $sql8="update airlines set Airlines_Type='$Type' where Airlines_Id='$id' and Airlines_Name='$name'";
        $con8=conn();
	    mysqli_query($con8,$sql8);
		}
		return true;
	}
}
function Admin_List()
{
	$sql="select * from administration";
	$con=conn();
	$res= mysqli_query($con,$sql);
	return $res;
}
function Admin_Update($name,$password,$address,$mobile,$email,$image,$salary)
{
		if(!empty($name))
		{
        $sql2="update administration set Admin_Name='$name'";
        $con2=conn();
	    mysqli_query($con2,$sql2);
		return true;
		}
		if(!empty($password))
		{
        $sql3="update administration set Admin_Password='$password'";
        $con3=conn();
	    mysqli_query($con3,$sql3);
		return true;
		}
		if(!empty($address))
		{
        $sql4="update administration set Admin_Address='$address'";
        $con4=conn();
	    mysqli_query($con4,$sql4);
		return true;
		}
		if(!empty($mobile))
		{
        $sql5="update administration set Admin_Mobile='$mobile'";
        $con5=conn();
	    mysqli_query($con5,$sql5);
		return true;
		}
		if(!empty($email))
		{
        $sql6="update administration set Admin_Email='$email'";
        $con6=conn();
	    mysqli_query($con6,$sql6);
		return true;
		}
		if(!empty($image))
		{
        $sql7="update administration set Admin_Image='$image'";
        $con7=conn();
	    mysqli_query($con7,$sql7);
		return true;
		}
		if(!empty($salary))
		{
        $sql8="update administration set Admin_Salary='$salary'";
        $con8=conn();
	    mysqli_query($con8,$sql8);
		return true;
		}
		else
		{
			return false;
		}
}

function Employee_List()
{
	$sql="select Emp_Id,Emp_Name,Emp_Mobile,Emp_Email,Emp_Address,Emp_Image,Emp_Salary,Emp_Role,Emp_Ratings,Emp_Gender from employee";
	$con=conn();
	$res= mysqli_query($con,$sql);
	return $res;
}
function Employee_Add($id,$name,$password,$mobile,$email,$address,$image,$salary,$role,$ratings,$gender)
{
	$sql="select * from employee where Provider_Id='$id'";
	$con=conn();
	$res= mysqli_query($con,$sql);
	$row=mysqli_num_rows($res);
	if($row>0)
	{
		return false;
	}
	else{
		$sql4="insert into employee (Emp_Id,Emp_Name,Emp_Pass,Emp_Mobile,Emp_Email,Emp_Address,Emp_Image,Emp_Salary,Emp_Role,Emp_Ratings,Emp_Gender) 
		VALUES ('$id','$name','$password','$mobile','$email','$address','$image','$salary','$role','$ratings','$gender')";
		$con4=conn();
		$res4= mysqli_query($con4,$sql4);
		return true;
	}
}
function Employee_Update($id,$name,$n_name,$mobile,$email,$address,$image,$salary,$role)
{
	$sql="select * from employee where Emp_Id='$id' and Emp_Name='$name'";
	$con=conn();
	$res= mysqli_query($con,$sql);
	$row=mysqli_num_rows($res);
	if($row==0)
	{
		return false;
	}
	else
	{
	    if(!empty($n_name))
		{
        	$sql2="update employee set Emp_Name='$n_name' where Emp_Id='$id' and Emp_Name='$name'";
        	$con2=conn();
	    	mysqli_query($con2,$sql2);

			if(!empty($mobile))
			{
        	$sql5="update employee set Emp_Mobile='$mobile' where Emp_Id='$id' and Emp_Name='$n_name'";
        	$con5=conn();
	    	mysqli_query($con5,$sql5);
			}
			if(!empty($email))
			{
        	$sql6="update employee set Emp_Email='$email' where Emp_Id='$id' and Emp_Name='$n_name'";
       		$con6=conn();
	    	mysqli_query($con6,$sql6);
			}
			if(!empty($address))
			{
        	$sql4="update employee set Emp_Address='$address' where Emp_Id='$id' and Emp_Name='$n_name'";
        	$con4=conn();
	    	mysqli_query($con4,$sql4);
			}
			if(!empty($image))
			{
        	$sql7="update employee set Emp_Image='$image' where Emp_Id='$id' and Emp_Name='$n_name'";
        	$con7=conn();
	    	mysqli_query($con7,$sql7);
			}
			if(!empty($salary))
			{
        	$sql8="update employee set Emp_Salary='$salary' where Emp_Id='$id' and Emp_Name='$n_name'";
        	$con8=conn();
	    	mysqli_query($con8,$sql8);
			}
			if(!empty($role))
			{
        	$sql9="update employee set Emp_Role='$role' where Emp_Id='$id' and Emp_Name='$n_name'";
        	$con9=conn();
	    	mysqli_query($con9,$sql9);
			}
			return true;
			}
		if(!empty($mobile))
		{
        $sql5="update employee set Emp_Mobile='$mobile' where Emp_Id='$id' and Emp_Name='$name'";
        $con5=conn();
	    mysqli_query($con5,$sql5);
		}
		if(!empty($email))
		{
        $sql6="update employee set Emp_Email='$email' where Emp_Id='$id' and Emp_Name='$name'";
        $con6=conn();
	    mysqli_query($con6,$sql6);
		}
		if(!empty($address))
		{
        $sql4="update employee set Emp_Address='$address' where Emp_Id='$id' and Emp_Name='$name'";
        $con4=conn();
	    mysqli_query($con4,$sql4);
		}
		if(!empty($image))
		{
        $sql7="update employee set Emp_Image='$image' where Emp_Id='$id' and Emp_Name='$name'";
        $con7=conn();
	    mysqli_query($con7,$sql7);
		}
		if(!empty($salary))
		{
        $sql8="update employee set Emp_Salary='$salary' where Emp_Id='$id' and Emp_Name='$name'";
        $con8=conn();
	    mysqli_query($con8,$sql8);
		}
		if(!empty($role))
		{
        $sql9="update employee set Emp_Role='$role' where Emp_Id='$id' and Emp_Name='$name'";
        $con9=conn();
	    mysqli_query($con9,$sql9);
		}
		return true;
	}
}
function Employee_Delete($id,$name)
{
	$sql1="select * from employee where Emp_Id='$id' and Emp_Name='$name'";
	$con1=conn();
	$res1= mysqli_query($con1,$sql1);
	$row=mysqli_num_rows($res1);
	if($row==0)
	{
		return false;
	}
	else
	{
        $sql2="delete from employee where Emp_Id='$id' and Emp_Name='$name'";
        $con2=conn();
	    mysqli_query($con2,$sql2);
		return true;
	}
}

function Srvc_Provider_List()
{
	$sql="select Provider_Id,Provider_Name,Provider_Mobile,Provider_Email,Provider_Address,Provider_Image,
	Provider_Salary,Provider_Ratings,Provider_Gender from service_provider";
	$con=conn();
	$res= mysqli_query($con,$sql);
	return $res;
}
function Srvc_Provider_Delete($id,$name)
{
	$sql1="select * from service_provider where Provider_Id='$id' and Provider_Name='$name'";
	$con1=conn();
	$res1= mysqli_query($con1,$sql1);
	$row=mysqli_num_rows($res1);
	if($row==0)
	{
		return false;
	}
	else
	{
        $sql2="delete from service_provider where Provider_Id='$id' and Provider_Name='$name'";
        $con2=conn();
	    mysqli_query($con2,$sql2);
		return true;
	}
}
function Service_Provider_Update($id,$name,$n_name,$mobile,$email,$address,$image,$salary)
{
	$sql="select * from service_provider where Provider_Id='$id' and Provider_Name='$name'";
	$con=conn();
	$res= mysqli_query($con,$sql);
	$row=mysqli_num_rows($res);
	if($row==0)
	{
		return false;
	}
	else
	{
	    if(!empty($n_name))
		{
        	$sql2="update service_provider set Provider_Name='$n_name' where Provider_Id='$id' and Provider_Name='$name'";
        	$con2=conn();
	    	mysqli_query($con2,$sql2);

			if(!empty($mobile))
			{
        	$sql5="update service_provider set Provider_Mobile='$mobile' where Provider_Id='$id' and Provider_Name='$n_name'";
        	$con5=conn();
	    	mysqli_query($con5,$sql5);
			}
			if(!empty($email))
			{
        	$sql6="update service_provider set Provider_Email='$email' where Provider_Id='$id' and Provider_Name='$n_name'";
       		$con6=conn();
	    	mysqli_query($con6,$sql6);
			}
			if(!empty($address))
			{
        	$sql4="update service_provider set Provider_Address='$address' where Provider_Id='$id' and Provider_Name='$n_name'";
        	$con4=conn();
	    	mysqli_query($con4,$sql4);
			}
			if(!empty($image))
			{
        	$sql7="update service_provider set Provider_Image='$image' where Provider_Id='$id' and Provider_Name='$n_name'";
        	$con7=conn();
	    	mysqli_query($con7,$sql7);
			}
			if(!empty($salary))
			{
        	$sql8="update service_provider set Provider_Salary='$salary' where Provider_Id='$id' and Provider_Name='$n_name'";
        	$con8=conn();
	    	mysqli_query($con8,$sql8);
			}
			return true;
			}
		if(!empty($mobile))
		{
        $sql5="update service_provider set Provider_Mobile='$mobile' where Provider_Id='$id' and Provider_Name='$name'";
        $con5=conn();
	    mysqli_query($con5,$sql5);
		}
		if(!empty($email))
		{
        $sql6="update service_provider set Provider_Email='$email' where Provider_Id='$id' and Provider_Name='$name'";
        $con6=conn();
	    mysqli_query($con6,$sql6);
		}
		if(!empty($address))
		{
        $sql4="update service_provider set Provider_Address='$address' where Provider_Id='$id' and Provider_Name='$name'";
        $con4=conn();
	    mysqli_query($con4,$sql4);
		}
		if(!empty($image))
		{
        $sql7="update service_provider set Provider_Image='$image' where Provider_Id='$id' and Provider_Name='$name'";
        $con7=conn();
	    mysqli_query($con7,$sql7);
		}
		if(!empty($salary))
		{
        $sql8="update service_provider set Provider_Salary='$salary' where Provider_Id='$id' and Provider_Name='$name'";
        $con8=conn();
	    mysqli_query($con8,$sql8);
		}
		return true;
	}
}
function Service_Provider_Add($id,$name,$password,$mobile,$email,$address,$image,$salary,$ratings,$gender)
{
	$sql="select * from service_provider  where Provider_Id='$id'";
	$con=conn();
	$res= mysqli_query($con,$sql);
	$row=mysqli_num_rows($res);
	if($row>0)
	{
		return false;
	}
	else{
		$sql4="insert into service_provider  (Provider_Id,Provider_Name,Provider_Pass,Provider_Mobile,Provider_Email,Provider_Address,Provider_Image,Provider_Salary,Provider_Ratings,Provider_Gender) 
		VALUES ('$id','$name','$password','$mobile','$email','$address','$image','$salary','$ratings','$gender')";
		$con4=conn();
		$res4= mysqli_query($con4,$sql4);
		return true;
	}
}

function Admin_Image_Show()
{
	$sql="select Admin_Image from administration where Admin_Id=1";
    $con=conn();
	$image=mysqli_query($con,$sql);
	return $image;
}
function Admin_Name_Show()
{
	$sql="select Admin_Name from administration where Admin_Id=1";
    $con=conn();
	$name=mysqli_query($con,$sql);
	return $name;
}
function Admin_Avarage_Earnings_Show()
{
	$sql="select Earnings_Source,Earnings_Amount from avarage_earnings_expense";
    $con=conn();
	$res=mysqli_query($con,$sql);
	return $res;
}
function Admin_Yearly_Revenue_Show1()
{
	$sql="select Revenue_Year from yearly_revenue";
    $con=conn();
	$res=mysqli_query($con,$sql);
	return $res;
}
function Admin_Yearly_Revenue_Show2()
{
	$sql="select Revenue_Amount from yearly_revenue";
    $con=conn();
	$res=mysqli_query($con,$sql);
	return $res;
}
function Admin_Pass_Serve_Show()
{
	$sql="select sum(Pass_Served) AS total_sum
	from airlines;";
    $con=conn();
	$res=mysqli_query($con,$sql);
	return $res;
}
function Admin_Flight_Operated_Show()
{
	$sql="select sum(Flight_Operated) AS total_sum
	from airlines;";
    $con=conn();
	$res=mysqli_query($con,$sql);
	return $res;
}
function Admin_Earnings_Show()
{
	$sql="select sum(Earnings_Amount) AS total_sum
	from avarage_earnings_expense;";
    $con=conn();
	$res=mysqli_query($con,$sql);
	return $res;
}
function Admin_Expenses_Show()
{
	$sql="select sum(Expense_Amount) AS total_sum
	from avarage_earnings_expense;";
    $con=conn();
	$res=mysqli_query($con,$sql);
	return $res;
}
function Passenger_List()
{
	$sql="select user,Email,img,Mobile,Address,Points,Gender from user_info";
	$con=conn();
	$res= mysqli_query($con,$sql);
	return $res;
}
function Passenger_Delete($user)
{
	$sql1="select * from user_info where user='$user'";
	$con1=conn();
	$res1= mysqli_query($con1,$sql1);
	$row=mysqli_num_rows($res1);
	if($row==0)
	{
		return false;
	}
	else
	{
        $sql2="delete from user_info where user='$user'";
        $con2=conn();
	    mysqli_query($con2,$sql2);
		return true;
	}
}
function Notification_Check()
{
	$sql1="select * from passenger_rating_comment where Status= 'Unseen'";
	$con1=conn();
	$res1= mysqli_query($con1,$sql1);
	$row=mysqli_num_rows($res1);
	if($row==0)
	{
		return false;
	}
	else
	{ 
		return true;
	}
}
function Unseen_to_Seen()
{
   $sql2="update passenger_rating_comment set Status='Seen'";
    $con2=conn();
	mysqli_query($con2,$sql2);	
}


?>