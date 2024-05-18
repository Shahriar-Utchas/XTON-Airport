<?php
require_once('db_Connection.php');

//Restaurant Part-------------------------------------------------------------------
//Restaurant Delete
function deleteRestaurant($Rest_Id) {
    $conn = conn(); // Assuming you have a function to get DB connection
    $query = "DELETE FROM restaurant WHERE Rest_Id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $Rest_Id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return true;
    exit();
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
//Store Delete
function deleteStore($Store_Id) {
    $conn = conn(); // Assuming you have a function to get DB connection
    $query = "DELETE FROM store WHERE Store_Id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $Store_Id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return true;
    exit();
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
//Airlines Delete
function deleteAirlines($Airlines_Id) {
    $conn = conn(); // Assuming you have a function to get DB connection
    $query = "DELETE FROM airlines WHERE Airlines_Id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $Airlines_Id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return true;
    exit();
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
//Admin-------------------------------------------------------------------------
function Admin_List()
{
	$sql="select * from administration";
	$con=conn();
	$res= mysqli_query($con,$sql);
	return $res;
}
function Admin_Update($name,$password,$address,$mobile,$email,$image)
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
		else
		{
			return false;
		}
}
//Employee---------------------------------------------------------------------------
//Employee Delete
function deleteEmployee($Emp_Id) {
    $conn = conn(); // Assuming you have a function to get DB connection
    $query = "DELETE FROM employee WHERE Emp_Id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $Emp_Id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return true;
    exit();
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
	$sql="select * from employee where Emp_Id='$id'";
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
//Service Provider---------------------------------------------------------------------
//Service_Provider Delete
function deleteService_Provider($Provider_Id) {
    $conn = conn(); // Assuming you have a function to get DB connection
    $query = "DELETE FROM service_provider WHERE Provider_Id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $Provider_Id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return true;
    exit();
}
function Srvc_Provider_List()
{
	$sql="select Provider_Id,Provider_Name,Provider_Mobile,Provider_Email,Provider_Address,Provider_Image,
	Provider_Salary,Provider_Ratings,Provider_Gender from service_provider";
	$con=conn();
	$res= mysqli_query($con,$sql);
	return $res;
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
//Admin--------------------------------------------------------------------
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
//Passengers----------------------------------------------------------------------------
//Passenger Delete
function deletePassenger($user_id) {
    $conn = conn(); // Assuming you have a function to get DB connection
    $query = "DELETE FROM user_info WHERE user = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return true;
    exit();
}
function Passenger_List()
{
	$sql="select user,Email,img,Mobile,Address,Points,Gender from user_info";
	$con=conn();
	$res= mysqli_query($con,$sql);
	return $res;
}
//Notification----------------------------------------------------
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
//Seen-Unseen------------------------------------------------------------
function Unseen_to_Seen()
{
   $sql2="update passenger_rating_comment set Status='Seen'";
    $con2=conn();
	mysqli_query($con2,$sql2);	
}
//Admin Review Check------------------------------------------------------------
function Admin_Review_Comment()
{
	$sql2 = "select Pass_Name, Pass_Review, Pass_Image, Pass_Comment FROM passenger_rating_comment";
	$con2=conn();
	$result=mysqli_query($con2,$sql2);	
	return $result;
}


?>