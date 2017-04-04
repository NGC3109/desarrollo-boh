<?



$dir_name = "../../images/case-studies/inner/";
    move_uploaded_file($_FILES['file']['tmp_name'],$dir_name.$_FILES['file']['name']);
    echo "http://www.peopleforsuccess.com.au/images/case-studies/inner/".$_FILES['file']['name'];













?>