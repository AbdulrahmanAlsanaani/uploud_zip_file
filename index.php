<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> zip </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <!-- Form to uploud zip file -->
    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <br>
        <input type="file" name="zip_file" id="zip">
        <input type="submit" value="Upload zip" name="submit">
    </form>

    <br><br>
    <?php
    //Extend to dir_tree.php
    require 'dir_tree.php';
    if (isset($_POST["submit"])) {
        $fileName = $_FILES['zip_file']['name'];
        $file_arr = explode(".", $fileName);
        //If 
        if (strtolower($file_arr[count($file_arr) - 1]) == 'zip') {
            $finName = $file_arr[0];
            $zip = new zipArchive();
            if ($zip->open($_FILES['zip_file']["tmp_name"])) {
                $new_name = time().rand(1000000,10000000);
                $zip->extractTo("./upload/$new_name");
                $zip->close();
                $pathScan = "./upload/$new_name/";
                getDirectory($pathScan);
            }
        }
    }else{

    }
    ?>
</body>

</html>